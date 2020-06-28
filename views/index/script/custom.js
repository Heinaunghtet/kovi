
window.onload=function(){
   // const icon = document.getElementById("icon");
   // icon.addEventListener("click",myFunction, false);
}


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}




// $(document).ready(function() {
// 	$.get('index/xhrGet', function(response) {
		
// 		let data=response;
// 		for(let i=0;i < data.length;i++){
// 			$('.sleepy').append('<div>'+data[i].text+'<a class="del" no="'+data[i].post_id+'"href="#">delete</a><a class="edit" no="'+data[i].post_id+'"  href="#">edit</a></div>');
			
// 		}
// 		//console.log(response);
// 	},'json');
// });