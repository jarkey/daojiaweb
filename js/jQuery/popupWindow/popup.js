/***************************/
//@Author: Adrian "yEnS" Mato Gondelle
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

//SETTING UP OUR POPUP
//0 means disabled; 1 means enabled;
var popupStatus = 0;

//loading popup with jQuery magic!
function loadPopup(x){
	//loads popup only if it is disabled
	if(popupStatus==0){
		$("#backgroundPopup").css({
			"opacity": "0.7"
		});
		$("#backgroundPopup").fadeIn("slow");          //背景层
		$(x).fadeIn("slow");             //注册层
		popupStatus = 1;
	}
}

//disabling popup with jQuery magic!
function disablePopup(x,y){
	//disables popup only if it is enabled
	if(popupStatus==1){
		$("#backgroundPopup").fadeOut("slow");
		$(x).fadeOut("slow");
		$(y).fadeOut("slow");		
		popupStatus = 0;
	}
}

//centering popup
function centerPopup(x){
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(x).height();          //背景层
	var popupWidth = $(x).width();            //注册层
	//centering
	$(x).css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//only need force for IE6
	
	$("#backgroundPopup").css({
		"height": windowHeight
	});
	
}


//CONTROLLING EVENTS IN jQuery
$(document).ready(function(){
	
	//LOADING POPUP
	//Click the button event!
	$("#btn_memberRegister").click(function(){
		//centering with css
		centerPopup("#popupContact");
		//load popup
		loadPopup("#popupContact");
	});
	
	$("#btn_memberLogin").click(function(){
		//centering with css
		centerPopup("#popupMemberLogin");
		//load popup
		loadPopup("#popupMemberLogin");
	});	
				
	//CLOSING POPUP
	//Click the x event!
	$("#popupContactClose").click(function(){                 //强行所有窗口关闭
		disablePopup("#popupContact","#popupMemberLogin");	
	});
	$("#popupMemberLoginClose").click(function(){             //强行所有窗口关闭
		disablePopup("#popupContact","#popupMemberLogin");	
	});	
	//Click out event!
	$("#backgroundPopup").click(function(){
		disablePopup("#popupContact","#popupMemberLogin");	
	});
	//Press Escape event!
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});

});