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

    //dati del form

    $partitaiva=htmlentities($_POST["partitaiva"]);
    
    //controllo input
    if($partitaiva==null || $partitaiva<=0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    //comando SQL
    $sql = sprintf("SELECT id_impianto, Id_sensore, valore FROM datirilevati JOIN impianto ON Id=id_impianto WHERE id_cliente='%s' ", mysqli_real_escape_string($mysqli, $partitaiva));
    $result = $mysqli->query($sql);
    if($result===false) trigger_error('Query fallita. ', E_USER_NOTICE);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
    $sql1 = sprintf("SELECT id_impianto, ValMax, ValMin, Tipo FROM modellostringa");
    $result1 = $mysqli->query($sql1);    
    if($result1===false) trigger_error('Query fallita. ', E_USER_NOTICE);
    $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
  
    $conta= mysqli_num_rows($result);
    $conta2= mysqli_num_rows($result1);

    $i=0;
    $j=0;
    if($conta>=1 ){
	
	    while($i<$conta){


	                            $id_impianto[$i] = htmlspecialchars($row[0]);
                                    $valore[$i] = htmlspecialchars($row[1]);
                                    $idsensore[$i]= htmlspecialchars($row[2]);
                                    $id [$j]= htmlspecialchars($row1[0]);
                                    $max [$j]= htmlspecialchars($row1[1]);
                                    $min [$j]= htmlspecialchars($row1[2]);
                                    $tipo[$j]= htmlspecialchars($row1[3]);

                                    if($id_impianto=$id){
                                             if($valore<$min || $valore>$max){
						   $str = '<br> Sono state rilevate eccezioni nei seguenti: <br><br>';
                                                   echo $str;
						   $str = 'Identificatore impianto:  ' . $idimpianto[$i] . ' </br>';
                                                   echo $str;
						   $str = 'Identificatore sensore:  ' . $idsensore [$i]. ' </br>';
                                                   echo $str;
						   $str = 'Tipo sensore:  ' . $tipo[$j] . ' </br>';
                                                   echo $str;
						   $str = 'valore :  ' . $valore[$j] . ' </br>';
                                                   echo $str;
                                                            	$i++;
			                                        $j++;

                                                   } else{
						     $str = '<br> Non sono state rilevate eccezioni. <br><br>';
                                                     echo $str;
                                                     	$i++;
			                                $j++; }
                                      }else{ }



	    }

    } else {
	$str = ' Nessun dato trovato. <br>';
        echo $str;
    }


?>