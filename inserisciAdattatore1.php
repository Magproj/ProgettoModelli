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
            
            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 196px; width: 888px;">
			<a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
          
	    <h2 style="text-align: center;"><b>Inserimento dati adattatore</b></h2>
	            
	    <div style="text-align: center;">
		<form action="inserisciAdattatore.php" method="post">
	    <div style="text-align: center;">
            </div>
		<table style="text-align: left; width: 100px; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
				<td style="vertical-align: top;"> Identificatore: <br>
				</td>
				<td style="vertical-align: top;"><input name="identificatore" size="30" type="text">
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top;"> Identificatore sensore: <br>
				</td>
				<td style="vertical-align: top;"><input name="idsensore" size="30" type="text">
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top;"><p> Stato: </p>
				</td>
				<td style="vertical-align: top;"><input name="stato" value="true" checked="checked" type="radio"> Attivo<br>
			<input name="stato" value="false" checked="checked" type="radio">Non attivo</td></tr></tbody>
		</table>
		<p> </p>

                <p> </p><p><input value="invia" name="b1" type="submit">
                <input value="annulla" name="b2" type="reset"></p>
		</form>
	     </div>

        </body></html>