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
    $id=$_POST['identificatore'];
    $marca=$_POST['marca'];
    $tipo=$_POST['tipo'];
    $idimpianto=$_POST['idimpianto'];
    $modello=$_POST['modello'];
    $coderr=$_POST['codice'];
    $valmin =$_POST['valmin'];
    $valmax=$_POST['valmax'];
    $segn=0;
    
    
    
    //database
    define('DB_HOST', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'progetto');
    
    //get connection
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($mysqli->connect_errno){
    	trigger_error('Connection failed: ' . $mysqli->connect_error, E_USER_NOTICE);
    }
    
    if(isset($_POST['stato'])) { 
    
      $stato = $_POST['stato'] == 'true' ? true : false;
    }
    
    

    if($modello!==0){
        $sql1=sprintf("SELECT * FROM modellostringa WHERE tipo='%s' AND id_impianto='%s'", mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $idimpianto));
        $result = $mysqli->query($sql1);
        $conta = mysqli_num_rows($result);
        if($conta>=1){
            $segn=1;
        }        
    }
    
    
    //comando SQL
    $sql = sprintf("INSERT INTO sensore (Id_sensore, marca, tipo, stato, id_impianto) VALUES ('%s',  '%s', '%s', '%s', '%s')", mysqli_real_escape_string($mysqli, $id), mysqli_real_escape_string($mysqli, $marca), mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $stato), mysqli_real_escape_string($mysqli, $idimpianto));
    
    if($segn===1){
        $sql2 = sprintf("UPDATE modellostringa SET cifredecimali='%s' AND coderrore='%s' AND valmin='%s' AND valmax='%s' WHERE tipo='%s' AND id_impianto='%s'", mysqli_real_escape_string($mysqli, $modello), mysqli_real_escape_string($mysqli, $coderr), mysqli_real_escape_string($mysqli, $valmin), mysqli_real_escape_string($mysqli, $valmax), mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $idimpianto));
        $result2 = $mysqli->query($sql2);
	if($result2===true){
            echo 'Dati del modello della stringa aggiornati correttamente<br />';
        } else {
           trigger_error('Attenzione, si è verificato un errore:' . $mysqli->connect_error, E_USER_NOTICE);
        }
    }else{
        $sql3 = sprintf("INSERT INTO modellostringa(tipo, id_impianto, cifredecimali, coderrore, valmin, valmax) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')", mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $idimpianto), mysqli_real_escape_string($mysqli, $modello), mysqli_real_escape_string($mysqli, $coderr), mysqli_real_escape_string($mysqli, $valmin), mysqli_real_escape_string($mysqli, $valmax));
        $result3 = $mysqli->query($sql3);
	if($result3===true){
            echo 'Dati del modello della stringa memorizzati correttamente<br />';
        } else {
            trigger_error('Attenzione, si è verificato un errore:' . $mysqli->connect_error, E_USER_NOTICE);
        }
    }
    
    $result = $mysqli->query($sql);
    if($result===true){
        echo 'Dati del sensore memorizzati correttamente<br />';
        $str = "Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    } else {
        trigger_error('Attenzione, si è verificato un errore:' . $mysqli->connect_error, E_USER_NOTICE);
    }

?>