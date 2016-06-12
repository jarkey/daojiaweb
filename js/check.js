function CheckForm(){
	
	if(orderForm.username.value==""){
		 alert("请您输入用户名！");
		 orderForm.username.focus();
		 return false;
	}
	
		if(orderForm.password.value=="" ){
		 alert("请您输入密码！");
		orderForm.password.focus();
		 return false;
	}
	
		if(orderForm.password1.value=="" ){
		 alert("请您输入确认密码！");
		orderForm.password1.focus();
		 return false;
	}
	
		if(orderForm.password.value!=orderForm.password1.value ){
		 alert("两次输入的密码不一致！");
		orderForm.password1.focus();
		 return false;
	}
	
	
	
if(orderForm.email.value==""){
		 alert("请您输入您的email！");
		 orderForm.email.focus();
		 return false;
	}
	
var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!myreg.test(orderForm.email.value)){
   alert('提示:请输入有效的E_mail！');
   orderForm.email.focus();
   return false;
  }
	
		if(orderForm.mobile.value==""){
		 alert("请您输入您手机号码！");
		 orderForm.mobile.focus();
		 return false;
	}
	
	
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test(orderForm.mobile.value)) 
{ 
    alert('请输入有效的手机号码！'); 
	orderForm.mobile.focus();
    return false; 
}  

	
	
	if(orderForm.authimg.value==""){
		 alert("请您输入验证码！");
		 orderForm.authimg.focus();
		 return false;
	}

	return true;
}



function CheckForm1(){
	
	if(orderForm1.username.value==""){
		 alert("请您输入用户名！");
		 orderForm1.username.focus();
		 return false;
	}
	
		if(orderForm1.password.value=="" ){
		 alert("请您输入密码！");
		orderForm1.password.focus();
		 return false;
	}
	

	if(orderForm1.authimg.value==""){
		 alert("请您输入验证码！");
		 orderForm1.authimg.focus();
		 return false;
	}

	return true;
}

//地址添加
function addressForm(){
	
	if(addressForm1.consignee.value==""){
		 alert("请您输入姓名！");
		 addressForm1.consignee.focus();
		 return false;
	}
	
		if(addressForm1.mobile.value=="" ){
		 alert("请您输入手机！");
		addressForm1.mobile.focus();
		 return false;
	}
	
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test(addressForm1.mobile.value)) 
{ 
    alert('请输入有效的手机号码！'); 
	addressForm1.mobile.focus();
	 return false;
}  

	

	

	return true;
}


function CheckPass(){
	
	
	if(orderForm.passwords.value=="" ){
		 alert("请您输入原始密码！");
		orderForm.passwords.focus();
		 return false;
	}
	
		if(orderForm.password.value=="" ){
		 alert("请您输入新密码！");
		orderForm.password.focus();
		 return false;
	}
	
		if(orderForm.password1.value=="" ){
		 alert("请您输入确认密码！");
		orderForm.password1.focus();
		 return false;
	}
	
		if(orderForm.password.value!=orderForm.password1.value ){
		 alert("两次输入的密码不一致！");
		orderForm.password1.focus();
		 return false;
	}
	

	return true;
}

function Checkprocurement(){
	
	
	if(procurement.name.value=="" ){
		 alert("请您输入姓名！");
		procurement.name.focus();
		 return false;
	}
	
		if(procurement.phone.value=="" ){
		 alert("请您输入电话！");
		procurement.phone.focus();
		 return false;
	}
	
		if(procurement.content.value=="" ){
		 alert("请您输入内容！");
		procurement.content.focus();
		 return false;
	}
	
	
	

	return true;
}