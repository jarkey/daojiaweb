// JavaScript Document
$(document).ready(function() { 

//用户名唯一实时验证

	$('input[@name=username]').blur(function (){
	
	if($('input[@name=username]').val()=='')
	 {
		 $('#username').html('不能为空');
		 return false;
	  }
	  $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"username="+$('input[@name=username]').val(), 
		  success:function(msg)
		   {			 
			  $('#username').html(msg);		  
		  }
	  });  
	});
	 



	 
//验证码实时验证

	$('input[@name=authimg1]').blur(function (){
												
	   if($('input[@name=authimg1]').val()=='')
	 {
		 $('#authimg').html('不能为空');
		 return false;
	  }											  
	   $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"authimg1="+$('input[@name=authimg1]').val(), 
		  success:function(msg)
		   {
			  $('#authimg').html(msg);			  
		  }
	   });
	});
      
//密码实时验证

	$('input[@name=password]').blur(function (){
			
			if($('input[@name=password]').val()=='')
	   {
		   $('#password').html('不能为空');
		   return false;
		}	else{
			  $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"password="+$('input[@name=password]').val()+"&username="+$('input[@name=username]').val(), 
		  success:function(msg)
		   {
			  $('#password').html(msg);			  
		  }
	   });
			}										
		
	});
		 
    
//提交表单

	$('input[@name=submit]').click(function (){
		 $.ajax(
		{
		type:"POST",
		url:"User_ajax.php",
		dataType:"html",
		data:"password="+$('input[@name=password]').val()+"&username="+$('input[@name=username]').val()+"&authimg1="+$('input[@name=authimg1]').val(), 
			success:function(msg)
			 {
				$('#content_ajax').html(msg);				
			}
		});
	});
	
//会员中心查看余额
	$('input[@name=user_change_1]').click(function (){
		 $.ajax(
		{
		type:"POST",
		url:"User_ajax.php",
		dataType:"html",
		data:"authimg_u="+$('input[@name=authimg]').val(), 
			success:function(msg)
			 {
				$('#user_change_1').html(msg);				
			}
		});
	});


	$('input[@name=button1]').click(function (){
		 window.location.href="registered.php";
	});

});