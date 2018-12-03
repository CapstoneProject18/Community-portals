
//---------------------------------------------------------------------------FUNCTION rowNumber(x) STARTS-----------------------------------------------------------------------------

function rowNumber(x) {
	
	var rowNo = x.rowIndex;
	
	var noOfColumns = document.getElementById("govtCertiTable").rows[0].cells.length
	
	for(var i = 0; i < noOfColumns; i++) {
		
		var cellData = document.getElementById("govtCertiTable").rows[rowNo].cells[i].innerHTML;

		var inputs = document.getElementsByClassName("input");
		
		var crop = cellData;
		
		if(i == 8 || i == 9) {
		
			const [day, month, year] = cellData.split("-");
			cellData = year+'-'+month+'-'+day;
			
		}
		
		inputs[i].value = cellData;
		
	}
		
}

//---------------------------------------------------------------------------FUNCTION rowNumber(x) ENDS-------------------------------------------------------------------------------
