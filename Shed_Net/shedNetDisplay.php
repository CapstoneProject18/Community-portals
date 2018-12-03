<?php

	include 'dbconfig.php';
		
	$queryShedNet = "SELECT * FROM `shed_net`";
	
	$resultShedNet = mysqli_query($link, $queryShedNet);
		
	$msortVariety = 'None';
	$msortLocation = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortLocation = 'None';
		
		$varietyQuery = "SELECT * FROM `shed_net` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `shed_net`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		
		$resultShedNet = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByLocation'])) {
		
		$msortLocation = $_GET['sortByLocation'];
		$msortVariety = 'None';
		
		$locationQuery = "SELECT * FROM `shed_Net` WHERE Location = '".$msortLocation."'";
		$noneQuery = "SELECT * FROM `shed_net`";
		
		$querySortLocation = ($msortLocation != 'None') ? $locationQuery : $noneQuery;
		
		$resultShedNet = mysqli_query($link, $querySortLocation);
		
	} 
	
?>

<html>

	<head>
	
	<title>Shed Net Display</title>
	
	<link rel="stylesheet" type="text/css" href="shedNetDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			SHED NET RECORD
		
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
					<optgroup label="SHED NET">
					
						<option value="Shed Net A">Shed Net A</option>
						<option value="Shed Net B">Shed Net B</option>
						<option value="Shed Net C">Shed Net C</option>
						<option value="Shed Net D">Shed Net D</option>
						<option value="Shed Net E">Shed Net E</option>
						
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
		
		<table align="center" id="shedNetTable">
		
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
					
			<tr onclick="showRow()">
				
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
		
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="shedNetDisplay.js"></script>
					
	</body>

</html>