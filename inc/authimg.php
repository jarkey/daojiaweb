<?php
/*******
������֤��
����Ҫ�ĵط�����<img src="authimg.php">���������4λ��
********/
include('config.inc.php');
$imager=imagecreate(90,25);//�趨����
$blackcolor=imagecolorallocate($imager,220,220,240);
$color=imagecolorallocate($imager,0,0,20);
$red=imagecolorallocate($imager,50,80,200);
header("content-type:image/png");
imagerectangle($imager,1,1,80,50,$blackcolor);
//$text_array=array(a,b,c,d,e,f,g,e,h,y,g,y,m,q,w,r,t,u,i,o,p,s,j,k,l,z,x,v,n);
$text_array=array('a','b','c','d','e','f','g','e','h','y','g','y','m','q','w','r','t','u','i','o','p','s','j','k','l','z','x','v','n');
shuffle($text_array);
for($i=0;$i<4;$i++)
{
	$text_content.=$text_array[$i];
	$texe.=$text_array[$i].' ';
}
$_SESSION["authimg"]=$text_content;
imagestring($imager,15,15,3,"$texe",$color);
for($i=0;$i<200;$i++) //����������� 
{ 
$randcolor = ImageColorallocate($imager,rand(0,255),rand(0,255),rand(0,255));//ȡ�������ɫ
imagesetpixel($imager, rand()%90 , rand()%30 , $randcolor); //ȡ�����λ�ã����ص�
} 

imagepng($imager);
imagedestroy($imager);
?>