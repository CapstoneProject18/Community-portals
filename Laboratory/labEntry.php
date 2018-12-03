<?php

	session_start();
	
	$authorised = $_SESSION['Username'];

	include 'dbconfig.php';
		
	$queryLab = "SELECT * FROM `lab` ORDER BY Sno DESC";
	$resultLab = mysqli_query($link, $queryLab);
	
	$queryImported = "SELECT * FROM `imported` ORDER BY Sno DESC";
	$resultImported = mysqli_query($link, $queryImported);
	
	if(isset($_POST['submit'])) {
		
		$rowImported = mysqli_fetch_assoc($resultImported);
		$SnoImported = $rowImported['Sno'];
		
		$importedFlag = 0;
		$sno 		  = $_POST['sno'];
		$digitCode20  = $_POST['20digitcode'];
		$originRadio  = $_POST['originradio'];
		$firmName;	
		$farmerName;
		$origin;	
		$location;
		if($originRadio == "Imported") {
			
			$firmName 	= $_POST['firmname'];
			$farmerName = $_POST['farmername'];
			$origin 	= $_POST['origin'];
			$location 	= $_POST['location'];
			$SnoImported = $SnoImported + 1;
			
			$importedFlag = 1; 
						
		}
		$crop 				= $_POST['crop'];
		$variety 			= $_POST['variety'];
		$gPassNo 			= $_POST['gpassno'];
		$batchno		 	= $_POST['batchno'];
		$batchSize 			= $_POST['batchsize'];
		$suckersNo 			= $_POST['suckersno'];
		$rejection 			= $_POST['rejection'];
		$balance 			= $_POST['balance'];
		$suckersInitiated	= $_POST['suckersinitiated'];
		$contamination 		= $_POST['contamination'];
		$netBalance 		= $_POST['netbalance'];
		$noSampleWithdrawn 	= $_POST['nosamplewithdrawn'];
		$dateSampleGovt 	= $_POST['datesamplegovt'];
		$sampleCenter 		= $_POST['samplecenter'];
		$dateReportReceived = $_POST['datereportreceived'];
		$letterRef 			= $_POST['letterref'];
		$dateLetterReceive 	= $_POST['dateletterreceive'];
		$sampleSendCause 	= $_POST['samplesendcause'];
		$reportResult 		= $_POST['reportresult'];
		$remarks 			= $_POST['remarks'];
		
		$digitCode20 		= !empty($digitCode20) ? "'".$digitCode20."'" : "NULL";
		$originRadio 		= !empty($originRadio) ? "'".$originRadio."'" : "NULL";
		if($importedFlag == 1) {
			
			$firmName 	= !empty($firmName) ? "'".$firmName."'" : "NULL";
			$farmerName = !empty($farmerName) ? "'".$farmerName."'" : "NULL";
			$origin 	= !empty($origin) ? "'".$origin."'" : "NULL";
			$location 	= !empty($location) ? "'".$location."'" : "NULL";
						
		}
		$crop 				= !empty($crop) ? "'".$crop."'" : "NULL";
		$variety 			= !empty($variety) ? "'".$variety."'" : "NULL";
		$gPassNo 			= !empty($gPassNo) ? "'".$gPassNo."'" : "NULL";
		$batchno 			= !empty($batchno) ? "'".$batchno."'" : "NULL";
		$batchSize 			= !empty($batchSize) ? "'".$batchSize."'" : "NULL";
		$suckersNo 			= !empty($suckersNo) ? "'".$suckersNo."'" : "NULL";
		$rejection 			= !empty($rejection) ? "'".$rejection."'" : "NULL";
		$balance 			= !empty($balance) ? "'".$balance."'" : "NULL";
		$suckersInitiated 	= !empty($suckersInitiated) ? "'".$suckersInitiated."'" : "NULL";
		$contamination 		= !empty($contamination) ? "'".$contamination."'" : "NULL";
		$netBalance 		= !empty($netBalance) ? "'".$netBalance."'" : "NULL";
		$noSampleWithdrawn 	= !empty($noSampleWithdrawn) ? "'".$noSampleWithdrawn."'" : "NULL";
		$dateSampleGovt 	= !empty($dateSampleGovt) ? "'".$dateSampleGovt."'" : "NULL";
		$sampleCenter 		= !empty($sampleCenter) ? "'".$sampleCenter."'" : "NULL";
		$dateReportReceived = !empty($dateReportReceived) ? "'".$dateReportReceived."'" : "NULL";
		$letterRef 			= !empty($letterRef) ? "'".$letterRef."'" : "NULL";
		$dateLetterReceive 	= !empty($dateLetterReceive) ? "'".$dateLetterReceive."'" : "NULL";
		$sampleSendCause 	= !empty($sampleSendCause) ? "'".$sampleSendCause."'" : "NULL";
		$reportResult 		= !empty($reportResult) ? "'".$reportResult."'" : "NULL";
		$remarks 			= !empty($remarks) ? "'".$remarks."'" : "NULL";
						
		if(!empty($sno) & $sno > 0) {
			
			if($importedFlag == 0) {
				
				$query = "INSERT INTO `lab` (Sno, 20_Digit_Code, Origin, Crop, Variety, Gatepass_No, Batch_No, Batch_Size, No_Of_Suckers, Rejection, Balance, 
					Suckers_Initiated, Contamination, Net_Balance, No_Of_Sample_Withdrawn, Date_Sample_Govt, Sample_Center, Report_Receive_Date, 
					Letter_Reference, Letter_Date, Cause_Sending_Sample, Report_Result, Remarks) VALUES (".$sno.", ".$digitCode20.", ".$originRadio.", "
					.$crop.", ".$variety.", ".$gPassNo.", ".$batchno.", ".$batchSize.", ".$suckersNo.", ".$rejection.", ".$balance.", ".$suckersInitiated.", "
					.$contamination.", ".$netBalance.", ".$noSampleWithdrawn.", ".$dateSampleGovt.", ".$sampleCenter.", ".$dateReportReceived.", ".$letterRef
					.", ".$dateLetterReceive.", ".$sampleSendCause.", ".$reportResult.", ".$remarks.")";
										
				mysqli_query($link, $query);
				$resultLab = mysqli_query($link, $queryLab);
			
			}else if($importedFlag == 1) {
				
				$query = "INSERT INTO `lab` (Sno, 20_Digit_Code, Origin, Crop, Variety, Gatepass_No, Batch_No, Batch_Size, No_Of_Suckers, Rejection, Balance, 
					Suckers_Initiated, Contamination, Net_Balance, No_Of_Sample_Withdrawn, Date_Sample_Govt, Sample_Center, Report_Receive_Date, 
					Letter_Reference, Letter_Date, Cause_Sending_Sample, Report_Result, Remarks) VALUES (".$sno.", ".$digitCode20.", ".$originRadio.", "
					.$crop.", ".$variety.", ".$gPassNo.", ".$batchno.", ".$batchSize.", ".$suckersNo.", ".$rejection.", ".$balance.", ".$suckersInitiated.", "
					.$contamination.", ".$netBalance.", ".$noSampleWithdrawn.", ".$dateSampleGovt.", ".$sampleCenter.", ".$dateReportReceived.", ".$letterRef
					.", ".$dateLetterReceive.", ".$sampleSendCause.", ".$reportResult.", ".$remarks.")";
										
				mysqli_query($link, $query);
				
				$queryImported = "INSERT INTO `imported` (Sno, 20_Digit_Code, Firm_Name, Farmer_Name, Origin, Location) VALUES (".$SnoImported.", ".$digitCode20.", ".$firmName.", ".$farmerName.", ".$origin.", "
								.$location.")";
								
				mysqli_query($link, $queryImported);
				$resultLab = mysqli_query($link, $queryLab);
				
			}
			
		}else {	
			
			echo "<script type='text/javascript'> alert('Serial number is wrong!'); </script>";
			
		}
		
	}else if(isset($_POST['homeSubmit'])) {
		
		header("Location: ..\Shaili_Website\biotech.php");
		
	} 		
	
?>

<html>

	<head>
	
	<title>Lab Entry</title>
	
	<link rel="stylesheet" type="text/css" href="labEntry.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			LAB ENTRY
		
		</div>
	
		<div id="wrapper">
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label>
				<input type="text" name="sno" id="sno" script="noOfRows();" readonly>
				
				</div>
				
				<div class="form-element">
		
				<label for="20digitcode">20 Digit Code</label>
				<input type="text" name="20digitcode" id="20digitcode">
				
				</div>
				
				<div class="form-element">
				
					<label>Origin</label>
					<input type="radio" name="originradio" id="indigenous" value="Indigenous" onclick="fieldsAppear(this.id);"><span>Indigenous</span>
					<input type="radio" name="originradio" id="imported" value="Imported" onclick="fieldsAppear(this.id);"><span>Imported</span>
					<input type="radio" name="originradio" id="other" value="Other" onclick="fieldsAppear(this.id);"><span>Other</span>
					
				</div>
				
				<div class="form-element importedfields">
		
				<label for="firmname">Firm Name</label>
				<input type="text" name="firmname" id="firmname">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="farmername">Farmer Name</label>
				<input type="text" name="farmername" id="farmername">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="origin">Origin</label>
				<input type="text" name="origin" id="origin">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="location">Location</label>
				<input type="text" name="location" id="location">
				
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
				
					<label for="gpassno">Gatepass Number</label>
					<input type="text" name="gpassno" id="gpassno">
				
				</div>
				
				<div class="form-element">
				
					<label for="batchno">Batch Number</label>
					<input type="text" name="batchno" id="batchno">
				
				</div>
				
				<div class="form-element">
				
					<label for="batchsize">Batch Size</label>
					<input type="text" name="batchsize" id="batchsize">
				
				</div>
				
				<div class="form-element">
				
					<label for="suckersno">Suckers Number</label>
					<input type="text" name="suckersno" id="suckersno">
				
				</div>
				
				<div class="form-element">
				
					<label for="rejection">Rejection</label> 
					<input type="text" name="rejection" id="rejection">
				
				</div>
				
				<div class="form-element">
				
					<label for="balance">Balance</label> 
					<input type="text" name="balance" id="balance">
				
				</div>
				
				<div class="form-element">
				
					<label for="suckersinitiated">Suckers Initiated</label>
					<input type="text" name="suckersinitiated" id="suckersinitiated">
				
				</div>
				
				<div class="form-element">
				
					<label for="contamination">Contamination</label> 
					<input type="text" name="contamination" id="contamination">
				
				</div>
				
				<div class="form-element">
				
					<label for="netbalance">Net Balance</label> 
					<input type="text" name="netbalance" id="netbalance">
				
				</div>
				
				<div class="form-element">
				
					<label for="nosamplewithdrawn">Sample Withdrawn</label> 
					<input type="text" name="nosamplewithdrawn" id="nosamplewithdrawn">
				
				</div>
							
				<div class="form-element">
		
				<label for="datesamplegovt">Sample To Govt.</label> 
				<input type="date" name="datesamplegovt" id="datesamplegovt">
				
				</div>
				
				<div class="form-element">
				
					<label for="samplecenter">Sample Center</label> 
					<input type="text" name="samplecenter" id="samplecenter">
				
				</div>
				
				<div class="form-element">
		
				<label for="datereportreceived">Report Received</label> 
				<input type="date" name="datereportreceived" id="datereportreceived">
				
				</div>
				
				<div class="form-element">
				
					<label for="letterref">Letter Reference</label> 
					<input type="text" name="letterref" id="letterref">
				
				</div>
				
				<div class="form-element">
		
				<label for="dateletterreceive">Letter Date</label> 
				<input type="date" name="dateletterreceive" id="dateletterreceive">
				
				</div>
				
				<div class="form-element">
				
					<label>Sample Sending Cause</label>
					
					<input type="radio" name="samplesendcause" id="virusindexing" value="Virus Indexing"><span>Virus Indexing</span>
					<input type="radio" name="samplesendcause" id="geneticinfidelity" value="Genetic Infidelity"><span>Genetic Infidelity</span>
					<input type="radio" name="samplesendcause" id="other" value="Other"><span>Other</span>
				
				</div>
				
				<div class="form-element">
				
					<label>Report Result</label> 
					
					<input type="radio" name="reportresult" id="positive" value="Positive"><span>Positive</span>
					<input type="radio" name="reportresult" id="negative" value="Negative"><span>Negative</span>
					<input type="radio" name="reportresult" id="unclear" value="Unclear"><span>Unclear</span>
					<input type="radio" name="reportresult" id="other" value="Other"><span>Other</span>
				
				</div>
				
				<div class="form-element">
				
					<label for="remarks">Remarks</label> 
					<input type="text" name="remarks" id="remarks">
				
				</div>
												
				<input type="submit" name="submit" value="Submit" id="submitButton" onclick='return window.confirm("Confirm Form Submission?")'>
				<input type="submit" name="homeSubmit" value="Home" id="homeButton">
			
			</form>
		
		</div>
		
		<table align="center" id="labTable">
		
			<tr>
			
				<th>Sno</th>
				<th>20 Digit Code</th>
				<th>Origin</th>
				<th>Crop</th>
				<th>Variety</th>
				<th>Gatepass Number</th>
				<th>Batch Number</th>
				<th>Batch Size</th>
				<th>Suckers Number</th>
				<th>Rejection</th>
				<th>Balance</th>
				<th>Suckers Initiated</th>
				<th>Contamination</th>
				<th>Net Balance</th>
				<th>Sample Withdrawn</th>
				<th>Sample to Govt</th>
				<th>Sample Center</th>
				<th>Report Receive</th>
				<th>Letter Reference</th>
				<th>Letter Date</th>
				<th>Cause Sending Sample</th>
				<th>Report Result</th>
				<th>Remarks</th>
			
			</tr>
			
			<?php
			
				while($row = mysqli_fetch_assoc($resultLab)) {
					
						$Sno = $row['Sno'];
						$Digit_Code_20 = $row['20_Digit_Code'];
						$Origin = $row['Origin'];
						$Crop = $row['Crop'];
						$Variety = $row['Variety'];
						$Gatepass_No = $row['Gatepass_No'];
						$Batch_No = $row['Batch_No'];
						$Batch_Size = $row['Batch_Size'];
						$No_Of_Suckers = $row['No_Of_Suckers'];
						$Rejection = $row['Rejection'];
						$Balance = $row['Balance'];
						$Suckers_Initiated = $row['Suckers_Initiated'];
						$Contamination = $row['Contamination'];
						$Net_Balance = $row['Net_Balance'];
						$No_Of_Sample_Withdrawn = $row['No_Of_Sample_Withdrawn'];
						$Date_Sample_Govt = date('d-m-Y', strtotime($row['Date_Sample_Govt']));
						$Sample_Center = $row['Sample_Center'];
						$Report_Receive_Date = date('d-m-Y', strtotime($row['Report_Receive_Date']));
						$Letter_Reference = $row['Letter_Reference'];
						$Letter_Date = date('d-m-Y', strtotime($row['Letter_Date']));
						$Cause_Sending_Sample = $row['Cause_Sending_Sample'];
						$Report_Result = $row['Report_Result'];
						$Remarks = $row['Remarks'];
						
			?>
					
			<tr>
				
				<td><?php echo $Sno; ?></td>
				<td><?php echo $Digit_Code_20; ?></td>
				<td><?php echo $Origin; ?></td>
				<td><?php echo $Crop; ?></td>
				<td><?php echo $Variety; ?></td>
				<td><?php echo $Gatepass_No; ?></td>
				<td><?php echo $Batch_No; ?></td>
				<td><?php echo $Batch_Size; ?></td>
				<td><?php echo $No_Of_Suckers; ?></td>
				<td><?php echo $Rejection; ?></td>
				<td><?php echo $Balance; ?></td>
				<td><?php echo $Suckers_Initiated; ?></td>
				<td><?php echo $Contamination; ?></td>
				<td><?php echo $Net_Balance; ?></td>
				<td><?php echo $No_Of_Sample_Withdrawn; ?></td>
				<td><?php echo $Date_Sample_Govt; ?></td>
				<td><?php echo $Sample_Center; ?></td>
				<td><?php echo $Report_Receive_Date; ?></td>
				<td><?php echo $Letter_Reference; ?></td>
				<td><?php echo $Letter_Date; ?></td>
				<td><?php echo $Cause_Sending_Sample; ?></td>
				<td><?php echo $Report_Result; ?></td>
				<td><?php echo $Remarks; ?></td>
				
			</tr>
				
			<?php } ?>
		
		</table>
		
		<script type="text/javascript" src="labEntry.js"></script>
	
	</body>

</html>

