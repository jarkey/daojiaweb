<?php 
include_once('../inc/config.inc.php');
permissions('package_2_in');
$class=$_GET['class'];


if($_POST['hidden']==1)
{
	if(!$_POST['class'])
		{
	echo("<script language=javascript>alert('请选择类别！');</script>"); 
		echo'<meta http-equiv="refresh" content="0; url=news_add.php"/>';
		exit;
	}
$productName=$_POST['productName'];
$outLink=$_POST['outLink'];
$sticky=$_POST['sticky'];
$class=$_POST['class'];
$content=stripslashes( $_POST['FCKeditor1'] ) ;
$fClass=$_POST['fClass'];
$clickNum=$_POST['clickNum'];
$productNum=$_POST['productNum'];
$TitleFontColor=$_POST['TitleFontColor'];
$TitleFontType=$_POST['TitleFontType'];
$times=$_POST['times'];
if(!$_POST['times'])
{
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s'); 
}
$issystem=$_POST['issystem'];
$mPrice=$_POST['mPrice'];
$memberPrice=$_POST['memberPrice'];
$specifications=$_POST['memberPrice'];
$inventory=$_POST['inventory'];
$hot=$_POST['hot'];
$recommended=$_POST['recommended'];
$specifications=$_POST['specifications'];
$introduce=$_POST['introduce'];
$news=$_POST['news'];
$size=$_POST['size'];
$sale=$_POST['sale'];
$issale=$_POST['issale'];
/************图片上传*************/
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

if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png'){
   echo '文件不是JPG,PNG,GIF图片！';
   exit;
}
$today = date("YmdHis");
$filetype = $_FILES['img']['type'];
if($filetype == 'image/pjpeg'){
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
/************图片上传结束，取得图片新的文件名*************/
$sql="insert into gplat_package(productName,outLink,content,class,fClass,productNum,issystem,mPrice,memberPrice,inventory,hot,recommended,introduce,sticky,times,clickNum,TitleFontColor,TitleFontType,img,specifications,news,sale,issale) values ('$productName','$outLink','$content','$class','$fClass','$productNum','$issystem','$mPrice','$memberPrice','$inventory','$hot','$recommended','$introduce','$sticky','$times','$clickNum','$TitleFontColor','$TitleFontType','$img','$specifications','$news','$sale','$issale')";
$result=mysql_query($sql) or die(mysql_error());
if($result!=0){
    echo("<script language=javascript>alert('添加成功');</script>"); 
	echo'<meta http-equiv="refresh" content="0; url=news_admin.php?class='.$class.'"/>';
	exit;
}

}
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d'); 
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script type="text/javascript" src="../inc/jquery/Calendar.js"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">

<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
  <br>
<table height="201" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="6" class="tdBorder1 titleBg1">添加套餐</td>
    </tr>
  <tr>
    <td width="10%" align="center" class="tdBorder1" scope="col">套餐名称</td>
    <td colspan="5" class="tdBorder1" scope="col">&nbsp;<input name="productName" type="text" id="productName" size="50">
      <input type="hidden" name="hidden" value="1">
      <select name="TitleFontColor" id="TitleFontColor">
          <option value="" selected>标题颜色</option>
          <option value="#000000" style="background-color:#000000"></option>
          <option value="#FFFFFF" style="background-color:#FFFFFF"></option>
          <option value="#008000" style="background-color:#008000"></option>
          <option value="#800000" style="background-color:#800000"></option>
          <option value="#808000" style="background-color:#808000"></option>
          <option value="#000080" style="background-color:#000080"></option>
          <option value="#800080" style="background-color:#800080"></option>
          <option value="#808080" style="background-color:#808080"></option>
          <option value="#FFFF00" style="background-color:#FFFF00"></option>
          <option value="#00FF00" style="background-color:#00FF00"></option>
          <option value="#00FFFF" style="background-color:#00FFFF"></option>
          <option value="#FF00FF" style="background-color:#FF00FF"></option>
          <option value="#FF0000" style="background-color:#FF0000"></option>
          <option value="#0000FF" style="background-color:#0000FF"></option>
          <option value="#008080" style="background-color:#008080"></option>
        </select>
        <select name="TitleFontType" id="TitleFontType">
          <option value="0" selected>标题字形</option>
          <option value="b">粗体</option>
          <option value="i">斜体</option>
          <option value="3">粗+斜</option>
        </select>     </td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">套餐图片</td>
    <td colspan="3" class="tdBorder1" scope="col">&nbsp;<input name="img" type="file" size="35"></td>
    <td class="tdBorder1" scope="col">促销价格</td>
    <td class="tdBorder1" scope="col"><input name="sale" type="text" size="15" maxlength="0" id="sale"></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">套餐编号</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="productNum" size="15">   </td>
    <td class="tdBorder1" scope="col">套餐重量</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="specifications" size="15" id="specifications"></td>
    <td class="tdBorder1" scope="col">套餐颜色</td>
    <td class="tdBorder1" scope="col"><input type="text" name="product_color" size="15" id="product_color"></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">产品规格</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="size" size="15"></td><td class="tdBorder1" scope="col">关键字</td>
    <td class="tdBorder1" scope="col"> &nbsp;<input type="text" name="tag" size="15"></td><td class="tdBorder1" scope="col">外部链接</td>
    <td class="tdBorder1" scope="col"><input name="outLink" type="text" id="outLink" size="30"></td>
  </tr>
  <tr>
    <td width="10%" align="center" class="tdBorder1" scope="col">市场价格</td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="mPrice" type="text" size="15" maxlength="0" disabled>   </td>
    <td class="tdBorder1" scope="col">会员价格</td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="memberPrice" type="text" size="15" maxlength="0" disabled></td>
    <td class="tdBorder1" scope="col">套餐库存</td>
    <td class="tdBorder1" scope="col"><input type="text" name="inventory" size="15">    </td>
  </tr>
  
  <tr>
    <td align="center" class="tdBorder1">类别</td>
    <td width="32%" class="tdBorder1">&nbsp;
      <label>
        <select name="class" id="class">
          <option value="">--选择类别--</option>
          <?php
	  $sql="select * from gplat_packageclass2 order by id desc";
	  $result=mysql_query($sql);
	  while($date=mysql_fetch_assoc($result))
	  {
	  	$id=$date['id'];
	  	$name=$date['name'];
	  	if ($id==$class) {
	  		$selected='selected';
	  	}else
	  	{
	  		$selected='';
	  	}
	  ?>
          <option value="<?=$id?>"<?=$selected?>>
            <?=$name?>
            </option>
          <?php
	  
	  }
	  ?>
          </select>
      </label></td>
    <td width="7%" class="tdBorder1">时间</td>
    <td width="13%" class="tdBorder1"><input name="times" type="text" id="times"  onClick="setDay(this);" size="15" value="<?=$times?>" ></td>
    <td width="13%" class="tdBorder1">点击数 </td>
    <td width="25%" class="tdBorder1"><input name="clickNum" type="text" value="0" size="5"></td>
  </tr>
  
  
  <tr ><td align="center" class="tdBorder1">简要说明</td>
    <td colspan="5" class="tdBorder1"> &nbsp;
      <label>
        <textarea name="introduce" id="introduce" cols="80" rows="3"></textarea>
      </label></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>
    <input type="checkbox" name="sticky" value="1">置顶<br>
     <input type="checkbox" name="hot" value="1">热销<br>
      <input type="checkbox" name="recommended" value="1">推荐<br>
      <input type="checkbox" name="news" value="1">新品<br>
      <input type="checkbox" name="issale" value="1">促销</td>
    <td colspan="5" class="tdBorder1"><?php
include_once("../fckeditor/fckeditor_php5.php") ;
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath = '../fckeditor/' ;
$oFCKeditor->Value = "" ;

        //设置它的宽度
$FCKeditor->Width='100%';
        //设置它的高度
$oFCKeditor->Height='400px';
$oFCkeditor->ToolbarSet='Default';
$oFCKeditor->Create() ;
?></td>
  </tr>
 <tr>
    <td align="center" class="tdBorder1">&nbsp;</td>
    <td colspan="5" class="tdBorder1">&nbsp;
      <input type="submit" class="button1" value="提交"></td>
  </tr>
</table>
</form>

</body>
</html>