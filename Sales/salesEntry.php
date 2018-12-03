<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$querySales = "SELECT * FROM `sales` ORDER BY sno DESC";
	
	$resultSales = mysqli_query($link, $querySales);
	
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
			
			$query = "INSERT INTO `sales` (Sno, Date, Inv_No, Party_Name, Ledger_Effect, Crop, Variety, Qty, Rate_Per_Unit, Total_Amount, Inward_Gate_No, Transport_Details) 
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
	
	<title>Sales Entry</title>
	
	<link rel="stylesheet" type="text/css" href="salesEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			SALES ENTRY
		
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
				
					<label for="farmername">Farmer Name</label>
					<input type="text" name="farmername" id="farmername">
				
				</div>
				
				<div class="form-element">
				
					<label for="dealername">Dealer Name</label>
					<input type="text" name="dealername" id="dealername">
				
				</div>
				
				<div class="form-element">
				
					<label for="destination">Destination</label>
					<input type="text" name="destination" id="destination">
				
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
				
					<label for="stage">Stage</label> 
					<input type="text" name="stage" id="stage"> 
				
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
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return formValidation();' onclick='return window.confirm("Confirm Form Submission?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
				
			</form>
		
		</div>
		
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
		
		<script type="text/javascript" src="salesEntry.js"></script>
	
	</body>

</html>

