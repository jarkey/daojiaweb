// JavaScript Document 

      		  
      function phone_ajax(){
		  var phone;
		  phone = document.getElementById("mobile").value;
		  if(phone==''){
			  alert('�ֻ��Ų���Ϊ��');
			  exit();
		  }
		  var pcheck = /13\d{9}$|15[012356789]\d{8}$|17[0678]\d{8}$|18\d{9}$/;
	      if(!pcheck.test(phone))
	      {
	         alert('��������Ч���ֻ����룡');
	         exit();
	      }
		var xmlhttp;
        if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(phone!=""){
    document.getElementById("mobileauthajax").innerHTML="���ͳɹ�";
		}
    }/*else if(xmlhttp.readyState==0){
		document.getElementById("myDiv").innerHTML="����δ��ʼ��";
		}else if(xmlhttp.readyState==1){
		document.getElementById("myDiv").innerHTML="�����������ѽ���";
		}else if(xmlhttp.readyState==2){
		document.getElementById("myDiv").innerHTML="�����ѽ���";
		}else if(xmlhttp.readyState==3){
		document.getElementById("myDiv").innerHTML="��������";
		}*/
  }
	xmlhttp.open("POST","../curlPost-8061mdsmssend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("mobile="+phone);	

		}