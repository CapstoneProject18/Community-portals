<?php

	include 'dbconfig.php';
		
	$queryLab = "SELECT * FROM `lab`";
	$resultLab = mysqli_query($link, $queryLab);
		
	/*$msortVariety = 'None';
	$msortLocation = 'None';
		
	if(isset($_GET['sortByVariety'])) {
		
		$msortVariety = $_GET['sortByVariety'];
		$msortLocation = 'None';
		
		$varietyQuery = "SELECT * FROM `greenhouse` WHERE Variety = '".$msortVariety."'";
		$noneQuery = "SELECT * FROM `greenhouse`";
		
		$querySortVariety = ($msortVariety != 'None') ? $varietyQuery : $noneQuery;
		$resultGreenhouse = mysqli_query($link, $querySortVariety);
				
	}else if(isset($_GET['sortByLocation'])) {
		
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
	
	<title>Lab Display</title>
	
	<link rel="stylesheet" type="text/css" href="labDisplay.css">
			
	</head>
	
	<body>
	
		<div ID="header">
		
			LAB RECORD
		
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
		
		<table align="center" id="labTable">
		
			<tr>
			
				<th>Sno</th>
				<th>20 Digit Code</th>
				<th>Origin</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Gatepass Number</th>
				<th>Batch Number</th>
				<th>Batch Size</th>
				<th>Suckers Number</th>
				<th>Rejection</th>
				<th>Balance</th>
				<th>Suckers Initiated</th>
				<th>Contamination</th>
				<th>Net Balance</th>
				<th>Sample Withdrawn</th>
				<th>Sample to Govt</th>
				<th>Sample Center</th>
				<th>Report Receive</th>
				<th>Letter Reference</th>
				<th>Letter Date</th>
				<th>Cause Sending Sample</th>
				<th>Report Result</th>
				<th>Remarks</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultLab)) {
					
					$Sno = $row['Sno'];
					$Digit_Code_20 = $row['20_Digit_Code'];
					$Origin = $row['Origin'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Gatepass_No = $row['Gatepass_No'];
					$Batch_No = $row['Batch_No'];
					$Batch_Size = $row['Batch_Size'];
					$No_Of_Suckers = $row['No_Of_Suckers'];
					$Rejection = $row['Rejection'];
					$Balance = $row['Balance'];
					$Suckers_Initiated = $row['Suckers_Initiated'];
					$Contamination = $row['Contamination'];
					$Net_Balance = $row['Net_Balance'];
					$No_Of_Sample_Withdrawn = $row['No_Of_Sample_Withdrawn'];
					$Date_Sample_Govt = date('d-m-Y', strtotime($row['Date_Sample_Govt']));
					$Sample_Center = $row['Sample_Center'];
					$Report_Receive_Date = date('d-m-Y', strtotime($row['Report_Receive_Date']));
					$Letter_Reference = $row['Letter_Reference'];
					$Letter_Date = date('d-m-Y', strtotime($row['Letter_Date']));
					$Cause_Sending_Sample = $row['Cause_Sending_Sample'];
					$Report_Result = $row['Report_Result'];
					$Remarks = $row['Remarks'];
					
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Digit_Code_20; ?></td>
				<td><?php echo $Origin; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Gatepass_No; ?></td>
				<td><?php echo $Batch_No; ?></td>
				<td><?php echo $Batch_Size; ?></td>
				<td><?php echo $No_Of_Suckers; ?></td>
				<td><?php echo $Rejection; ?></td>
				<td><?php echo $Balance; ?></td>
				<td><?php echo $Suckers_Initiated; ?></td>
				<td><?php echo $Contamination; ?></td>
				<td><?php echo $Net_Balance; ?></td>
				<td><?php echo $No_Of_Sample_Withdrawn; ?></td>
				<td><?php echo $Date_Sample_Govt; ?></td>
				<td><?php echo $Sample_Center; ?></td>
				<td><?php echo $Report_Receive_Date; ?></td>
				<td><?php echo $Letter_Reference; ?></td>
				<td><?php echo $Letter_Date; ?></td>
				<td><?php echo $Cause_Sending_Sample; ?></td>
				<td><?php echo $Report_Result; ?></td>
				<td><?php echo $Remarks; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
						
		<script type="text/javascript" src="..\jquery-3.2.1.js"></script>
		<script type="text/javascript" src="..\jspdf.js"></script>
		<script type="text/javascript" src="labDisplay.js"></script>
					
	</body>

</html>