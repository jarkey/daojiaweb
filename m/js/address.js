// JavaScript Document
 $(document).ready(function() { 
		//用户名唯一实时验证 	

 $('.aa').click(function(){
    cc = $(this).attr('cc')
	  $.ajax(
		{
	     type:"POST",
		url:"address_ajax.php",
		dataType:"html",
		data:"address="+cc, 
		success:function(msg)
			 {
			   $('#ajax_address').html(msg);
			}
			});  
		});
	
	
    });