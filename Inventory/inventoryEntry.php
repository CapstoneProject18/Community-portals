<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$queryInventory = "SELECT * FROM `inventory` ORDER BY sno DESC";
	
	$resultInventory = mysqli_query($link, $queryInventory);
	
	if(isset($_POST['submit'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$invNo 				= $_POST['invno'];
		$partyName 			= $_POST['partyname'];
		$ledgerEffect		= $_POST['ledgereffect'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$qty 				= $_POST['qty'];
		$ratePerUnit 		= $_POST['rateperunit'];
		$totalAmount 		= $_POST['totalamount'];
		$inwardGateNo 		= $_POST['inwardgateno'];
		$transportDetails 	= $_POST['transportdetails'];
		
		$date 				= !empty($date) ? "'".$date."'" : "NULL";
		$invNo 				= !empty($invNo) ? "'".$invNo."'" : "NULL";
		$partyName 			= !empty($partyName) ? "'".$partyName."'" : "NULL";
		$ledgerEffect 		= !empty($ledgerEffect) ? "'".$ledgerEffect."'" : "NULL";
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$qty 				= !empty($qty) ? "'".$qty."'" : "NULL";
		$ratePerUnit 		= !empty($ratePerUnit) ? "'".$ratePerUnit."'" : "NULL";
		$totalAmount 		= !empty($totalAmount) ? "'".$totalAmount."'" : "NULL";
		$inwardGateNo 		= !empty($inwardGateNo) ? "'".$inwardGateNo."'" : "NULL";
		$transportDetails 	= !empty($transportDetails) ? "'".$transportDetails."'" : "NULL";
						
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `inventory` (Sno, Date, Inv_No, Party_Name, Ledger_Effect, Crop, Variety, Qty, Rate_Per_Unit, Total_Amount, Inward_Gate_No, Transport_Details) 
						VALUES (".$sno.", ".$date.", ".$invNo.", ".$partyName.", ".$ledgerEffect.", ".$crop.", ".$variety.", ".$qty.", ".$ratePerUnit.", ".$totalAmount.", "
						.$inwardGateNo.", ".$transportDetails.")";
										
			mysqli_query($link, $query);
			
			$resultInventory = mysqli_query($link, $queryInventory);
			
		} else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 	
	
?>

<html>

	<head>
	
	<title>Inventory Entry</title>
	
	<link rel="stylesheet" type="text/css" href="inventoryEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			INVENTORY ENTRY
		
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
				
					<label for="invno">Inventory Number</label>
					<input type="text" name="invno" id="invno">
				
				</div>
				
				<div class="form-element">
				
					<label for="partyname">Party Name</label>
					<input type="text" name="partyname" id="partyname">
				
				</div>
				
				<div class="form-element">
				
					<label for="ledgereffect">Ledger Effect</label>
					<input type="text" name="ledgereffect" id="ledgereffect">
				
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
				
					<label for="qty">Quantity</label> 
					<input type="text" name="qty" id="qty" onkeyup="autoFill(this.id)"> 
				
				</div>
				
				<div class="form-element">
				
					<label for="rateperunit">Rate Per Unit</label> 
					<input type="text" name="rateperunit" id="rateperunit" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="totalamount">Total Amount</label> 
					<input type="text" name="totalamount" id="totalamount" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="inwardgateno">Inward Gate Number</label> 
					<input type="text" name="inwardgateno" id="inwardgateno">
				
				</div>
				
				<div class="form-element">
				
					<label for="transportdetails">Transport Details</label> 
					<input type="text" name="transportdetails" id="transportdetails">
				
				</div>
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return formValidation();' onclick='return window.confirm("Confirm Form Submission?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
				
			</form>
		
		</div>
		
		<table align="center" id="inventoryTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>Inventory Number</th>
				<th>Party Name</th>
				<th>Ledger Effect</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Quantity</th>
				<th>Rate Per Unit</th>
				<th>Total Amount (in rupees)</th>
				<th>Inward Gate Number</th>
				<th>Transport Details</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultInventory)) {
					
						$Sno = $row['Sno'];
						$Date = date('d-m-Y', strtotime($row['Date']));
						$Inv_No = $row['Inv_No'];
						$Party_Name = $row['Party_Name'];
						$Ledger_Effect = $row['Ledger_Effect'];
						$Crop = $row['Crop'];
						$Variety = $row['Variety'];
						$Qty = $row['Qty'];
						$Rate_Per_Unit = $row['Rate_Per_Unit'];
						$Total_Amount = $row['Total_Amount'];
						$Inward_Gate_No = $row['Inward_Gate_No'];
						$Transport_Details = $row['Transport_Details'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $Inv_No; ?></td>
				<td><?php echo $Party_Name; ?></td>
				<td><?php echo $Ledger_Effect; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Qty; ?></td>
				<td><?php echo $Rate_Per_Unit; ?></td>
				<td><?php echo $Total_Amount; ?></td>
				<td><?php echo $Inward_Gate_No; ?></td>
				<td><?php echo $Transport_Details; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="inventoryEntry.js"></script>
	
	</body>

</html>

