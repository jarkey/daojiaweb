<?php
include_once('../inc/config.inc.php');
include_once('mysql.php');
include_once('sortclass.php');
permissions('news_1_sel'); //权限
$db_name='gplat_news_class';

?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">栏目管理</td>
    </tr> 
 
<?php

$db=new Mysql($host,$user,$pass,$db,true);
$SC=new sortclass();
$PhpSelf='news_class.php';

if(!get_magic_quotes_gpc()){
	$_POST=addslashes_array($_POST);
	$_GET=addslashes_array($_GET);
	}

$Action=$_GET['Action']?$_GET['Action']:"Show";

function makeselect($ParentCatagoryID,$Sort)
{
$Select="<select name=\"ParentCatagoryID\">";
$Select.="<option value=\"0\">请选择父分类</option>";
foreach($Sort as $v){
	$Value=str_repeat("|-",$v['Deep']).$v['Sort']['Name']."(".$v['Sort']['CatagoryID'].")";
	if($ParentCatagoryID==$v['Sort']['CatagoryID']){
		$Select.="<option value=\"{$v['Sort']['CatagoryID']}\" selected=\"selected\">$Value</option>";
		}else{
		$Select.="<option value=\"{$v['Sort']['CatagoryID']}\">$Value</option>";
		}
	}
$Select.="</select>";
return $Select;
}

function stripslashes_array($array) {
         $array = is_array($array) ?
         	 array_map('stripslashes_array',$array) :
                  stripslashes($array);
          return $array;
	}

function addslashes_array($array){
         $array = is_array($array) ?
         	 array_map('addslashes_array',$array) :
                  addslashes($array);
         return $array;
       }

function safecover($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = safecover($val);
		}
	} else {
		$string = str_replace('&', '&amp;', $string);
		$string = str_replace('"', '&quot;', $string);
		$string = str_replace('<', '&lt;', $string);
		$string = str_replace('>', '&gt;', $string);
        $string = str_replace("\t","",$string);
        $string = str_replace("\n","<br>",$string);
        $string = str_replace("\r","",$string);
	}
	return $string;
}

function exitstr($str)
{
echo "<pre>";
print_r($str);
echo "</pre>";
exit;
} 

if($Action=="Show"){
	$CatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:$SC->getrootid();
	$Sort=$SC->Sort2array($CatagoryID);

	if(count($Sort)<1){
		$SC->referto("暂无类别,请先增加类别","{$PhpSelf}?Action=Add",3);
		}
	foreach($Sort as $v){
		//echo str_repeat("|--",$v['Deep']).$v['Sort']['Name']." <a href={$PhpSelf}?Action=Edit&CatagoryID={$v['Sort']['CatagoryID']}>编辑</a> <a href={$PhpSelf}?Action=Delete&CatagoryID={$v['Sort']['CatagoryID']} >删除</a> <a href={$PhpSelf}?Action=Add&CatagoryID={$v['Sort']['CatagoryID']}>增加子分类</a>"."<br />";
		$issystem=$v['Sort']['issystem'];
		$classId=$v['Sort']['CatagoryID'];		
		$className=$v['Sort']['Name'];
		if($issystem==1){
			$className1='<font color=red>'.$className.'</font>';
		}else{
			$className1=$className;
		}
		echo '<tr valign="middle"><td class="tdBorder1">';
		echo str_repeat("|--",$v['Deep']).$className1."</td>\n 
		<td class=tdBorder1>
		<a href={$PhpSelf}?Action=Edit&CatagoryID={$classId}>编辑</a> 
		<a href={$PhpSelf}?Action=Delete&CatagoryID={$classId}&issystem={$issystem}>删除</a> 
		<a href={$PhpSelf}?Action=Add&CatagoryID={$classId}>增加子分类</a>
		</td>\n 
		<td class=tdBorder1>
		<a href=news_admin.php?class={$classId}&className={$className}>文章管理</a>"."</td>\n </tr>";		
		}


	exit;
	}

if($Action=="Delete"){
	/*if($_GET['issystem']==1){
		$SC->referto("这是系统类别，不能删除","{$PhpSelf}?Action=Show",3);
		exit;
	}*/
	if($SC->deletesort($_GET['CatagoryID'])){
		$SC->referto("成功删除类别","{$PhpSelf}?Action=Show",3);
		}
	exit;
	}

if($Action=="Edit"){
$Catagory=$SC->checkcatagory($_GET['CatagoryID']);
$Sort=$SC->sort2array(0);
$ParentCatagoryID=$SC->getparent($_GET['CatagoryID']); 
$Number=count($ParentCatagoryID);
$Select=makeselect($ParentCatagoryID[$Number-1]['CatagoryID'],$Sort);

?>

<tr valign="middle"><td class="tdBorder1">
	<form id="form1" name="form1" method="post" action="<?=$PhpSelf?>?Action=EditSave">
	<input type="text" name="Name" value="<?=$Catagory['Name']?>"/> 
	<input type="hidden" name="CatagoryID" value="<?=$Catagory['CatagoryID']?>" />
	<?=$Select?>	
	<input type="submit" name="Submit" value="提交" />
	</form>
</td></tr>    
<?php
	//exit;
	}

if($Action=="Add"){
	$ParentCatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:0;
	$Sort=$SC->sort2array(0);
	$Select=makeselect($ParentCatagoryID,$Sort);
?>

<tr valign="middle"><td class="tdBorder1">
	<form id="form1" name="form1" method="post" action="<?=$PhpSelf?>?Action=AddSave">
	<input type="text" name="Name"/> 
	<?=$Select?>	
	<input type="submit" name="Submit" value="提交" />
	</form>
</td></tr>    

<?php
	//exit;
	}

if($Action=="AddSave"){	
	$_POST['Name']=safecover($_POST['Name']);
	$ParentCatagoryID=($_POST['ParentCatagoryID']==0)?$SC->getrootid():$_POST['ParentCatagoryID'];
	if($SC->addsort($ParentCatagoryID,$_POST['Name'])){
		$SC->referto("成功增加新的类别","{$PhpSelf}?Action=Show",3);
		}else{
		$SC->referto("增加新的类别失败了","{$PhpSelf}?Action=Show",3);
		}
	//exit;
	}

if($Action=="EditSave"){
	$name=$_POST['Name'];
	//更新编辑名称,如果改动了位置再移动类别,不可以将大类别移动到子类别里面
	$Query="UPDATE `".$SC->tablefix."` SET `Name`='$name' WHERE `CatagoryID`={$_POST['CatagoryID']} LIMIT 1";
	
	$db->query($Query);
	$Children=$SC->getcatagory($_POST['CatagoryID'],2);
	foreach($Children as $v){
		$IDS[]=$v['CatagoryID'];
		}
	if(in_array($_POST['ParentCatagoryID'],$IDS)){
		$SC->referto("不能移动到子类别","{$PhpSelf}?Action=Edit&CatagoryID={$_POST['CatagoryID']}",3);
		}else{
		if($SC->movecatagory($_POST['CatagoryID'],$_POST['ParentCatagoryID'])){
			$SC->referto("成功编辑类别","{$PhpSelf}?Action=Show",3);
			}
		}
	
	}

?>
</table>
</body></html>