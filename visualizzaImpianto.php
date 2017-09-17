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
    $sql = sprintf("SELECT * FROM impianto WHERE Id='%s'", mysql_real_escape_string($id));
    $result = mysql_query($sql);
    $conta= mysql_num_rows($result);
    
    if($conta===1){
        
        $str = 'I dati dell\'impianto cercato sono i seguenti: <br><br>';
        echo $str;
            
        $id = mysql_result($result, 0, 'id');
        $str =  'Identificatore:  ' . $id). ' </br>';
        echo $str;
        $tipo = mysql_result($result, 0, 'tipo');
        $str = 'Tipo: ' .$tipo. ' </br>';
        echo $str;
        $dimensione = mysql_result($result, 0, 'dimensione');
        $str = 'Dimensione: '.$dimensione.' </br>';
        echo $str;
        $stato = mysql_result($result, 0, 'stato');
        if($stato===true){
            $str = 'Stato: Attivo </br>';
            echo $str;
        } else{
            $str = 'Stato: Non attivo </br>';
            echo $str;
        }
        $idcliente = mysql_result($result, 0, 'id_cliente');
        $str = 'Identificatore cliente: ' .$idcliente. ' </br>';
        echo $str;
    
    } else {
        $str = '<br>L\'impianto non e\' stato trovato.';
        echo $str;
    }

?>