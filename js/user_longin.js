// JavaScript Document
$(document).ready(function() { 

//�û���Ψһʵʱ��֤

	$('input[@name=username]').blur(function (){
	
	if($('input[@name=username]').val()=='')
	 {
		 $('#username').html('����Ϊ��');
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
	 



	 
//��֤��ʵʱ��֤

	$('input[@name=authimg1]').blur(function (){
												
	   if($('input[@name=authimg1]').val()=='')
	 {
		 $('#authimg').html('����Ϊ��');
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
      
//����ʵʱ��֤

	$('input[@name=password]').blur(function (){
			
			if($('input[@name=password]').val()=='')
	   {
		   $('#password').html('����Ϊ��');
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
		 
    
//�ύ��

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
	
//��Ա���Ĳ鿴���
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