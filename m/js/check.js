function CheckForm(){
	
	if(orderForm.username.value==""){
		 alert("���������û�����");
		 orderForm.username.focus();
		 return false;
	}
	
		if(orderForm.password.value=="" ){
		 alert("�����������룡");
		orderForm.password.focus();
		 return false;
	}
	
		if(orderForm.password1.value=="" ){
		 alert("��������ȷ�����룡");
		orderForm.password1.focus();
		 return false;
	}
	
		if(orderForm.password.value!=orderForm.password1.value ){
		 alert("������������벻һ�£�");
		orderForm.password1.focus();
		 return false;
	}
	
	
	
if(orderForm.email.value==""){
		 alert("������������email��");
		 orderForm.email.focus();
		 return false;
	}
	
var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!myreg.test(orderForm.email.value)){
   alert('��ʾ:��������Ч��E_mail��');
   orderForm.email.focus();
   return false;
  }
	
		if(orderForm.mobile.value==""){
		 alert("�����������ֻ����룡");
		 orderForm.mobile.focus();
		 return false;
	}
	
	
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test(orderForm.mobile.value)) 
{ 
    alert('��������Ч���ֻ����룡'); 
	orderForm.mobile.focus();
    return false; 
}  

	
	
	if(orderForm.authimg.value==""){
		 alert("����������֤�룡");
		 orderForm.authimg.focus();
		 return false;
	}

	return true;
}



function CheckForm1(){
	
	if(orderForm1.username.value==""){
		 alert("���������û�����");
		 orderForm1.username.focus();
		 return false;
	}
	
		if(orderForm1.password.value=="" ){
		 alert("�����������룡");
		orderForm1.password.focus();
		 return false;
	}
	

	if(orderForm1.authimg.value==""){
		 alert("����������֤�룡");
		 orderForm1.authimg.focus();
		 return false;
	}

	return true;
}

//��ַ���
function addressForm(){
	
	if(addressForm1.consignee.value==""){
		 alert("��������������");
		 addressForm1.consignee.focus();
		 return false;
	}
	
		if(addressForm1.mobile.value=="" ){
		 alert("���������ֻ���");
		addressForm1.mobile.focus();
		 return false;
	}
	
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test(addressForm1.mobile.value)) 
{ 
    alert('��������Ч���ֻ����룡'); 
	addressForm1.mobile.focus();
	 return false;
}  

	

	

	return true;
}


function CheckPass(){
	
	
	if(orderForm.passwords.value=="" ){
		 alert("��������ԭʼ���룡");
		orderForm.passwords.focus();
		 return false;
	}
	
		if(orderForm.password.value=="" ){
		 alert("�������������룡");
		orderForm.password.focus();
		 return false;
	}
	
		if(orderForm.password1.value=="" ){
		 alert("��������ȷ�����룡");
		orderForm.password1.focus();
		 return false;
	}
	
		if(orderForm.password.value!=orderForm.password1.value ){
		 alert("������������벻һ�£�");
		orderForm.password1.focus();
		 return false;
	}
	

	return true;
}

function Checkprocurement(){
	
	
	if(procurement.name.value=="" ){
		 alert("��������������");
		procurement.name.focus();
		 return false;
	}
	
		if(procurement.phone.value=="" ){
		 alert("��������绰��");
		procurement.phone.focus();
		 return false;
	}
	
		if(procurement.content.value=="" ){
		 alert("�����������ݣ�");
		procurement.content.focus();
		 return false;
	}
	
	
	

	return true;
}