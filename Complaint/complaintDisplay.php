<?php

	include 'dbconfig.php';
		
	$queryComplaint = "SELECT * FROM `complaint` order by Sno desc";
	$resultComplaint = mysqli_query($link, $queryComplaint);
		
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
	
	<title>Complaint Display</title>
	
	<link rel="stylesheet" type="text/css" href="complaintDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			COMPLAINT RECORD
		
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
		
		<table align="center" id="complaintTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Farmer Name</th>
				<th>Village</th>
				<th>District</th>
				<th>State</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Inventory Number</th>
				<th>Inventory Dated</th>
				<th>Quantity Supplied</th>
				<th>Issue</th>
				<th>Complainer</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultComplaint)) {
					
					$Sno = $row['Sno'];
					$Date = date('d-m-Y', strtotime($row['Date']));
					$Farmer_Name = $row['Farmer_Name'];
					$Village = $row['Village'];
					$District = $row['District'];
					$State = $row['State'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Inv_No = $row['Inv_No'];
					$Inv_Dated = date('d-m-Y', strtotime($row['Inv_Dated']));
					$Qty_Supplied = $row['Qty_Supplied'];
					$Issue = $row['Issue'];
					$Complainer = $row['Complainer'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $Farmer_Name; ?></td>
				<td><?php echo $Village; ?></td>
				<td><?php echo $District; ?></td>
				<td><?php echo $State; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Inv_No; ?></td>
				<td><?php echo $Inv_Dated; ?></td>
				<td><?php echo $Qty_Supplied; ?></td>
				<td><?php echo $Issue; ?></td>
				<td><?php echo $Complainer; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
						
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="complaintDisplay.js"></script>
					
	</body>

</html>