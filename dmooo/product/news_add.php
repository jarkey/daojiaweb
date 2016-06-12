<?php 
include_once('../inc/config.inc.php');
permissions('product_2_in');
$class=$_GET['class'];
$classIndex=$_GET['classIndex'];

if($_POST['hidden']==1)
{
	if(!$_POST['class'])
		{
	echo("<script language=javascript>alert('请选择类别！');</script>"); 
		echo'<meta http-equiv="refresh" content="0; url=news_add.php"/>';
		exit;
	}
	$tag=$_POST['tag'];
	$description=$_POST['description'];	
	$product_color=$_POST['product_color'];
	$productName=$_POST['productName'];
	$outLink=$_POST['outLink'];
	$sticky=$_POST['sticky'];
	$class=$_POST['class'];
	if (!empty($_POST['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = stripslashes($_POST['content']);
		} else {
			$content = $_POST['content'];
		}
	}
  $content = str_replace('\'', "''", $content);
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
	$news=$_POST['news'];
	$recommended=$_POST['recommended'];
	$specifications=$_POST['specifications'];
	$introduce=$_POST['introduce'];
	$size=$_POST['size'];
	$sale=$_POST['sale'];
	$issale=$_POST['issale'];
	$brand=$_POST['brand'];
	$origin=$_POST['origin'];
	$materials=$_POST['materials'];	
	$sort=$_POST['sort'];	
	
/** 保持session*
$_SESSION['a_productName']=$productName;
$_SESSION['a_specifications']=$specifications;
$_SESSION['a_mPrice']=$mPrice;
$_SESSION['a_outLink']=$outLink;
$_SESSION['a_introduce']=$introduce;
$_SESSION['a_content']=$content;
$_SESSION['a_tag']=$tag;
$_SESSION['a_description']=$description;
$_SESSION['a_size']=$size;
$_SESSION['a_sale']=$sale;
$_SESSION['a_brand']=$brand;
$_SESSION['a_origin']=$origin;
$_SESSION['a_size']=$size;
$_SESSION['a_productColor']=$product_color;
$_SESSION['a_materials']=$materials;
**session end**/

/************图片1上传*************/
if($_FILES['img']['tmp_name']){

if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/jpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png' && $_FILES['img']['type']!='image/png'){
   echo '文件不是JPG,PNG,GIF图片！';
   exit;
}
$today = date("YmdHis");
$filetype=$_FILES['img']['type'];
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
if($filetype == 'image/png'){
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
/************图片1上传结束，取得图片1新的文件名*************/


mysql_query("set sql_mode=''");
$sql="insert into dmooo_product(productName,outLink,content,class,fClass,productNum,issystem,mPrice,memberPrice,inventory,hot,recommended,introduce,sticky,times,clickNum,TitleFontColor,TitleFontType,img,specifications,tag,product_color,size,news,sale,issale,brand,materials,description,origin,classIndex,sort,views) values ('$productName','$outLink','$content','$class','$fClass','$productNum','$issystem','$mPrice','$memberPrice','$inventory','$hot','$recommended','$introduce','$sticky','$times','$clickNum','$TitleFontColor','$TitleFontType','$img','$specifications','$tag','$product_color','$size','$news','$sale','$issale','$brand','$materials','$description','$origin','$classIndex','$sort',0)";
$result=mysql_query($sql) or die(mysql_error());
if($result!=0){
    echo("<script language=javascript>alert('添加成功');</script>"); 
	
}

}
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s'); 
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
<link rel="stylesheet" href="../kindeditor-4.1.7/themes/default/default.css" />
	<link rel="stylesheet" href="../kindeditor-4.1.7/plugins/code/prettify.css" />
	<script charset="utf-8" src="../kindeditor-4.1.7/kindeditor.js"></script>
	<script charset="utf-8" src="../kindeditor-4.1.7/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../kindeditor-4.1.7/plugins/code/prettify.js"></script>
    <script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '../kindeditor-4.1.7/plugins/code/prettify.css',
				uploadJson : '../kindeditor-4.1.7/php/upload_json.php',
				fileManagerJson : '../kindeditor-4.1.7/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
<form action="news_add.php?class=<?=$class?>&classIndex=<?=$classIndex?>" method="post" enctype="multipart/form-data">
  <br>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="6" class="tdBorder1 titleBg1">添加商品</td>
    </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">商品名称</td>
    <td colspan="5" class="tdBorder1" scope="col"><label>
      <input name="productName" type="text" id="productName" size="50" >
      <input type="hidden" name="hidden" value="1">
      </label>
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
        
        </select>
    </td>
    </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">商品图片1</td>
    <td colspan="3" class="tdBorder1" scope="col"><input name="img" type="file" size="40"></td>
    <td class="tdBorder1" scope="col">类别</td>
    <td class="tdBorder1" scope="col"><select name="class" id="class">
      <option value="">--选择类别--</option>
      <?php
	  $sql="select * from dmooo_productclass2 order by id desc";
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
    </select></td>
    </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">关键字</td>
    <td colspan="3" class="tdBorder1" scope="col"><input type="text" name="tag" size="20" ></td>
    <td class="tdBorder1" scope="col">品牌</td>
    <td class="tdBorder1" scope="col"><?=ppz('brand',$_SESSION['a_brand'])?></td>
  </tr>
 
  <tr>
    <td align="center" class="tdBorder1" scope="col">描述语</td>
    <td colspan="3" class="tdBorder1" scope="col"><input name="description" type="text" id="description"  size="20"></td>
    <td class="tdBorder1" scope="col">储存</td>
    <td class="tdBorder1" scope="col"><?=ggz('6','materials',$_SESSION['a_materials'])?></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">排序</td>
    <td class="tdBorder1" scope="col"><input type="text" name="sort" size="15" value="1">
   </td>
    <td class="tdBorder1" scope="col"><p >库存</p></td>
    <td class="tdBorder1" scope="col"><input type="text" name="inventory" size="5"></td>
    <td class="tdBorder1" scope="col">计量单位</td>
    <td class="tdBorder1" scope="col"><input type="text" name="specifications" size="5"  ></td>
    </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">产地</td>
    <td class="tdBorder1" scope="col"><?=ggz('8','origin',$_SESSION['a_origin'])?></td>
    <td class="tdBorder1" scope="col">颜色</td>
    <td class="tdBorder1" scope="col"><?=ggz('4','product_color',$_SESSION['a_productColor'])?></td>
    <td class="tdBorder1">规格</td>
    <td class="tdBorder1"><input type="text" name="size" size="5"></td>
    </tr>

  <tr>
    <td align="center" class="tdBorder1" scope="col">市场价</td>
    <td class="tdBorder1" scope="col"><input type="text" name="mPrice" size="5" >
      </td>
    <td class="tdBorder1" scope="col"><p >会员价</p></td>
    <td class="tdBorder1" scope="col"><input type="text" name="memberPrice" size="5" ></td>
    <td class="tdBorder1" scope="col">促销价</td>
    <td class="tdBorder1" scope="col"><input type="text" name="sale" size="5" ></td>
    </tr>
  <tr>
    <td align="center" class="tdBorder1">外部链接</td>
    <td class="tdBorder1"><input name="outLink" type="text" id="outLink" size="25" ></td>
    <td class="tdBorder1">时间</td>
    <td width="4%" class="tdBorder1"><input name="times" type="text" id="times"  onClick="setDayHM(this);" size="15" value="<?=$times?>" ></td>
    <td class="tdBorder1">点击数</td>
    <td class="tdBorder1"><input name="clickNum" type="text" value="0" size="5"></td>
    </tr>
  <tr ><td align="center" class="tdBorder1">简要说明</td>
    <td colspan="5" class="tdBorder1"><label>
      <textarea name="introduce" id="introduce" cols="80" rows="3"></textarea>
      </label></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>
    <input type="checkbox" name="sticky" value="1">置顶<br>
     <input type="checkbox" name="hot" value="1">热销<br>
      <input type="checkbox" name="recommended" value="1">推荐<br>
      <input type="checkbox" name="news" value="1">新品<br>
      <input type="checkbox" name="issale" value="1">促销<br>
</td>
    <td colspan="5" class="tdBorder1"><textarea name="content" style="width:100%;height:400px;visibility:hidden;"></textarea></td>
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