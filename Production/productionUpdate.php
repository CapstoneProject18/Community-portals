<?php

	include 'dbconfig.php';
	
	$queryProduction = "SELECT * FROM `production`";
	
	$resultProduction = mysqli_query($link, $queryProduction);
		
	if(isset($_POST['update'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$wkNo 				= $_POST['wkno'];
		$operator 			= $_POST['operator'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$stage 				= $_POST['stage'];
		$noOfBottles 		= $_POST['noofbottles'];
		$plantsPerBottle 	= $_POST['plantsperbottle'];
		$totalProduction 	= $_POST['totalproduction'];
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `production` SET Date = '".$date."', Wk_No = '".$wkNo."', Operator = '".$operator."', Crop = '".$crop."', Variety = '".$variety."', Stage = '"
							.$stage."', No_Of_Bottles = '".$noOfBottles."', Plants_Per_Bottle = '".$plantsPerBottle."', Total_Production = '"
							.$totalProduction."' WHERE sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultProduction = mysqli_query($link, $queryProduction);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 
	
?>

<html>

	<head>
	
	<title>Production Update</title>
	
	<link rel="stylesheet" type="text/css" href="productionUpdate.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			PRODUCTION UPDATE
		
		</div>
	
		<div id="wrapper">
			<form method="POST" id="update-form">
			
				<div class="form-element">
		
				<label for="sno">Sno</label> 
				<input type="text" name="sno" id="sno" class="input" readonly>
				
				</div>
			
				<div class="form-element">
		
				<label for="date">Date</label> 
				<input type="date" name="date" id="date" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkno">Week Number</label>
					<input type="text" name="wkno" id="wkno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="operator">Operator</label>
					<input type="text" name="operator" id="operator" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" class="input" onchange="cropChange()">
				
						<option value="" style="display:none"></option>
						<option value="Banana">Banana</option>
						<option value="Pomegranate">Pomegranate</option>
						<option value="Lime">Lime</option>
						<option value="Cordyline">Cordyline</option>
						<option value="Variegated Alpinia">Variegated Alpinia</option>
						<option value="Lily">Lily</option>
						<option value="Dioneae">Dioneae</option>
						<option value="Nepenthus">Nepenthus</option>
						<option value="Saraceniae">Saraceniae</option>
						<option value="Phormium">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="variety">Variety</label> 
					
					<select name="variety" id="variety" class="input">
				
						<option value="" style = "display:none"></option>
						<option value="Grand Naine" style = "display:none">Grand Naine</option>
						<option value="Banana Williams" style = "display:none">Banana Williams</option>
						<option value="Musa Basjoo" style = "display:none">Musa Basjoo</option>
						<option value="Dwarf Cavendish" style = "display:none">Dwarf Cavendish</option>
						<option value="Musa Red" style = "display:none">Musa Red</option>
						<option value="Pomegranate" style = "display:none">Pomegranate</option>
						<option value="Lime" style = "display:none">Lime</option>
						<option value="Red Star" style = "display:none">Red Star</option>
						<option value="Sundance" style = "display:none">Sundance</option>
						<option value="Atro" style = "display:none">Atro</option>
						<option value="Mountain" style = "display:none">Mountain</option>
						<option value="Red" style = "display:none">Red</option>
						<option value="Variegated Alpinia" style = "display:none">Variegated Alpinia</option>
						<option value="Oriental" style = "display:none">Oriental</option>
						<option value="Asiatic" style = "display:none">Asiatic</option>
						<option value="Longifolium" style = "display:none">Longifolium	</option>
						<option value="Green" style = "display:none">Green</option>
						<option value="Red Purple" style = "display:none">Red Purple</option>
						<option value="Nepenthus" style = "display:none">Nepenthus</option>
						<option value="Flava" style = "display:none">Flava</option>
						<option value="Red Purple" style = "display:none">Red Purple</option>
						<option value="Leucocephala" style = "display:none">Leucocephala</option>
						<option value="Phormium" style = "display:none">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="stage">Stage</label> 
					
					<select name="stage" id="stage" class="input">
				
						<option value="" style="display:none"></option>
						<option value="Multi">Multi</option>
						<option value="Elongation">Elongation</option>
						<option value="Rooting">Rooting</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="noofbottles">Number of Bottles</label>
					<input type="text" name="noofbottles" id="noofbottles" class="input" onclick="autoFill(this.id)" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="plantsperbottle">Plants Per Bottle</label>
					<input type="text" name="plantsperbottle" id="plantsperbottle" class="input" onclick="autoFill(this.id)" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="totalproduction">Total Production</label>
					<input type="text" name="totalproduction" id="totalproduction" class="input" readonly>
				
				</div>
								
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
		
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Week Number</th>
				<th>Operator</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Stage</th>
				<th>Number of Bottles</th>
				<th>Plants Per Bottle</th>
				<th>Total Production</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultProduction)) {
					
					$Sno = $row['Sno'];
					$Date = date('d-m-Y', strtotime($row['Date']));
					$Wk_No = $row['Wk_No'];
					$Operator = $row['Operator'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Stage = $row['Stage'];
					$No_Of_Bottles = $row['No_Of_Bottles'];
					$Plants_Per_Bottle = $row['Plants_Per_Bottle'];
					$Total_Production = $row['Total_Production'];
						
			?>
					
			<tr onclick="rowNumber(this)">
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $Wk_No; ?></td>
				<td><?php echo $Operator; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Stage; ?></td>
				<td><?php echo $No_Of_Bottles; ?></td>
				<td><?php echo $Plants_Per_Bottle; ?></td>
				<td><?php echo $Total_Production; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="productionUpdate.js"></script>
	
	</body>

</html>