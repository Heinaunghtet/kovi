$(function() {


function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
  //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
 let arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

  let CSV = '';
  //Set Report title in first row or line

  CSV += ReportTitle + '\r\n\n';

  //This condition will generate the Label/Header
  if (ShowLabel) {
    let row = "";

    //This loop will extract the label from 1st index of on array
    for (let index in arrData[0]) {

      //Now convert each value to string and comma-seprated
      row += index + ',';
    }

    row = row.slice(0, -1);

    //append Label row with line break
    CSV += row + '\r\n';
  }

  //1st loop is to extract each row
  for (let i = 0; i < arrData.length; i++) {
    let row = "";

    //2nd loop will extract each column and convert it in string comma-seprated
    for (let index in arrData[i]) {
      row += '"' + arrData[i][index] + '",';
    }

    row.slice(0, row.length - 1);

    //add a line break after each row
    CSV += row + '\r\n';
  }

  if (CSV == '') {
    alert("Invalid data");
    return;
  }

  //Generate a file name
  let fileName = "MyReport_";
  //this will remove the blank-spaces from the title and replace it with an underscore
  fileName += ReportTitle.replace(/ /g, "_");

  //Initialize file format you want csv or xls
  let uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

  // Now the little tricky part.
  // you can use either>> window.open(uri);
  // but this will not work in some browsers
  // or you will not get the correct file extension    

  //this trick will generate a temp <a /> tag
  let link = document.createElement("a");
  link.href = uri;

  //set the visibility hidden so it will not effect on your web-layout
  link.style = "visibility:hidden";
  link.download = fileName + ".csv";

  //this part will append the anchor tag and remove it after automatic click
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}


function DownloadJsonData(JSONData, FileTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    var CSV = '';
    //This condition will generate the Label/Header
    if (ShowLabel) {
      var row = "";
      //This loop will extract the label from 1st index of on array
      for (var index in arrData[0]) {
        //Now convert each value to string and comma-seprated
        row += index + ',';
      }
      row = row.slice(0, -1);
      //append Label row with line break
      CSV += row + '\r\n';
    }
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
      var row = "";
      //2nd loop will extract each column and convert it in string comma-seprated
      for (var index in arrData[i]) {
        row += '"' + arrData[i][index] + '",';
      }
      row.slice(0, row.length - 1);
      //add a line break after each row
      CSV += row + '\r\n';
    }
    if (CSV == '') {
      alert("Invalid data");
      return;
    }
    //Generate a file name
    var filename = FileTitle + (new Date());
    var blob = new Blob([CSV], {
      type: 'text/csv;charset=utf-8;'
    });
    if (navigator.msSaveBlob) { // IE 10+
      navigator.msSaveBlob(blob, filename);
    } else {
      var link = document.createElement("a");
      if (link.download !== undefined) { // feature detection
        // Browsers that support HTML5 download attribute
        var url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.style = "visibility:hidden";
        link.download = filename + ".csv";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    }
  }


    
	$("#excel").on('change',(function(e) {
		// append file input to form data
		
		let file = this.files[0];
		let url ="http://localhost/kovi/result/excel";
		let formData = new FormData();
		formData.append('excel', file);
		$('.normalform,#csv,#labcsv').hide();


		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data) {
				$('.exceshow').html(data);
				console.log(data);
				$('.submitall,.labclass,.exclass').show();
			 
			},
			error: function(e) {
				$("#err").html(e).fadeIn();
				$('.submitall,.labclass,.exclass').hide();
			}
		});
	}));


	$("#csv").on('change',(function(e) {
		// append file input to form data
		
		let file = this.files[0];
		let url ="http://localhost/kovi/result/excel";
		let formData = new FormData();
		formData.append('csv', file);
		$('.normalform,#excel,#labexcel').hide();

		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data) {
				$('.exceshow').html(data);
				console.log(data);
				$('.submitall,.labclass,.exclass').show();
			 
			},
			error: function(e) {
				$("#err").html(e).fadeIn();
				$('.submitall,.labclass,.exclass').hide();
			}
		});
	}));
	

 $(document).on("click",".selectall",function()
	{
		if($(this).is(":checked"))
		{
			//alert("all");
			$(".select").prop("checked",true);

		}else
		{
			$(".select").prop("checked",false);
		}

	});



 $('#exceloutput').on('click',function(){
 	alert('exceloutput');
 	let url ="http://localhost/kovi/result/output";
 	let type='excel';
 	let name= window.prompt("Edit Data", 'mydata');
 	let id=[];
 	$(".select").each(function(){
			if($(this).is(":checked")){
			id.push($(this).attr("val"));
			}
	});
		alert(id);
		if(id.length===0){
		 		alert("select data");
		} 
		else{
		 	$.post(url, {type,id}, function(data) {
		 		
		 		//console.log(data);
		 		let jsondata=JSON.parse(data);
		 		let outputData=[];
		
		 		for(let i=0;i< jsondata.length;i++){
		 			let second=[];
		 			let j=jsondata[i].length;
		 			//console.log(j);
		 			for(let r=0;r<j;r++){
		 				//console.log(jsondata[i][r]);
		 				let a = jsondata[i][r];
						let b = {};
						b["text"]=a[1];   
						//console.log(b);
						second.push(b);
		 			}
		 			outputData.push(second);
		 		}
		 		
				let fileName = "MyReport_"+name;
				
		 		var options = {
				    fileName: fileName,
				    extension: ".xlsx",
				    sheetName: "Sheet",
				    fileFullName: '"'+fileName+'.xlsx"',
				    header: true,
				    maxCellWidth: 20
				};

				var exampleData = [
                {
                    // "sheetName": "Sheet1",
                    "data": [[{"text":"Name"},{"text":"Position"},{"text":"Office"},{"text":"Age"},{"text":"Start date"},{"text":"Salary"}],[{"text":"Tiger Nixon"},{"text":"System Architect"},{"text":"Edinburgh"},{"text":61},{"text":"2011/04/25"},{"text":"$320,800"}],[{"text":"Garrett Winters"},{"text":"Accountant"},{"text":"Tokyo"},{"text":63},{"text":"2011/07/25"},{"text":"$170,750"}],[{"text":"Ashton Cox"},{"text":"Junior Technical Author"},{"text":"San Francisco"},{"text":66},{"text":"2009/01/12"},{"text":"$86,000"}],[{"text":"Cedric Kelly"},{"text":"Senior Javascript Developer"},{"text":"Edinburgh"},{"text":22},{"text":"2012/03/29"},{"text":"$433,060"}],[{"text":"Airi Satou"},{"text":"Accountant"},{"text":"Tokyo"},{"text":33},{"text":"2008/11/28"},{"text":"$162,700"}],[{"text":"Brielle Williamson"},{"text":"Integration Specialist"},{"text":"New York"},{"text":61},{"text":"2012/12/02"},{"text":"$372,000"}],[{"text":"Herrod Chandler"},{"text":"Sales Assistant"},{"text":"San Francisco"},{"text":59},{"text":"2012/08/06"},{"text":"$137,500"}],[{"text":"Rhona Davidson"},{"text":"Integration Specialist"},{"text":"Tokyo"},{"text":55},{"text":"2010/10/14"},{"text":"$327,900"}]]
                }
                ];
                var excelData = [
                {
                    "sheetName": "Sheet1",
                    "data": outputData
                }
                ];
                
                // console.log(exampleData);
                // console.log(excelData);

		 		Jhxlsx.export(excelData,options);
		 		

    
		 	});
 		}

 });
 $('#csvoutput').on('click',function(){
 	alert('csvoutput');
 	let url ="http://localhost/kovi/result/output";
 	let type='csv';
 	let name= window.prompt("Edit Data", 'mydata');
 	let id=[];
 	$(".select").each(function(){
			if($(this).is(":checked")){
			id.push($(this).attr("val"));
			}
	});
		alert(id);
		if(id.length===0){
		 		alert("select data");
		} 
		else{
		 	$.post(url, {type,id}, function(data) {
		 		console.log(data);
		 		DownloadJsonData(data, name, true);

		 		 // window.open('data:application/vnd.ms-excel,' + encodeURIComponent(data));

			 		// let newWin=window.open('','Print-Window');
				  //   newWin.document.open();
			 		// newWin.document.write('<html><head><title></title><link rel="stylesheet" type="text/css" href="css/mainpage.css"></head><body onload="window.print();window.close()"><div>'+data+'</div></body></html>')
			 		// newWin.document.close();
		 	});
 	    }
 });


  

});










