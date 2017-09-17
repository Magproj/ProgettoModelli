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
    $idsensore=$_POST['idsensore'];
    
    
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
    
    if(isset($_POST['stato'])) { 
    
      $stato = $_POST['stato'] == 'true' ? true : false;
    }
    
    //comando SQL
    $sql = sprintf("INSERT INTO adattatore (Id, stato, id_sensore) VALUES ('%s','%s','%s')", mysqli_real_escape_string($mysqli, $id), mysqli_real_escape_string($mysqli, $stato), mysqli_real_escape_string($mysqli, $idsensore));
    $result = $mysqli->query($sql);    
    
    if($result===true){
        echo 'Dati memorizzati correttamente<br />';
        $str = "Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    } else {
        echo 'Attenzione, si è verificato un errore: ' . mysql_error();
    }

?>