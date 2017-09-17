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
    $coderr = $_POST['coderr'];
    $idsensore=$_POST['id'];
    $idimpianto=$_POST['idimpianto'];
    
    if($idsensore===null || $idsensore>==0){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    if($idimpianto===null || $idimpianto>==0){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    if($coderr===null || $coderr>==0){
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
    
    $sql = "SELECT * FROM sensore WHERE id_sensore='$idsensore' AND id_impianto='$idimpianto'";
    $result = mysql_query($sql);
    $tipo = mysql_result($result, 0, 'tipo');
    
    //comando SQL
    $sql1 = "UPDATE modellostringa SET coderrore='$coderr' WHERE tipo='$tipo' AND id_impianto='$idimpianto'";
    
    if(mysql_query($sql1)===true){
        echo 'Dati modificati correttamente<br />';
	$str = "Torna alla <a href=\"modificaSensore.html\">modifica</a>";
        echo $str;
    } else {
        echo 'Attenzione, si è verificato un errore: ' . mysql_error();
    }

?>