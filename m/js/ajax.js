$(document).ready(function(){




//手动修改数字						   
$('.p_cart').blur(function(){		
				   
   var productid=$(this).attr("name");
   var priceid=$(this).attr("priceid");
   var number=$(this).val();
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"number="+number+"&productid="+productid+"&priceid="+priceid,
		success:function(msg)
			{		
			 $("#p_"+productid+priceid).html(msg);
			}
		 }); 	  
								          })	


$('.p_cart').blur(function(){		
				   
   
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"total=1",
		success:function(msg)
			{			
			 $("#total").html(msg);
			}
		 }); 	  
	   $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"pr_num_all=1",
		success:function(msg)
			{			
			 $("#pr_num_all").html(msg);
			}
		 }); 	
								          })	



//加减号						   
$('.J_add').click(function(){		
  
   var productid=$(this).attr("fid");
   var price_num=$(this).attr("price_num");
   var priceid=$(this).attr("priceid");
   
   var number= parseInt($("#"+productid+priceid).val())+1; 
  
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"number="+number+"&productid="+productid+"&priceid="+priceid,
		
		success:function(msg)
			{	
			 $("#p_"+productid+priceid).html(msg);
			 
			}
		 }); 	  
								          })

$('.J_add').click(function(){		
				   
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"total=1",
		success:function(msg)
			{			
			 $("#total").html(msg);
			}
		 }); 	  
	
	   $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"pr_num_all=1",
		success:function(msg)
			{			
			 $("#pr_num_all").html(msg);
			}
		 }); 	
								          })


//减号						   
$('.J_minus').click(function(){				   
   var productid=$(this).attr("fid");
   //var price_num=$(this).attr("price_num");
   var priceid=$(this).attr("priceid");
   
   var number= parseInt($("#"+productid+priceid).val())-1; 
  //alert(number);
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"number="+number+"&productid="+productid+"&priceid="+priceid,
		success:function(msg)
			{			
			 $("#p_"+productid+priceid).html(msg);
			}
		 }); 	  
								          })

$('.J_minus').click(function(){		
				   
   
    $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"total=1",
		success:function(msg)
			{			
			 $("#total").html(msg);
			}
		 }); 
	
	   $.ajax(
		{
		type:"POST",
		url:"../ajax.php",
		dataType:"html",
		data:"pr_num_all=1",
		success:function(msg)
			{			
			 $("#pr_num_all").html(msg);
			}
		 }); 	
								          })


	






						    })