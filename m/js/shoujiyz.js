// JavaScript Document 

      		  
      function phone_ajax(){
		  var phone;
		  phone = document.getElementById("mobile").value;
		  if(phone==''){
			  alert('手机号不能为空');
			  exit();
		  }
		  var pcheck = /13\d{9}$|15[012356789]\d{8}$|17[0678]\d{8}$|18\d{9}$/;
	      if(!pcheck.test(phone))
	      {
	         alert('请输入有效的手机号码！');
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
    document.getElementById("mobileauthajax").innerHTML="发送成功";
		}
    }/*else if(xmlhttp.readyState==0){
		document.getElementById("myDiv").innerHTML="请求未初始化";
		}else if(xmlhttp.readyState==1){
		document.getElementById("myDiv").innerHTML="服务器连接已建立";
		}else if(xmlhttp.readyState==2){
		document.getElementById("myDiv").innerHTML="请求已接收";
		}else if(xmlhttp.readyState==3){
		document.getElementById("myDiv").innerHTML="请求处理中";
		}*/
  }
	xmlhttp.open("POST","../curlPost-8061mdsmssend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("mobile="+phone);	

		}