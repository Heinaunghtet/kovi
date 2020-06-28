$(function() {


    

    function previewedit(input, placeToInsert) {

	  if (input.files) {
            let filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
            	let name = event.target.files[i].name;
	            let lastDot = name.lastIndexOf('.');

	            let fileName = name.substring(0, lastDot);
	            let ext = name.substring(lastDot + 1);
	            //console.log(name);
                let reader = new FileReader();

                reader.onload = function(event) {
                	
	                let customDiv = $("<div/>");
                    let remove =$('<span class="remove">Remove</span>');
                    let errorShow =$('<p>Invalid file</p>');

                    let video = $('<video />', {
					    id:'video',
					    class: 'editfile',
					    type: 'video/mp4',
					    controls: true
					});

					let img = $('<img />', { 
						id: 'img',
						class: 'editfile',
						alt: 'MyAlt'
					});

					ext=ext.toLowerCase();
	                switch (ext) {
	                	case 'png':
			            case 'jpg':
			            case 'jpeg':
			            case 'webp':
			            case 'tif':
			            case 'tiff':
			                //alert(ext);		
	                		img.attr('src', event.target.result).appendTo(customDiv);
	                		// statements_1
	                		break;
	                	case 'mpeg':
				            case 'mp4':
				            case '3gp':
				            case '3g2':
				            case 'ogv':
				            case 'webm':
				            case 'mkv':
				            //alert(ext);	
	          				video.attr('src', event.target.result).appendTo(customDiv);
	                		// statements_2
	                		break;
	                	default:
	                		//alert(ext);	
	                		errorShow.appendTo(customDiv);
	                		break;
	                }
	                remove.appendTo(customDiv);
	                customDiv.prependTo(placeToInsert);

                 } // for each file value as defined element

                reader.readAsDataURL(input.files[i]);// convert to base64 string
            }
        }

	   
	  
	}
	function preview(input, placeToInsert) {

	  if (input.files) {
            let filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
            	let name = event.target.files[i].name;
	            let lastDot = name.lastIndexOf('.');

	            let fileName = name.substring(0, lastDot);
	            let ext = name.substring(lastDot + 1);
	            console.log(name);
                let reader = new FileReader();
                let errorShow =$('<p>Invalid file</p>');

                reader.onload = function(event) {

                	
	                let customDiv = $("<div/>");

                    let video = $('<video />', {
					    id: 'video',
					    type: 'video/mp4',
					    controls: true
					});

					let img = $('<img />', { 
						id: 'img',
						class: 'file',
						alt: 'MyAlt'
					});

					ext=ext.toLowerCase();
	                switch (ext) {
	                	case 'png':
	                	case 'PNG':
			            case 'jpg':
			            case 'jpeg':
			            case 'webp':
			            case 'tif':
			            case 'tiff':
			                	
	                		img.attr('src', event.target.result).appendTo(customDiv);
	                		// statements_1
	                		break;
	                	case 'mpeg':
				            case 'mp4':
				            case 'mkv':
				            case '3gp':
				            case '3g2':
				            case 'ogv':
				            case 'webm':
				            	
	          				video.attr('src', event.target.result).appendTo(customDiv);
	                		// statements_2
	                		break;
	                	default:

	                		errorShow.appendTo(customDiv);
	                		// statements_def
	                		break;
	                }
	                customDiv.appendTo(placeToInsert);

                 } // for each file value as defined element

                reader.readAsDataURL(input.files[i]);// convert to base64 string
            }
        }

	   
	  
	}

   
	     
	let deletesrc=[];    
    $(document).on('click', '.remove', function () {
         let value=$(this).prev().attr('val');
         deletesrc.push(value);
         let delsrc=deletesrc.toString();
         console.log(delsrc);
         $('#deletefile').val(delsrc);
         $(this).parent().remove();

         let remainsrc=[];
         $(".file").each(function() {  
	       filesrc = $(this).attr('val');
	       remainsrc.push(filesrc);
	       
	     });
	     let remsrc=remainsrc.toString(); 
	     console.log(remsrc);
         $('#remainfile').val(remsrc);
    });



    

	$("#uploadfiles").change(function() {
	  preview(this,"#previewcontainer");
	});

	$("#updatefiles").change(function() {
	  previewedit(this,"#previewcontainer");
	});





    

});

// function getFileNameWithExt(event) {

// 	  if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
// 	    return;
// 	  }

// 	  const name = event.target.files[0].name;
// 	  const lastDot = name.lastIndexOf('.');

// 	  const fileName = name.substring(0, lastDot);
// 	  const ext = name.substring(lastDot + 1);

// 	  outputfile.value = fileName;
// 	  extension.value = ext;
	  
// 	}
// var files = event.target.files
//    var filename = files[0].name
//    var extension = files[0].type


// var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
// img.attr('src', responseObject.imgurl);
// img.appendTo('#imagediv');




