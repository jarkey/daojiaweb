<?php 
//�����ղ�class
class favorites{
	
 
       
	function add($pa_pr='',$class=''){
		if($_SESSION['userid']<1){
			echo '<script>window.location.href="user_login.php";</script>';
             exit();
			}
		$userid=$_SESSION['userid'];
		$sql_s="select id from gplat_favorites where userid='$userid' and pa_pr='$pa_pr' and class='$class'";
		$result_s=mysql_query($sql_s);
		$num=mysql_num_rows($result_s);
		if ($num > 0) {
			
		}else {
			$sql="insert into gplat_favorites (userid,pa_pr,class) values ('$userid','$pa_pr','$class')";
		    $result=mysql_query($sql);
		}
		 
	echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>';
             exit();
		
	}
	
	function if_add($pa_pr='',$class=''){ //�ж��Ƿ��Ѿ��ղ�
		$userid=$_SESSION['userid'];
		$sql_s="select id from gplat_favorites where userid='$userid' and pa_pr='$pa_pr' and class='$class'";
		$result_s=mysql_query($sql_s);
		$num=mysql_num_rows($result_s);
		if ($num > 0) {
		$content='���ղ�';	
		}else {
		$content='<a href="user_collection.php?productid='.$pa_pr.'">�ղ���Ʒ</a>';		
		}
		 
	return $content;
		
	}
	
	function del($id=''){
		global $userId; 
		$sql="delete from gplat_favorites where userid='$userId' and id=".$id;
		
		$result=mysql_query($sql);
	}
	
	
function view(){
$userid=$_SESSION['userid'];
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=20;
$sql="select * from  gplat_favorites where userid=".$userid;
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
		
		$sql="select * from gplat_favorites where userid='$userid' order by id desc limit $page_one,$num";
		$result=mysql_query($sql);
		while ($data=mysql_fetch_assoc($result)) {
			$table=$data['class'];
			
			$pa_pr=$data['pa_pr'];
			$sql_c="select * from dmooo_product where productid=".$pa_pr;
			$result_c=mysql_query($sql_c);
			$data_c=mysql_fetch_assoc($result_c);
			if ($data['class']=='gplat_product') {
				$href='shangping_view.php';
			}else {
				$href='taocan_view.php';
			}
			$price=product_price_1($pa_pr);
	$content.='
			<tr>
                	<td align="center" valign="middle"><!--<input type="checkbox" value="'.$data['id'].'"/>--></td>
                    <td>
                   	  <dl>
                        	<a href="product_view.php?id='.$pa_pr.'&class='.$data_c['class'].'">
                            	<dt><img src="userfiles/'.$data_c['img'].'" alt="" /></dt>
                                <dd>'.$data_c['productName'].'</dd>
                            </a>
                        </dl>
                    </td>
                    <td align="center" valign="middle">'.$price.'</td>
                    <td align="center" valign="middle">����</td>
                    <td align="center" valign="middle">
                    	<a href="#" class="gwc_a" productid='.$pa_pr.'>���빺�ﳵ</a>
                        <a href="user_collection.php?del='.$data['id'].'">ɾ��</a>
                    </td>
                </tr>';
		}
		//$strHtml='<tr align="center" valign="middle"><td colspan="4" class="tdBorder1">'.$strHtml.'</td></tr>';
	//$content=$content.$strHtml;	
	return $content;
	}
	
	function m_view(){
$userid=$_SESSION['userid'];
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=20;
$sql="select * from  gplat_favorites where userid=".$userid;
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
		
		$sql="select * from gplat_favorites where userid='$userid' order by id desc limit $page_one,$num";
		$result=mysql_query($sql);
		while ($data=mysql_fetch_assoc($result)) {
			$table=$data['class'];
			$pa_pr=$data['pa_pr'];
			$sql_c="select * from dmooo_product where productid=".$pa_pr;
			$result_c=mysql_query($sql_c);
			$data_c=mysql_fetch_assoc($result_c);
			if ($data['class']=='gplat_product') {
				$href='shangping_view.php';
			}else {
				$href='taocan_view.php';
			}
				$price=product_price_1($pa_pr);
	$content.='
			<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="5%" align="center" valign="middle"></td>
                <td width="22%" align="center" valign="middle"><a href="product_view.php?id='.$pa_pr.'&class='.$data_c['class'].'"><img src="../userfiles/'.$data_c['img'].'" alt=""></a></td>
                <td width="53%">
               	  <h4><a href="product_view.php?id='.$pa_pr.'&class='.$data_c['class'].'">'.$data_c['productName'].'</a></h4>
                  <p style="padding-right:10px;"> <a href="#" class="ljgm" productid='.$pa_pr.'>���빺�ﳵ</a>��<span>'.$price.'</span></p>
                  <p class="coll_del"><a href="user_collection.php?del='.$data['id'].'">ɾ��</a></p>
              </td>
          </tr>
        </table>
        <div class="space2"></div>';
		}
		//$strHtml='<tr align="center" valign="middle"><td colspan="4" class="tdBorder1">'.$strHtml.'</td></tr>';
	//$content=$content.$strHtml;	
	return $content;
	}
	
}
?>