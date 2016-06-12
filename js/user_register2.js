// JavaScript Document
$(document).ready(function() { 

//用户名唯一实时验证

	$('input[@name=addUsername]').blur(function (){
	
	if($('input[@name=addUsername]').val()=='')
	 {
		 $('#usernameAjax').html('不能为空');
		 return false;
	  }
	  $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"addUsername="+$('input[@name=addUsername]').val(), 
		  success:function(msg)
		   {			 
			  $('#usernameAjax').html(msg);		  
		  }
	  });  
	});
	 
//邮箱唯一实时验证 	
	
	$('input[@name=email]').blur(function (){
	   if($('input[@name=email]').val()=='')
	 {
		 $('#emailAjax').html('不能为空');
		 return false;
	  }										 
	$.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"email="+$('input[@name=email]').val(), 
		  success:function(msg)
		   {
			  //alert(msg);
			  $('#emailAjax').html(msg);
		  }
	   });
	});
	 
	 
//验证码实时验证

	$('input[@name=authimg]').blur(function (){
												
	   if($('input[@name=authimg]').val()=='')
	 {
		 $('#authimg').html('不能为空');
		 return false;
	  }											  
	   $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"authimg="+$('input[@name=authimg]').val(), 
		  success:function(msg)
		   {
			  $('#authimg').html(msg);			  
		  }
	   });
	});
      
//密码实时验证

	$('input[@name=pwd1]').blur(function (){
			
			if($('input[@name=pwd1]').val()=='')
	   {
		   $('#pwdajax').html('不能为空');
		   return false;
		}											
		 $.ajax(
		{
		type:"POST",
		url:"User_ajax.php",
		dataType:"html",
		data:"pwd="+$('input[@name=pwd]').val()+"&pwd1="+$('input[@name=pwd1]').val(), 
			success:function(msg)
			 {
				$('#pwdajax').html(msg);				
			}
		});
	});
		 
    
//提交表单

	$('input[@name=submit]').click(function (){
		 $.ajax(
		{
		type:"POST",
		url:"User_ajax.php",
		dataType:"html",
		data:"pwd="+$('input[@name=pwd]').val()+"&pwd1="+$('input[@name=pwd1]').val()+"&authimg="+$('input[@name=authimg]').val()+"&email="+$('input[@name=email]').val()+"&addUsername="+$('input[@name=addUsername]').val()+"&adduser="+$('input[@name=adduser]').val(), 
			success:function(msg)
			 {
				$('#content_ajax').html(msg);				
			}
		});
	});

});