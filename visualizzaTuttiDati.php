<html>
    <head>
		  <meta http-equiv="content-type" content="text/html; charset=utf-8">
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel="stylesheet" type="text/css" href="css/stile.css" media="screen">
	</head>

        <body>

            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;">
			<a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
        </body>
</html>

<?php

//accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
	    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());

    //dati del form

$partitaiva=$_POST["partitaiva"];


    //comando SQL
    $sql = "SELECT id_dato, id_impianto, id_sensore, data, ora, valore, info, tipo, dimensione, stato, id_cliente FROM datirilevati INNER JOIN impianto ON id=id_impianto WHERE Id_cliente='$partitaiva' ";

    $result = mysql_query($sql);
    if(!$result) die ('Query fallita!! Nessun dato trovato.');
    
    $NRIGHE = MySql_num_rows ($result);  // calcolo del numero di righe del record set
    $NCAMPI=  MySql_num_fields ($result);  // calcolo del numero di campi del record set

    
    echo "<table border=2>";
    echo "<tr><td><b>Id Dato</b></td><td><b>Id Impianto</b></td><td><b>Id Sensore</b></td><td><b>Data</b></td><td><b>Ora</b></td><td><b>Valore</b></td><td><b>Info</b></td><td><b>Tipo</b></td><td><b>Dimensione</b></td><td><b>Stato</b></td><td><b>Id Cliente</b></td>";
    echo "</tr>";

     for($i=0; $i<$NRIGHE; $i++){
    echo "<tr>";
    for($j=0; $j<$NCAMPI; $j++){
       echo "<td>";
       echo MySql_result($result,$i,$j);
       echo "</td>";                                                       //stampa del recors set e quindi delle informazioni richieste
      }
       echo "</tr>";
                                                                          //nella query.
  }

 echo "</table>";
?>
