<?php
      
      session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	    
      } else{
	    header('Location:Login.html');
      }
?>
<html><head>

	
		  <meta http-equiv="content-type" content="text/html; charset=utf-8"><title>SENSOR MANAGEMENT SYSTEM</title>
		  
	  	  <link rel="stylesheet" type="text/css" href="css/stile.css" media="screen"></head><body>

            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 209px; width: 875px;">
		    <a href="opzionicliente.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>

        <h2 style="text-align: center;"><b>VISUALIZZAZIONE DATI RILEVATI</b></h2>
            <p style="text-align: center;">Per visualizzare i dati rilevati, inserire le chiavi di ricerca.
            </p>
	    <div style="text-align: center;">
            <form action="visualizzaDati.php" method="post">
                <p>  Identificatore Impianto: <input name="idimpianto" size="30" type="text"> </p>
                <p>  Identificatore Sensore:  <input name="idsensore" size="30" type="text"> </p>
		<p>  Partita Iva: <input name="partitaiva" size="30" type="text"> </p>
                <p><input value="invia" name="b1" type="submit">
                <input value="annulla" name="b2" type="reset"></p>
            </form>
	    </div>
	    <div style="text-align: center;">
         <p style="text-align: center;"><b>Altrimenti visualizza tutti i dati rilevati memorizzati</b></p>
        <form action="visualizzaTuttiDati.php" method="post">
        				<p>  Partita Iva: <input name="partitaiva" size="30" type="text"> </p>
		                <p><input value="invia" name="b1" type="submit">
            
		</p></form></div>

        </body></html>