<?php
session_start();
$imager=imagecreate(70,20);//�趨����
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
for($i=0;$i<200;$i++) //����������� 
{ 
$randcolor = ImageColorallocate($imager,rand(0,255),rand(0,255),rand(0,255));//ȡ�������ɫ
imagesetpixel($imager, rand()%70 , rand()%30 , $randcolor); //ȡ�����λ�ã����ص�
} 

imagepng($imager);
imagedestroy($imager);
?>