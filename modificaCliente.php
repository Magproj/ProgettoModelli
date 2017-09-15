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
	    <?php

    //dati del form
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
        echo 'Partita Iva:  ' . $partitaiva . ' </br>';
        $nome = mysql_result($result, 0, "nomeazienda");
        echo 'Nome:  ' . $nome . ' <a href="modificaNome.html">Edit</a></br>';
        $domicilio = mysql_result($result, 0, "domicilio");
        echo 'Domicilio:  ' . $domicilio . ' <a href="modificaDomicilio.html">Edit</a></br>';
        $citta = mysql_result($result, 0, "citta");
        echo 'Citta: ' . $citta . ' <a href="modificaCitta.html">Edit</a></br>';
        $tel = mysql_result($result, 0, "telefono");
        echo 'Telefono: ' . $tel . ' <a href="modificaTelefono.html">Edit</a></br>';
        $email = mysql_result($result, 0, "email");
        echo 'Email: ' . $email . ' <a href="modificaEmail.html">Edit</a></br>';
        $username = mysql_result($result, 0, "username");
        echo 'Username: ' . $username . ' <a href="modificaUsername.html">Edit</a></br>';
        $password = mysql_result($result, 0, "password");
        echo 'Password: ' . $password . ' <a href="modificaPassword.html">Edit</a></br>';
    
    } else {
        echo "Il cliente non e' stato trovato. <br> Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
    }

?>
        </body>
</html>  



