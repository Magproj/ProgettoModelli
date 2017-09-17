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

    //accesso al database
    $host='localhost';
    $username='root';
    $password='';
    $db_nome='progetto';
    $result = mysql_connect($host, $username, $password);
    if($result===false){
        trigger_error('Impossibile connettersi al server: ' . mysql_error(), E_USER_NOTICE);
    }
    
    $result = mysql_select_db($db_nome);
    if($result===false){
        trigger_error('Accesso al database non riuscito: ' . mysql_error(), E_USER_NOTICE);
    }


    //dati del form

    $partitaiva=$_POST['partitaiva'];
    
    if($partitaiva===null || $partitaiva>==0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }

    //comando SQL
    $sql = "SELECT id_dato, id_impianto, id_sensore, data, ora, valore, info, tipo, dimensione, stato, id_cliente FROM datirilevati INNER JOIN impianto ON id=id_impianto WHERE Id_cliente='$partitaiva'";

    $result = mysql_query($sql);
    if($result===false) trigger_error('Query fallita!! Nessun dato trovato.', E_USER_NOTICE);
    
    $NRIGHE = MySql_num_rows ($result);  // calcolo del numero di righe del record set
    $NCAMPI=  MySql_num_fields ($result);  // calcolo del numero di campi del record set

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
       echo MySql_result($result,$i,$j);
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
