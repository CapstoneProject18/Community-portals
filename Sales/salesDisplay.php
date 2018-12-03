<?php

	include 'dbconfig.php';
		
	$querySales = "SELECT * FROM `sales`";
	$resultSales = mysqli_query($link, $querySales);
	
	/*$queryPartyName = "SELECT DISTINCT Party_Name  FROM `sales` order by Party_Name asc";
	$resultPartyName = mysqli_query($link, $queryPartyName); 
		
	$msortVariety = 'None';
	$msortPartyName = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortPartyName = 'None';
		
		$varietyQuery = "SELECT * FROM `inventory` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `inventory`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		
		$resultInventory = mysqli_query($link, $querySortVariety);
				
	} else if(isset($_GET['sortByPartyName'])) {
		
		$msortPartyName = $_GET['sortByPartyName'];
		$msortVariety = 'None';
		
		$partyNameQuery = "SELECT * FROM `inventory` WHERE Party_Name = '".$msortPartyName."'";
		$noneQuery = "SELECT * FROM `inventory`";
		
		$querySortPartyName = ($msortPartyName != 'None') ? $partyNameQuery : $noneQuery;
		
		$resultInventory = mysqli_query($link, $querySortPartyName);
		
	} */
	
?>

<html>

	<head>
	
	<title>Sales Display</title>
	
	<link rel="stylesheet" type="text/css" href="salesDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			SALES RECORD
		
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
				
				<label for="partyNameSort">Party Name:</label>
				<select name="partyNameSort" id="partyNameSort" onchange="sortBy(this)">
				
					<option value="None" selected>None</option>
					<optgroup label="Party Name">
					
						<?php 
				
							while($row1 = mysqli_fetch_assoc($resultPartyName)) {
							
								$Party_Name = $row1['Party_Name'];
				
						?>
					
						<option value="<?php echo $Party_Name; ?>"><?php echo $Party_Name; ?></option>
						
						<?php } ?>
						
					</optgroup>
				
				</select>
													
				<?php 
				
					echo "<script type='text/javascript'>
						
							document.getElementById('varietySort').value = '$msortVariety';
							document.getElementById('partyNameSort').value = '$msortPartyName';
						
						</script>"; 
				
				?>
						
			</div>
		
		</form> -->
		
		<button onclick="callme()">Print Table</button>
		<button id="homeButton" onclick="window.location = '../Shaili_Website/biotech.php'">Home</button>
				
		<table align="center" id="salesTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Inventory Number</th>
				<th>Farmer Name</th>
				<th>Dealer Name</th>
				<th>Destination</th>
				<th>State</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Stage</th>
				<th>Quantity</th>
				<th>Rate Per Unit</th>
				<th>Total Amount (in rupees)</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultSales)) {
					
					$Sno = $row['Sno'];
					$Date = date('d-m-Y', strtotime($row['Date']));
					$Inv_No = $row['Inv_No'];
					$Farmer_Name = $row['Farmer_Name'];
					$Dealer_Name = $row['Dealer_Name'];
					$Destination = $row['Destination'];
					$State = $row['State'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Stage = $row['Stage'];
					$Qty = $row['Qty'];
					$Rate_Per_Unit = $row['Rate_Per_Unit'];
					$Total_Amount = $row['Total_Amount'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $Inv_No; ?></td>
				<td><?php echo $Farmer_Name; ?></td>
				<td><?php echo $Dealer_Name; ?></td>
				<td><?php echo $Destination; ?></td>
				<td><?php echo $State; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Stage; ?></td>
				<td><?php echo $Qty; ?></td>
				<td><?php echo $Rate_Per_Unit; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
				
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="salesDisplay.js"></script>
					
	</body>

</html>