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
    $idsensore=$_POST['id'];
    $idimpianto=$_POST['idimpianto'];
    
    //accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    if(isset($_POST["stato"])) { 
    
      $stato = $_POST['stato'] == 'true' ? true : false;
    }
    
    //comando SQL
    $sql = 'UPDATE sensore SET stato='$stato' WHERE id_sensore='$idsensore' AND id_impianto='$idimpianto'';
    
    if(mysql_query($sql)){
        echo "Dati modificati correttamente<br />";
        echo "Torna alla <a href=\"modificaSensore.html\">modifica</a>";
    } else {
        echo "Attenzione, si � verificato un errore: " . mysql_error();
    }

?>