<?php

	include 'dbconfig.php';
	
	$queryGreenhouseTRF = "SELECT * FROM `greenhouse_trf`";
	
	$resultGreenhouseTRF = mysqli_query($link, $queryGreenhouseTRF);
	
	if(isset($_POST['update'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$location 			= $_POST['location'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$trfQty 			= $_POST['trfqty'];
		$mortality 			= $_POST['mortality'];
		$trfLocation 		= $_POST['trflocation'];
		$netQty 			= $_POST['netqty'];
				
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `greenhouse_trf` SET Date = '".$date."', Location = '".$location."', Crop = '".$crop."', Variety = '".$variety."', Trf_Qty= '".$trfQty."', Mortality = '"
							.$mortality."', Trf_Location = '".$trfLocation."', Net_Qty = '".$netQty."' WHERE sno = '".$sno."'";
										
			mysqli_query($link, $queryUpdate);
			
			$resultGreenhouseTRF = mysqli_query($link, $queryGreenhouseTRF);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\..\Shaili_Website\biotech.php");
		
	} 
	
?>

<html>

	<head>
	
	<title>Greenhouse Transfer Update</title>
	
	<link rel="stylesheet" type="text/css" href="greenhouseTRFUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			GREENHOUSE TRANSFER UPDATE
		
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
				
					<label for="location">Location</label> 
					
					<select name="location" id="location" class="input">
					
						<option value="" style="display:none"></option>
						<option value="Greenhouse 1">Greenhouse 1</option>
						<option value="Greenhouse 2">Greenhouse 2</option>
						<option value="Greenhouse 3">Greenhouse 3</option>
						<option value="Greenhouse 4">Greenhouse 4</option>
					
					</select>
				
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
				
						<option value="" style="display:none"></option>
						<option value="Grand Naine" style="display:none">Grand Naine</option>
						<option value="Banana Williams" style="display:none">Banana Williams</option>
						<option value="Musa Basjoo" style="display:none">Musa Basjoo</option>
						<option value="Dwarf Cavendish" style="display:none">Dwarf Cavendish</option>
						<option value="Musa Red" style="display:none">Musa Red</option>
						<option value="Pomegranate" style="display:none">Pomegranate</option>
						<option value="Lime" style="display:none">Lime</option>
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
				
					<label for="trfqty">Transfer Quantity</label> 
					<input type="text" name="trfqty" id="trfqty" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="mortality">Mortality</label> 
					<input type="text" name="mortality" id="mortality" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="trflocation">Transfer Location</label> 
					
					<select name="trflocation" id="trflocation" class="input">
					
						<option value="" style="display:none"></option>
						<option value="Greenhouse 1">Greenhouse 1</option>
						<option value="Greenhouse 2">Greenhouse 2</option>
						<option value="Greenhouse 3">Greenhouse 3</option>
						<option value="Greenhouse 4">Greenhouse 4</option>
						<option value="Shed Net A">Shed Net A</option>
						<option value="Shed Net B">Shed Net B</option>
						<option value="Shed Net C">Shed Net C</option>
						<option value="Shed Net D">Shed Net D</option>
						<option value="Shed Net E">Shed Net E</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="netqty">Net Quantity</label> 
					<input type="text" name="netqty" id="netqty" class="input">
				
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
					
			<tr onclick="rowNumber(this)">
				
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
				
		<script type="text/javascript" src="greenhouseTRFUpdate.js"></script>
	
	</body>

</html>