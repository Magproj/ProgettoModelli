<html>
    <head>
		  <meta http-equiv='content-type' content='text/html; charset=utf-8'>
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel='stylesheet' type='text/css' href="css/stile.css" media='screen'>
	</head>
        
        <body>
            
            <div style='margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;'>
			<a href='opzioniazienda.php'><img style='border: 0px solid ; width: 709px; height: 86px;' class='classname' alt='' src='images/logo.png'></a>
	    </div>
        </body>
</html>  


<?php

    //dati del form
    $id=$_POST["identificatore"];
    $marca=$_POST["marca"];
    $tipo=$_POST["tipo"];
    $idimpianto=$_POST["idimpianto"];
    $modello=$_POST["modello"];
    $coderr=$_POST["codice"];
    $valmin =$_POST["valmin"];
    $valmax=$_POST["valmax"];
    $segn=0;
    
    
    
    //accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    if(isset($_POST["stato"])) { 
    
      $stato = $_POST['stato'] == 'true' ? true : false;
    }
    
    

    if($modello!='null'){
        $sql1="SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result = mysql_query($sql1);
        $conta = mysql_num_rows($result);
        if($conta>=1){
            $segn=1;
        }        
    }
    
    
    //comando SQL
    $sql = "INSERT INTO sensore (Id_sensore, marca, tipo, stato, id_impianto, valmin, valmax) VALUES ('$id',  '$marca', '$tipo', '$stato', '$idimpianto', '$valmin', '$valmax')";
    
    if($segn==1){
        $sql2 = "UPDATE modellostringa SET cifredecimali='$modello' AND coderrore='$coderr' AND valmin='$valmin' AND valmax='$valmax' WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        if(mysql_query($sql2)){
            echo "Dati del modello della stringa aggiornati correttamente<br />";
        } else {
            echo "Attenzione, si è verificato un errore: " . mysql_error();
        }
    }else{
        $sql3 = "INSERT INTO modellostringa(tipo, cifredecimali, id_impianto, coderrore, valmin, valmax) VALUES ('$tipo', '$modello', '$idimpianto', '$coderr', '$valmin', '$valmax')";
        if(mysql_query($sql3)){
            echo "Dati del modello della stringa memorizzati correttamente<br />";
        } else {
            echo "Attenzione, si è verificato un errore: " . mysql_error();
        }
    }
    
    if(mysql_query($sql)){
        echo "Dati del sensore memorizzati correttamente<br />";
        echo "Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
    } else {
        echo "Attenzione, si è verificato un errore: " . mysql_error();
    }

?>