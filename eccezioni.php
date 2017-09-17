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
    $host="localhost";
    $username="sensorsystem";
    $password="";
    $db_nome="my_sensorsystem";
    mysql_connect($host, $username, $password) or die ('Impossibile connettersi al server: ' . mysql_error());
	    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());

    //dati del form

$partitaiva=$_POST["partitaiva"];

    //comando SQL
    $sql = "SELECT id_impianto, Id_sensore, valore FROM datirilevati JOIN impianto ON Id=id_impianto WHERE id_cliente='$partitaiva' ";
    $result = mysql_query($sql);
    if(!$result) die ('Query fallita!! .');
    
    $sql1 = "SELECT id_impianto, ValMax, ValMin, Tipo FROM modellostringa";
    $result1 = mysql_query($sql1);
    if(!$result1) die ('Query fallita!! .');
  
    $conta= mysql_num_rows($result);
    $conta2= mysql_num_rows($result1);

    $i=0;
    $j=0;
    if($conta>=1 ){
	
	    while($i<$conta){


	                            $id_impianto[$i] = mysql_result($result, 0, "id_impianto");
                                    $valore[$i] = mysql_result($result, 0, "valore");
                                    $idsensore[$i]= mysql_result($result, 0, "Id_sensore");
                                    $id [$j]= mysql_result($result1, 0, "id_impianto");
                                    $max [$j]= mysql_result($result1, 0, "ValMax");
                                    $min [$j]= mysql_result($result1, 0, "ValMin");
                                    $tipo[$j]= mysql_result($result1, 0, "Tipo");

                                    if($id_impianto=$id){
                                             if($valore<$min || $valore>$max){

                                                   echo '<br> Sono state rilevate eccezioni nei seguenti: <br><br>';
                                                   echo 'Identificatore impianto:  ' . $idimpianto[$i] . ' </br>';
                                                   echo 'Identificatore sensore:  ' . $idsensore [$i]. ' </br>';
                                                   echo 'Tipo sensore:  ' . $tipo[$j] . ' </br>';
                                                   echo 'valore :  ' . $valore[$j] . ' </br>';
                                                            	$i++;
			                                        $j++;

                                                   } else{
                                                     echo '<br> Non sono state rilevate eccezioni. <br><br>';
                                                     	$i++;
			                                $j++; }
                                      }else{ }



	    }

    } else {
        echo " Nessun dato trovato. <br>";
    }


?>