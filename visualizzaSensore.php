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

    if($mysqli->connect_errno){
    	trigger_error('Connection failed: ' . $mysqli->connect_error, E_USER_NOTICE);
    }

    //execute query
    $query = sprintf("SELECT * FROM sensore WHERE Id_sensore='$id' AND id_impianto='$idimpianto'");
    $result = $mysqli->query($query);
    $conta= mysqli_num_rows($result);
    

    if($conta===1){
        
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $str = 'I dati del sensore cercato sono i seguenti: <br><br>';
        echo $str;
        
        
        $str = 'Identificatore:  ' . $row['id_sensore'] . ' </br>';
        echo $str;
        $str = 'Marca:  ' . $row['marca'] . ' </br>';
        echo $str;
        $str = 'Tipo:  ' . $row['tipo'] . ' </br>';
        echo $str;
        $stato = $row['stato'];
        if($stato===true){;
            $str = 'Stato: Attivo </br>';
            echo $str;
        } else{
            $str = 'Stato: Non attivo </br>';
            echo $str;
        }
    
        $str = 'Identificatore impianto: ' . $row['idimpianto'] . ' </br>';
        echo $str;
        $sql2= "SELECT * FROM modellostringa WHERE tipo='$row['tipo]' AND id_impianto='$row['$idimpianto']'";
        $result = $mysqli->query($query);
        
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
    
        $str = 'Modello: ' . $row['modello'] . '</br>';
	echo $str;
        $str = 'Valore minimo: ' . $row['valmin'] . '</br>';
        echo $str;
        $str = 'Valore massimo: ' . $row['valmax'] . '</br>';
        echo $str;
        $err = $row['coderrore'];
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