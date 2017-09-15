<html>
    <head>
		  <meta http-equiv='content-type' content='text/html; charset=utf-8'>
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel='stylesheet' type='text/css' href="css/stile.css" media='screen'>
	</head>
        
        <body>
            
            <div style='margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;'>
			<a href='opzioniazienda.php'><img style='border: 0px solid ; width: 709px; height: 86px;' class='classname' alt='' src='images/logo.png'></a>
	    </div>
        </body>
</html>  

<?php

    //dati del form
    $id=$_POST["identificatore"];
    
    //accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    //comando SQL
    $sql = "SELECT * FROM impianto WHERE Id=$id";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);

    if($conta==1){
        
        echo "I dati dell'impianto cercato sono i seguenti: <br><br>";
        
        $id = mysql_result($result, 0, "id");
        echo 'Identificatore:  ' . $id . ' </br>';
        $tipo = mysql_result($result, 0, "tipo");
        echo 'Tipo:  ' . $tipo . ' <a href="modificaTipoImpianto.html">Edit</a></br>';
        $dimensione = mysql_result($result, 0, "dimensione");
        echo 'Dimensione:  ' . $dimensione . ' <a href="modificaDimImpianto.html">Edit</a></br>';
        $stato = mysql_result($result, 0, "stato");
        if($stato){
            echo 'Stato: Attivo <a href="modificaStatoImpianto.html">Edit</a></br>';
        } else{
            echo 'Stato: Non attivo <a href="modificaStatoImpianto.html">Edit</a></br>';
        }
        $idcliente = mysql_result($result, 0, "id_cliente");
        echo 'Identificatore cliente: ' . $idcliente . ' <a href="modificaClienteImpianto.html">Edit</a></br>';
    
    } else {
        echo "L'impianto non e' stato trovato.";
    }

?>