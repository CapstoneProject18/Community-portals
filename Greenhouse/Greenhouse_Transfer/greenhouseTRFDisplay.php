<?php

	include 'dbconfig.php';
		
	$queryGreenhouseTRF = "SELECT * FROM `greenhouse_trf`";
	$resultGreenhouseTRF = mysqli_query($link, $queryGreenhouseTRF);
		
	$msortVariety = 'None';
	$msortLocation = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortLocation = 'None';
		
		$varietyQuery = "SELECT * FROM `greenhouse_trf` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `greenhouse_trf`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		
		$resultGreenhouseTRF = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByLocation'])) {
		
		$msortLocation = $_GET['sortByLocation'];
		$msortVariety = 'None';
		
		$locationQuery = "SELECT * FROM `greenhouse_trf` WHERE Location = '".$msortLocation."'";
		$noneQuery = "SELECT * FROM `greenhouse_trf`";
		
		$querySortLocation = ($msortLocation != 'None') ? $locationQuery : $noneQuery;
		
		$resultGreenhouseTRF = mysqli_query($link, $querySortLocation);
		
	} 
	
?>

<html>

	<head>
	
	<title>Greenhouse Transfer Display</title>
	
	<link rel="stylesheet" type="text/css" href="greenhouseTRFDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			GREENHOUSE TRANSFER RECORD
		
		</div>
		
		<form method="POST" name="sort-form">
				
			<div class="sortDiv">
						
				<label><b>Filter By:</b></label>
				<label for="varietySort">Variety:</label>
				
				<select name="varietySort" id="varietySort" onchange="sortBy(this)">
				
					<option value="None" selected>None</option>
					<option value="Grand Naine">Grand Naine</option>
					<option value="Banana Williams">Banana Williams</option>
					<option value="Musa Basjoo">Musa Basjoo</option>
					<option value="Dwarf Cavendish">Dwarf Cavendish</option>
					<option value="Musa Red">Musa Red</option>
					<option value="Pomegranate">Pomegranate</option>
					<option value="Lime">Lime</option>
					<option value="Red Star">Red Star</option>
					<option value="Sundance">Sundance</option>
					<option value="Atro">Atro</option>
					<option value="Mountain">Mountain</option>
					<option value="Red">Red</option>
					<option value="Variegated Alpinia">Variegated Alpinia</option>
					<option value="Oriental">Oriental</option>
					<option value="Asiatic">Asiatic</option>
					<option value="Longifolium">Longifolium	</option>
					<option value="Green">Green</option>
					<option value="Red Purple">Red Purple</option>
					<option value="Nepenthus">Nepenthus</option>
					<option value="Flava">Flava</option>
					<option value="Red Purple">Red Purple</option>
					<option value="Leucocephala">Leucocephala</option>
					<option value="Phormium">Phormium</option>
				
				</select>
				
				<label for="locationSort">Location:</label>
				
				<select name="locationSort" id="locationSort" onchange="sortBy(this)">
				
					<option value="None" selected>None</option>
					<optgroup label="GREENHOUSE">
					
						<option value="Greenhouse 1">Greenhouse 1</option>
						<option value="Greenhouse 2">Greenhouse 2</option>
						<option value="Greenhouse 3">Greenhouse 3</option>
						<option value="Greenhouse 4">Greenhouse 4</option>
						
					</optgroup>
				
				</select>
									
				<?php 
				
					echo "<script type='text/javascript'>
						
							document.getElementById('varietySort').value = '$msortVariety';
							document.getElementById('locationSort').value = '$msortLocation';
						
						</script>"; 
				
				?>
						
			</div>
		
		</form>
		
		<button onclick="callme()">Print Table</button>
		<button id="homeButton" onclick="window.location = '../../Shaili_Website/biotech.php'">Home</button>
		
		<table align="center" id="greenhouseTRFTable">
		
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
					
			<tr onclick="showRow()">
				
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
		
		<script type="text/javascript" src=".\jquery-3.2.1.js"></script>
		<script type="text/javascript" src=".\jspdf.js"></script>
		<script type="text/javascript" src="greenhouseTRFDisplay.js"></script>
					
	</body>

</html>