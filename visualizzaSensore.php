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
    $id=$_POST['identificatore'];
    $idimpianto=$_POST['idimpianto'];
    
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
        echo 'Identificatore:  ' . $id . ' </br>';
        $marca = mysql_result($result, 0, "marca");
        echo 'Marca:  ' . $marca . ' </br>';
        $tipo = mysql_result($result, 0, "tipo");
        echo 'Tipo:  ' . $tipo . ' </br>';
        $stato = mysql_result($result, 0, "stato");
        if($stato){
            echo 'Stato: Attivo </br>';
        } else{
            echo 'Stato: Non attivo </br>';
        }
        $idimpianto = mysql_result($result, 0, "id_impianto");
        echo 'Identificatore impianto: ' . $idimpianto . ' </br>';
        $sql2= "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result = mysql_query($sql2);
	$modello = mysql_result($result, 0, "cifredecimali");
	echo 'Modello: ' . $modello . '</br>';
        $valmin = mysql_result($result, 0, "valmin");
        echo 'Valore minimo: ' . $valmin . '</br>';
        $valmax = mysql_result($result, 0, "valmax");
        echo 'Valore massimo: ' . $valmax . '</br>';
        $err = mysql_result($result, 0, "errore");
        if($err){
            echo 'Errore rilevato.</br>';
        } else {
            echo 'Errore non rilevato.</br>';
        }
    
    } else {
        echo "Il sensore non e' stato trovato. <br>";
    }

?>