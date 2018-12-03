<?php

	include 'dbconfig.php';
		
	$queryLab = "SELECT * FROM `lab`";
	$resultLab = mysqli_query($link, $queryLab);
	
	$queryImported = "SELECT * FROM `imported`";
	$resultImported = mysqli_query($link, $queryImported);
	
	if(isset($_POST['update'])) {
		
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
						
		if(!empty($sno) & $sno > 0) {
			
			if($importedFlag == 1) {
				
				$queryUpdateLab = "UPDATE `lab` SET 20_Digit_Code = '".$digitCode20."', Origin = '".$originRadio."', Crop = '".$crop."', Variety = '".$variety."', Gatepass_No = '"
								.$gPassNo."', Batch_No = '".$batchno."', Batch_Size = '".$batchSize."', No_Of_Suckers = '".$suckersNo."', Rejection = '".$rejection."', Balance = '"
							.$balance."', Suckers_Initiated = '".$suckersInitiated."', Contamination = '".$contamination."', Net_Balance = '".$netBalance.
							"', No_Of_Sample_Withdrawn = '".$noSampleWithdrawn."', Date_Sample_Govt = '".$dateSampleGovt."', Sample_Center = '".$sampleCenter.
							"', Report_Receive_Date = '".$dateReportReceived."', Letter_Reference = '".$letterRef."', Letter_Date = '".$dateLetterReceive.
							"', Cause_Sending_Sample = '".$sampleSendCause."', Report_Result = '".$reportResult."', Remarks = '".$remarks."' WHERE Sno = '".$sno."'";
										
				mysqli_query($link, $queryUpdate);
				
				$queryUpdateImported = "UPDATE `imported` SET 20_Digit_Code = '".$digitCode20."', Firm_Name = '".$firmName."', Farmer_Name = '".$farmerName."', Origin = '".$origin
										."' Location = '".$location."' WHERE 20_Digit_Code = '".$digitCode20."'";
										
				mysqli_query($link, $queryUpdateImported);
				$resultLab = mysqli_query($link, $queryLab);
			
			}else if($importedFlag == 0) {
				
				$queryUpdateLab = "UPDATE `lab` SET 20_Digit_Code = '".$digitCode20."', Origin = '".$originRadio."', Crop = '".$crop."', Variety = '".$variety."', Gatepass_No = '"
								.$gPassNo."', Batch_No = '".$batchno."', Batch_Size = '".$batchSize."', No_Of_Suckers = '".$suckersNo."', Rejection = '".$rejection."', Balance = '"
							.$balance."', Suckers_Initiated = '".$suckersInitiated."', Contamination = '".$contamination."', Net_Balance = '".$netBalance.
							"', No_Of_Sample_Withdrawn = '".$noSampleWithdrawn."', Date_Sample_Govt = '".$dateSampleGovt."', Sample_Center = '".$sampleCenter.
							"', Report_Receive_Date = '".$dateReportReceived."', Letter_Reference = '".$letterRef."', Letter_Date = '".$dateLetterReceive.
							"', Cause_Sending_Sample = '".$sampleSendCause."', Report_Result = '".$reportResult."', Remarks = '".$remarks."' WHERE Sno = '".$sno."'";
										
				mysqli_query($link, $queryUpdate);
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
	
	<title>Lab Update</title>
	
	<link rel="stylesheet" type="text/css" href="labUpdate.css">
		
	</head>
	
	<body>
	
		<div ID="header">
		
			LAB UPDATE
		
		</div>
	
		<div id="wrapper">
		
			<form method="POST">
			
				<div class="form-element">
		
				<label for="sno">Sno</label>
				<input type="text" name="sno" id="sno" class="input" readonly>
				
				</div>
				
				<div class="form-element">
		
				<label for="20digitcode">20 Digit Code</label>
				<input type="text" name="20digitcode" id="20digitcode" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label>Origin</label>
					<input type="radio" name="originradio" id="indigenous" value="Indigenous" class="input" onclick="fieldsAppear(this.id);"><span>Indigenous</span>
					<input type="radio" name="originradio" id="imported" value="Imported" class="input" onclick="fieldsAppear(this.id);"><span>Imported</span>
					<input type="radio" name="originradio" id="other" value="Other" class="input" onclick="fieldsAppear(this.id);"><span>Other</span>
					
				</div>
				
				<div class="form-element importedfields">
		
				<label for="firmname">Firm Name</label>
				<input type="text" name="firmname" id="firmname" class="input">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="farmername">Farmer Name</label>
				<input type="text" name="farmername" id="farmername" class="input">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="origin">Origin</label>
				<input type="text" name="origin" id="origin" class="input">
				
				</div>
				
				<div class="form-element importedfields">
		
				<label for="location">Location</label>
				<input type="text" name="location" id="location" class="input">
				
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
				
					<label for="gpassno">Gatepass Number</label>
					<input type="text" name="gpassno" id="gpassno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="batchno">Batch Number</label>
					<input type="text" name="batchno" id="batchno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="batchsize">Batch Size</label>
					<input type="text" name="batchsize" id="batchsize" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="suckersno">Suckers Number</label>
					<input type="text" name="suckersno" id="suckersno" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="rejection">Rejection</label> 
					<input type="text" name="rejection" id="rejection" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="balance">Balance</label> 
					<input type="text" name="balance" id="balance" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="suckersinitiated">Suckers Initiated</label>
					<input type="text" name="suckersinitiated" id="suckersinitiated" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="contamination">Contamination</label> 
					<input type="text" name="contamination" id="contamination" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="netbalance">Net Balance</label> 
					<input type="text" name="netbalance" id="netbalance" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="nosamplewithdrawn">Sample Withdrawn</label> 
					<input type="text" name="nosamplewithdrawn" id="nosamplewithdrawn" class="input">
				
				</div>
							
				<div class="form-element">
		
				<label for="datesamplegovt">Sample To Govt.</label> 
				<input type="date" name="datesamplegovt" id="datesamplegovt" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="samplecenter">Sample Center</label> 
					<input type="text" name="samplecenter" id="samplecenter" class="input">
				
				</div>
				
				<div class="form-element">
		
				<label for="datereportreceived">Report Received</label> 
				<input type="date" name="datereportreceived" id="datereportreceived" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label for="letterref">Letter Reference</label> 
					<input type="text" name="letterref" id="letterref" class="input">
				
				</div>
				
				<div class="form-element">
		
				<label for="dateletterreceive">Letter Date</label> 
				<input type="date" name="dateletterreceive" id="dateletterreceive" class="input">
				
				</div>
				
				<div class="form-element">
				
					<label>Sample Sending Cause</label>
					
					<input type="radio" name="samplesendcause" id="virusindexing" value="Virus Indexing" class="input"><span>Virus Indexing</span>
					<input type="radio" name="samplesendcause" id="geneticinfidelity" value="Genetic Infidelity" class="input"><span>Genetic Infidelity</span>
					<input type="radio" name="samplesendcause" id="other" value="Other" class="input"><span>Other</span>
				
				</div>
				
				<div class="form-element">
				
					<label>Report Result</label> 
					
					<input type="radio" name="reportresult" id="positive" value="Positive" class="input"><span>Positive</span>
					<input type="radio" name="reportresult" id="negative" value="Negative" class="input"><span>Negative</span>
					<input type="radio" name="reportresult" id="unclear" value="Unclear" class="input"><span>Unclear</span>
					<input type="radio" name="reportresult" id="other" value="Other" class="input"><span>Other</span>
				
				</div>
				
				<div class="form-element">
				
					<label for="remarks">Remarks</label> 
					<input type="text" name="remarks" id="remarks" class="input">
				
				</div>
												
				<input type="submit" name="update" value="Update" id="updateButton" onclick='return window.confirm("Confirm Record Update?")'>
				<input type="submit" name="delete" value="Delete" id="deleteButton" onclick='return window.confirm("Confirm Record Delete?")'>
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
					
			<tr onclick="rowNumber(this)">
				
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
		
		<script type="text/javascript" src="labUpdate.js"></script>
	
	</body>

</html>

