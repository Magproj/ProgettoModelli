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
    $idimpianto=$_POST['idimpianto'];
    
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
        $str = 'Identificatore:  ' . $id . ' </br>';
        echo $str;
        $marca = mysql_result($result, 0, 'marca');
        $str 'Marca:  ' . $marca . ' </br>';
        echo $str;
        $tipo = mysql_result($result, 0, 'tipo');
        $str = 'Tipo:  ' . $tipo . ' </br>';
        echo $str;
        $stato = mysql_result($result, 0, 'stato');
        if($stato===true){
            $str = 'Stato: Attivo </br>';
            echo $str;
        } else{
            $str = 'Stato: Non attivo </br>';
            echo $str;
        }
        $idimpianto = mysql_result($result, 0, 'id_impianto');
        $str = 'Identificatore impianto: ' . $idimpianto . ' </br>';
        echo $str;
        $sql2= "SELECT * FROM modellostringa WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
        $result = mysql_query($sql2);
	$modello = mysql_result($result, 0, 'cifredecimali');
        $str = 'Modello: ' . $modello . '</br>';
	echo $str;
        $valmin = mysql_result($result, 0, 'valmin');
        $str = 'Valore minimo: ' . $valmin . '</br>';
        echo $str;
        $valmax = mysql_result($result, 0, 'valmax');
        $str = 'Valore massimo: ' . $valmax . '</br>';
        echo $str;
        $err = mysql_result($result, 0, 'errore');
        if($err===true){
            $str = 'Errore rilevato.</br>';
            echo $str;
        } else {
            $str = 'Errore non rilevato.</br>';
            echo $str;
        }
    
    } else {
        $str = 'Il sensore non e\' stato trovato. <br>';
        echo $str;
    }

?>