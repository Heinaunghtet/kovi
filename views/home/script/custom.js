$(function() {

	// get all data for home page by get

	$.get('home/ajaxGet', function(response) {
		
		let data=response;

		//console.log(response.text);
		for(let i=0;i < data.length;i++){
			$('.data').append('<div>'+data[i].text+'<a class="del" no="'+data[i].test_id+'"href="#">[Delete]</a><a class="edit" no="'+data[i].test_id+'"href="#">[Edit]</a></div>');
			
		}
		
		
		
		
	},'json');




    // insert by post
	

	$('#ajaxinsert').submit(function(event) {
		event.preventDefault();
		let url =$(this).attr('action');
		let data=$(this).serialize();
	
		$.post(url,data, function(response) {

			//console.log(response.text);
			
			$('.data').append('<div>'+response.text+'<a class="del" no="'+response.id+'"href="#">[delete]</a><a class="edit" no="'+response.id+'"href="#">[Edit]</a></div>');
			$('#ajaxinsert')[0].reset();
			

			
		},'json');

	});


	$(document).on('click','.del',function(event) {
		event.preventDefault();
		let id=$(this).attr('no');
		let url='dashboard/ajaxDelete';
		let data={'id':id};
		let child=$(this);

		$.post(url,data, function(response) {

			child.parent().remove();
			console.log(response);

			
		});
		
	});

	$(document).on('click','.edit',function(event) {

		
		event.preventDefault();
		let id=$(this).attr('no');
		let url='home/ajaxUpdate';
		let data={'id':id};
		let child=$(this);
		let text =child.parent().clone() //clone the element
           .children() //select all the children
           .remove() //remove all the children
           .end()  //again go back to selected element
           .text();  //get the text of element
    
        let updatedata= window.prompt("Edit Data", text);
        if(updatedata){
        	$.post(url,{id,updatedata}, function(response) {

			     console.log(response);
			     if(response==1){
       				child.parent().contents().filter(function(){ 
         			return this.nodeType == 3; 
      				})[0].nodeValue = updatedata;

      			}else{
       				alert('error');
     			}


			
		    });

        }

		
		
		
	});


});