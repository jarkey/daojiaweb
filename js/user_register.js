// JavaScript Document
$(document).ready(function() { 



//�û���Ψһʵʱ��֤

	$('input[@name=addUsername]').blur(function (){
	
	if($('input[@name=addUsername]').val()=='')
	 {
		 $('#usernameAjax').html('����Ϊ��');
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
	 
//����Ψһʵʱ��֤ 	
	
	$('input[@name=email]').blur(function (){
	   if($('input[@name=email]').val()=='')
	 {
		 $('#emailAjax').html('����Ϊ��');
		 return false;
	  }	
	  var myreg = /^([a-zA-Z0-9]+[_|\_|\.|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!myreg.test($('input[@name=email]').val())){
   $('#emailAjax').html('��ʽ����');

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


//�ֻ�Ψһʵʱ��֤ 	
	
	$('input[@name=mobile]').blur(function (){
	   if($('input[@name=mobile]').val()=='')
	 {
		 $('#phoneAjax').html('������Ϊ��');
		 return false;
	  }	
	  
	  	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test($('input[@name=mobile]').val())) 
{ 
    $('#phoneAjax').html('����ʽ����');
		 return false;
} 
	$.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"phone="+$('input[@name=mobile]').val(), 
		  success:function(msg)
		   {
			  //alert(msg);
			  $('#phoneAjax').html(msg);
		  }
	   });
	});
	 
//��֤��ʵʱ��֤

	$('input[@name=code]').blur(function (){
												
	   if($('input[@name=code]').val()=='')
	 {
		 $('#authimg').html('������Ϊ��');
		 return false;
	  }											  
	   $.ajax(
	  {
	  type:"POST",
	  url:"User_ajax.php",
	  dataType:"html",
	  data:"authimg="+$('input[@name=code]').val(), 
		  success:function(msg)
		   {
			  $('#authimg').html(msg);			  
		  }
	   });
	});
	
	
	
		$('input[@name=authimg]').blur(function (){
												
	   if($('input[@name=authimg]').val()=='')
	 {
		 $('#authimg').html('������Ϊ��');
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
      
//����ʵʱ��֤

	$('input[@name=pwd]').blur(function (){
			
			if($('input[@name=pwd]').val()=='')
	   {
		   $('#pwd').html('������Ϊ��');
		   return false;
		}											
			if($('input[@name=pwd]').val().length <=5)
	   {
		   $('#pwd').html('������6λ');
		   return false;
		}else{
			 $('#pwd').html('��');
		
			}	
		
	});



	$('input[@name=pwd1]').blur(function (){
			
			if($('input[@name=pwd1]').val()=='')
	   {
		   $('#pwdajax').html('������Ϊ��');
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
		 
    
//�ύ��

	$('input[@name=submit]').click(function (){
		 $.ajax(
		{
		type:"POST",
		url:"User_ajax.php",
		dataType:"html",
		data:"pwd="+$('input[@name=pwd]').val()+"&pwd1="+$('input[@name=pwd1]').val()+"&authimg="+$('input[@name=code]').val()+"&email="+$('input[@name=email]').val()+"&adduser="+$('input[@name=adduser]').val()+"&phone="+$('input[@name=mobile]').val(), 
			success:function(msg)
			 {
				$('#content_ajax').html(msg);				
			}
		});
	});

});