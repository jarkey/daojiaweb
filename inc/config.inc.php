<?php 


define("DMOOO_CUSTOMER","��������");   //��վ����
$url = $_SERVER['PHP_SELF']; 
$filename= substr( $url , strrpos($url , '/')+1 );   //��ȡ��ǰҳ���ļ���
$allUrl=$filename.'?'.$_SERVER['QUERY_STRING'];      //��ǰ��ҳ+���в���

include_once('dbconfig.php');            //���������ļ�
include_once('news_function.php');       //���²��������ļ�
include_once('products_function.php');   //��Ʒ���������ļ�
include_once('order_function.php');      //�������������ļ�
include_once('user_function.php');       //��Ա���������ļ�
include_once('cart.php');                //���ﳵ���������ļ�
include_once('other_function.php');      //�������������ļ�
include_once('upload_function.php');      //�ļ��ϴ�������
include_once('ad_function.php');          //�����ʾ�����������ļ�
$logistics_num=50;//�������ٽ�����
$logistics_p=10;//��ȡ����
userRecommendAdd();  //��¼�Ƽ���
?>
<?php 
$userId=$_SESSION['userid'];
$userid=$_SESSION['userid'];        //��д���淶��û�жԴ�СдԼ����
$username=$_SESSION['username'];

  if($_SESSION['userid'])
	  {
		 //echo
		 //$user_login=$_SESSION['username'].'&nbsp;����:'.$_SESSION['point'].'�� �ʻ�:'.$_SESSION['amount'].'Ԫ <a href="user_index.php">[��Ա����]</a> <a href="user_order.php">[�ҵĶ���]</a> <a href="user_exit.php?userExit='.$_SESSION['userid'].'">[�˳�]</a> ';
		 $user_login=$_SESSION['username'].',��ӭ���� <a href="user_index.php">[��Ա����]</a> <a href="user_order.php">[�ҵĶ���]</a> <a href="user_exit.php?userExit='.$_SESSION['userid'].'">[�˳�]</a> ';		  
	  }else{
		 $user_login='����, ��ӭ����'.NOTICE_MAIL_NAME.'��վ! <a  href="user_register.php">[���ע��]</a> <a href="user_login.php">[��Ա��¼]</a> <a href="email_userPass.php">[�һ�����]</a>';
	  }
		 
$sql_hot="select * from gplat_hot_product order by id asc";
$result_hot=mysql_query($sql_hot);
while ($data_hot=mysql_fetch_assoc($result_hot)) {
	$hot_product.=' <a href="ShangPin.php?search='.$data_hot['title'].'">'.$data_hot['title'].'</a> ';
}

//��ʼ�����ﳵ��
	$a=new cart();
	$pr_num=$a->get_num();

?>