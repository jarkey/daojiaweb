<?php 

//include_once('inc/provisional.php'); 
echo"$count";
if ($_SERVER['HTTP_REFERER']==$web_html_url.'buy_1.php' or $_SERVER['HTTP_REFERER']=='') {
}else{
	$_SESSION['previous']=$_SERVER['HTTP_REFERER'];
}
$previous=$_SESSION['previous'];

//�����ʱ��
if($_SESSION['user_num']!=''){
	$provisional=new provisional();
	$provisional->provisional_del($_SESSION['user_num']);
	} 
	
/**Ӧ��**/
$a=new cart();

/*****������Ʒ��id�ţ������Ʒ�����ﳵ*******/
if ($productid){

	    //$price_num=$_GET['price_num'];
		
}

?>