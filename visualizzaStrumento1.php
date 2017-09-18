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
<div style="float: left; display: block; margin-top: 28px; height: 105px; text-align: left; margin-left: 205px; width: 809px;"><a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a> </div>

<div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 139px; height: 249px; width: 236px;" class="wrapper"> <a href="visualizzaImpianto1.php"> <img style="border: 0px solid ; width: 249px; height: 247px;" class="classname" src="images/impianto.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; height: 249px; margin-left: 25px; width: 246px;" class="wrapper"> <a href="visualizzaSensore1.php"> <img style="border: 0px solid ; width: 249px; height: 247px;" class="classname" src="images/sensore.png" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; height: 249px; margin-left: 19px; width: 255px;" class="wrapper"> <a href="visualizzaAdattatore1.php"><img style="border: 0px solid ; width: 257px; height: 247px;" class="classname" alt="" src="images/adattatore.jpg"></a> </div>
</div>


</body></html>