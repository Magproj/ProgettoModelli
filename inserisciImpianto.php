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
    
    if($_SESSION['username']==='admin' && $_SESSION['password']==='admin' ){
    
    //dati del form
    $id=htmlentities($_POST['identificatore']);
    $dimensione=htmlentities($_POST['dimensione']);
    $tipo=htmlentities($_POST['tipo']);
    $idCliente=htmlentities($_POST['idcliente']);
    
    if($id===null || $id<=0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    if($dimensione===null || $dimensione<=0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    if($tipo===null){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    if($idCliente===null || $idCliente<=0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
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
    $sql = sprintf("INSERT INTO impianto (Id, tipo, dimensione, stato, id_cliente) VALUES ('%s',  '%s', '%s', '%s', '%s')", mysqli_real_escape_string($mysqli, $id), mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $dimensione), mysqli_real_escape_string($mysqli, $stato), mysqli_real_escape_string($mysqli, $idCliente));
    $result = $mysqli->query($sql);
    
    
    if($result===true){
        echo 'Dati memorizzati correttamente<br />';
    } else {
        echo 'Attenzione, si è verificato un errore: ' . mysql_error();
    }
    
    }else{
	trigger_error('Non è autorizzato a modificare questi dati. ' . $mysqli->connect_error, E_USER_NOTICE);
    }

?>