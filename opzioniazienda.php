<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: Login.html");
}
?>

<html>
	<head>
	
	  <meta http-equiv="content-type" content="text/html; charset=utf-8"><title>SENSOR MANAGEMENT SYSTEM</title>
  	  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
            
	</head>
	
	<body>
		<div style="margin-top: 28px; height: 105px; text-align: left; width: 1296px;">
                <div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 6px; width: 192px; text-align: left;">

                <a href='logout.php'><img style="width: 101px; height: 79px;" alt="" src="images/exit.png"></a>

                </div>
                <div style="float: left; display: block; margin-top: 28px; height: 105px; margin-left: 167px; width: 817px; text-align: left;"><a href="opzioniazienda.php"><img style="border: 0px solid ; width: 709px; height: 86px;" class="classname" alt="" src="images/logo.png"></a> </div>
                </div>

		<div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 226px; width: 297px;" class="wrapper">
			<a href="inserisciCliente.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/inserisciCliente.jpg" alt=""></a>
		</div>
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 44px; width: 288px;" class="wrapper">
			<a href="modificaCliente.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/modificaCliente.jpg" alt=""></a>
		</div>
		<div style="overflow: hidden; width: auto ! important; margin-top: 139px; height: 283px; text-align: center; margin-left: 68px;" class="wrapper">
			<div style="text-align: left; width: 284px;">
				<a href="visualizzaCliente.html"><img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" alt="" src="images/visualizzaCliente.jpg"></a>
			</div>
		</div>
                
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 226px; width: 297px;" class="wrapper">
			<a href="inserisciStrumento.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/inserisciStrumenti.jpg" alt=""></a>
		</div>
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 44px; width: 288px;" class="wrapper">
			<a href="modificaStrumento.html"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/modificaStrumenti.jpg" alt=""></a>
		</div>
		<div style="overflow: hidden; width: auto ! important; margin-top: 139px; height: 283px; text-align: center; margin-left: 68px;" class="wrapper">
			<div style="text-align: left; width: 284px;">
				<a href="visualizzaStrumento.html"><img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" alt="" src="images/visualizzaStrumenti.jpg"></a>
			</div>
		</div>

	</body>
</html>