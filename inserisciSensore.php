<html>
    <head>
		  <meta http-equiv="content-type" content="text/html; charset=utf-8">
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel="stylesheet" type="text/css" href="css/stile.css" media="screen">
	</head>

        <body>

            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 319px; width: 725px;">
			<a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
        </body>
</html> 


<?php

    
    session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	    
      } else{
	    header('Location:Login.html');
      }
    

    //dati del form
    $id=htmlentities($_POST['identificatore']);
    $marca=htmlentities($_POST['marca']);
    $tipo=htmlentities($_POST['tipo']);
    $idimpianto=htmlentities($_POST['idimpianto']);
    $modello=htmlentities($_POST['modello']);
    $coderr=htmlentities($_POST['codice']);
    $valmin =htmlentities($_POST['valmin']);
    $valmax=htmlentities($_POST['valmax']);
    $segn=0;
    
    
    
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
    
    if(isset($_POST['stato'])) { 
    
      $stato = $_POST['stato'] == 'true' ? true : false;
    }
    
    

    if($modello!=='null'){
        $sql1=sprintf("SELECT * FROM modellostringa WHERE tipo='%s' AND id_impianto='%s'", mysql_real_escape_string($tipo), mysql_real_escape_string($idimpianto));
        $result = mysql_query($sql1, $dbh);
        $conta = mysql_num_rows($result);
        if($conta>=1){
            $segn=1;
        }        
    }
    
    
    //comando SQL
    $sql = sprintf("INSERT INTO sensore (Id_sensore, marca, tipo, stato, id_impianto, valmin, valmax) VALUES ('%s',  '%s', '%s', '%s', '%s', '%s', '%s')", mysql_real_escape_string($id), mysql_real_escape_string($marca), mysql_real_escape_string($tipo), mysql_real_escape_string($stato), mysql_real_escape_string($idimpianto), mysql_real_escape_string($valmin), mysql_real_escape_string($valmax));
    
    if($segn===1){
        $sql2 = sprintf("UPDATE modellostringa SET cifredecimali='%s' AND coderrore='%s' AND valmin='%s' AND valmax='%s' WHERE tipo='%s' AND id_impianto='%s'", mysql_real_escape_string($modello), mysql_real_escape_string($coderr), mysql_real_escape_string($valmin), mysql_real_escape_string($valmax), mysql_real_escape_string($tipo), mysql_real_escape_string($idimpianto));
        if(mysql_query($sql2)===true){
            echo 'Dati del modello della stringa aggiornati correttamente<br />';
        } else {
            echo 'Attenzione, si è verificato un errore: ' . mysql_error();
        }
    }else{
        $sql3 = sprintf("INSERT INTO modellostringa(tipo, cifredecimali, id_impianto, coderrore, valmin, valmax) VALUES ('%s', '%s', '%s', '%s', '%s', '%s'), mysql_real_escape_string($tipo)", mysql_real_escape_string($modello), mysql_real_escape_string($coderr), mysql_real_escape_string($valmin), mysql_real_escape_string($valmax));
        if(mysql_query($sql3)===true){
            echo 'Dati del modello della stringa memorizzati correttamente<br />';
        } else {
            echo 'Attenzione, si è verificato un errore: ' . mysql_error();
        }
    }
    
    if(mysql_query($sql)===true){
        echo 'Dati del sensore memorizzati correttamente<br />';
        $str = "Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    } else {
        echo 'Attenzione, si è verificato un errore: ' . mysql_error();
    }

?>