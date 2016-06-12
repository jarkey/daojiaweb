// JavaScript Document
//MSN：ytulance@hotmail.com
//ytulance于2008-05-08
<!--[CDATA[
function AjaxCreateObj(){
	var XmlHttp;
	//windows
	try{XmlHttp = new ActiveXObject("Msxml2.XMLHTTP.3.0");} 
	catch(e){
		try{XmlHttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{XmlHttp = new ActiveXObject("Microsoft.XMLHTTP");} 
			catch(e){XmlHttp = false;}}}
	//other
	if (!XmlHttp){
		try{XmlHttp = new XMLHttpRequest();}
		catch(e){XmlHttp = false;	}}
	return XmlHttp;
}

function GetProvinceText(QId,SId){
	var xmlhttp = new AjaxCreateObj() //new ActiveXObject("Microsoft.XMLHTTP");	
	xmlhttp.onreadystatechange= function(){
		if(xmlhttp.readyState==4){
			CountyText.innerHTML="&nbsp;<select name='County' style='width:100px;height:19px'><option value='' selected>县级市、县</option></select>";
			CityText.innerHTML="&nbsp;<select name='City' style='width:100px;height:19px'><option value='' selected>地级市</option></select></select>";
			ProvinceText.innerHTML=unescape(xmlhttp.responseText);}}	
	xmlhttp.open("get","Get_Normal_Data.php?Action=Province&QId="+QId+"&SId="+SId,false); 
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(null);
}

function GetCityText(QId,SId){
	var xmlhttp = new AjaxCreateObj()//new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange= function(){
		if(xmlhttp.readyState==4){
			CountyText.innerHTML="&nbsp;<select name='County' style='width:100px;height:19px'><option value='' selected>县级市、县</option></select>";
			CityText.innerHTML=unescape(xmlhttp.responseText);}}
	xmlhttp.open("get","Get_Normal_Data.php?Action=City&QId="+QId+"&SId="+SId,false); 
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(null);
}

function GetCountyText(QId,SId){
	var xmlhttp = new AjaxCreateObj()//new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange= function(){
		if(xmlhttp.readyState==4){
			CountyText.innerHTML=unescape(xmlhttp.responseText);}}
	xmlhttp.open("get","Get_Normal_Data.php?Action=County&QId="+QId+"&SId="+SId,false); 
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(null);
}
//]]-->