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

      session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	    
      } else{
	    header('Location:Login.html');
      }     

//dati del form
$nome=htmlentities($_POST['nome']);
$partiva=htmlentities($_POST['partiva']);
$domicilio=htmlentities($_POST['domicilio']);
$citta=htmlentities($_POST['citta']);
$email=htmlentities($_POST['email']);
$telefono=htmlentities($_POST['telefono']);
$usernameC=htmlentities($_POST['username']);
$passwordC=htmlentities$($_POST['password']);


if($nome===null || $partiva<=0 || $partiva===null){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
}

if($domicilio===null || $citta===null){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
}

if($email===null || $telefono<=0 || $telefono===null){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
}

if($usernameC===null || $passwordC===null){
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
$sql = "INSERT INTO cliente (PartitaIva, NomeAzienda, Domicilio, Citta, Email, Telefono, Username, Password) VALUES ('$partiva', '$nome', '$domicilio', '$citta', '$email', '$telefono', '$usernameC', '$passwordC')";

if(mysql_query($sql)===true){
    echo 'Dati memorizzati correttamente<br />';
} else {
    echo 'Attenzione, si è verificato un errore: ' . mysql_error();
}

?>