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
            
            <div style="margin-top: 28px; height: 105px; text-align: left; margin-left: 359px; width: 725px;">
			<a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a>
	    </div>
            
            <h2 style="text-align: center;"><b>Modifica valore minimo sensore</b></h2>
            <p style="text-align: center;">Per inserire il nuovo dato del sensore, inserire nuovamente l'identificatore del sensore e dell'impianto in cui si trova.
            </p>
<div style="text-align: center;">
<form action="modificaValmin.php" method="post">
  <div style="text-align: center;">
                </div>
  <table style="text-align: left; width: 100px; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody><tr><td style="vertical-align: top; white-space: nowrap;">  Identificatore sensore: <br>
</td><td style="vertical-align: top;"><input name="id" size="30" type="text"></td></tr><tr><td style="vertical-align: top; white-space: nowrap;"> Identificatore impianto: <br>
</td><td style="vertical-align: top;"><input name="idimpianto" size="30" type="text"></td></tr><tr><td style="vertical-align: top;">  Valore minimo: <br>
</td><td style="vertical-align: top;"><input name="valmin" size="30" type="text"></td></tr></tbody>
  </table>
  <p> </p>

                 
                <p> </p>
                
                <p><input value="invia" name="b1" type="submit">
                <input value="annulla" name="b2" type="reset"></p>
            </form>
</div>

            
        </body></html>