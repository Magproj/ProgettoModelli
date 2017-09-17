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
    
    if($_SESSION['username']==='admin' && $_SESSION['password']==='admin' ){
    
    //dati del form
    $partiva=$_POST['partitaiva'];
    
    //database
    define('DB_HOST', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'progetto');
    
    //get connection
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($mysqli->connect_errno){
    	trigger_error('Connection failed: ' . $mysqli->connect_error, E_USER_NOTICE);
    }
    
    //comando SQL
    $sql = sprintf("SELECT * FROM cliente WHERE PartitaIva='%s'", mysqli_real_escape_string($mysqli, $partiva));
    $result = $mysqli->query($sql);
    $conta= mysqli_num_rows($result);
    
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    if($conta===1){
        
        $str = 'I dati del cliente cercato sono i seguenti: <br><br>';
        echo $str;
        
        $partitaiva = htmlspecialchars($row[0]);
        $str = 'Partita Iva:  ' . $partitaiva . ' </br>';
        echo $str;
        $nome = htmlspecialchars($row[1]);
        $str = 'Nome:  ' . $nome . ' <a href="modificaNome1.php">Edit</a></br>';
        echo $str;
        $domicilio = htmlspecialchars($row[2]);
        $str = 'Domicilio:  ' . $domicilio . ' <a href="modificaDomicilio1.php">Edit</a></br>';
        echo $str;
        $citta = htmlspecialchars($row[3]);
        $str = 'Citta: ' . $citta . ' <a href="modificaCitta1.php">Edit</a></br>';
        echo $str;
        $tel = htmlspecialchars($row[5]);
        $str = 'Telefono: ' . $tel . ' <a href="modificaTelefono1.php">Edit</a></br>';
        echo $str;
        $email = htmlspecialchars($row[4]);
        $str = 'Email: ' . $email . ' <a href="modificaEmail1.php">Edit</a></br>';
        echo $str;
        $username = htmlspecialchars($row[6]);
        $str = 'Username: ' . $username . ' <a href="modificaUsername1.php">Edit</a></br>';
        echo $str;
        $password = htmlspecialchars($row[7]);
        $str = 'Password: ' . $password . ' <a href="modificaPassword1.php">Edit</a></br>';
        echo $str;
    
    } else {
        $str = "Il cliente non e' stato trovato. <br> Torna alle <a href=\"opzioniazienda.php\">opzioni di selezione</a>";
        echo $str;
    }
    }else{
	trigger_error('Non è autorizzato a modificare questi dati. ' . $mysqli->connect_error, E_USER_NOTICE);
    }
?>
      



