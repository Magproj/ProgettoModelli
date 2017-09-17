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
    $idadattatore=$_POST['id'];
    
    if($idadattatore===null || $idadattaatore<=0){
        trigger_error('Errore nell\'inserimento del dato. ' , E_USER_NOTICE);
    }
    
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
    
    //comando SQL
    $sql = sprintf("UPDATE adattatore SET stato='%s' WHERE id='%s'", mysqli_real_escape_string($mysqli, $stato), mysqli_real_escape_string($mysqli, $idadattatore));
    $result = $mysqli->query($sql);
    
    if($result===true){
        echo 'Dati modificati correttamente<br />';
	$str = "Torna alla <a href=\"modificaAdattatore.html\">modifica</a>";
        echo $str;
    } else {
        echo 'Attenzione, si è verificato un errore: ' . mysql_error();
    }

?>