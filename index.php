<?php

	session_start();

	include 'dbconfig.php';
	
?>

<html>

	<head>
	
		<title>Login</title>
		
		<style type="text/css">
		
			body {
				
				margin: 0;
				
			}
			
			.container{
				
				width: 80%;
				margin: auto;
				overflow: hidden;
			
			}

			header{
				
				background: black;
				color: #ffffff;
				padding-top: 30px;
				min-height: 70px;
				border-bottom: #e8491d 3px solid;
				
			}

			header #branding{
				
				float: left;
			
			}

			header #branding h1{
			
				margin: 0;

			}

			header .highlight, header .current a{
				
				color:orangered;
				font-weight: bold;
			
			}
		
			#wrapper {
				
				width: 360px;
				padding: 8% 0 0;
				margin: auto;
				position: relative;
				z-index: 1;
				background: #FFFFFF;
				max-width: 360px;
				margin: 150px auto 100px;
				padding: 45px;
				text-align: center;
				box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
				margin-top: 70px;
				
			}
			
			input {
				
				font-family: "Roboto", sans-serif;
				outline: 0;
				background: #f2f2f2;
				width: 100%;
				border: 0;
				margin: 0 0 15px;
				padding: 15px;
				box-sizing: border-box;
				font-size: 17px;
				text-align: center;

			}
			
			#loginButton {
				
				font-family: "Roboto", sans-serif;
				text-transform: uppercase;
				outline: 0;
				background: #4CAF50;
				width: 40%;
				border: 0;
				padding: 15px;
				color: #FFFFFF;
				font-size: 14px;
				-webkit-transition: all 0.3 ease;
				transition: all 0.3 ease;
				cursor: pointer;
				box-shadow: 0px 2px 5px #666;
				border-radius: 5px;
				
			}
			
			#loginButton:hover, #loginButton:active, #loginButton:focus {
				
				background: #43A047;
  
			}
			
			p {
				
				color: red;
				
			}
			
			a {
				
				text-decoration: none;
				
			}

			
		</style>
	
	</head>
	
	<body>
	
		<header>
		
            <div class="container">
			
                <div id="branding">
				
                    <h1><span class="highlight">SHAILI</span> biotech pvt ltd </h1>
					
            </div>
				
        </header>
		
		<div id="wrapper">
		
		<?php
		
			if(array_key_exists('username', $_POST) OR array_key_exists('password', $_POST)) {
		
				if($_POST['username'] == '') {
		
		?>
		
		<p id="p1" style="display:none">Username is required!</p>
			
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p1').style.display = 'block';</script>";
				
			}else if($_POST['password'] == '') {
		
		?>
		
		<p id="p2">Password is required!</p>
			
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p2').style.display = 'block';</script>";
					
			}else {
					
				$query = "SELECT * FROM `login_data`";
					
				$result = mysqli_query($link, $query);
					
				while($row = mysqli_fetch_assoc($result)) {
						
					$Username = $row['Username'];
					$Password = $row['Password'];
						
					if($Username == $_POST['username'] & $Password == $_POST['password']) {
							
						$_SESSION['Username'] = $_POST['username'];
							
						header("Location: .\Shaili_Website\biotech.php");
							
					}
						
				}
				
		?>
		
		<p id="p3" style="display:none">Username and Password do not match!</p>
		
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p3').style.display = 'block';</script>";
					
			}
				
			}
		
		?>
		
			<form method="POST">
				
				<input type="text" name="username" placeholder="Username">
							
				<input type="password" name="password" placeholder="Password">
								
				<input type="submit" name="login" value="Login" id="loginButton">
				
			</form>
			
			<a href=".\changePassword.php"><p>Change Password?</p></a>
			
		
		</div>
	
	</body>

</html>
