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
    
    $id = htmlentities($id);
    
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
    $sql = sprintf("SELECT id, tipo, dimensione, stato, id_cliente FROM impianto WHERE Id='%s'", mysqli_real_escape_string($mysqli, $id));
    $result = $mysqli->query($sql);
    $conta= mysqli_num_rows($result);
    
    $row = mysqli_fetch_array($result, MYSQLI_NUM);  
    
    if($conta===1){
        
        $str = 'I dati dell\'impianto cercato sono i seguenti: <br><br>';
        echo $str;
            
        $id = htmlspecialchars($row[0]);
        $str =  'Identificatore:  ' . $id. ' </br>';
        echo $str;
        $tipo = htmlspecialchars($row[1]);
        $str = 'Tipo: ' .$tipo. ' </br>';
        echo $str;
        $dimensione = htmlspecialchars($row[2]);
        $str = 'Dimensione: '.$dimensione.' </br>';
        echo $str;
        $stato = htmlspecialchars($row[3]);
        if($stato===true){
            $str = 'Stato: Attivo </br>';
            echo $str;
        } else{
            $str = 'Stato: Non attivo </br>';
            echo $str;
        }
        $idcliente = htmlspecialchars($row[4]);
        $str = 'Identificatore cliente: ' .$idcliente. ' </br>';
        echo $str;
    
    } else {
        $str = '<br>L\'impianto non e\' stato trovato.';
        echo $str;
    }
    
    }else{
	trigger_error('Non è possibile accedere alle informazioni.' , E_USER_NOTICE);
    }

?>