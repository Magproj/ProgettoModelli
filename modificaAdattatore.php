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
    
    if($id===null || $id>==0){
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
    $sql = "SELECT * FROM adattatore WHERE Id=$id";
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);

    if($conta===1){
        
	$str = 'I dati dell\'adattatore cercato sono i seguenti: <br><br>';
        echo $str;
        
        $id = mysql_result($result, 0, 'id');
	$str = 'Identificatore:  ' . $id . ' </br>';
        echo $str;
        $stato = mysql_result($result, 0, 'stato');
        if($stato===true){
	    $str = 'Stato: Attivo <a href="modificaStatoAdatt.html">Edit</a></br>';
            echo $str;
        } else{
	    $str = 'Stato: Non attivo <a href="modificaStatoAdatt.html">Edit</a></br>';
            echo $str;
        }
        $idsensore = mysql_result($result, 0, 'id_sensore');
	$str = 'Identificatore sensore: ' . $idsensore . ' <a href="modificaSensoreAdatt.html">Edit</a></br>';
        echo $str;
    
    } else {
	$str = 'L\'adattatore non e\' stato trovato.';
        echo $str;
    }

?>