<?php

	include 'dbconfig.php';
	
	$queryShedNet = "SELECT * FROM `shed_net` ORDER BY sno DESC";
	
	$resultShedNet = mysqli_query($link, $queryShedNet);
	
	if(isset($_POST['submit'])) {
		
		$sno 				= $_POST['sno'];
		$location 			= $_POST['location'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$inward 			= $_POST['inward'];
		$wkNo 				= $_POST['wkno'];
		$wkWiseMortality 	= $_POST['wkwisemortality'];
		$wkWiseSale 		= $_POST['wkwisesale'];
		$netQtyBalance 		= $_POST['netqtybalance'];
		
		$location 			= !empty($location) ? "'".$location."'" : "NULL";
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$inward 			= !empty($inward) ? "'".$inward."'" : "NULL";
		$wkNo 				= !empty($wkNo) ? "'".$wkNo."'" : "NULL";
		$wkWiseMortality 	= !empty($wkWiseMortality) ? "'".$wkWiseMortality."'" : "NULL";
		$wkWiseSale 		= !empty($wkWiseSale) ? "'".$wkWiseSale."'" : "NULL";
		$netQtyBalance 		= !empty($netQtyBalance) ? "'".$netQtyBalance."'" : "NULL";
		
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `shed_net` (Sno, Location, Crop, Variety, Inward, Wk_No, Wk_Wise_Mortality, Wk_Wise_Sale, Net_Qty_Balance) VALUES 
					(".$sno.", ".$location.", ".$crop.", ".$variety.", ".$inward.", ".$wkNo.", ".$wkWiseMortality.", ".$wkWiseSale.", ".$netQtyBalance.")";
										
			mysqli_query($link, $query);
			
			$resultShedNet = mysqli_query($link, $queryShedNet);
			
		}else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 
	
?>

<html>

	<head>
	
	<title>Shed Net Entry</title>
	
	<link rel="stylesheet" type="text/css" href="shedNetEntry.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			SHED NET ENTRY
		
		</div>
	
		<div id="wrapper">
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label> 
				<input type="text" name="sno" id="sno" script="noOfRows();" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="location">Location</label> 
					
					<select name="location" id="location">
					
						<option style="display:none"></option>
						<option>Shed Net A</option>
						<option>Shed Net B</option>
						<option>Shed Net C</option>
						<option>Shed Net D</option>
						<option>Shed Net E</option>
					
					</select>
				
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
				
					<label for="inward">Inward</label> 
					<select name="inward" id="inward">
					
						<option style="display:none"></option>
						<option>Greenhouse 1</option>
						<option>Greenhouse 2</option>
						<option>Greenhouse 3</option>
						<option>Greenhouse 4</option>
						<option>Polyhouse A</option>
						<option>Polyhouse B</option>
						<option>Polyhouse C</option>
						<option>Polyhouse D</option>
						<option>Polyhouse E</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="wkno">Week Number</label> 
					<input type="text" name="wkno" id="wkno">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkwisemortality">Week Wise Mortality</label> 
					<input type="text" name="wkwisemortality" id="wkwisemortality">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkwisesale">Week Wise Sale</label> 
					<input type="text" name="wkwisesale" id="wkwisesale">
				
				</div>
				
				<div class="form-element">
				
					<label for="netqtybalance">Net Quantity Balance</label> 
					<input type="text" name="netqtybalance" id="netqtybalance">
				
				</div>
				
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Form Submission?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
		
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Location</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Inward</th>
				<th>Week Number</th>
				<th>Week Wise Mortality</th>
				<th>Week Wise Sale</th>
				<th>Net Quantity Balance</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultShedNet)) {
					
					$Sno = $row['Sno'];
					$Location = $row['Location'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Inward = $row['Inward'];
					$Wk_No = $row['Wk_No'];
					$Wk_Wise_Mortality = $row['Wk_Wise_Mortality'];
					$Wk_Wise_Sale = $row['Wk_Wise_Sale'];
					$Net_Qty_Balance = $row['Net_Qty_Balance'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Location; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Inward; ?></td>
				<td><?php echo $Wk_No; ?></td>
				<td><?php echo $Wk_Wise_Mortality; ?></td>
				<td><?php echo $Wk_Wise_Sale; ?></td>
				<td><?php echo $Net_Qty_Balance; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="shedNetEntry.js"></script>
	
	</body>

</html>