<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php session_start();

if(!isset($_SESSION['username'])){

header("Location: Login.html");

}

?>

  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>SENSOR MANAGEMENT SYSTEM</title>



  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

</head><body>
<div style="margin-top: 28px; height: 105px; text-align: left; width: 1296px;">
<div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 6px; width: 192px; text-align: left;">

<a href='logout.php'><img style="width: 101px; height: 79px;" alt="" src="images/exit.png"></a>

</div>
<div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 167px; width: 817px; text-align: left;"><a href="opzionicliente.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a> </div>
</div>
<div>
<div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 226px; width: 297px;" class="wrapper"> <a href="visualizza.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/visualizza.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 44px; width: 288px;" class="wrapper"> <a href="dashboard/production/bar.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/dashboard.jpg" alt=""></a> </div>
<div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 68px; width: 279px;" class="wrapper"> <a href="autorizza.html"><img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" alt="" src="images/autorizza.jpg"></a> </div>
</div>
</body></html>