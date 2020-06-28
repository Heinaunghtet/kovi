$(function() {

	// Single image preview in browser and check
	function imagePreview(input,where) {
	    let url = input.value;
	    let ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
	    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
	        let reader = new FileReader();

	        reader.onload = function (e) {
	            $(where).attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);// convert to base64 string
	    }else{
	         $(where).attr('src', '/assets/no_preview.png');
	    }
	}


	
    // Multiple images preview in browser without check
    function imagesPreview(input, placeToInsertImagePreview) {

        if (input.files) {
            let filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                let reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                } // for each file value as image element

                reader.readAsDataURL(input.files[i]);// convert to base64 string
            }
        }

    }


    // Multiple images preview in browser without check
    function imagesPreviewedit(input, placeToInsertImagePreview) {

        if (input.files) {
            let filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                let reader = new FileReader();

                reader.onload = function(event) {
                	let customDiv = $("<div/>");
                	let remove =$('<span class="remove">Remove</span>');
                    $($.parseHTML('<img class="photo">')).attr('src', event.target.result).appendTo(customDiv);
                    remove.appendTo(customDiv);
                    customDiv.prependTo(placeToInsertImagePreview);
                } // for each file value as image element

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
         $('#deletepic').val(delsrc);
         $(this).parent().remove();

         let remainsrc=[];
         $(".photo").each(function() {  
	       imgsrc = $(this).attr('val');
	       remainsrc.push(imgsrc);
	       
	     });
	     let remsrc=remainsrc.toString(); 
	     console.log(remsrc);
         $('#remainpic').val(remsrc);
    });

   
	     
	



    

	$("#uploadpics").change(function() {
	  imagesPreview(this,"#previewcontainer");
	});

	$("#updatepic").change(function() {
	  imagesPreviewedit(this,"#imgcontainer");
	});

});

// $(document).on("click",".selectall1",function()
// 	{
// 		if($(this).is(":checked"))
// 		{
// 			//alert("all");
// 			$(".select1").prop("checked",true);

// 		}else
// 		{
// 			$(".select1").prop("checked",false);
// 		}

// 	});
		
    		
//     $(document).on("click",".prt_one",function(){
// 		alert("print");
// 		var id=[];
// 		// var i=0;
// 		$(".select1").each(function(){
// 			if($(this).is(":checked")){
// 			id.push($(this).attr("id"));
// 			}
// 		});
// 		alert(id);
// 		if(id.length===0){
// 		 		alert("အချက်အလက်များရွေးချယ်ပါ");
// 		} 
// 		else{
           
// 			var print_one="print_one";
// 			$.post("server.php",{print_one:"print_one",id:id},function(response){
// 				alert(response);
// 				alert("ok");
	
// 	 		var newWin=window.open('','Print-Window');
// 			newWin.document.open();
// 	 		newWin.document.write('<html><head><title></title><link rel="stylesheet" type="text/css" href="css/mainpage.css"></head><body onload="window.print();window.close()"><div>'+response+'</div></body></html>');
// 	 		newWin.document.close();
		
// 			});
		
//     	}
	
// 	});	

	// var btn = document.getElementsByClassName('remove');
 //    // btn[0].addEventListener('click',function(){
 //    // 	alert("haha");
 //    // });

	// for (var i = 0; i < btn.length; i++) {
	//   btn[i].addEventListener('click', function(e) {
	//     e.currentTarget.parentNode.remove();
	//     //alert("haha");
	//     //this.closest('.single').remove() // in modern browsers in complex dom structure
	//     //this.parentNode.remove(); //this refers to the current target element 
	//     //e.target.parentNode.parentNode.removeChild(e.target.parentNode);
	//   }, false);
	// }
