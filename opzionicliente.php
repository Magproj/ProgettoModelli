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
<div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 6px; text-align: left; width: 122px;">

<a href="logout.php"><img style="width: 101px; height: 79px;" alt="" src="images/exit.png"></a>

</div>
<div style="float: left; display: block; margin-top: 28px; height: 105px; text-align: left; margin-left: 110px; width: 735px;"><a href="opzionicliente.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a> </div>
</div>
<div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; margin-left: 139px; height: 249px; width: 236px;" class="wrapper"> <a href="visualizza.html"> <img style="border: 0px solid ; width: 249px; height: 247px;" class="classname" src="images/visualizza.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; height: 249px; margin-left: 25px; width: 246px;" class="wrapper"> <a href="visualizzaDashboard.htm"> <img style="border: 0px solid ; width: 249px; height: 247px;" class="classname" src="images/dashboard.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; text-align: center; height: 249px; margin-left: 19px; width: 255px;" class="wrapper"> <a href="autorizza.html"><img style="border: 0px solid ; width: 257px; height: 247px;" class="classname" alt="" src="images/autorizza.jpg"></a> </div>
</div>
</body></html>