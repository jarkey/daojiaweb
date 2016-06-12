<?php 
include_once('../inc/config.inc.php');

permissions('package_2_up');
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
$sale=$_POST['sale'];
$size=$_POST['size'];
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
$old_img=$_GET['img'];
@unlink("../../userfiles/$old_img");
$img=$today . $type;  //取得文件名

}else{$img=$_GET['img'];}
/************图片上传结束，取得图片新的文件名*************/
$sql="update gplat_package set productName='$productName',outLink='$outLink',content='$content',class='$class',productNum='$productNum',inventory='$inventory',hot='$hot',recommended='$recommended',introduce='$introduce',sticky='$sticky',times='$times',clickNum='$clickNum',TitleFontColor='$TitleFontColor',TitleFontType='$TitleFontType',img='$img',specifications='$specifications',news='$news',sale='$sale',size='$size',issale='$issale' where productid=".$_GET['id'];
$result=mysql_query($sql) or die(mysql_error());
if ($result!=0) {
	echo '<script>alert("修改成功");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		  
}
}


/*取出数据*/
$id=$_GET['id'];
$sql="select * from gplat_package where productid=".$id;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$img=$data['img'];
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
<form action="news_revised.php?id=<?=$id?>&img=<?=$img?>" method="post" enctype="multipart/form-data">
  <br>
<table width="97%" height="201" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td width="10%" align="center" class="tdBorder1" scope="col">套餐名称</td>
    <td colspan="5" class="tdBorder1" scope="col">&nbsp;<input name="productName" type="text" id="productName" size="50" value="<?=$data['productName']?>">
      <input type="hidden" name="hidden" value="1">
       <select name="TitleFontColor" id="TitleFontColor">
          <option value="">标题颜色</option>
          <option value="#000000" style="background-color:#000000" <?php if($date3[TitleFontColor]=='#000000'){ echo'selected';}?>></option>
          <option value="#FFFFFF" style="background-color:#FFFFFF" <?php if($date3[TitleFontColor]=='#FFFFFF'){ echo'selected';}?>></option>
          <option value="#008000" style="background-color:#008000" <?php if($date3[TitleFontColor]=='#008000'){ echo'selected';}?>></option>
          <option value="#800000" style="background-color:#800000" <?php if($date3[TitleFontColor]=='#800000'){ echo'selected';}?>></option>
          <option value="#808000" style="background-color:#808000" <?php if($date3[TitleFontColor]=='#808000'){ echo'selected';}?>></option>
          <option value="#000080" style="background-color:#000080" <?php if($date3[TitleFontColor]=='#000080'){ echo'selected';}?>></option>
          <option value="#800080" style="background-color:#800080" <?php if($date3[TitleFontColor]=='#800080'){ echo'selected';}?>></option>
          <option value="#808080" style="background-color:#808080" <?php if($date3[TitleFontColor]=='#808080'){ echo'selected';}?>></option>
          <option value="#FFFF00" style="background-color:#FFFF00" <?php if($date3[TitleFontColor]=='#FFFF00'){ echo'selected';}?>></option>
          <option value="#00FF00" style="background-color:#00FF00" <?php if($date3[TitleFontColor]=='#00FF00'){ echo'selected';}?>></option>
          <option value="#00FFFF" style="background-color:#00FFFF" <?php if($date3[TitleFontColor]=='#00FFFF'){ echo'selected';}?>></option>
          <option value="#FF00FF" style="background-color:#FF00FF" <?php if($date3[TitleFontColor]=='#FF00FF'){ echo'selected';}?>></option>
          <option value="#FF0000" style="background-color:#FF0000" <?php if($date3[TitleFontColor]=='#FF0000'){ echo'selected';}?>></option>
          <option value="#0000FF" style="background-color:#0000FF" <?php if($date3[TitleFontColor]=='#0000FF'){ echo'selected';}?>></option>
          <option value="#008080" style="background-color:#008080" <?php if($date3[TitleFontColor]=='#008080'){ echo'selected';}?>></option>
        </select>
        <select name="TitleFontType" id="TitleFontType">
          <option value="0" <?php if($date3[TitleFontType]=='0'){ echo'selected';}?>>标题字形</option>
          <option value="b" <?php if($date3[TitleFontType]=='b'){ echo'selected';}?>>粗体</option>
          <option value="i" <?php if($date3[TitleFontType]=='i'){ echo'selected';}?>>斜体</option>
          <option value="3" <?php if($date3[TitleFontType]=='3'){ echo'selected';}?>>粗+斜</option>
        </select>     </td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1">套餐图片</td>
    <td colspan="3" class="tdBorder1">&nbsp;<input name="img" type="file" size="30">
  &nbsp;</td>
    <td class="tdBorder1" scope="col"><p >促销价</p></td>
    <td class="tdBorder1" scope="col"><input name="sale" type="text" id="sale" value="<?=$data['sale']?>" size="15"></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">套餐编号</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="productNum" size="15" value="<?=$data['productNum']?>">    </td>
    <td class="tdBorder1" scope="col">套餐重量</td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="specifications" type="text" id="specifications" value="<?=$data['specifications']?>" size="15"></td>
    <td class="tdBorder1" scope="col">套餐颜色</td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="product_color" type="text" id="product_color" value="<?=$data['product_color']?>" size="15"></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col"><p >产品规格</p></td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="size" type="text" id="size" value="<?=$data['size']?>" size="15"></td>
    <td class="tdBorder1" scope="col">关键字</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="tag" size="15"></td>
    <td class="tdBorder1" scope="col">外部链接</td>
    <td class="tdBorder1" scope="col">&nbsp;<input name="outLink" type="text" id="outLink" size="20" value="<?=$data['outLink']?>"></td>
  </tr>
  <tr>
    <td width="10%" align="center" class="tdBorder1" scope="col">市场价格</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="mPrice" size="15" value="<?=$data['mPrice']?>" disabled>   </td>
    <td class="tdBorder1" scope="col">会员价格</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="memberPrice" size="15" value="<?=$data['memberPrice']?>" disabled></td>
    <td class="tdBorder1" scope="col">套餐库存</td>
    <td class="tdBorder1" scope="col">&nbsp;<input type="text" name="inventory" size="15" value="<?=$data['inventory']?>">    </td>
  </tr>
  
  <tr>
    <td align="center" class="tdBorder1">类别</td>
    <td width="32%" class="tdBorder1">&nbsp;<select name="class" id="class">
          <option value="">--选择类别--</option>
          <?php
	  $sql="select * from gplat_packageclass2 order by id desc";
	  $result=mysql_query($sql);
	  while($date=mysql_fetch_assoc($result))
	  {
	  	$id=$date['id'];
	  	$name=$date['name'];
	  	if ($id==$data['class']) {
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
          </select></td>
    <td width="7%" class="tdBorder1">时间</td>
    <td width="13%" class="tdBorder1">&nbsp;<input name="times" type="text" id="times" onClick="setDayHM(this);" size="15" value="<?=$data['times']?>"></td>
    <td width="13%" class="tdBorder1">点击数</td>
    <td width="25%" class="tdBorder1">&nbsp;<input name="clickNum" type="text" size="5" value="<?=$data['clickNum']?>"></td>
  </tr>
  
  
  <tr ><td align="center" class="tdBorder1">简要说明</td>
    <td colspan="5" class="tdBorder1"> &nbsp;
      <label>
        <textarea name="introduce" cols="80" rows="3"><?=$data['introduce']?></textarea>
      </label></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>
    <input type="checkbox" name="sticky" value="1" <?php if($data['sticky']==1){echo'checked';}?>>置顶<br>
     <input type="checkbox" name="hot" value="1" <?php if($data['hot']==1){echo'checked';}?>>热销<br>
      <input type="checkbox" name="recommended" value="1" <?php if($data['recommended']==1){echo'checked';}?>>推荐<br>
      <input type="checkbox" name="news" value="1" <?php if($data['news']==1){echo'checked';}?>>新品<br>
       <input type="checkbox" name="issale" value="1" <?php if($data['issale']==1){echo'checked';}?>>促销</td>
    <td colspan="5" class="tdBorder1"><?php
include_once("../fckeditor/fckeditor_php5.php") ;
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath = '../fckeditor/' ;
$oFCKeditor->Value = "$data[content]" ;

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