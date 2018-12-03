<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$queryComplaint = "SELECT * FROM `complaint` ORDER BY Sno DESC";
	$resultComplaint = mysqli_query($link, $queryComplaint);
	
	if(isset($_POST['submit'])) {
		
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
		$complainer		= $authorised;
		
		$date 			= !empty($date) ? "'".$date."'" : "NULL";
		$farmerName		= !empty($farmerName) ? "'".$farmerName."'" : "NULL";
		$village 		= !empty($village) ? "'".$village."'" : "NULL";
		$district 		= !empty($district) ? "'".$district."'" : "NULL";
		$state 			= !empty($state) ? "'".$state."'" : "NULL";
		$crop 			= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 		= !empty($variety) ? "'".$variety."'" : "NULL";
		$invNo 			= !empty($invNo) ? "'".$invNo."'" : "NULL";
		$invDated 		= !empty($invDated) ? "'".$invDated."'" : "NULL";
		$qtySupplied 	= !empty($qtySupplied) ? "'".$qtySupplied."'" : "NULL";
		$issue 			= !empty($issue) ? "'".$issue."'" : "NULL";
		$complainer		= !empty($complainer) ? "'".$complainer."'" : "NULL";
		
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `complaint` (Sno, Date, Farmer_Name, Village, District, State, Crop, Variety, Inv_No, Inv_Dated, Qty_Supplied, Issue, Complainer) 
						VALUES (".$sno.", ".$date.", ".$farmerName.", ".$village.", ".$district.", ".$state.", ".$crop.", ".$variety.", ".$invNo.", ".$invDated
						.", ".$qtySupplied.", ".$issue.", ".$complainer.")";
										
			mysqli_query($link, $query);
			
			$resultComplaint = mysqli_query($link, $queryComplaint);
			
		} else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 	
	
?>

<html>

	<head>
	
	<title>Complaint Entry</title>
	
	<link rel="stylesheet" type="text/css" href="complaintEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			COMPLAINT ENTRY
		
		</div>
	
		<div id="wrapper">
		
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label>
				<input type="text" name="sno" id="sno" script="noOfRows();" readonly>
				
				</div>
			
				<div class="form-element">
		
				<label for="date">Date</label> 
				<input type="date" name="date" id="date">
				
				</div>
				
				<div class="form-element">
				
					<label for="farmername">Farmer Name</label>
					<input type="text" name="farmername" id="farmername">
				
				</div>
				
				<div class="form-element">
				
					<label for="village">Village</label>
					<input type="text" name="village" id="village">
				
				</div>
				
				<div class="form-element">
				
					<label for="district">District</label>
					<input type="text" name="district" id="district">
				
				</div>
				
				<div class="form-element">
				
					<label for="state">State</label>
					<input type="text" name="state" id="state">
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" onchange="cropChange()">
				
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
					
					<select name="variety" id="variety">
				
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
					<input type="text" name="invno" id="invno">
				
				</div>
				
				<div class="form-element">
				
					<label for="invdated">Inventory Dated</label> 
					<input type="date" name="invdated" id="invdated">
				
				</div>
				
				<div class="form-element">
				
					<label for="qtysupplied">Quantity Supplied</label> 
					<input type="text" name="qtysupplied" id="qtysupplied">
				
				</div>
				
				<div class="form-element">
				
					<label for="issue">Issue</label> 
					<input type="text" name="issue" list="issue">
					<datalist id="issue">
					
						<option>Low Yield</option>
						<option>Variation</option>
					
					</datalist>
				
				</div>
				
				
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Complaint Submission?")'>
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
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="complaintEntry.js"></script>
	
	</body>

</html>

