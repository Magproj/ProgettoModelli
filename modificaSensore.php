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

    if($_SESSION['username']==='admin' && $_SESSION['password']==='admin'){
    
    //dati del form
    $id=$_POST['identificatore'];
    $idimpianto = $_POST['idimpianto'];
    
    if($id===null || $idimpianto===null || $id<0 || $idimpianto<0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    $id = htmlentities($id);
    $idimpianto = htmlentities($idimpianto);
    
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
    $sql = sprintf("SELECT id_sensore, stato, id_impianto, tipo FROM sensore WHERE Id_sensore='%s' AND id_impianto='%s'", mysqli_real_escape_string($mysqli, $id), mysqli_real_escape_string($mysqli, $idimpianto));
    
    $result = $mysqli->query($sql);
    $conta= mysqli_num_rows($result);
    
    $row = mysqli_fetch_array($result, MYSQLI_NUM);    
    
    
    if($conta===1){
        
	$str = 'I dati del sensore cercato sono i seguenti: <br><br>';
        echo $str;

        $id = htmlspecialchars($row[0]);
	$str = 'Sensore:  ' . $id . '  <a href="modificaIdSensore1.php">Edit</a></br>';
        echo $str;
        $stato = htmlspecialchars($row[1]);
        if($stato===true){
	    $str = 'Stato: Attivo <a href="modificaStatoSensore1.php">Edit</a></br>';
            echo $str;
        } else{
	    $str = 'Stato: Non attivo <a href="modificaStatoSensore1.php">Edit</a></br>';
            echo $str;
        }
        $idimpianto = htmlspecialchars($row[2]);
	$str = 'Identificatore impianto: ' . $idimpianto . ' <a href="modificaImpiantoSens1.php">Edit</a></br>';
        echo $str;
	$tipo = htmlspecialchars($row[3]);
	$sql= sprintf("SELECT cifredecimali, codErrore, valMin, valMax  FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'");
        $result1 = $mysqli->query($sql);
	if($result1===false)
	    trigger_error('Errore nella query $result1: ' . mysql_error(), E_USER_NOTICE );
	$row1 = mysqli_fetch_array($result1, MYSQLI_NUM);    
	$modello = htmlspecialchars($row1[0]);
	$str = 'Modello: ' . $modello . ' <a href="modificaModello1.php">Edit</a></br>';
	echo $str;
	$coderr = htmlspecialchars($row1[1]);
	$str = 'Errore: ' . $coderr . '<a href="modificaErrore1.php">Edit</a><br>';
	echo $str;
	$valmin = htmlspecialchars($row1[2]);
	$str = 'Valore minimo: ' .$valmin . '<a href="modificaValmin1.php">Edit</a><br>';
	echo $str;
	$valmax = htmlspecialchars($row1[3]);
	$str = 'Valore massimo: ' . $valmax . '<a href="modificaValmax1.php">Edit</a><br>';
	echo $str;
	$str = 'Si ricorda che se viene inserito un nuovo modello per questo sensore, esso corrispondera a un nuovo modello per tutti i sensori dello stesso tipo in questo impianto.<br>'; 
	echo $str;
	
    
    } else {
	$str = 'Il sensore non e\' stato trovato.';
        echo $str;
    }
    
     }else{
	trigger_error('Non è possibile accedere alle informazioni.' , E_USER_NOTICE);
    }

?>