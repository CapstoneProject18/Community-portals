
//----------------------------------------------------------------------------FUNCTION noOfRows() STARTS------------------------------------------------------------------------------

function noOfRows() {
	
	var totalRows = document.getElementById("labTable").rows.length;
		
	document.getElementById("sno").value = (totalRows);
	
}

//----------------------------------------------------------------------------FUNCTION noOfRows() ENDS--------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

noOfRows();

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

function fieldsAppear(x) {
		
	if(x == "imported") {
		
		var y = document.getElementsByClassName('importedfields');
		y[0].style.display = "block";
		y[1].style.display = "block";
		y[2].style.display = "block";
		y[3].style.display = "block";
	
	}else {
		
		var y = document.getElementsByClassName('importedfields');
		y[0].style.display = "none";
		y[1].style.display = "none";
		y[2].style.display = "none";
		y[3].style.display = "none";
		
	}
	
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

function cropChange() {
	
	var crop1 = document.getElementById("crop").options[1].selected;
	var crop2 = document.getElementById("crop").options[2].selected;
	var crop3 = document.getElementById("crop").options[3].selected;
	var crop4 = document.getElementById("crop").options[4].selected;
	var crop5 = document.getElementById("crop").options[5].selected;
	var crop6 = document.getElementById("crop").options[6].selected;
	var crop7 = document.getElementById("crop").options[7].selected;
	var crop8 = document.getElementById("crop").options[8].selected;
	var crop9 = document.getElementById("crop").options[9].selected;
	var crop10 = document.getElementById("crop").options[10].selected;
	
	if(crop1 == true) {
	
		document.getElementById("variety").options[1].selected = "true";
		document.getElementById("variety").options[1].style.display = "block";
		document.getElementById("variety").options[2].style.display = "block";
		document.getElementById("variety").options[3].style.display = "block";
		document.getElementById("variety").options[4].style.display = "block";
		document.getElementById("variety").options[5].style.display = "block";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop2 == true) {
	
		document.getElementById("variety").options[6].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "block";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop3 == true) {
	
		document.getElementById("variety").options[7].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "block";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop4 == true) {
	
		document.getElementById("variety").options[8].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "block";
		document.getElementById("variety").options[9].style.display = "block";
		document.getElementById("variety").options[10].style.display = "block";
		document.getElementById("variety").options[11].style.display = "block";
		document.getElementById("variety").options[12].style.display = "block";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop5 == true) {
		
		document.getElementById("variety").options[13].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "block";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop6 == true) {
	
		document.getElementById("variety").options[14].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "block";
		document.getElementById("variety").options[15].style.display = "block";
		document.getElementById("variety").options[16].style.display = "block";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop7 == true) {
	
		document.getElementById("variety").options[17].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "block";
		document.getElementById("variety").options[18].style.display = "block";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop8 == true) {
	
		document.getElementById("variety").options[19].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "block";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop9 == true) {
	
		document.getElementById("variety").options[20].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "block";
		document.getElementById("variety").options[21].style.display = "block";
		document.getElementById("variety").options[22].style.display = "block";
		document.getElementById("variety").options[23].style.display = "none";
	
	} else if(crop10 == true) {
	
		document.getElementById("variety").options[23].selected = "true";
		document.getElementById("variety").options[1].style.display = "none";
		document.getElementById("variety").options[2].style.display = "none";
		document.getElementById("variety").options[3].style.display = "none";
		document.getElementById("variety").options[4].style.display = "none";
		document.getElementById("variety").options[5].style.display = "none";
		document.getElementById("variety").options[6].style.display = "none";
		document.getElementById("variety").options[7].style.display = "none";
		document.getElementById("variety").options[8].style.display = "none";
		document.getElementById("variety").options[9].style.display = "none";
		document.getElementById("variety").options[10].style.display = "none";
		document.getElementById("variety").options[11].style.display = "none";
		document.getElementById("variety").options[12].style.display = "none";
		document.getElementById("variety").options[13].style.display = "none";
		document.getElementById("variety").options[14].style.display = "none";
		document.getElementById("variety").options[15].style.display = "none";
		document.getElementById("variety").options[16].style.display = "none";
		document.getElementById("variety").options[17].style.display = "none";
		document.getElementById("variety").options[18].style.display = "none";
		document.getElementById("variety").options[19].style.display = "none";
		document.getElementById("variety").options[20].style.display = "none";
		document.getElementById("variety").options[21].style.display = "none";
		document.getElementById("variety").options[22].style.display = "none";
		document.getElementById("variety").options[23].style.display = "block";
	
	}
	
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------