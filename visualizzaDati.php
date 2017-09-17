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
    
    //dati del form

    $idimpianto=$_POST['idimpianto'];
    $idsensore=$_POST['idsensore'];
    $partitaiva=$_POST['partitaiva'];




    //comando SQL
    $sql = "SELECT * FROM datirilevati JOIN impianto ON id=id_impianto WHERE id_impianto='$idimpianto' AND Id_sensore='$idsensore' AND id_cliente='$partitaiva' ";
	    
    $result = mysql_query($sql);
    if($result===false) trigger_error('Query fallita!! Nessun dato trovato.', E_USER_NOTICE);
    $conta= mysql_num_rows($result);
    
    
    $i=0;
    if($conta>==1){
	
	    while($i<$conta){
		$str = '<br>I dati rilevati dal sensore sono i seguenti: <br><br>';
      	        echo $str;
		$str = 'Identificatore impianto:  ' . $idimpianto . ' </br>';
                echo $str;
		$str = 'Identificatore sensore:  ' . $idsensore . ' </br>';
                echo $str;
	        $id_dato = mysql_result($result, 0, 'id_dato');
			$str = 'Identificatore del dato:  ' . $id_dato . ' </br>';
	        	echo $str;
	        $data = mysql_result($result, 0, 'data');
			$str = 'Data: ' . $data . ' </br>';
		        echo $str;
                $ora = mysql_result($result, 0, 'ora');
			$str = 'Ora: ' . $ora . ' </br>';
		        echo $str;
		$valore = mysql_result($result, 0, 'valore');
			$str = 'Valore: ' . $valore . ' </br>';
		        echo $str;
		$info = mysql_result($result, 0, 'info');
			$str = 'Info: ' . $info . ' </br>';
        		echo $str;
			$i++;
	    }
    } else {
	$str = 'Nessun dato trovato. <br>';
        echo $str;
    }


?>