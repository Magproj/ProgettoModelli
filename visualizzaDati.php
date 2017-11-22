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

$idimpianto=$_POST["idimpianto"];
$idsensore=$_POST["idsensore"];
$partitaiva=$_POST["partitaiva"];




    //comando SQL
    $sql = "SELECT * FROM datirilevati JOIN impianto ON id=id_impianto WHERE id_impianto='$idimpianto' AND Id_sensore='$idsensore' AND id_cliente='$partitaiva' ";
	    
    $result = mysql_query($sql);
    if(!$result) die ('Query fallita!! Nessun dato trovato.');
    $conta= mysql_num_rows($result);
    
    
    $i=0;
    if($conta>=1){
	
	    while($i<$conta){
      	        echo '<br>I dati rilevati dal sensore sono i seguenti: <br><br>';
                echo 'Identificatore impianto:  ' . $idimpianto . ' </br>';  
                echo 'Identificatore sensore:  ' . $idsensore . ' </br>';
	        $id_dato = mysql_result($result, 0, "id_dato");
	        	echo 'Identificatore del dato:  ' . $id_dato . ' </br>';
	        $data = mysql_result($result, 0, "data");
		        echo 'Data: ' . $data . ' </br>';
                $ora = mysql_result($result, 0, "ora");
		        echo 'Ora: ' . $ora . ' </br>';
		$valore = mysql_result($result, 0, "valore");
		        echo 'Valore: ' . $valore . ' </br>';
		$info = mysql_result($result, 0, "info");
        		echo 'Info: ' . $info . ' </br>';
			$i++;
	    }
    } else {
        echo " Nessun dato trovato. <br>";
    }


?>