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
                
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 226px; width: 297px;" class="wrapper">
			<a href="modificaImpianto1.php" TITLE="modificaImpianto"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/impianto.jpg" ALT='logo'></a>
		</div>
                <div style="float: left; display: block; margin-top: 139px; height: 283px; text-align: center; margin-left: 44px; width: 288px;" class="wrapper">
			<a href="modificaSensore1.php" TITLE="modificaSensore"> <img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/sensore.png" ALT='logo'></a>
		</div>
		<div style="overflow: hidden; width: auto ! important; margin-top: 139px; height: 283px; text-align: center; margin-left: 68px;" class="wrapper">
			<div style="text-align: left; width: 284px;">
				<a href="modificaAdattatore1.php"><img style="border: 0px solid ; width: 272px; height: 247px;" class="classname" src="images/adattatore.jpg" ALT='logo'></a>
			</div>
		</div>
                
        </body>
</html>