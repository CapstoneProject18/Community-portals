<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$queryGreenhouse = "SELECT * FROM `greenhouse` ORDER BY sno DESC";
	$resultGreenhouse = mysqli_query($link, $queryGreenhouse);
	
	if(isset($_POST['submit'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$gpNo 				= $_POST['gpno'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$inwardQty 			= $_POST['inwardqty'];
		$dateOfPlanting 	= $_POST['dateofplanting'];
		$rejection 			= $_POST['rejection'];
		$mortality 			= $_POST['mortality'];
		$location 			= $_POST['location'];
		$plantingQty 		= $_POST['plantingqty'];
		
		$date 				= !empty($date) ? "'".$date."'" : "NULL";
		$gpNo 				= !empty($gpNo) ? "'".$gpNo."'" : "NULL";
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$inwardQty 			= !empty($inwardQty) ? "'".$inwardQty."'" : "NULL";
		$dateOfPlanting 	= !empty($dateOfPlanting) ? "'".$dateOfPlanting."'" : "NULL";
		$rejection 			= !empty($rejection) ? "'".$rejection."'" : "NULL";
		$mortality 			= !empty($mortality) ? "'".$mortality."'" : "NULL";
		$location 			= !empty($location) ? "'".$location."'" : "NULL";
		$plantingQty 		= !empty($plantingQty) ? "'".$plantingQty."'" : "NULL";
						
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `greenhouse` (Sno, Date, GP_No, Crop, Variety, Inward_Qty, Date_Of_Planting, Rejection, Mortality, Location, Planting_Qty) 
						VALUES (".$sno.", ".$date.", ".$gpNo.", ".$crop.", ".$variety.", ".$inwardQty.", ".$dateOfPlanting.", ".$rejection.", ".$mortality.", ".$location.", "
						.$plantingQty.")";
										
			mysqli_query($link, $query);
			
			$resultGreenhouse = mysqli_query($link, $queryGreenhouse);
			
		}else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 	
	
?>

<html>

	<head>
	
	<title>Greenhouse Entry</title>
	
	<link rel="stylesheet" type="text/css" href="greenhouseEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			GREENHOUSE ENTRY
		
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
				
					<label for="gpno">G.P. Number</label>
					<input type="text" name="gpno" id="gpno">
				
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
				
						<option style="display:none"></option>
						<option style="display:none">Grand Naine</option>
						<option style="display:none">Banana Williams</option>
						<option style="display:none">Musa Basjoo</option>
						<option style="display:none">Dwarf Cavendish</option>
						<option style="display:none">Musa Red</option>
						<option style="display:none">Pomegranate</option>
						<option style="display:none">Lime</option>
						<option style="display:none">Red Star</option>
						<option style="display:none">Sundance</option>
						<option style="display:none">Atro</option>
						<option style="display:none">Mountain</option>
						<option style="display:none">Red</option>
						<option style="display:none">Variegated Alpinia</option>
						<option style="display:none">Oriental</option>
						<option style="display:none">Asiatic</option>
						<option style="display:none">Longifolium	</option>
						<option style="display:none">Green</option>
						<option style="display:none">Red Purple</option>
						<option style="display:none">Nepenthus</option>
						<option style="display:none">Flava</option>
						<option style="display:none">Red Purple</option>
						<option style="display:none">Leucocephala</option>
						<option style="display:none">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="inwardqty">Inward Quantity</label> 
					<input type="text" name="inwardqty" id="inwardqty">
				
				</div>
				
				<div class="form-element">
				
					<label for="dateofplanting">Date of planting</label> 
					<input type="date" name="dateofplanting" id="dateofplanting">
				
				</div>
				
				<div class="form-element">
				
					<label for="rejection">Rejection</label> 
					<input type="text" name="rejection" id="rejection">
				
				</div>
				
				<div class="form-element">
				
					<label for="mortality">Mortality</label> 
					<input type="text" name="mortality" id="mortality">
				
				</div>
				
				<div class="form-element">
				
					<label for="location">Location</label> 
					
					<select name="location" id="location">
					
						<option style="display:none"></option>
						<option>Greenhouse 1</option>
						<option>Greenhouse 2</option>
						<option>Greenhouse 3</option>
						<option>Greenhouse 4</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="plantingqty">Planting Quantity</label> 
					<input type="text" name="plantingqty" id="plantingqty">
				
				</div>
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Form Submission?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
		
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>G.P. Number</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Inward Quantity</th>
				<th>Date of Planting</th>
				<th>Rejection</th>
				<th>Mortality</th>
				<th>Location</th>
				<th>Planting Quantity</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultGreenhouse)) {
					
						$Sno = $row['Sno'];
						$Date = date('d-m-Y', strtotime($row['Date']));
						$GP_No = $row['GP_No'];
						$Crop = $row['Crop'];
						$Variety = $row['Variety'];
						$Inward_Qty = $row['Inward_Qty'];
						$Date_of_Planting = date('d-m-Y', strtotime($row['Date_of_Planting']));
						$Rejection = $row['Rejection'];
						$Mortality = $row['Mortality'];
						$Location = $row['Location'];
						$Planting_Qty = $row['Planting_Qty'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $GP_No; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Inward_Qty; ?></td>
				<td><?php echo $Date_of_Planting; ?></td>
				<td><?php echo $Rejection; ?></td>
				<td><?php echo $Mortality; ?></td>
				<td><?php echo $Location; ?></td>
				<td><?php echo $Planting_Qty; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="greenhouseEntry.js"></script>
	
	</body>

</html>

