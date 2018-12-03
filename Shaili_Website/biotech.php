<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SHAILI BIOTECH PVT LTD|welcome </title>
        
            <link rel="stylesheet" href=".\css\style.css">
            <meta name="decription " content="width-device-width">
             <meta name="viewport" content="width-device-width">
            <meta name="keyword" content="width-device-width">
            <meta name="author" content="width-device-width">

      </head>
    <body>
	
        <header>
		
            <div class="container">
			
                <div id="branding">
				
                    <h1><span class="highlight">SHAILI</span> biotech pvt ltd </h1>
					
				</div>
				
				<nav>
					
					<ul>
						
						<li class="current"><a href=".\about.php">about</a></li>
						<li class="current"><a href="..\logout.php">Log Out</a></li>
							
					</ul>
						
				</nav>
			
			</div>
				
        </header>
		
		<div id="mySidenav" class="sidenav">
			
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			
			<ul class="mainmenu">
			
				<li><a href="#">Registration</a></li>
				
				<?php 
				
					if($authorised != 'Vasant') {
						
				?>
				
				<li><a href="#">Lab</a>
				
					<ul class="submenu">
					
						<li><a href="..\Laboratory\labEntry.php">Entry</a></li>
						<li><a href="..\Laboratory\labUpdate.php">Edit</a></li>
						<li><a href="..\Laboratory\labDisplay.php">Display</a></li>
					
					</ul>
					
				</li>
				
				<?php } ?>
				
				<?php 
				
					if($authorised != 'Vipul') {
						
				?>
				
					<li><a href="#">To Greenhouse</a>
						
						<ul class="submenu">
							
							<li><a href="..\Greenhouse\greenhouseEntry.php">Entry</a></li>
							<li><a href="..\Greenhouse\greenhouseUpdate.php">Edit</a></li>
							<li><a href="..\Greenhouse\greenhouseDisplay.php">Display</a></li>
							
						</ul>
							
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul') {
				
				?>
				
					<li><a href="#">From Greenhouse</a>
					
						<ul class="submenu">
						
							<li><a href="..\Greenhouse\Greenhouse_Transfer\greenhouseTRFEntry.php">Entry</a></li>
							<li><a href="..\Greenhouse\Greenhouse_Transfer\greenhouseTRFUpdate.php">Edit</a></li>
							<li><a href="..\Greenhouse\Greenhouse_Transfer\greenhouseTRFDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul') {
				
				?>
				
					<li><a href="#">Polyhouse</a>
					
						<ul class="submenu">
						
							<li><a href="..\Polyhouse\polyhouseEntry.php">Entry</a></li>
							<li><a href="..\Polyhouse\polyhouseUpdate.php">Edit</a></li>
							<li><a href="..\Polyhouse\polyhouseDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul') {
				
				?>
				
					<li><a href="#">Shed Net</a>
					
						<ul class="submenu">
						
							<li><a href="..\Shed_Net\shedNetEntry.php">Entry</a></li>
							<li><a href="..\Shed_Net\shedNetUpdate.php">Edit</a></li>
							<li><a href="..\Shed_Net\shedNetDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
					
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
				?>
				
					<li><a href="#">Transportation</a>
					
						<ul class="submenu">
						
							<li><a href="..\Transport\transportEntry.php">Entry</a></li>
							<li><a href="..\Transport\transportUpdate.php">Edit</a></li>
							<li><a href="..\Transport\transportDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
				?>
				
					<li><a href="#">Accounting</a>
					
						<ul class="submenu">
						
							<li><a href="">Entry</a></li>
							<li><a href="">Edit</a></li>
							<li><a href="">Display</a></li>
						
						</ul>
						
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
				?>
				
					<li><a href="#">Sales</a>
					
						<ul class="submenu">
						
							<li><a href="..\Sales\salesEntry.php">Entry</a></li>
							<li><a href="..\Sales\salesUpdate.php">Edit</a></li>
							<li><a href="..\Sales\salesDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
				
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
				?>
				
					<li><a href="#">Production</a>
					
						<ul class="submenu">
						
							<li><a href="..\Production\productionEntry.php">Entry</a></li>
							<li><a href="..\Production\productionUpdate.php">Edit</a></li>
							<li><a href="..\Production\productionDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
					
				<?php } ?>
				
				<?php
				
					if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
				?>
				
					<li><a href="#">Stock</a>
					
						<ul class="submenu">
						
							<li><a href="..\Inventory\inventoryEntry.php">Entry</a></li>
							<li><a href="..\Inventory\inventoryUpdate.php">Edit</a></li>
							<li><a href="..\Inventory\inventoryDisplay.php">Display</a></li>
						
						</ul>
						
					</li>
					
				<?php } ?>
				
				<li><a href="#">Govt certification</a>
					
						<ul class="submenu">
						
							<li><a href="..\Govt_Certificate\govtCertificateEntry.php">Entry</a></li>
							<li><a href="..\Govt_Certificate\govtCertificateUpdate.php">Edit</a></li>
							<li><a href="..\Govt_Certificate\govtCertificateDisplay.php">Display</a></li>
						
						</ul>
						
				</li>
				
				<li><a href="#">Complaint</a>
					
					<ul class="submenu">
					
						<?php
				
							if($authorised == 'Vipul' || $authorised == 'Vasant') {
				
						?>						
						<li><a href="..\Complaint\complaintEntry.php">Entry</a></li>
						<?php } ?>
						<?php
				
							if($authorised != 'Vipul' & $authorised != 'Vasant') {
				
						?>
						<li><a href="..\Complaint\complaintDisplay.php">Display</a></li>
						<?php } ?>
						
					</ul>
						
				</li>
								
			</ul>
							
		</div>
				
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
				
		<section id="showcase">
				
			<div class="container">
					
			<h1>SHAILI biotech pvt ltd </h1>
				
				<p>xyz Biotech (P) Ltd. is part of Ahmedabad based Jhajharia group of companies engaged in diverse business arenas like Pharmaceutical ingredients, Wax derivates 
					and Nutraceuticals. Shaili Biotech is situated at Nandasan, North Gujarat, India, started its operation in the year 1992 and now became one of the best 
					admired plant tissue culture company in India. Shaili Biotech maintains stringent quality standards coupled with up absorbing the latest research findings 
					in the sphere of plant biotechnology technology to ensure minimum level of quality rejection.</p>
				   
			</div>
				   
		</section>
					   
		<footer>
		
			<p>biotech pvt ltd, copyright &copy; 2017</p>
			
		</footer>
		
		<script>
				
			function openNav() {
			
				document.getElementById("mySidenav").style.width = "250px";
				
			}

			function closeNav() {
			
				document.getElementById("mySidenav").style.width = "0";
				
			}

		</script>

    </body>

</html>