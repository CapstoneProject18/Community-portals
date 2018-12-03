<?php

	include 'dbconfig.php';
		
	$queryProduction = "SELECT * FROM `production`";
	$resultProduction = mysqli_query($link, $queryProduction);
		
	$msortVariety = 'None';
	$msortStage = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortStage = 'None';
		
		$varietyQuery = "SELECT * FROM `production` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `production`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		$resultProduction = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByStage'])) {
		
		$msortStage = $_GET['sortByStage'];
		$msortVariety = 'None';
		
		$stageQuery = "SELECT * FROM `production` WHERE Stage = '".$msortStage."'";
		$noneQuery = "SELECT * FROM `production`";
		
		$querySortStage = ($msortStage != 'None') ? $stageQuery : $noneQuery;
		$resultProduction = mysqli_query($link, $querySortStage);
		
	} 
	
?>

<html>

	<head>
	
	<title>Production Display</title>
	
	<link rel="stylesheet" type="text/css" href="ProductionDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			PRODUCTION RECORD
		
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
				
				<label for="stageSort">Stage:</label> 
					
				<select name="stageSort" id="stageSort" onchange="sortBy(this)">
				
					<option value="None" selected>None</option>
					<option value="Multi">Multi</option>
					<option value="Elongation">Elongation</option>
					<option value="Rooting">Rooting</option>
				
				</select>
									
				<?php 
				
					echo "<script type='text/javascript'>
						
							document.getElementById('varietySort').value = '$msortVariety';
							document.getElementById('stageSort').value = '$msortStage';
						
						</script>"; 
				
				?>
						
			</div>
		
		</form>
		
		<button onclick="callme()">Print Table</button>
		<button id="homeButton" onclick="window.location = '../Shaili_Website/biotech.php'">Home</button>
		
		<table align="center" id="productionTable">
		
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
					
			<tr onclick="showRow()">
				
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
		
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="productionDisplay.js"></script>
					
	</body>

</html>