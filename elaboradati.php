<?php

     
    $data = '';
    $ora = '';
    $valore = '';

    //accesso al database
    $host='localhost';
    $username='root';
    $password='';
    $db_nome='progetto';
    $result = mysql_pconnect($host, $username, $password);
    if($result===false){
        trigger_error('Impossibile connettersi al server: ' . mysql_error(), E_USER_NOTICE);
    }
    
    $result = mysql_select_db($db_nome);
    if($result===false){
        trigger_error('Accesso al database non riuscito: ' . mysql_error(), E_USER_NOTICE);
    }
    
    //comando SQL
    $sql = "SELECT * FROM gestoredatistringa WHERE elaborata='0'";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);
   
    
    if($conta>==1){
        $i=0;
        while($i<$conta){
            
            $data = '';
            $ora = '';
            $valore = '';
                
            $stringa = mysql_result($result, $i, 'stringa');
            //la stringa da suddividere è quella inviataci dall'adattatore
            $divisa = explode(' ', $stringa, 4);
            //nella prima parte è contenuto l'identificatore che sarà diviso in id sensore e id impianto
            
            $sql1 = "SELECT * FROM sensore WHERE id_sensore='$divisa[0]' AND id_impianto='$divisa[1]'";
            $result1 = mysql_query($sql1);
            $tipo = mysql_result($result1, 0, 'tipo');
            
            $sql2 = "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$divisa[1]'";
            $result2 = mysql_query($sql2);
            $modello = mysql_result($result2, 0, 'cifredecimali');
            $errore = mysql_result($result2, 0, 'coderrore');
            $valmin = mysql_result($result2, 0, 'valmin');
            $valmax = mysql_result($result2, 0, 'valmax');
             
            //confrontiamo se le cifre decimali contengono un'errore o un'eccezione
            if($divisa[2]===$errore){
                //se è un errore  l'informazione viene salvata tra i dati del sensore
                $sql4 = "UPDATE sensore SET errore='1' WHERE id_sensore='$divisa[0]' AND id_impianto='$divisa[1]'";
                $result4 = mysql_query($sql4);
                $sql7 = "UPDATE gestoredatistringa SET elaborata='1' WHERE stringa='$stringa'";
                $result7 = mysql_query($sql7);
                trigger_error('Elaborazione dei dati non riuscita, è stata rilevata un errore.', E_USER_NOTICE);
            } elseif($divisa[2]<$valmin || $divisa[2]>$valmax){
                //se è un eccezione l'informazione viene salvata tra i dati rilevati
                $sql5="INSERT INTO datirilevati(id_sensore, id_impianto, valore, info) VALUES ('$divisa[0]', '$divisa[1]', '$divisa[2]', '$divisa[3]')";
                $result5 = mysql_query($sql5);
                $sql7 = "UPDATE gestoredatistringa SET elaborata='1' WHERE stringa='$stringa'";
                $result7 = mysql_query($sql7);
                trigger_error('Elaborazione dei dati riuscita, è stata rilevata un eccezione.', E_USER_NOTICE);
            }
            
            
            //dividiamo il modello della stringa
            $str = explode(';', $modello, 3);
            //dividiamo le cifre decimali secondo il modello della stringa
            $str1=explode(';', $divisa[2], sizeof($str));
            
            $s=0;
            while($s<sizeof($str)){
                //individuiamo i componenti della stringa
                if($str[$s]=='data'){
                    $data=$str1[$s];
                } elseif($str[$s]=='ora'){
                    $ora=$str1[$s];
                } elseif($str[$s]=='valore'){
                    $valore=$str1[$s];
                }
                $s++;
            }
            
            
            
            //salviamo le informazioni tra i dati rilevati
            $sql6 = "INSERT INTO datirilevati(id_sensore, id_impianto, data, ora, valore, info) VALUES ('$divisa[0]', '$divisa[1]', '$data', '$ora', '$valore', '$divisa[3]')";
            $result6 = mysql_query($sql6);
            
            if($result6){
                 echo 'Dati rilevati elaborati e memorizzati correttamente<br />';
            } else {
                echo 'Attenzione, si è verificato un errore: ' . mysql_error();
            }
            
            $i++;
            
            $sql7 = "UPDATE gestoredatistringa SET elaborata='1' WHERE stringa='$stringa'";
            $result7 = mysql_query($sql7);
            
        
    }
    
    }
    
?>