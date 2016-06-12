jQuery.fn.extend({
	checkboxval: function(aChecked){
		if (typeof(aChecked)=="undefined"){var arr = new Array();
			this.each(function(){if (this.checked){arr.push($(this).val());}});return arr;
		}else{
			return this.each(function(){if (inArray($(this).val(), aChecked)){this.checked = true;}});
		}
	},
	radioval: function(iChecked){
		if (typeof(iChecked)=="undefined"){var i;this.each(function(){if (this.checked){i = $(this).val();return false;}});return i;
		}else{return $(this).val([iChecked]);}
	}
});