<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
        
<?php //dati del form
    $partiva=$_POST['partitaiva'];
    
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
        $str = '<b>Partita Iva:  </b>' . $partitaiva . ' </br>';
        echo $str;
        $nome = mysql_result($result, 0, 'nomeazienda');
        $str = '<b>Nome: </b> ' . $nome . ' </br>';
        echo $str;
        $domicilio = mysql_result($result, 0, 'domicilio');
        $str = '<b>Domicilio:  </b>' . $domicilio . ' </br>';
        echo $str;
        $citta = mysql_result($result, 0, 'citta');
        $str = '<b>Citta: </b>' . $citta . ' </br>';
        echo $str;
        $tel = mysql_result($result, 0, 'telefono');
        $str = '<b>Telefono: </b>' . $tel . ' </br>';
        echo $str;
        $email = mysql_result($result, 0, 'email');
        $str = '<b>Email: </b>' . $email . ' </br>';
        echo $str;
        $username = mysql_result($result, 0, 'username');
        $str =  '<b>Username: </b>' . $username . ' </br>';
        echo $str;
        $password = mysql_result($result, 0, 'password');
        $str = '<b>Password: </b>' . $password . ' </br>';
        echo $str;
    
    } else {
        $str = 'l cliente non e' stato trovato. <br> Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    }

?>

</body>
</html>