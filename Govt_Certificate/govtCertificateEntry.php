<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$queryGovtCerti = "SELECT * FROM `govt_certificate` ORDER BY Sno DESC";
	$resultGovtCerti = mysqli_query($link, $queryGovtCerti);
	
	if(isset($_POST['submit'])) {
		
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
		
		$ssedImportLicense 	= !empty($ssedImportLicense) ? "'".$ssedImportLicense."'" : "NULL";
		$seedLicense 		= !empty($seedLicense) ? "'".$seedLicense."'" : "NULL";
		$dbtLicense 		= !empty($dbtLicense) ? "'".$dbtLicense."'" : "NULL";
		$peqCerti 			= !empty($peqCerti) ? "'".$peqCerti."'" : "NULL";
		$drugsLicense 		= !empty($drugsLicense) ? "'".$drugsLicense."'" : "NULL";
		$state 				= !empty($state) ? "'".$state."'" : "NULL";
		$certiNo 			= !empty($certiNo) ? "'".$certiNo."'" : "NULL";
		$fromDate 			= !empty($fromDate) ? "'".$fromDate."'" : "NULL";
		$toDate 			= !empty($toDate) ? "'".$toDate."'" : "NULL";
						
		if(!empty($sno) & $sno > 0) {
			
			$query = "INSERT INTO `govt_certificate` (Sno, SSED_Importer_License, Seed_License, DBT_License, PEQ_Certificate, Drugs_License, State, Certificate_No, 
						From_Date, To_Date) VALUES (".$sno.", ".$ssedImportLicense.", ".$seedLicense.", ".$dbtLicense.", ".$peqCerti.", ".$drugsLicense.", "
						.$state.", ".$certiNo.", ".$fromDate.", ".$toDate.")";
										
			mysqli_query($link, $query);
			$resultGovtCerti = mysqli_query($link, $queryGovtCerti);
			
		} else {
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 		
	
?>

<html>

	<head>
	
	<title>Government Certificate Entry</title>
	
	<link rel="stylesheet" type="text/css" href="govtCertificateEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			GOVERNMENT CERTIFICATE ENTRY
		
		</div>
	
		<div id="wrapper">
		
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label>
				<input type="text" name="sno" id="sno" script="noOfRows();" readonly>
				
				</div>
				
				<div class="form-element">
				
					<label for="ssedimportlicense">SSED Importer License</label>
					<input type="text" name="ssedimportlicense" id="ssedimportlicense">
				
				</div>
				
				<div class="form-element">
				
					<label for="seedlicense">Seed License</label>
					<input type="text" name="seedlicense" id="seedlicense">
				
				</div>
				
				<div class="form-element">
				
					<label for="dbtlicense">DBT License</label>
					<input type="text" name="dbtlicense" id="dbtlicense">
				
				</div>
				
				<div class="form-element">
				
					<label for="peqcerti">PEQ Certificate</label>
					<input type="text" name="peqcerti" id="peqcerti">
				
				</div>
				
				<div class="form-element">
				
					<label for="drugslicense">Drugs License</label>
					<input type="text" name="drugslicense" id="drugslicense">
				
				</div>
				
				<div class="form-element">
				
					<label for="state">State</label>
					<input type="text" name="state" id="state">
				
				</div>
				
				<div class="form-element">
				
					<label for="certino">Certificate Number</label>
					<input type="text" name="certino" id="certino">
				
				</div>
			
				<div class="form-element">
		
				<label for="fromdate">From Date</label> 
				<input type="date" name="fromdate" id="fromdate">
				
				</div>
				
				<div class="form-element">
		
				<label for="todate">To Date</label> 
				<input type="date" name="todate" id="todate">
				
				</div>
								
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Form Submission?")'>
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
					
			<tr>
				
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
		
		<script type="text/javascript" src="govtCertificateEntry.js"></script>
	
	</body>

</html>

