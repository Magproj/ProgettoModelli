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
			<a href='opzioniazienda.php' TITLE='opzioniazienda.'><img style='border: 0px solid ; width: 709px; height: 86px;' class='classname' src='images/logo.png' ALT='logo'></a>
	    </div>
                
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 226px; width: 297px;" class="wrapper">
			<a href="inserisciImpianto1.php" TITLE="inserisciImpianto"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/impianto.jpg" alt="logo"></a>
		</div>
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 44px; width: 288px;" class="wrapper">
			<a href="inserisciSensore1.php" TITLE="inserisciSensore"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/sensore.png" alt="logo"></a>
		</div>
		<div style="overflow: hidden; width: auto ! important; margin-top: 139px; height: 283px; text-align: center; margin-left: 68px;" class="wrapper">
			<div style="text-align: left; width: 284px;">
				<a href="inserisciAdattatore1.php" TITLE="inserisciAdattatore"><img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/adattatore.jpg" ALT='logo'></a>
			</div>
		</div>
                
        </body>
</html>