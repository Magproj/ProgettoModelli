<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php session_start();

if(!isset($_SESSION['username'])){

    header("Location: Login.html");

}

?>


  
  <meta http-equiv="content-type" content="text/html; charset=utf-8"><title>SENSOR MANAGEMENT SYSTEM</title>
  

  
  
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"></head><body>
<div style="margin-top: 28px; height: 105px; text-align: left; width: 1296px;">
<div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 6px; text-align: left; width: 122px;"><a href="logout.php"><img style="width: 101px; height: 79px;" alt="" src="images/exit.png"></a>
</div>
<div style="float: left; display: block; margin-top: 28px; height: 105px; text-align: left; margin-left: 110px; width: 735px;"><a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a> </div>
</div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 139px; height: 248px; width: 248px;" class="wrapper"> <a href="inserisciCliente1.php"> <img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" src="images/inserisciCliente.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 44px; height: 250px; width: 247px;" class="wrapper"> <a href="modificaCliente1.php"> <img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" src="images/modificaCliente.jpg" alt=""></a> </div>

<div style="overflow: hidden; width: auto ! important; text-align: center; margin-left: 68px; margin-top: 168px; height: 251px;" class="wrapper">
<div style="text-align: left; width: 254px;"> <a href="visualizzaCliente1.php"><img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" alt="" src="images/visualizzaCliente.jpg"></a> </div>
</div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 139px; height: 245px; width: 244px;" class="wrapper"> <a href="inserisciStrumento1.php"> <img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" src="images/inserisciStrumenti.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 44px; height: 246px; width: 249px;" class="wrapper"> <a href="modificaStrumento1.php"> <img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" src="images/modificaStrumenti.jpg" alt=""></a> </div>

<div style="overflow: hidden; width: auto ! important; margin-top: 139px; text-align: center; margin-left: 68px; height: 247px;" class="wrapper">
<div style="text-align: left; width: 268px;"> <a href="visualizzaStrumento1.php"><img style="border: 0px solid ; width: 244px; height: 247px;" class="classname" alt="" src="images/visualizzaStrumenti.jpg"></a> </div>
</div>

</body></html>