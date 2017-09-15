<html>
    <head>
		  <meta http-equiv='content-type' content='text/html; charset=utf-8'>
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel='stylesheet' type='text/css' href="css/stile.css" media='screen'>
	</head>
        
        <body>
            
            <div style='margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;'>
			<a href='opzioniazienda.html'><img style='border: 0px solid ; width: 709px; height: 86px;' class='classname' alt='' src='images/logo.png'></a>
	    </div>
        </body>
</html>  

<?php

    //dati del form
    $id=$_POST['identificatore'];
    $idimpianto = $_POST['idimpianto'];
    
    //accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    //comando SQL
    $sql = "SELECT * FROM sensore WHERE Id_sensore='$id' AND id_impianto='$idimpianto'";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);
    

    
    
    if($conta==1){
        
        echo "I dati del sensore cercato sono i seguenti: <br><br>";
        
        $id = mysql_result($result, 0, "id_sensore");
        echo 'Sensore:  ' . $id . '  <a href="modificaIdSensore.html">Edit</a></br>';
        $stato = mysql_result($result, 0, "stato");
        if($stato){
            echo 'Stato: Attivo <a href="modificaStatoSensore.html">Edit</a></br>';
        } else{
            echo 'Stato: Non attivo <a href="modificaStatoSensore.html">Edit</a></br>';
        }
        $idimpianto = mysql_result($result, 0, "id_impianto");
        echo 'Identificatore impianto: ' . $idimpianto . ' <a href="modificaImpiantoSens.html">Edit</a></br>';
	$tipo = mysql_result($result, 0, "tipo");
	$sql= "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result1 = mysql_query($sql);
	if(!$result)
	    die("Errore nella query $result1: " . mysql_error());
	$modello = mysql_result($result1, 0, "cifredecimali");
	echo 'Modello: ' . $modello . ' <a href="modificaModello.html">Edit</a></br>';
	$coderr = mysql_result($result1, 0, "coderrore");
	echo 'Errore: ' . $coderr . '<a href="modificaErrore.html">Edit</a><br>';
	$valmin = mysql_result($result1, 0, "valmin");
	echo 'Valore minimo: ' .$valmin . '<a href="modificaValmin.html">Edit</a><br>';
	$valmax = mysql_result($result1, 0, "valmax");
	echo 'Valore massimo: ' . $valmax . '<a href="modificaValmax.html">Edit</a><br>';
	echo 'Si ricorda che se viene inserito un nuovo modello per questo sensore, esso corrispondera a un nuovo modello per tutti i sensori dello stesso tipo in questo impianto.<br>';
	
    
    } else {
        echo "Il sensore non e' stato trovato.";
    }

?>