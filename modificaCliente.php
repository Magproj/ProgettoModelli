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

    //dati del form
    $partiva=$_POST['partitaiva'];
    
    if($partiva===null || $partiva>==0){
        trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    //accesso al database
    $host='localhost';
    $username='root';
    $password='';
    $db_nome='progetto';
    $result = mysql_pconnect($host, $username, $password);
    if($result===false){
        trigger_error('Impossibile connettersi al server: ' . mysql_error(), E_USER_NOTICE);
    }
    
    $result = mysql_select_db($db_nome);
    if($result===false){
        trigger_error('Accesso al database non riuscito: ' . mysql_error(), E_USER_NOTICE);
    }
    
    //comando SQL
    $sql = "SELECT * FROM cliente WHERE PartitaIva=$partiva";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);

    if($conta===1){
        
        $str = 'I dati del cliente cercato sono i seguenti: <br><br>';
        echo $str;
        
        $partitaiva = mysql_result($result, 0, 'partitaiva');
        $str = 'Partita Iva:  ' . $partitaiva . ' </br>';
        echo $str;
        $nome = mysql_result($result, 0, 'nomeazienda');
        $str = 'Nome:  ' . $nome . ' <a href="modificaNome.html">Edit</a></br>';
        echo $str;
        $domicilio = mysql_result($result, 0, 'domicilio');
        $str = 'Domicilio:  ' . $domicilio . ' <a href="modificaDomicilio.html">Edit</a></br>';
        echo $str;
        $citta = mysql_result($result, 0, 'citta');
        $str = 'Citta: ' . $citta . ' <a href="modificaCitta.html">Edit</a></br>';
        echo $str;
        $tel = mysql_result($result, 0, 'telefono');
        $str = 'Telefono: ' . $tel . ' <a href="modificaTelefono.html">Edit</a></br>';
        echo $str;
        $email = mysql_result($result, 0, 'email');
        $str = 'Email: ' . $email . ' <a href="modificaEmail.html">Edit</a></br>';
        echo $str;
        $username = mysql_result($result, 0, 'username');
        $str = 'Username: ' . $username . ' <a href="modificaUsername.html">Edit</a></br>';
        echo $str;
        $password = mysql_result($result, 0, 'password');
        $str = 'Password: ' . $password . ' <a href="modificaPassword.html">Edit</a></br>';
        echo $str;
    
    } else {
        $str = "Il cliente non e' stato trovato. <br> Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    }

?>
      



