<?php

	include 'dbconfig.php';
		
	$queryPolyhouse = "SELECT * FROM `polyhouse`";
	$resultPolyhouse = mysqli_query($link, $queryPolyhouse);
		
	$msortVariety = 'None';
	$msortLocation = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortLocation = 'None';
		
		$varietyQuery = "SELECT * FROM `polyhouse` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `polyhouse`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		
		$resultPolyhouse = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByLocation'])) {
		
		$msortLocation = $_GET['sortByLocation'];
		$msortVariety = 'None';
		
		$locationQuery = "SELECT * FROM `polyhouse` WHERE Location = '".$msortLocation."'";
		$noneQuery = "SELECT * FROM `polyhouse`";
		
		$querySortLocation = ($msortLocation != 'None') ? $locationQuery : $noneQuery;
		
		$resultPolyhouse = mysqli_query($link, $querySortLocation);
		
	} 
	
?>

<html>

	<head>
	
	<title>Polyhouse Display</title>
	
	<link rel="stylesheet" type="text/css" href="polyhouseDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			POLYHOUSE RECORD
		
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
					<optgroup label="POLYHOUSE">
					
						<option value="Polyhouse A">Polyhouse A</option>
						<option value="Polyhouse B">Polyhouse B</option>
						<option value="Polyhouse C">Polyhouse C</option>
						<option value="Polyhouse D">Polyhouse D</option>
						<option value="Polyhouse E">Polyhouse E</option>
						
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
		<button id="homeButton" onclick="window.location = '../Shaili_Website/biotech.php'">Home</button>
		
		<table align="center" id="polyhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Location</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>TRF Quantity</th>
				<th>Mortality</th>
				<th>Transfer Location</th>
				<th>Net Quantity</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultPolyhouse)) {
					
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
		
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="polyhouseDisplay.js"></script>
					
	</body>

</html>