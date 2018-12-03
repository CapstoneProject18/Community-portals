<?php

	include 'dbconfig.php';
	
	$querySales = "SELECT * FROM `sales`";
	$resultSales = mysqli_query($link, $querySales);
	
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
			
			$queryUpdate = "UPDATE `sales` SET Date = '".$date."', Inv_No = '".$invNo."', Party_Name = '".$partyName."', Ledger_Effect = '".$ledgerEffect."', Crop = '"
							.$crop."', Variety = '".$variety."', Qty = '".$qty."', Rate_Per_Unit = '".$ratePerUnit."', Total_Amount = '".$totalAmount."', Inward_Gate_No = '".$inwardGateNo
							."', Transport_Details = '".$transportDetails."' WHERE Sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultSales = mysqli_query($link, $querySales);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 

?>

<html>

	<head>
	
	<title>Sales Update</title>
	
	<link rel="stylesheet" type="text/css" href="salesUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			SALES UPDATE
		
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
				
					<label for="farmername">Farmer Name</label>
					<input type="text" name="farmername" id="farmername" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="dealername">Dealer Name</label>
					<input type="text" name="dealername" id="dealername" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="destination">Destination</label>
					<input type="text" name="destination" id="destination" class="input">
				
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
				
					<label for="stage">Stage</label> 
					<input type="text" name="stage" id="stage" class="input"> 
				
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
								
				<input type="submit" name="update" value="Update" id="updateButton"  onclick="return formValidation();" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
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
					
			<tr onclick="rowNumber(this)">
				
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
			
		<script type="text/javascript" src="salesUpdate.js"></script>
	
	</body>

</html>