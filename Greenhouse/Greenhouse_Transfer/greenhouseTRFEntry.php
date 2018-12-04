<?php

	include 'dbconfig.php';
	
	$queryGreenhouseTRF = "SELECT * FROM `greenhouse_trf` ORDER BY sno DESC";
	
	$resultGreenhouseTRF = mysqli_query($link, $queryGreenhouseTRF);
	
	if(isset($_POST['submit'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$location 			= $_POST['location'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$trfQty 			= $_POST['trfqty'];
		$mortality 			= $_POST['mortality'];
		$trfLocation 		= $_POST['trflocation'];
		$netQty 			= $_POST['netqty'];
		
		$date 				= !empty($date) ? "'".$date."'" : "NULL";
		$location 			= !empty($location) ? "'".$location."'" : "NULL";
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$trfQty 			= !empty($trfQty) ? "'".$trfQty."'" : "NULL";
		$mortality 			= !empty($mortality) ? "'".$mortality."'" : "NULL";
		$trfLocation 		= !empty($trfLocation) ? "'".$trfLocation."'" : "NULL";
		$netQty 			= !empty($netQty) ? "'".$netQty."'" : "NULL";
		
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `greenhouse_trf` (Sno, Date, Location, Crop, Variety, Trf_Qty, Mortality, Trf_Location, Net_Qty) VALUES 
					(".$sno.", ".$date.", ".$location.", ".$crop.", ".$variety.", ".$trfQty.", ".$mortality.", ".$trfLocation.", ".$netQty.")";
										
			mysqli_query($link, $query);
			
			$resultGreenhouseTRF = mysqli_query($link, $queryGreenhouseTRF);
			
		} else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\..\Shaili_Website\biotech.php");
		
	} 	
		
?>

<html>

	<head>
	
	<title>Greenhouse Transfer Entry</title>
	
	<link rel="stylesheet" type="text/css" href="greenhouseTRFEntry.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			GREENHOUSE TRANSFER ENTRY
		
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
				
					<label for="location">Location</label> 
					
					<select name="location" id="location">
					
						<option style = "display:none"></option>
						<option>Greenhouse 1</option>
						<option>Greenhouse 2</option>
						<option>Greenhouse 3</option>
						<option>Greenhouse 4</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" onchange="cropChange()">
				
						<option style="display:none"></option>
						<option>Banana</option>
						<option>Pomegranate</option>
						<option >Lime</option>
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
				
					<label for="trfqty">Transfer Quantity</label> 
					<input type="text" name="trfqty" id="trfqty">
				
				</div>
				
				<div class="form-element">
				
					<label for="mortality">Mortality</label> 
					<input type="text" name="mortality" id="mortality">
				
				</div>
				
				<div class="form-element">
				
					<label for="trflocation">Transfer Location</label> 
					
					<select name="trflocation" id="trflocation">
					
						<option style = "display:none"></option>
						<option>Polyhouse A</option>
						<option>Polyhouse B</option>
						<option>Polyhouse C</option>
						<option>Polyhouse D</option>
						<option>Polyhouse E</option>
						<option>Shed Net A</option>
						<option>Shed Net B</option>
						<option>Shed Net C</option>
						<option>Shed Net D</option>
						<option>Shed Net E</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="netqty">Net Quantity</label> 
					<input type="text" name="netqty" id="netqty">
				
				</div>
				
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick="return window.confirm('Confirm Form Submission?')">
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
				
			</form>
		
		</div>
		
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Location</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Transfer Quantity</th>
				<th>Mortality</th>
				<th>Transfer Location</th>
				<th>Net Quantity</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultGreenhouseTRF)) {
					
						$Sno = $row['Sno'];
						$Date = date('d-m-Y', strtotime($row['Date']));
						$Location = $row['Location'];
						$Crop = $row['Crop'];
						$Variety = $row['Variety'];
						$Trf_Qty = $row['Trf_Qty'];
						$Mortality = $row['Mortality'];
						$Trf_Location = $row['Trf_Location'];
						$Net_Qty = $row['Net_Qty'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $Location; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Trf_Qty; ?></td>
				<td><?php echo $Mortality; ?></td>
				<td><?php echo $Trf_Location; ?></td>
				<td><?php echo $Net_Qty; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="greenhouseTRFEntry.js"></script>
	
	</body>

</html>