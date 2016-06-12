<?php
include_once('../../inc/softInfo.php');
include_once('../inc/config.inc.php');
if($_POST['admin_web']=='admin_web')
{
	$clothing=$_POST['clothing'];
	$mail_name=$_POST['mail_name'];
	$mail_url=$_POST['mail_url'];
	$web_title=$_POST['web_title'];
	$wenda_num=$_POST['wenda_num'];
	$news_num=$_POST['news_num'];
	$templates=$_POST['templates'];
	$faq_fid=$_POST['faq_fid'];
	$faq_classid=$_POST['faq_classid'];
	$faq_name=$_POST['faq_name'];
	$faq_timeView=$_POST['faq_timeView'];	
	$memberPointFree=$_POST['memberPointFree'];
	$memberNews_timeView=$_POST['memberNews_timeView'];	
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$copyright=$_POST['copyright'];	
	$shopx8UrlRewite=$_POST['shopx8UrlRewite'];		
	
	$noticeWindowView=$_POST['noticeWindowView'];
	$royaltyPercentage=$_POST['royaltyPercentage'];
	
	$sql="update gplat_web set clothing='$clothing',mail_name='$mail_name',mail_url='$mail_url',web_title='$web_title',wenda_num='$wenda_num',news_num='$news_num',templates='$templates',faq_fid='$faq_fid',faq_classid='$faq_classid',faq_name='$faq_name',faq_timeView='$faq_timeView',memberNews_timeView='$memberNews_timeView',keywords='$keywords',description='$description',copyright='$copyright',memberPointFree='$memberPointFree',noticeWindowView='$noticeWindowView',royaltyPercentage='$royaltyPercentage',shopx8UrlRewite='$shopx8UrlRewite' where webid=1";
	
	$result=mysql_query($sql) or die(mysql_errno());
	if($result!=0){	
	  $str = file_get_contents('../../inc/basicParameters_temp.php');
	  $str=str_replace("{GUEST_CLOTHING}",$clothing,$str);
	  $str=str_replace("{NOTICE_MAIL_NAME}",$mail_name,$str);
	  $str=str_replace("{NOTICE_MAIL_URL}",$mail_url,$str);
	  $str=str_replace("{WEB_TITLE}",$web_title,$str);
	  $str=str_replace("{WENDA_VIEW_NUM}",$wenda_num,$str);
	  $str=str_replace("{NEWS_VIEW_NUM}",$news_num,$str);
	  $str=str_replace("{TEMPLATES}",$templates,$str);
	  $str=str_replace("{faq_fid}",$faq_fid,$str);
	  $str=str_replace("{faq_classid}",$faq_classid,$str);	  
	  $str=str_replace("{faq_name}",$faq_name,$str);
	  $str=str_replace("{faq_timeView}",$faq_timeView,$str);  
	  $str=str_replace("{memberPointFree}",$memberPointFree,$str);	
	  $str=str_replace("{memberNews_timeView}",$memberNews_timeView,$str);
	  $str=str_replace("{keywords}",$keywords,$str);
	  $str=str_replace("{description}",$description,$str);	  
	  $str=str_replace("{copyright}",$copyright,$str);   
	  $str=str_replace("{noticeWindowView}",$noticeWindowView,$str);	
	  $str=str_replace("{royaltyPercentage}",$royaltyPercentage,$str);
	  $str=str_replace("{shopx8UrlRewite}",$shopx8UrlRewite,$str);	  
	  file_put_contents('../../inc/basicParameters.php',$str);	  
	 
	  
	  echo'<script>alert("恭喜您，修改成功")</script>';
	  echo'<meta http-equiv="refresh" content="0; url=admin_web.php"/>';
	  exit;		
	}		
}
	$sql_s="select * from gplat_web where webid=1";
	$result_s=mysql_query($sql_s);
	$data=mysql_fetch_assoc($result_s);
?>
<HTML>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="" method="post">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">网站参数设置</td>
    </tr>
  <tr>
    <td width="150" class="tdBorder1">在线问答回复名称</td>
    <td class="tdBorder1"><input type="text" name="clothing" value="<?=$data['clothing']?>"><input type="hidden" name="admin_web" value="admin_web"></td>
  </tr>
  <tr>
    <td class="tdBorder1">提醒邮件的名称</td>
    <td class="tdBorder1"><input type="text" name="mail_name" value="<?=$data['mail_name']?>"></td>
  </tr>
  <tr>
    <td class="tdBorder1">提醒邮件的查看连接网址</td>
    <td class="tdBorder1"><input name="mail_url" type="text" value="<?=$data['mail_url']?>" size="50"></td>
  </tr>
  <tr>
    <td class="tdBorder1">网站标题</td>
    <td class="tdBorder1"><input name="web_title" type="text" value="<?=$data['web_title']?>" size="50"></td>
  </tr>
  <tr>
    <td class="tdBorder1">问答每页显示的记录数</td>
    <td class="tdBorder1"><input name="wenda_num" type="text" value="<?=$data['wenda_num']?>" size="2"></td>
  </tr>
  <tr>
    <td class="tdBorder1">新闻每页的现实数目</td>
    <td class="tdBorder1"><input name="news_num" type="text" value="<?=$data['news_num']?>" size="2"></td>
  </tr>
  <tr style="display:none">
    <td class="tdBorder1">模板默认目录</td>
    <td class="tdBorder1"><input type="text" name="templates" value="<?=$data['templates']?>"></td>
  </tr>
  <tr style="display:none">
    <td colspan="2" class="tdBorder1 tdBg1">常见问题设置</td>
    </tr>
  <tr style="display:none">
    <td class="tdBorder1">常见问题fid</td>
    <td class="tdBorder1"><input name="faq_fid" type="text" id="faq_fid" value="<?=$data['faq_fid']?>" size="8">
      多个fid，例：19,25</td>
  </tr>
  <tr style="display:none">
    <td class="tdBorder1">常见问题默认内容id</td>
    <td class="tdBorder1"><input name="faq_classid" type="text" id="faq_classid" value="<?=$data['faq_classid']?>" size="2"></td>
  </tr>
  <tr style="display:none">
    <td class="tdBorder1">常见问题默认内容标题</td>
    <td class="tdBorder1"><input name="faq_name" type="text" id="faq_name" value="<?=$data['faq_name']?>"></td>
  </tr>
  <tr style="display:none">
    <td class="tdBorder1">常见问题时间显示</td>
    <td class="tdBorder1"><input name="faq_timeView" type="text" id="faq_timeView" value="<?=$data['faq_timeView']?>" size="2">
&nbsp;&nbsp;      0-不显示;1-显示 </td>
  </tr>
  <tr>
    <td colspan="2" class="tdBorder1 tdBg1">会员设置</td>
  </tr>
  <tr>
    <td class="tdBorder1">会员动态时间显示</td>
    <td class="tdBorder1"><input name="memberNews_timeView" type="text" id="memberNews_timeView" value="<?=$data['memberNews_timeView']?>" size="2">
&nbsp;&nbsp;      0-不显示;1-显示 </td>
  </tr>
  <tr>
    <td class="tdBorder1">注册赠送积分</td>
    <td class="tdBorder1"><input name="memberPointFree" type="text" id="memberPointFree" value="<?=$data['memberPointFree']?>" size="5"></td>
  </tr>
  <tr>
    <td class="tdBorder1">推荐提成</td>
    <td class="tdBorder1"><input name="royaltyPercentage" type="text" id="royaltyPercentage" value="<?=$data['royaltyPercentage']?>" size="5"></td>
  </tr>
  <tr>
    <td colspan="2" class="tdBorder1 tdBg1">SEO设置</td>
  </tr>
  <tr>
    <td class="tdBorder1">keywords</td>
    <td class="tdBorder1"><input name="keywords" type="text" value="<?=$data['keywords']?>" size="50"></td>
  </tr>
  <tr>
    <td class="tdBorder1">description</td>
    <td class="tdBorder1"><textarea name="description" cols="50" rows="" id="description"><?=$data['description']?>
    </textarea></td>
  </tr>
  <tr>
    <td class="tdBorder1">copyright</td>
    <td class="tdBorder1"><input name="copyright" type="text" id="copyright" value="<?=$data['copyright']?>" size="50"></td>
  </tr>
  <tr>
    <td class="tdBorder1">是否静态化</td>
    <td class="tdBorder1"><input name="shopx8UrlRewite" type="text" id="shopx8UrlRewite" value="<?=$data['shopx8UrlRewite']?>" size="2">
      &nbsp;&nbsp;      0-php动态;1-静态化 </td>
  </tr>
  <tr>
    <td colspan="2" class="tdBorder1 tdBg1">首页显示商品数量</td>
  </tr>
  <tr>
    <td class="tdBorder1">商品数量</td>
    <td class="tdBorder1"><input name="noticeWindowView" type="text" id="noticeWindowView" value="<?=$data['noticeWindowView']?>" size="3">
  &nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="tdBorder1"><input type="submit" value="确定"></td>
  </tr>
  </table>
<br>
<br>
<input type="hidden" name="admin_web" value="admin_web">
</form>
</body>
</HTML>