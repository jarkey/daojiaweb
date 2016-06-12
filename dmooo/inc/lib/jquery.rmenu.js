/*
 * rmenu (for jQuery)
 * version: 1.0 (03/27/2008)
 * @requires jQuery v1.2 or later
 * Examples at http://www.knowidea.cn/rmenu/
 */
(function($) {
	$.rmenu = function() {}
	$.rmenu.settings = {
		onelist:'img/0.gif',
		extend:'img/1.gif',
		contract:'img/2.gif'
	}
	$.fn.rmenu = function(settings) {
		nextmenu = $(this).find('li')
		$(this).find('a[href=#]').attr('href','javascript:void(0);');
		for(var i = 0; i < nextmenu.length; i++){
			if($(nextmenu[i]).find('ul').length) {
				$(nextmenu[i]).prepend('<img src="../../gshopadmin/lib/' + $.rmenu.settings.extend + '" class="hover"/>');
				$(nextmenu[i]).find('img').bind('click',function (){
					$(this).parent().children('ul').toggle();
					var thsrc = $(this).attr('src').replace(/^(.*)(\w+\.\w+)$/,'$2');
					var exsrc = $.rmenu.settings.extend.replace(/^(.*)(\w+\.\w+)$/,'$2');
					var cosrc = $.rmenu.settings.contract.replace(/^(.*)(\w+\.\w+)$/,'$2');
					if(thsrc == exsrc){
						$(this).attr('src',$.rmenu.settings.contract);
					}else if(thsrc == cosrc){
						$(this).attr('src',$.rmenu.settings.extend);
					}
				});
				$(nextmenu[i]).find('img').next('a').bind('click',function (){
					$(this).next('ul').toggle();
					var thsrc = $(this).prev('img').attr('src').replace(/^(.*)(\w+\.\w+)$/,'$2');
					var exsrc = $.rmenu.settings.extend.replace(/^(.*)(\w+\.\w+)$/,'$2');
					var cosrc = $.rmenu.settings.contract.replace(/^(.*)(\w+\.\w+)$/,'$2');
					if(thsrc == exsrc){
						$(this).prev('img').attr('src',$.rmenu.settings.contract);
					}else if(thsrc == cosrc){
						$(this).prev('img').attr('src',$.rmenu.settings.extend);
					}
				});
			}else{
				if($.rmenu.settings.onelist) $(nextmenu[i]).prepend('<img src="../../gshopadmin/lib/' + $.rmenu.settings.onelist + '"/>');
				else $(nextmenu[i]).prepend(' - ');
			}
		}
	}
  
})(jQuery);

jQuery(document).ready(function($) {
	$('ul[class=rmenu]').rmenu()
})
