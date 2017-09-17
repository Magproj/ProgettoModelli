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

    //dati del form
    $id=$_POST['identificatore'];
    $idimpianto=$_POST['idimpianto'];
    
    //accesso al database
    //database
    define('DB_HOST', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'progetto');
    
    //get connection
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($mysqli===false){
    	trigger_error('Connection failed: ' . $mysqli->error, E_USER_NOTICE);
    }

    
    //comando SQL
    $sql = sprintf("SELECT * FROM sensore WHERE Id_sensore='$id' AND id_impianto='$idimpianto'");
    $result = mysqli_query($mysqli, $sql);    
    $conta= mysqli_num_rows($result);
    
    if($conta===1){
        $str = 'I dati del sensore cercato sono i seguenti: <br><br>';
        echo $str;
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $str = 'Identificatore:  ' . $row['id'] . ' </br>';
        echo $str;
        $marca = mysql_result($result, 0, 'marca');
        $str = 'Marca:  ' . $marca . ' </br>';
        echo $str;
        $tipo = mysql_result($result, 0, 'tipo');
        $str = 'Tipo:  ' . $tipo . ' </br>';
        echo $str;
        $stato = mysql_result($result, 0, 'stato');
        if($stato===true){
            $str = 'Stato: Attivo </br>';
            echo $str;
        } else{
            $str = 'Stato: Non attivo </br>';
            echo $str;
        }
        $idimpianto = mysql_result($result, 0, 'id_impianto');
        $str = 'Identificatore impianto: ' . $idimpianto . ' </br>';
        echo $str;
        $sql2= "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result = mysql_query($sql2);
	$modello = mysql_result($result, 0, 'cifredecimali');
        $str = 'Modello: ' . $modello . '</br>';
	echo $str;
        $valmin = mysql_result($result, 0, 'valmin');
        $str = 'Valore minimo: ' . $valmin . '</br>';
        echo $str;
        $valmax = mysql_result($result, 0, 'valmax');
        $str = 'Valore massimo: ' . $valmax . '</br>';
        echo $str;
        $err = mysql_result($result, 0, 'coderrore');
        if($err===true){
            $str = 'Errore rilevato.</br>';
            echo $str;
        } else {
            $str = 'Errore non rilevato.</br>';
            echo $str;
        }
    
    } else {
        $str = 'Il sensore non e\' stato trovato. <br>';
        echo $str;
    }

?>