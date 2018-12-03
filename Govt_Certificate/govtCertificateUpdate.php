<?php

	include 'dbconfig.php';
	
	$queryGovtCerti = "SELECT * FROM `govt_certificate`";
	$resultGovtCerti = mysqli_query($link, $queryGovtCerti);
	
	if(isset($_POST['update'])) {
		
		$sno 				= $_POST['sno'];
		$ssedImportLicense 	= $_POST['ssedimportlicense'];
		$seedLicense 		= $_POST['seedlicense'];
		$dbtLicense 		= $_POST['dbtlicense'];
		$peqCerti 			= $_POST['peqcerti'];
		$drugsLicense 		= $_POST['drugslicense'];
		$state 				= $_POST['state'];
		$certiNo 			= $_POST['certino'];
		$fromDate 			= $_POST['fromdate'];
		$toDate 			= $_POST['todate'];
		
		if(!empty($sno) & $sno > 0) {
			
			$queryUpdate = "UPDATE `govt_certificate` SET SSED_Importer_License = '".$ssedImportLicense."', Seed_License = '".$seedLicense."', DBT_License = '"
							.$dbtLicense."', PEQ_Certificate = '".$peqCerti."', Drugs_License = '".$drugsLicense."', State = '".$state."', Certificate_No = '"
							.$certiNo."', From_Date = '".$fromDate."', To_Date = '".$toDate."' WHERE Sno = '".$sno."'";
							
			mysqli_query($link, $queryUpdate);
			
			$resultGovtCerti = mysqli_query($link, $queryGovtCerti);
			
		}
		
	}else if(isset($_POST['delete'])) {
			
			
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 

?>

<html>

	<head>
	
	<title>Government Certificate Update</title>
	
	<link rel="stylesheet" type="text/css" href="govtCertificateUpdate.css">
	
	</head>
	
	<body>
	
		<div ID="header">
		
			GOVERNMENT CERTIFICATE UPDATE
		
		</div>
	
		<div id="wrapper">
			<form method="POST" id="update-form">
			
				<div class="form-element">
		
				<label for="sno">Sno</label> 
				<input type="text" name="sno" id="sno" class="input" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="ssedimportlicense">SSED Importer License</label>
					<input type="text" name="ssedimportlicense" id="ssedimportlicense" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="seedlicense">Seed License</label>
					<input type="text" name="seedlicense" id="seedlicense" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="dbtlicense">DBT License</label>
					<input type="text" name="dbtlicense" id="dbtlicense" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="peqcerti">PEQ Certificate</label>
					<input type="text" name="peqcerti" id="peqcerti" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="drugslicense">Drugs License</label>
					<input type="text" name="drugslicense" id="drugslicense" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="state">State</label>
					<input type="text" name="state" id="state" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="certino">Certificate Number</label>
					<input type="text" name="certino" id="certino" class="input">
				
				</div>
			
				<div class="form-element">
		
				<label for="fromdate">From Date</label> 
				<input type="date" name="fromdate" id="fromdate" class="input">
				
				</div>
				
				<div class="form-element">
		
				<label for="todate">To Date</label> 
				<input type="date" name="todate" id="todate" class="input">
				
				</div>
								
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
				
		<table align="center" id="govtCertiTable">
		
			<tr>
			
				<th>Sno</th>
				<th>SSED_Importer_License</th>
				<th>Seed_License</th>
				<th>DBT_License</th>
				<th>PEQ_Certificate</th>
				<th>Drugs_License</th>
				<th>State</th>
				<th>Certificate_No</th>
				<th>From_Date</th>
				<th>To_Date</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultGovtCerti)) {
					
					$Sno = $row['Sno'];
					$SSED_Importer_License = $row['SSED_Importer_License'];
					$Seed_License = $row['Seed_License'];
					$DBT_License = $row['DBT_License'];
					$PEQ_Certificate = $row['PEQ_Certificate'];
					$Drugs_License = $row['Drugs_License'];
					$State = $row['State'];
					$Certificate_No = $row['Certificate_No'];
					$From_Date = date('d-m-Y', strtotime($row['From_Date']));
					$To_Date = date('d-m-Y', strtotime($row['To_Date']));
						
			?>
					
			<tr onclick="rowNumber(this)">
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $SSED_Importer_License; ?></td>
				<td><?php echo $Seed_License; ?></td>
				<td><?php echo $DBT_License; ?></td>
				<td><?php echo $PEQ_Certificate; ?></td>
				<td><?php echo $Drugs_License; ?></td>
				<td><?php echo $State; ?></td>
				<td><?php echo $Certificate_No; ?></td>
				<td><?php echo $From_Date; ?></td>
				<td><?php echo $To_Date; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
			
		<script type="text/javascript" src="govtCertificateUpdate.js"></script>
	
	</body>

</html>