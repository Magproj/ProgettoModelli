<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
	
		  <meta http-equiv="content-type" content="text/html; charset=utf-8"><title>SENSOR MANAGEMENT SYSTEM</title>
		  
	  	  <link rel="stylesheet" type="text/css" href="css/stile.css" media="screen"></head><body>
            
            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;">
			<a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
        
<?php //dati del form
    $partiva=$_POST["partitaiva"];
    
    //accesso al database
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    //comando SQL
    $sql = "SELECT * FROM cliente WHERE PartitaIva=$partiva";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);
    
    if($conta==1){
    
        echo "I dati del cliente cercato sono i seguenti: <br><br>";
            
        $partitaiva = mysql_result($result, 0, "partitaiva");
        echo '<b>Partita Iva:  </b>' . $partitaiva . ' </br>';
        $nome = mysql_result($result, 0, "nomeazienda");
        echo '<b>Nome: </b> ' . $nome . ' </br>';
        $domicilio = mysql_result($result, 0, "domicilio");
        echo '<b>Domicilio:  </b>' . $domicilio . ' </br>';
        $citta = mysql_result($result, 0, "citta");
        echo '<b>Citta: </b>' . $citta . ' </br>';
        $tel = mysql_result($result, 0, "telefono");
        echo '<b>Telefono: </b>' . $tel . ' </br>';
        $email = mysql_result($result, 0, "email");
        echo '<b>Email: </b>' . $email . ' </br>';
        $username = mysql_result($result, 0, "username");
        echo '<b>Username: </b>' . $username . ' </br>';
        $password = mysql_result($result, 0, "password");
        echo '<b>Password: </b>' . $password . ' </br>';
    
    } else {
        echo "Il cliente non e' stato trovato. <br> Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
    }

?>

</body>
</html>