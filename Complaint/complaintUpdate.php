<?php

	include 'dbconfig.php';
	
	$queryComplaint = "SELECT * FROM `complaint`";
	$resultComplaint = mysqli_query($link, $queryComplaint);
	
	if(isset($_POST['update'])) {
		
		$sno 			= $_POST['sno'];
		$date 			= $_POST['date'];
		$farmerName 	= $_POST['farmername'];
		$village 		= $_POST['village'];
		$district 		= $_POST['district'];
		$state 			= $_POST['state'];
		$crop 			= $_POST['crop'];
		$variety 		= $_POST['variety'];
		$invNo 			= $_POST['invno'];
		$invDated 		= $_POST['invdated'];
		$qtySupplied 	= $_POST['qtysupplied'];
		$issue 			= $_POST['issue'];
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `complaint` SET Date = '".$date."', Farmer_Name = '".$farmerName."', Village = '".$village."', District = '".$district.
							"', State = '".$state."', Crop = '".$crop."', Variety = '".$variety."', Inv_No = '".$invNo."', Inv_Dated = '".$invDated.
							"', Qty_Supplied = '".$qtySupplied."', Issue = '".$issue."' WHERE Sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultComplaint = mysqli_query($link, $queryComplaint);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 

?>

<html>

	<head>
	
	<title>Complaint Update</title>
	
	<link rel="stylesheet" type="text/css" href="complaintUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			COMPLAINT UPDATE
		
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
				
					<label for="farmername">Farmer Name</label>
					<input type="text" name="farmername" id="farmername" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="village">Village</label>
					<input type="text" name="village" id="village" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="district">District</label>
					<input type="text" name="district" id="district" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="state">State</label>
					<input type="text" name="state" id="state" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" onchange="cropChange()" class="input">
				
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
					
					<select name="variety" id="variety" class="input">
				
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
				
					<label for="invno">Inventory Number</label> 
					<input type="text" name="invno" id="invno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="invdated">Inventory Dated</label> 
					<input type="date" name="invdated" id="invdated" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="qtysupplied">Quantity Supplied</label> 
					<input type="text" name="qtysupplied" id="qtysupplied" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="issue">Issue</label> 
					<input type="text" name="issue" id="issue" class="input">
				
				</div>
								
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
				
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
						
			?>
					
			<tr onclick="rowNumber(this)">
				
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
				
			</tr>
				
			<?php } ?>
		
		</table>
			
		<script type="text/javascript" src="complaintUpdate.js"></script>
	
	</body>

</html>