<html>
    <head>
		  <meta http-equiv="content-type" content="text/html; charset=utf-8">
		  <title>SENSOR MANAGEMENT SYSTEM</title>
	  	  <link rel="stylesheet" type="text/css" href="css/stile.css" media="screen">
	</head>

        <body>

            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 319px; width: 725px;">
			<a href="opzionicliente.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
        </body>
</html>

<?php

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

        
        
        $sql="SELECT * FROM datirilevati WHERE id_impianto='$idimpianto' AND id_sensore='$idsensore'";
        $result = mysql_query($sql);
        $i=0;
        $valore = array();
        $data = array();
        while($i<mysql_num_rows($result)){
            $valore = mysql_result($result, $i, 'valore');
            $data = mysql_result($result, $i, 'data');
        }
        
        
        $sql1 = "SELECT tipo FROM sistemaautorizzato WHERE codice='$codice'";
        $result1 = mysql_query($sql1);
        $tipo = mysql_result($result1, 0, 'tipo');
        
        if($tipo==='persona'){
            //vengono inviati i dati alla persona
        }else{
            //vengono inviati i dati al dispositivo
        }
        
        
        
        
?> 