<?php

include_once('../inc/config.inc.php');
$class=$_GET['class'];
$type1=$_GET['type1'];

if($_GET['del']){
$sql="delete from dmooo_product_price where id=".$_GET['del'];
$result=mysql_query($sql);
}


if ($_POST['name']){
	$name=$_POST['name'];
	$sort=$_POST['sort'];
	$price=$_POST['price'];
	$sql="insert into dmooo_product_price (name,sort,class,price,type1) values ('$name','$sort','$class','$price','$type1')";
    $result=mysql_query($sql);
    if($result!=0){echo'添加成功';}
}


if($_POST['update_name'])
{
	
	$name=$_POST['update_name'];
	$sort=$_POST['sort'];
	$price=$_POST['price'];	
	$sql="update dmooo_product_price set name='$name',sort=$sort,price=$price where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}

?>

<html><head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

var txt = "确定要删除这条记录吗？？";

function myConfirm(id,class){	

	jQuery.noConflict();

	jQuery.prompt(txt,{ 

		buttons:{确定:true, 取消:false},

		callback: function(v,m){

			if(v){

				window.location.href="index.php?del=" + id + "&class=" + class;

			}else{

				notOpen();

			}				

		},

		 prefix:'cleanblue'

	});

}	

function open(){

}

function notOpen(){	

}

</script>
<style>
.product_fh{ margin-top:20px;}
.product_fh a{ font-size:14px; font-weight:bold; color:#069; line-height:30px;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=gb18030" />
</head>
<body>
<div id="man_zone">
<span class="product_fh"><a href="news_admin.php?class=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>">返回商品类别</a>
</span>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999" class="tableCss4">
<table align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">商品列表-规格</td>
    </tr>

	<tr valign="middle" bgcolor="#F0E3D2" align="center">
      <td height="35" class="tdBorder1 tdBg1">名称</td>
      <td class="tdBorder1 tdBg1">价格</td>
       <td class="tdBorder1 tdBg1">显示顺序</td>
      <td  class="tdBorder1 tdBg1">操作</td>
   </tr>



<?php
if($type1==1){$sql_str=" and type1=1 ";}else{$sql_str=" and  type1<>1 ";}
$sql="select * from dmooo_product_price where class=$class $sql_str order by sort desc,id desc";
$result=mysql_query($sql);

while ($date=mysql_fetch_assoc($result))

{

	$id=$date['id'];
    $name=$date['name'];
    $price=$date['price'];  //图片
    $sort=$date['sort'];

	?>

	<tr valign="middle" align="center">

	  <form action="news_price.php?update=<?=$id?>&class=<?=$class?>&fid=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>&type1=<?=$_GET['type1']?>" method="POST">

	  <td  class="tdBorder1">&nbsp;<input type="text" name="update_name" value="<?=$name?>"></td>

      <td  class="tdBorder1"><input type="text" name="price" value="<?=$price?>"></td>

      <td  class="tdBorder1"><input type="text" name="sort" value="<?=$sort?>"></td>

	<td class="tdBorder1">&nbsp;&nbsp;<input type="image" src="../images/inco_modify.gif" class="button1" value="修改">&nbsp;&nbsp;<a href="news_price.php?del=<?=$id?>&class=<?=$class?>&fid=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>&type1=<?=$_GET['type1']?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" ></a></td>
 </form>
  </tr>

<?php

}

?>

 </table>


<p>&nbsp;</p>

<FORM action="news_price.php?class=<?=$class?>&fid=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>&type1=<?=$_GET['type1']?>" method="post" enctype="multipart/form-data">

<table width="90%" border="0" align="center" cellspacing="1" bgcolor="#999999" >

  <tr bgcolor="#FFFFFF" height="28px">

    <td width="16%" align="center" valign="middle" >名称:</td>

    <td width="84%">&nbsp;<input name="name" type="text" size="40"> 

     </td>

  </tr>
   <tr bgcolor="#FFFFFF" height="28px">

    <td width="16%" align="center" valign="middle" >价格:</td>

    <td width="84%">&nbsp;<input name="price" type="text" size="40"> 

     </td>

  </tr>

  <tr bgcolor="#FFFFFF" height="28px">

    <td align="center" valign="middle" >顺序:</td>

    <td>&nbsp;<input name="sort" type="text" size="40" value="0"></td>

  </tr>



  <tr bgcolor="#FFFFFF" height="28px">

    <td align="center" valign="middle" >&nbsp;</td>

    <td>&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>

  </tr>

</table>

</FORM>

</div>

</body></html>