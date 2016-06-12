<?php 


define("DMOOO_CUSTOMER","到家优蔬");   //网站名称
$url = $_SERVER['PHP_SELF']; 
$filename= substr( $url , strrpos($url , '/')+1 );   //获取当前页的文件名
$allUrl=$filename.'?'.$_SERVER['QUERY_STRING'];      //当前网页+所有参数

include_once('dbconfig.php');            //数据连接文件
include_once('news_function.php');       //文章操作函数文件
include_once('products_function.php');   //商品操作函数文件
include_once('order_function.php');      //订单操作函数文件
include_once('user_function.php');       //会员操作函数文件
include_once('cart.php');                //购物车操作函数文件
include_once('other_function.php');      //其他操作函数文件
include_once('upload_function.php');      //文件上传操作类
include_once('ad_function.php');          //广告显示传操作函数文件
$logistics_num=50;//超过多少金额免费
$logistics_p=10;//收取多少
userRecommendAdd();  //记录推荐人
?>
<?php 
$userId=$_SESSION['userid'];
$userid=$_SESSION['userid'];        //编写不规范，没有对大小写约束好
$username=$_SESSION['username'];

  if($_SESSION['userid'])
	  {
		 //echo
		 //$user_login=$_SESSION['username'].'&nbsp;积分:'.$_SESSION['point'].'点 帐户:'.$_SESSION['amount'].'元 <a href="user_index.php">[会员中心]</a> <a href="user_order.php">[我的订单]</a> <a href="user_exit.php?userExit='.$_SESSION['userid'].'">[退出]</a> ';
		 $user_login=$_SESSION['username'].',欢迎您！ <a href="user_index.php">[会员中心]</a> <a href="user_order.php">[我的订单]</a> <a href="user_exit.php?userExit='.$_SESSION['userid'].'">[退出]</a> ';		  
	  }else{
		 $user_login='您好, 欢迎光临'.NOTICE_MAIL_NAME.'网站! <a  href="user_register.php">[免费注册]</a> <a href="user_login.php">[会员登录]</a> <a href="email_userPass.php">[找回密码]</a>';
	  }
		 
$sql_hot="select * from gplat_hot_product order by id asc";
$result_hot=mysql_query($sql_hot);
while ($data_hot=mysql_fetch_assoc($result_hot)) {
	$hot_product.=' <a href="ShangPin.php?search='.$data_hot['title'].'">'.$data_hot['title'].'</a> ';
}

//初始化购物车类
	$a=new cart();
	$pr_num=$a->get_num();

?>