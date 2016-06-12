<?php
session_start();
$imager=imagecreate(70,20);//设定画布
$blackcolor=imagecolorallocate($imager,220,220,240);
$color=imagecolorallocate($imager,0,0,20);
$red=imagecolorallocate($imager,50,80,200);
header("content-type:image/png");
imagerectangle($imager,1,1,80,50,$blackcolor);
$text_array=array(a,b,c,d,e,f,g,e,h,y,g,y,m,q,w,r,t,u,i,o,p,s,j,k,l,z,x,v,n);
shuffle($text_array);
for($i=0;$i<4;$i++)
{
	$texe.=$text_array[$i];
}
$_SESSION["authimg"]=$texe;
imagestring($imager,5,15,2,"$texe",$color);
for($i=0;$i<200;$i++) //加入干扰象素 
{ 
$randcolor = ImageColorallocate($imager,rand(0,255),rand(0,255),rand(0,255));//取得随机颜色
imagesetpixel($imager, rand()%70 , rand()%30 , $randcolor); //取的随机位置，像素点
} 

imagepng($imager);
imagedestroy($imager);
?>