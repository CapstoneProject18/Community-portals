<?php

	include 'dbconfig.php';
	
	$queryProduction= "SELECT * FROM `production` ORDER BY sno DESC";
	
	$resultProduction= mysqli_query($link, $queryProduction);
	
	if(isset($_POST['submit'])) {
		
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
		
		$date 				= !empty($date) ? "'".$date."'" : "NULL";
		$wkNo 				= !empty($wkNo) ? "'".$wkNo."'" : "NULL";
		$operator			= !empty($operator) ? "'".$operator."'" : "NULL";
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$stage 				= !empty($stage) ? "'".$stage."'" : "NULL";
		$noOfBottles 		= !empty($noOfBottles) ? "'".$noOfBottles."'" : "NULL";
		$plantsPerBottle 	= !empty($plantsPerBottle) ? "'".$plantsPerBottle."'" : "NULL";
		$totalProduction 	= !empty($totalProduction) ? "'".$totalProduction."'" : "NULL";
				
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `production` (Sno, Date, Wk_No, Operator, Crop, Variety, Stage, No_Of_Bottles, Plants_Per_Bottle, Total_Production) VALUES 
					($sno, $date, $wkNo, $operator, $crop, $variety, $stage, $noOfBottles, $plantsPerBottle, $totalProduction)";
					
			mysqli_query($link, $query);
				
			$resultProduction = mysqli_query($link, $queryProduction);
			
		}else {
						
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 
			
?>

<html>

	<head>
	
	<title>Production Entry</title>
	
	<link rel="stylesheet" type="text/css" href="productionEntry.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			PRODUCTION ENTRY
		
		</div>
	
		<div id="wrapper">
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label> 
				<input type="text" name="sno" id="sno" script="noOfRows();" readonly>
				
				</div>
			
				<div class="form-element">
		
				<label for="date">Date</label> 
				<input type="date" name="date" id="date">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkno">Week Number</label>
					<input type="text" name="wkno" id="wkno">
				
				</div>
				
				<div class="form-element">
				
					<label for="operator">Operator</label>
					<input type="text" name="operator" id="operator">
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" onchange="cropChange()">
				
						<option style="display:none"></option>
						<option>Banana</option>
						<option>Pomegranate</option>
						<option>Lime</option>
						<option>Cordyline</option>
						<option>Variegated Alpinia</option>
						<option>Lily</option>
						<option>Dioneae</option>
						<option>Nepenthus</option>
						<option>Saraceniae</option>
						<option>Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="variety">Variety</label> 
					
					<select name="variety" id="variety">
				
						<option style = "display:none"></option>
						<option style = "display:none">Grand Naine</option>
						<option style = "display:none">Banana Williams</option>
						<option style = "display:none">Musa Basjoo</option>
						<option style = "display:none">Dwarf Cavendish</option>
						<option style = "display:none">Musa Red</option>
						<option style = "display:none">Pomegranate</option>
						<option style = "display:none">Lime</option>
						<option style = "display:none">Red Star</option>
						<option style = "display:none">Sundance</option>
						<option style = "display:none">Atro</option>
						<option style = "display:none">Mountain</option>
						<option style = "display:none">Red</option>
						<option style = "display:none">Variegated Alpinia</option>
						<option style = "display:none">Oriental</option>
						<option style = "display:none">Asiatic</option>
						<option style = "display:none">Longifolium	</option>
						<option style = "display:none">Green</option>
						<option style = "display:none">Red Purple</option>
						<option style = "display:none">Nepenthus</option>
						<option style = "display:none">Flava</option>
						<option style = "display:none">Red Purple</option>
						<option style = "display:none">Leucocephala</option>
						<option style = "display:none">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="stage">Stage</label> 
					
					<select name="stage" id="stage">
				
						<option style="display:none"></option>
						<option>Multi</option>
						<option>Elongation</option>
						<option>Rooting</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="noofbottles">Number of Bottles</label>
					<input type="text" name="noofbottles" id="noofbottles" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="plantsperbottle">Plants Per Bottle</label>
					<input type="text" name="plantsperbottle" id="plantsperbottle" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="totalproduction">Total Production</label>
					<input type="text" name="totalproduction" id="totalproduction" readonly>
				
				</div>
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Form Submission?")'>
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
					
			<tr>
				
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
		
		<script type="text/javascript" src="productionEntry.js"></script>
	
	</body>

</html>