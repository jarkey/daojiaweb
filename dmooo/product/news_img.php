<?php

include_once('../inc/config.inc.php');

$class=$_GET['class'];
$type1=$_GET['type1'];

if ($_GET['del'])

{

	$sql3="select img from dmooo_productimg  where id=".$_GET['del'];

	$result3=mysql_query($sql3);

	$date3=mysql_fetch_assoc($result3);

	$img=$date3['img'];

	@unlink("../../userfiles/$img");

	

	$sql="delete from dmooo_productimg where id=".$_GET['del'];

	$result=mysql_query($sql);

	

	

}



if ($_POST['name'])

{

	$name=$_POST['name'];

	

	$sort=$_POST['sort'];

	$img=0;

	/*****图片上传部分*******/

if($_FILES['img']['tmp_name']){

 if($_FILES['img']['error'] > 0){

   

   switch($_FILES['file']['error'])

   {

     case 1: echo '文件大小超过服务器限制';

             break;

     case 2: echo '文件太大！';

             break;

     case 3: echo '文件只加载了一部分！';

             break;

     case 4: echo '文件加载失败！';

             break;

   }

   

   exit;

}



if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/jpeg'  && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png'&& $_FILES['img']['type']!='image/png'){

   echo '文件不是JPG,PNG,GIF图片！';

   exit;

}

$today = date("YmdHis");

$filetype = $_FILES['img']['type'];

if($filetype == 'image/pjpeg'){

  $type = '.jpg';

}

if($filetype == 'image/jpeg'){

  $type = '.jpg';

}

if($filetype == 'image/gif'){

  $type = '.gif';

}

if($filetype == 'image/x-png'){

  $type = '.png';

}

$upfile = '../../userfiles/' . $today . $type;



if(is_uploaded_file($_FILES['img']['tmp_name']))

{

   if(!move_uploaded_file($_FILES['img']['tmp_name'], $upfile))

   {

     echo '移动文件失败！';

     exit;

    }

}

$img=$today . $type;  //取得文件名



}

/**********图片上传结束****************/

	$sql="insert into dmooo_productimg 

 (name,sort,class,img,type1) values ('$name','$sort','$class','$img','$type1')";

	$result=mysql_query($sql);

	if($result!=0)

	{

		echo'添加成功';

		}

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

<meta http-equiv="Content-Type" content="text/html; charset=gb18030" /></head>
<style>
.product_fh{ margin-top:20px;}
.product_fh a{ font-size:14px; font-weight:bold; color:#069; line-height:30px;}
</style>
<body >



<div id="man_zone">
<span class="product_fh"><a href="news_admin.php?class=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>" >返回商品类别</a></span>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999" class="tableCss4">
<table align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">商品列表</td>
    </tr>

	<tr valign="middle" bgcolor="#F0E3D2" align="center">
      <td height="35" class="tdBorder1 tdBg1">名称</td>
      <td class="tdBorder1 tdBg1">图片</td>
       <td class="tdBorder1 tdBg1">显示顺序</td>
      <td  class="tdBorder1 tdBg1">操作</td>
   </tr>



<?php
if($type1==1){$sql_str=" and type1=1 ";}else{$sql_str=" and  type1<>1 ";}
$sql="select * from dmooo_productimg where class=$class $sql_str order by sort desc,id desc";




$result=mysql_query($sql);

while ($date=mysql_fetch_assoc($result))

{

	$id=$date['id'];

	$name=$date['name'];



	$img_name=$date['img'];  //图片

	$img='../../userfiles/'.$img_name;

	$href_img=$date['href_img'];  //远程LOGO

	$sort=$date['sort'];

	



	?>

	<tr valign="middle" align="center">

	  

	  <td  class="tdBorder1">&nbsp;<?=$name?></td>

      <td  class="tdBorder1"><img src="<?=$img?>" width="88"></td>

      <td  class="tdBorder1"><?=$sort?></td>

	<td class="tdBorder1">&nbsp;&nbsp;<a href="news_img.php?del=<?=$id?>&class=<?=$class?>&fid=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>&type1=<?=$_GET['type1']?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" ></a></td>

  </tr>

<?php

}

?>

 </table>


<p>&nbsp;</p>

<FORM action="news_img.php?class=<?=$class?>&fid=<?=$_GET['fid']?>&classIndex=<?=$_GET['classIndex']?>&type1=<?=$_GET['type1']?>" method="post" enctype="multipart/form-data">

<table width="90%" border="0" align="center" cellspacing="1" bgcolor="#999999" >

  <tr bgcolor="#FFFFFF" height="28px">

    <td width="16%" align="center" valign="middle" >名称:</td>

    <td width="84%">&nbsp;<input name="name" type="text" size="40"> 

     </td>

  </tr>

  <tr bgcolor="#FFFFFF" height="28px">

    <td align="center" valign="middle" >顺序:</td>

    <td>&nbsp;<input name="sort" type="text" size="40" value="0"></td>

  </tr>

  <tr bgcolor="#FFFFFF" height="28px">

    <td align="center" valign="middle">图片:</td>

    <td>&nbsp;<input type="file" name="img"></td>

  </tr>

  <tr bgcolor="#FFFFFF" height="28px">

    <td align="center" valign="middle" >&nbsp;</td>

    <td>&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>

  </tr>

</table>

</FORM>

</div>

</body></html>