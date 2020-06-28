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


	
    

    $("#uploadpic").change(function() {
	  imagePreview(this,"#preview");
	});


	$("#updatepic").change(function() {
	  imagePreview(this,"#preview");
	});

});