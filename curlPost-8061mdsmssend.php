<?php
$mobile=$_POST['mobile'];
$text_array=array('0','1','2','3','4','5','6','7','8','9');
shuffle($text_array);
for($i=0;$i<4;$i++)
{
	$texe.=$text_array[$i];
}
setcookie('authimg',$texe,time()+1800);
setcookie('mobile',$mobile,time()+1800);
$content='欢迎光临到家优蔬，您的验证码为'.$texe.'，请在30分钟内使用【到家优蔬】';

/*
 * Created on 2014-10-23
 *测试发短信
 */

echo $result;

$post_data = array();
$post_data['userid'] = 1338;//改为自己的id
$post_data['account'] = 'daojia';
$post_data['password'] = 'daojia_765431';
//$post_data['content'] = iconv("gbk", "UTF-8", $content); 
$post_data['content'] = $content ; 
$post_data['mobile'] = $mobile;
$post_data['sendtime'] = ''; //不定时发送，值为0，定时发送，输入格式YYYYMMDDHHmmss的日期值
$url='http://115.28.179.225:8888/sms.aspx?action=send';
$o='';
foreach ($post_data as $k=>$v)
{
   $o.="$k=".urlencode($v).'&';
}
$post_data=substr($o,0,-1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
$result = curl_exec($ch);

echo $result."<br>";//返回值显示

?>