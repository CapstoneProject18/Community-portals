<?php

	include 'dbconfig.php';
	
	$queryInventory = "SELECT * FROM `inventory`";
	$resultInventory = mysqli_query($link, $queryInventory);
	
	if(isset($_POST['update'])) {
		
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
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `inventory` SET Date = '".$date."', Inv_No = '".$invNo."', Party_Name = '".$partyName."', Ledger_Effect = '".$ledgerEffect."', Crop = '"
							.$crop."', Variety = '".$variety."', Qty = '".$qty."', Rate_Per_Unit = '".$ratePerUnit."', Total_Amount = '".$totalAmount."', Inward_Gate_No = '".$inwardGateNo
							."', Transport_Details = '".$transportDetails."' WHERE Sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultInventory = mysqli_query($link, $queryInventory);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 

?>

<html>

	<head>
	
	<title>Inventory Update</title>
	
	<link rel="stylesheet" type="text/css" href="inventoryUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			INVENTORY UPDATE
		
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
				
					<label for="invno">Inventory Number</label>
					<input type="text" name="invno" id="invno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="partyname">Party Name</label>
					<input type="text" name="partyname" id="partyname" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="ledgereffect">Ledger Effect</label>
					<input type="text" name="ledgereffect" id="ledgereffect" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" class="input" onchange="cropChange()">
				
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
				
					<label for="qty">Quantity</label> 
					<input type="text" name="qty" id="qty" class="input" onclick="autoFill(this.id)" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="rateperunit">Rate Per Unit</label> 
					<input type="text" name="rateperunit" id="rateperunit" class="input" onclick="autoFill(this.id)" onkeyup="autoFill(this.id)">
				
				</div>
				
				<div class="form-element">
				
					<label for="totalamount">Total Amount</label> 
					<input type="text" name="totalamount" id="totalamount" class="input" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="inwardgateno">Inward Gate Number</label> 
					<input type="text" name="inwardgateno" id="inwardgateno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="transportdetails">Transport Details</label> 
					<input type="text" name="transportdetails" id="transportdetails" class="input">
				
				</div>
								
				<input type="submit" name="update" value="Update" id="updateButton"  onclick="return formValidation();" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
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
					
			<tr onclick="rowNumber(this)">
				
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
			
		<script type="text/javascript" src="inventoryUpdate.js"></script>
	
	</body>

</html>