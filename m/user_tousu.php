<?php 
$pageTitle="��Ա����";    //��ǰҳ����
$nav=3;
include_once("../inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}

/***********��ӷ���**************/
if($_POST['add_service'])
{ 
	$submitTitle=$_POST['submitTitle'];  //����
	$submitContent=$_POST['submitContent'];  //����
	$userid=$_SESSION['userid'];
	date_default_timezone_set('Asia/Shanghai');
	$submitTime=date('Y-m-d H:i:s');   //�ύʱ��
	$serviceNo=date('YmdHis');  //������	
	$ii=array('0','1','2','3','4','5','6','7','8','9');
	shuffle($ii);
    for($i=0;$i<3;$i++) $texe.=$text_array[$i];
    $serviceNo=$serviceNo.$texe;  
    $processStatus=1;   //����״̬
    $serviceIndex=2;    //�������
    $sql="insert into gplat_service  (serviceNo,submitTitle,submitContent,userid,submitTime,serviceIndex,processStatus) values ('$serviceNo','$submitTitle','$submitContent','$userid','$submitTime','$serviceIndex','$processStatus')";

$result=mysql_query($sql)or die(mysql_error());

	if($result!=0)
	{
     echo '<script>alert("�ύ�ɹ������ǻᾡ�촦��!");</script>';	
	 echo '<script>window.location.href="user_tousu.php";</script>';
	 exit;
		
	}else{
	 echo("<script>alert('�ύʧ�ܣ�����������ϵ');</script>");			
	}
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--����Ӧ�ֻ���Ļ-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end ����Ӧ�ֻ���Ļ-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
</head>


<body>
<div class="top_w2"> 
	<div class="back1"><a href="user_change.php">&lt;</a></div>
    Ͷ�߽���
    <div class="back2"><a href="user_change.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="">
<div class="tsjy">
    	<form action="#" method="post">
    	<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="23%" align="right">���⣺</td>
              <td width="77%"><input name="submitTitle" type="text" class="bt_text" /></td>
            </tr>
            <tr>
            	<td align="right" valign="top">��ϸ���ݣ�</td>
              <td><textarea name="submitContent" cols="" rows=""></textarea>
              <input name="add_service" type="hidden" id="add_service" value="add_service"></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" value="�ύ" class="tj_btn" /></td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
