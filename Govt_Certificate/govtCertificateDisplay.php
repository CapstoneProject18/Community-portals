<?php

	include 'dbconfig.php';
		
	$queryGovtCerti = "SELECT * FROM `govt_certificate`";
	$resultGovtCerti = mysqli_query($link, $queryGovtCerti);
		
	/*$msortVariety = 'None';
	$msortLocation = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortLocation = 'None';
		
		$varietyQuery = "SELECT * FROM `greenhouse` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `greenhouse`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		$resultGreenhouse = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByLocation'])) {
		
		$msortLocation = $_GET['sortByLocation'];
		$msortVariety = 'None';
		
		$locationQuery = "SELECT * FROM `greenhouse` WHERE Location = '".$msortLocation."'";
		$noneQuery = "SELECT * FROM `greenhouse`";
		
		$querySortLocation = ($msortLocation != 'None') ? $locationQuery : $noneQuery;
		$resultGreenhouse = mysqli_query($link, $querySortLocation);
		
	} */
	
?>

<html>

	<head>
	
	<title>Government Certificate Display</title>
	
	<link rel="stylesheet" type="text/css" href="govtCertificateDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			GOVERNMENT CERTIFICATE RECORD
		
		</div>
		
		<!-- <form method="POST" name="sort-form">
				
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
		
		</form> -->
		
		<button onclick="callme()">Print Table</button>
		<button id="homeButton" onclick="window.location = '../Shaili_Website/biotech.php'">Home</button>
				
		<table align="center" id="govtCertiTable">
		
			<tr>
			
				<th>Sno</th>
				<th>SSED_Importer_License</th>
				<th>Seed_License</th>
				<th>DBT_License</th>
				<th>PEQ_Certificate</th>
				<th>Drugs_License</th>
				<th>State</th>
				<th>Certificate_No</th>
				<th>From_Date</th>
				<th>To_Date</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultGovtCerti)) {
					
					$Sno = $row['Sno'];
					$SSED_Importer_License = $row['SSED_Importer_License'];
					$Seed_License = $row['Seed_License'];
					$DBT_License = $row['DBT_License'];
					$PEQ_Certificate = $row['PEQ_Certificate'];
					$Drugs_License = $row['Drugs_License'];
					$State = $row['State'];
					$Certificate_No = $row['Certificate_No'];
					$From_Date = date('d-m-Y', strtotime($row['From_Date']));
					$To_Date = date('d-m-Y', strtotime($row['To_Date']));
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $SSED_Importer_License; ?></td>
				<td><?php echo $Seed_License; ?></td>
				<td><?php echo $DBT_License; ?></td>
				<td><?php echo $PEQ_Certificate; ?></td>
				<td><?php echo $Drugs_License; ?></td>
				<td><?php echo $State; ?></td>
				<td><?php echo $Certificate_No; ?></td>
				<td><?php echo $From_Date; ?></td>
				<td><?php echo $To_Date; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
						
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="govtCertificateDisplay.js"></script>
					
	</body>

</html>