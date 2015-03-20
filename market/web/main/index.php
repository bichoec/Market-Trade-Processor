<?php session_start(); if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){?><!DOCTYPE html>
<html>
<head>
    <title>Market Trade Processor</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
<!-- 
Sonic Template 
http://www.templatemo.com/preview/templatemo_394_sonic 
-->
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1">
    
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/templatemo_misc.css">
	<link rel="stylesheet" href="css/templatemo_style.css">
</head>
<body>
	
	<!-- This one in here is responsive menu for tablet and mobiles -->
    <div class="responsive-navigation visible-sm visible-xs">
        <a href="#" class="menu-toggle-btn">
            <i class="fa fa-bars fa-2x"></i>
        </a>
        <div class="navigation responsive-menu">
            <ul>
                <li class="home"><a href="#templatemo">Home</a></li>
	            <!-- <li class="about"><a href="#about">About Us</a></li>
	            <li class="services"><a href="#services">Services</a></li>
	            <li class="portfolio"><a href="#portfolio">Portfolio</a></li> 
	            <li class="contact"><a href="#contact">Contact</a></li>-->
            </ul> <!-- /.main_menu -->
        </div> <!-- /.responsive_menu -->
    </div> <!-- /responsive_navigation -->

	<div id="main-sidebar" class="hidden-xs hidden-sm">
		<div class="logo">
			<a href="#"><h1><?php
								echo ''.$_SESSION['username'].'';
							?></h1></a>
			<span>What do you want to do today?</span>
		</div> <!-- /.logo -->

		<div class="navigation">
	        <ul class="main-menu">
	            <li class="home"><a href="#" id="ini">Home</a></li>
	            <li class="about"><a href="#" id="his">HISTORY</a></li>
	            <!-- <li class="services"><a href="#services">Services</a></li>
	            <li class="portfolio"><a href="#portfolio">Portfolio</a></li> -->
	            <li class="contact"><a href="javascript:void(0);" id="logout">Log out</a></li>
	        </ul>
		</div> <!-- /.navigation -->

	</div> <!-- /#main-sidebar -->

	<div id="main-content" align="center">
    <br><br><br>
    <div id="start">
    <div  style="background-color:#F8F8F8; width:300px; border-color:#36C; border:groove; border-style:outset" id="normal">
    <br>
	<label>You Send</label>
				  <div  >
		            <input type="text" value="" id="val_from">
		            <span >
			            <select id="from">
							<option value="USD" selected>USD</option>
                            <option value="EUR">EUR</option>
			            </select>
		            </span>
                    </div>
                    <br>
	<label>Receiver gets</label>
				<div>
		            <input type="text" value="" id="val_to">
		            <span>
			            <select id="to">
							<option value="EUR">EUR</option>
                            <option value="USD" selected>USD</option>
			            </select>
		            </span>	
                    </div>
                    <br><br>
                    
                    <!--<center><input type="button" id="send" value="Send" style="width:300px"></center>-->
					<div id="espera"></div></div>
                    <br><br><br>
    <div id="confirm"  style="background-color:#F90; color:#000; width:300px; border-color:#36C; border:groove; border-style:outset">
    <br><center>CONFIRMATION</center>
	<label>You Send</label>
				  <div >
		            <input type="text" value="" id="val_from_cf" readonly>
		            <span >
			            <select>
							<option selected id="from_cf"></option>
			            </select>
		            </span>
                    </div>
                    <br>
	<label>Receiver gets</label>
				<div>
		            <input type="text" value="" id="val_to_cf" readonly>
		            <span>
			            <select>
							<option id="to_cf"></option>
			            </select>
		            </span>	
                    </div>
                    <br>
                    At a rate:<b><div id="rate"></div></b><br>
                    <input type="hidden" id="org_country" >
                    <input type="hidden" id="user">
                    
                    <center><input type="button" id="save" value="Confirm" style="width:300px"></center>
                    <center><input type="button" id="cancel" value="Cancel" style="width:300px; background-color:#FF3300; color:#000000"></center>
					<div id="espera_confirm"></div></div>
         </div>
         
         <div id="history" style="height:500px; border:none">
         <h3>HISTORY</h3>
         <iframe src="../pChart2.1.4/examples/example.drawBarChart.poll.php" width="100%" height="100%" style="border:none"></iframe>
         </div>
	</div> <!-- /#main-content -->

	
<!-- templatemo 394 sonic -->
</body>
</html>
<?php

}
?>
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/functions.js"></script>