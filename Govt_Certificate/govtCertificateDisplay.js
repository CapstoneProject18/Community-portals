//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*function sortBy(getId) {
	
	var sortId = getId.id;

	if(sortId == 'varietySort') {
		
		var sortVariety = document.getElementById('varietySort').value;
		window.location.href = "greenhouseDisplay.php?sortByVariety=" + sortVariety;
		
	} else if(sortId == 'locationSort') {
		
		var sortLocation = document.getElementById('locationSort').value;
		window.location.href = "greenhouseDisplay.php?sortByLocation=" + sortLocation;
		
	}
	
}*/

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

function tableToJson(table) {
	
    var data = [];

    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[0].cells.length; i++) {
		
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase();//.replace(/ /gi,'');
		
    }
	
    data.push(headers);
    // go through cells
    for (var i=1; i<table.rows.length; i++) {

        var tableRow = table.rows[i];
        var rowData = {};

        for (var j=0; j<tableRow.cells.length; j++) {

            rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

        }

        data.push(rowData);
    }       

    return data;
}


function callme(){
	
	var table = tableToJson($('#govtCertiTable').get(0));
	var doc = new jsPDF('l', "pt", [1450, 200], true); //1450


	$.each(table, function(i, row){
		
		$.each(row, function(j,cell){
		
		if(j=="sno" | j==0){
				
			doc.cell(2,10,50,20,cell,i);	
		
		}else {
			
			doc.cell(2,10,140,20,cell,i);
		
		}
		
		
		});
	});

	doc.save('Govt_Certificate.pdf');

}