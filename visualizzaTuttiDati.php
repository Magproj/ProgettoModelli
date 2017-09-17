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

    //dati del form

    $partitaiva=htmlentities($_POST['partitaiva']);
    
    if($partitaiva===null || $partitaiva<=0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }

    //comando SQL
    $sql = sprintf("SELECT id_dato, id_impianto, id_sensore, data, ora, valore, info, tipo, dimensione, stato, id_cliente FROM datirilevati INNER JOIN impianto ON id=id_impianto WHERE Id_cliente='$partitaiva'", mysqli_real_escape_string($mysqli, $partitaiva));

    $result = $mysqli->query($sql);
    if($result===false) trigger_error('Query fallita!! Nessun dato trovato.', E_USER_NOTICE);
    
    $NRIGHE = mysqli_num_rows ($result);  // calcolo del numero di righe del record set
    $NCAMPI=  mysqli_num_fields ($result);  // calcolo del numero di campi del record set
    
    $row = mysqli_fetch_all($result, MYSQLI_NUM); 
    
    $str = '<table border=2>';
    $str1 = '<tr><td><b>Id Dato</b></td><td><b>Id Impianto</b></td><td><b>Id Sensore</b></td><td><b>Data</b></td><td><b>Ora</b></td><td><b>Valore</b></td><td><b>Info</b></td><td><b>Tipo</b></td><td><b>Dimensione</b></td><td><b>Stato</b></td><td><b>Id Cliente</b></td>';
    $str2 = '</tr>';
    echo $str;
    echo $str1;
    echo $str2;

     for($i=0; $i<$NRIGHE; $i++){
	$str= '<tr>';
    echo $str;
    for($j=0; $j<$NCAMPI; $j++){
	$str = '<td>';
       echo $str;
       echo htmlspecialchars($row[$i][$j]);
       $str = '</td>';
       echo $str;                                                       //stampa del recors set e quindi delle informazioni richieste
      }
      $str = '</tr>';
       echo $str;
                                                                          //nella query.
  }

 $str = '</table>';
 echo $str;
?>
