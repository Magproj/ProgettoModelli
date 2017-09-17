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
	
	//acquisizione dati dal form HTML
	$codice = $_POST['codice'];
	$modinvio = $_POST['modinvio'];
	$tipo = $_POST['tipo'];
	$tempo = $_POST['tempo'];
	$info = $_POST['info'];
	$partitaiva = $_POST['partiva'];
	
	$idimpianto = $_POST['idimpianto'];
	$idsensore = $_POST['idsensore'];
	
	//controlli per l'input
	if($partitaiva===null || $partitaiva<=0){
		trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
	}
	
	
	
	
	
	//inserimento dei dati nel database
	$insert = sprintf("INSERT INTO sistemaautorizzato (codice, modinvio, tipo, tempo, info, id_cliente) VALUES ('$codice','$modinvio', '$tipo', '$tempo', '$info', '$partitaiva')", mysqli_real_escape_string($mysqli, $codice), mysqli_real_escape_string($mysqli, $modinvio), mysqli_real_escape_string($mysqli, $tipo), mysqli_real_escape_string($mysqli, $tempo), mysqli_real_escape_string($mysqli, $info), mysqli_real_escape_string($mysqli, $partitaiva));
	
	$result = $mysqli->query($sql);    
	
	if ($result===false) {
		trigger_error("Errore nella query $insert: " . mysql_error(), E_USER_NOTICE);
	}

	
	// chiudo la connessione a MySQL
	mysql_close();

	echo 'Query eseguita correttamente';


	
?>