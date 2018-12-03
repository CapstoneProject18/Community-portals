<?php

	include 'dbconfig.php';
	
	$queryShedNet = "SELECT * FROM `shed_net`";
	
	$resultShedNet = mysqli_query($link, $queryShedNet);
	
	if(isset($_POST['update'])) {
		
		$sno 				= $_POST['sno'];
		$location 			= $_POST['location'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$inward 			= $_POST['inward'];
		$wkNo 				= $_POST['wkno'];
		$wkWiseMortality 	= $_POST['wkwisemortality'];
		$wkWiseSale 		= $_POST['wkwisesale'];
		$netQtyBalance 		= $_POST['netqtybalance'];
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `shed_net` SET Location = '".$location."', Crop = '".$crop."', Variety = '".$variety."', Inward = '".$inward."', Wk_No = '"
							.$wkNo."', Wk_Wise_Mortality = '".$wkWiseMortality."', Wk_Wise_Sale = '".$wkWiseSale."', Net_Qty_Balance = '".$netQtyBalance."' WHERE sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultShedNet = mysqli_query($link, $queryShedNet);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 
	
?>

<html>

	<head>
	
	<title>Shed Net Update</title>
	
	<link rel="stylesheet" type="text/css" href="shedNetUpdate.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			SHED NET UPDATE
		
		</div>
	
		<div id="wrapper">
			<form method="POST" id="update-form">
			
				<div class="form-element">
		
				<label for="sno">Sno</label> 
				<input type="text" name="sno" id="sno" class="input" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="location">Location</label> 
					
					<select name="location" id="location" class="input">
					
						<option value="" style = "display:none"></option>
						<option value="Shed Net A">Shed Net A</option>
						<option value="Shed Net B">Shed Net B</option>
						<option value="Shed Net C">Shed Net C</option>
						<option value="Shed Net D">Shed Net D</option>
						<option value="Shed Net E">Shed Net E</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="crop">Crop</label> 
					
					<select name="crop" id="crop" class="input" onchange="cropChange()">
				
						<option value="" style="display:none"></option>
						<option value="Banana">Banana</option>
						<option value="Pomegranate">Pomegranate</option>
						<option value="Lime">Lime</option>
						<option value="Cordyline">Cordyline</option>
						<option value="Variegated Alpinia">Variegated Alpinia</option>
						<option value="Lily">Lily</option>
						<option value="Dioneae">Dioneae</option>
						<option value="Nepenthus">Nepenthus</option>
						<option value="Saraceniae">Saraceniae</option>
						<option value="Phormium">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="variety">Variety</label> 
					
					<select name="variety" id="variety" class="input">
				
						<option value="" style = "display:none"></option>
						<option value="Grand Naine" style = "display:none">Grand Naine</option>
						<option value="Banana Williams" style = "display:none">Banana Williams</option>
						<option value="Musa Basjoo" style = "display:none">Musa Basjoo</option>
						<option value="Dwarf Cavendish" style = "display:none">Dwarf Cavendish</option>
						<option value="Musa Red" style = "display:none">Musa Red</option>
						<option value="Pomegranate" style = "display:none">Pomegranate</option>
						<option value="Lime" style = "display:none">Lime</option>
						<option value="Red Star" style = "display:none">Red Star</option>
						<option value="Sundance" style = "display:none">Sundance</option>
						<option value="Atro" style = "display:none">Atro</option>
						<option value="Mountain" style = "display:none">Mountain</option>
						<option value="Red" style = "display:none">Red</option>
						<option value="Variegated Alpinia" style = "display:none">Variegated Alpinia</option>
						<option value="Oriental" style = "display:none">Oriental</option>
						<option value="Asiatic" style = "display:none">Asiatic</option>
						<option value="Longifolium" style = "display:none">Longifolium	</option>
						<option value="Green" style = "display:none">Green</option>
						<option value="Red Purple" style = "display:none">Red Purple</option>
						<option value="Nepenthus" style = "display:none">Nepenthus</option>
						<option value="Flava" style = "display:none">Flava</option>
						<option value="Red Purple" style = "display:none">Red Purple</option>
						<option value="Leucocephala" style = "display:none">Leucocephala</option>
						<option value="Phormium" style = "display:none">Phormium</option>
				
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="inward">Inward</label> 
					<select name="inward" id="inward" class="input">
					
						<option value="" style="display:none"></option>
						<option value="Greenhouse 1">Greenhouse 1</option>
						<option value="Greenhouse 2">Greenhouse 2</option>
						<option value="Greenhouse 3">Greenhouse 3</option>
						<option value="Greenhouse 4">Greenhouse 4</option>
						<option value="Polyhouse A">Polyhouse A</option>
						<option value="Polyhouse B">Polyhouse B</option>
						<option value="Polyhouse C">Polyhouse C</option>
						<option value="Polyhouse D">Polyhouse D</option>
						<option value="Polyhouse E">Polyhouse E</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="wkno">Week Number</label> 
					<input type="text" name="wkno" id="wkno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkwisemortality">Week Wise Mortality</label> 
					<input type="text" name="wkwisemortality" id="wkwisemortality" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="wkwisesale">Week Wise Sale</label> 
					<input type="text" name="wkwisesale" id="wkwisesale" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="netqtybalance">Net Quantity Balance</label> 
					<input type="text" name="netqtybalance" id="netqtybalance" class="input">
				
				</div>
				
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
		
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Location</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Inward</th>
				<th>Week Number</th>
				<th>Week Wise Mortality</th>
				<th>Week Wise Sale</th>
				<th>Net Quantity Balance</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultShedNet)) {
					
					$Sno = $row['Sno'];
					$Location = $row['Location'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Inward = $row['Inward'];
					$Wk_No = $row['Wk_No'];
					$Wk_Wise_Mortality = $row['Wk_Wise_Mortality'];
					$Wk_Wise_Sale = $row['Wk_Wise_Sale'];
					$Net_Qty_Balance = $row['Net_Qty_Balance'];
						
			?>
					
			<tr onclick="rowNumber(this)">
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Location; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Inward; ?></td>
				<td><?php echo $Wk_No; ?></td>
				<td><?php echo $Wk_Wise_Mortality; ?></td>
				<td><?php echo $Wk_Wise_Sale; ?></td>
				<td><?php echo $Net_Qty_Balance; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="shedNetUpdate.js"></script>
	
	</body>

</html>