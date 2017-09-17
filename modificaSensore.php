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
    $id=$_POST['identificatore'];
    $idimpianto = $_POST['idimpianto'];
    
    if($id===null || $id>==0 || $idimpianto===null || $idimpianto>==0){
        trigger_error('Errore nell\'inserimento del dato. ' , E_USER_NOTICE);
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
    $sql = "SELECT * FROM sensore WHERE Id_sensore='$id' AND id_impianto='$idimpianto'";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);
    

    
    
    if($conta===1){
        
	$str = 'I dati del sensore cercato sono i seguenti: <br><br>';
        echo $str;

        $id = mysql_result($result, 0, 'id_sensore');
	$str = 'Sensore:  ' . $id . '  <a href="modificaIdSensore.html">Edit</a></br>';
        echo $str;
        $stato = mysql_result($result, 0, 'stato');
        if($stato===true){
	    $str = 'Stato: Attivo <a href="modificaStatoSensore.html">Edit</a></br>';
            echo $str;
        } else{
	    $str = 'Stato: Non attivo <a href="modificaStatoSensore.html">Edit</a></br>';
            echo $str;
        }
        $idimpianto = mysql_result($result, 0, 'id_impianto');
	$str = 'Identificatore impianto: ' . $idimpianto . ' <a href="modificaImpiantoSens.html">Edit</a></br>';
        echo $str;
	$tipo = mysql_result($result, 0, 'tipo');
	$sql= "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result1 = mysql_query($sql);
	if(!$result1===false)
	    trigger_error('Errore nella query $result1: ' . mysql_error(), E_USER_NOTICE );
	$modello = mysql_result($result1, 0, 'cifredecimali');
	$str = 'Modello: ' . $modello . ' <a href="modificaModello.html">Edit</a></br>';
	echo $str;
	$coderr = mysql_result($result1, 0, 'coderrore');
	$str = 'Errore: ' . $coderr . '<a href="modificaErrore.html">Edit</a><br>';
	echo $str;
	$valmin = mysql_result($result1, 0, 'valmin');
	$str = 'Valore minimo: ' .$valmin . '<a href="modificaValmin.html">Edit</a><br>';
	echo $str;
	$valmax = mysql_result($result1, 0, 'valmax');
	$str = 'Valore massimo: ' . $valmax . '<a href="modificaValmax.html">Edit</a><br>';
	echo $str;
	$str = 'Si ricorda che se viene inserito un nuovo modello per questo sensore, esso corrispondera a un nuovo modello per tutti i sensori dello stesso tipo in questo impianto.<br>'; 
	echo $str;
	
    
    } else {
	$str = 'Il sensore non e\' stato trovato.';
        echo $str;
    }

?>