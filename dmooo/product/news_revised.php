<?php 
include_once('../inc/config.inc.php');
permissions('product_2_up');
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
$recommended=$_POST['recommended'];
$specifications=$_POST['specifications'];
$introduce=$_POST['introduce'];
$tag=$_POST['tag'];
$news=$_POST['news'];
$size=$_POST['size'];
$product_color=$_POST['product_color'];
$sale=$_POST['sale'];
$issale=$_POST['issale'];
$description=$_POST['description'];	
$brand=$_POST['brand'];
$origin=$_POST['origin'];
$materials=$_POST['materials'];	
$sort=$_POST['sort'];	
$views=$_POST['views'];	


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
$old_img=$_GET['img'];
@unlink("../../userfiles/$old_img");
$img=$today . $type;  //取得文件名

}else{$img=$_GET['img'];}
/************图片1上传结束，取得图片新的文件名*************/




mysql_query("set sql_mode=''");
$sql="update dmooo_product set productName='$productName',outLink='$outLink',content='$content',class='$class',productNum='$productNum',mPrice='$mPrice',memberPrice='$memberPrice',inventory='$inventory',hot='$hot',recommended='$recommended',introduce='$introduce',sticky='$sticky',times='$times',clickNum='$clickNum',TitleFontColor='$TitleFontColor',TitleFontType='$TitleFontType',img='$img',specifications='$specifications',size='$size',product_color='$product_color',tag='$tag',news='$news',sale='$sale',issale='$issale',brand='$brand',materials='$materials',description='$description',origin='$origin',sort='$sort',views='$views' where productid=".$_GET['id'];
$result=mysql_query($sql) or die(mysql_error());
if ($result!=0) {
	echo '<script>alert("修改成功");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		  
}
}


/*取出数据*/
$id=$_GET['id'];
$sql="select * from dmooo_product where productid=".$id;
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
<form action="news_revised.php?id=<?=$id?>&img=<?=$img?>" method="post" enctype="multipart/form-data">
  <br>
<table width="97%" height="201" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td width="9%" align="center" class="tdBorder1" scope="col">商品名称</td>
    <td colspan="5" class="tdBorder1" scope="col"><input name="productName" type="text" id="productName" size="50" value="<?=$data['productName']?>">
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
    <td align="center" class="tdBorder1">商品图片1</td>
    <td colspan="3" class="tdBorder1"><input name="img" type="file" size="30">
      &nbsp;    </td>
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
  </tr>
  <tr>
    <td align="center" class="tdBorder1">关键字</td>
    <td colspan="3" class="tdBorder1">
 <input type="text" name="tag" size="20" value="<?=$data['tag']?>"></td>
    <td class="tdBorder1" scope="col">品牌</td>
    <td class="tdBorder1" scope="col"><?=ppz('brand',$data['brand'])?></td>
  </tr>
 
  <tr>
    <td align="center" class="tdBorder1">储存</td>
    <td colspan="3" class="tdBorder1">
  <?=ggz('6','materials',$data['materials'])?> </td>
    <td class="tdBorder1" scope="col">描述语</td>
    <td class="tdBorder1" scope="col"><input name="description" type="text" id="description" value="<?=$data['description']?>" size="20"></td>
  </tr>
  <tr>
    <td width="9%" align="center" class="tdBorder1" scope="col">排序</td>
    <td class="tdBorder1" scope="col"><input type="text" name="sort" size="15" value="<?=$data['sort']?>">   </td>
    <td class="tdBorder1" scope="col"><p >库存</p></td>
    <td class="tdBorder1" scope="col"><input type="text" name="inventory" size="5" value="<?=$data['inventory']?>"></td>
    <td class="tdBorder1" scope="col">计量单位</td>
    <td class="tdBorder1" scope="col"><input type="text" name="specifications" size="15" value="<?=$data['specifications']?>"></td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1" scope="col">产地</td>
    <td class="tdBorder1" scope="col"><?=ggz('8','origin',$data['origin'])?></td>
    <td class="tdBorder1">颜色</td>
    <td class="tdBorder1"><?=ggz('4','product_color',$data['product_color'])?></td>
    <td class="tdBorder1">规格</td>
    <td class="tdBorder1"><input type="text" name="size" value="<?=$data['size']?>" size="5"></td>
  </tr>
 <tr>
    <td width="9%" align="center" class="tdBorder1" scope="col">市场价</td>
    <td class="tdBorder1" scope="col"><input type="text" name="mPrice" size="5" value="<?=$data['mPrice']?>">   </td>
    <td class="tdBorder1" scope="col"><p >会员价</p></td>
    <td class="tdBorder1" scope="col"><input type="text" name="memberPrice" size="5" value="<?=$data['memberPrice']?>"></td>
    <td class="tdBorder1" scope="col">促销价</td>
    <td class="tdBorder1" scope="col"><input type="text" name="sale" size="5" value="<?=$data['sale']?>"></td>
  </tr>
  
  <tr>
    <td align="center" class="tdBorder1">外部链接</td>
    <td width="35%" class="tdBorder1"><input name="outLink" type="text" id="outLink" size="15" value="<?=$data['outLink']?>"></td>
    <td width="12%" class="tdBorder1">时间</td>
    <td width="11%" class="tdBorder1"><input name="times" type="text" id="times" onClick="setDayHM(this);" size="15" value="<?=$data['times']?>"></td>
    <td width="11%" class="tdBorder1">点击数</td>
    <td width="22%" class="tdBorder1"><input name="clickNum" type="text" size="5" value="<?=$data['productNum']?>"></td>
  </tr>
  
  <tr ><td align="center" class="tdBorder1">简要说明</td>
    <td colspan="5" class="tdBorder1"><textarea name="introduce" cols="80" rows="3"><?=$data['introduce']?></textarea>
</td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>
    <input type="checkbox" name="sticky" value="1" <?php if($data['sticky']==1){echo'checked';}?>>置顶<br>
     <input type="checkbox" name="hot" value="1" <?php if($data['hot']==1){echo'checked';}?>>热销<br>
      <input type="checkbox" name="recommended" value="1" <?php if($data['recommended']==1){echo'checked';}?>>推荐<br>
      <input type="checkbox" name="news" value="1" <?php if($data['news']==1){echo'checked';}?>>新品<br>
      <input type="checkbox" name="issale" value="1" <?php if($data['issale']==1){echo'checked';}?>>促销<br>
      <input type="radio" name="views" value="1" <?php if($data['views']==1){echo'checked';}?>>下架<br>
     <input type="radio" name="views" value="0" <?php if($data['views']!=1){echo'checked';}?>>上架<br>
      </td>
    <td colspan="5" class="tdBorder1"><textarea name="content" style="width:100%;height:300px;visibility:hidden;"><?php echo $data['content']; ?></textarea></td>
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