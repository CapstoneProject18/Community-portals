<?php

	include 'dbconfig.php';
	
	$queryGreenhouse = "SELECT * FROM `greenhouse`";
	$resultGreenhouse = mysqli_query($link, $queryGreenhouse);
	
	if(isset($_POST['update'])) {
		
		$sno 				= $_POST['sno'];
		$date 				= $_POST['date'];
		$gpNo 				= $_POST['gpno'];
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$inwardQty 			= $_POST['inwardqty'];
		$dateOfPlanting 	= $_POST['dateofplanting'];
		$rejection 			= $_POST['rejection'];
		$mortality 			= $_POST['mortality'];
		$location 			= $_POST['location'];
		$plantingQty 		= $_POST['plantingqty'];
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `greenhouse` SET Date = '".$date."', GP_No = '".$gpNo."', Crop = '".$crop."', Variety = '".$variety."', Inward_Qty = '".$inwardQty
							."', Date_Of_Planting = '".$dateOfPlanting."', Rejection = '".$rejection."', Mortality = '".$mortality."', Location = '".$location."', Planting_Qty = '"
							.$plantingQty."' WHERE Sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			$resultGreenhouse = mysqli_query($link, $queryGreenhouse);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 

?>

<html>

	<head>
	
	<title>Greenhouse Update</title>
	
	<link rel="stylesheet" type="text/css" href="greenhouseUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			GREENHOUSE UPDATE
		
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
				
					<label for="gpno">G.P. Number</label>
					<input type="text" name="gpno" id="gpno" class="input">
				
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
				
					<label for="inwardqty">Inward Quantity</label> 
					<input type="text" name="inwardqty" id="inwardqty" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="dateofplanting">Date of planting</label> 
					<input type="date" name="dateofplanting" id="dateofplanting"class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="rejection">Rejection</label> 
					<input type="text" name="rejection" id="rejection" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="mortality">Mortality</label> 
					<input type="text" name="mortality" id="mortality" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="location">Location</label> 
					
					<select name="location" id="location" class="input">
					
						<option value="" style="display:none" ></option>
						<option value="Greenhouse 1">Greenhouse 1</option>
						<option value="Greenhouse 2">Greenhouse 2</option>
						<option value="Greenhouse 3">Greenhouse 3</option>
						<option value="Greenhouse 4">Greenhouse 4</option>
					
					</select>
				
				</div>
				
				<div class="form-element">
				
					<label for="plantingqty">Planting Quantity</label> 
					<input type="text" name="plantingqty" id="plantingqty" class="input">
				
				</div>
								
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
				
		<table align="center" id="greenhouseTable">
		
			<tr>
			
				<th>Sno</th>
				<th>Date</th>
				<th>G.P. Number</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Inward Quantity</th>
				<th>Date of Planting</th>
				<th>Rejection</th>
				<th>Mortality</th>
				<th>Location</th>
				<th>Planting Quantity</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultGreenhouse)) {
					
					$Sno = $row['Sno'];
					$Date = date('d-m-Y', strtotime($row['Date']));
					$GP_No = $row['GP_No'];
					$Crop = $row['Crop'];
					$Variety = $row['Variety'];
					$Inward_Qty = $row['Inward_Qty'];
					$Date_of_Planting = date('d-m-Y', strtotime($row['Date_of_Planting']));
					$Rejection = $row['Rejection'];
					$Mortality = $row['Mortality'];
					$Location = $row['Location'];
					$Planting_Qty = $row['Planting_Qty'];
						
			?>
					
			<tr onclick="rowNumber(this)">
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Date; ?></td>
				<td><?php echo $GP_No; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Inward_Qty; ?></td>
				<td><?php echo $Date_of_Planting; ?></td>
				<td><?php echo $Rejection; ?></td>
				<td><?php echo $Mortality; ?></td>
				<td><?php echo $Location; ?></td>
				<td><?php echo $Planting_Qty; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
			
		<script type="text/javascript" src="greenhouseUpdate.js"></script>
	
	</body>

</html>