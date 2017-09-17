<?php
session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	    
      } else{
	    header('Location:Login.html');
      }
?>
<html>
    <head>
		<meta http-equiv='content-type' content='text/html'; charset=utf-8'>
		<title>SENSOR MANAGEMENT SYSTEM</title>
		<link rel='stylesheet' type='text/css' href="css/stile.css" media='screen'>
	</head>
        
        <body>
            
            <div style='margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;'>
			<a href='opzioniazienda.php' TITLE='opzioniazienda'><img style='border: 0px solid ; width: 709px; height: 86px;' class='classname' src='images/logo.png' ALT='logo'></a>
	    </div>
            
             <h2 style="text-align: center;"><b>Inserimento dati sensore</b></h2>
            
	     <div style="text-align: center;">
		<form action="inserisciSensore.php" method="post">
	     <div style="text-align: center;">
             </div>
		<table style="text-align: left; width: 100px; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
			<tbody><tr><td style="vertical-align: top;"> Identificatore: <br></td><td style="vertical-align: top;"><input name="identificatore" size="30" type="text"></td></tr><tr><td style="vertical-align: top;"> Marca: <br></td><td style="vertical-align: top;"><input name="marca" size="20" type="text"></td></tr><tr><td style="vertical-align: top;"> Tipo sensore: <br></td><td style="vertical-align: top;"><input name="tipo" size="20" type="text"></td></tr><tr><td style="vertical-align: top;"> Identificatore impianto:</td><td style="vertical-align: top;"><input name="idimpianto" size="30" type="text"></td></tr><tr><td style="vertical-align: top;"> Stato:</td><td style="vertical-align: top;"><input name="stato" value="true" checked="checked" type="radio"> Attivo<br>
			<input name="stato" value="false" checked="checked" type="radio">Non attivo</td></tr><tr>
		<td style="vertical-align: top;"> Modello della stringa: (es: data/ora/valore) <br>
		</td>
		<td style="vertical-align: top;">
		<dl>
		  <dt><br>
		  </dt>
		</dl>
		<input name="modello" value="null" size="30" type="text">
		<dl>
		  <dt></dt>
		</dl>
		</td>
		</tr>
			</tbody>
		</table>
		<p> </p>

                <p> </p>
                <p> </p>
                
                <p> </p>
                
		
		<p> Attenzione: Il modello inserito verra utilizzato anche per gli altri sensori dello stesso tipo.
		<br> Se non si desidera cambiarlo, premere invia. Lo stesso vale per il codice errore </p>
			<table style="text-align: left; width: 100px; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
			<tbody><tr><td style="vertical-align: top; white-space: nowrap;"> Codice errore: </td><td style="vertical-align: top;">
			        <p><input name="codice" value="null" size="30" type="text"></p>

				</td></tr></tbody>
			  </table>


                
                <p><input value="invia" name="b1" type="submit">
                <input value="annulla" name="b2" type="reset"></p>
            </form>
	    </div>

        </body>
</html>