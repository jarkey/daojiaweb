<?php 



/**��ҳ�����б���ʾ�������б����***/
function news_title($class,$num,$url,$long=25){

	$sql="select * from gplat_news where class=$class order by sort desc, id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
    $title= mysubstr($data['title'],0,$long);	
    if($data['id']==$_GET['id']){$css_str=' class="on"';}else{$css_str='';}
    $content.='
		<li '.$css_str.'><a href="'.$url.'?id='.$data['id'].'&class='.$class.'" title="'.$data['title'].'" target=_blank>'.$title.'</a></li>';
	}
	
	
return $content;
}




function newsViewTitle($class,$url,$pageUrl,$num)
{
	
	
	if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}

$nShowNum=$num;  //��ʾ����
//$stick_num=1;
$sql="select id from gplat_news where class='$class'";    //���ݸ�һ��ID�ţ���ѯ��������

//echo"$sql";
$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum;         //ȡ����ǰ��ҳ����ʼ����
				 
  $sql="select * from gplat_news where class='$class' order by sort desc,times desc limit $page_num,$nShowNum";
   //echo $sql;
   $result=mysql_query($sql);
   while($date=mysql_fetch_assoc($result))
  {
  $id=$date['id'];
  $title=$date['title'];
  $outLink=$date['outLink'];
  /********��ȡ�����ַ���*******/
  $title=mysubstr($title,'0','100');  
  
  //$times=$date['times'];
  $times=date("Y-m-d",strtotime($date['times']));   //��ͨ��strtotimeת��ʱ���
   
  /*һ����¼�ľ�������*/
 $view_content.='
 <li><span>'.$times.'</span><a href="'.$url.'?id='.$id.'">'.$title.'</a></li>';	
  }

  //*******��ҳ���� start*********
  require_once("page_class_1.php");   
  //ÿҳ��ʾ������   
  $page_size=$nShowNum;   
  //����Ŀ��   
  $nums=$nCount;   
  //ÿ����ʾ��ҳ��   
  $sub_pages=10;   
  //�õ���ǰ�ǵڼ�ҳ   
  $pageCurrent=$_GET["page"];   
  //if(!$pageCurrent) $pageCurrent=1; 
  $pageUrl=$pageUrl;
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$pageUrl,2,$shopx8UrlRewite); 
  $page_ontent='<div  class="page">'.$subPages->subPageCss2().'</div>';
   //*******��ҳ���� end*********

  $new_content='<ul>'.$view_content.'</ul>'.$page_ontent;

return $new_content; 
}


function m_newsViewTitle($class,$url,$pageUrl,$num)
{
	
	
	if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}

$nShowNum=$num;  //��ʾ����
//$stick_num=1;
$sql="select id from gplat_news where class='$class'";    //���ݸ�һ��ID�ţ���ѯ��������

//echo"$sql";
$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum;         //ȡ����ǰ��ҳ����ʼ����
				 
  $sql="select * from gplat_news where class='$class' order by sort desc,times desc limit $page_num,$nShowNum";
   //echo $sql;
   $result=mysql_query($sql);
   while($date=mysql_fetch_assoc($result))
  {
  $id=$date['id'];
  $title=$date['title'];
  $outLink=$date['outLink'];
  /********��ȡ�����ַ���*******/
  $title=mysubstr($title,'0','100');  
  
  //$times=$date['times'];
  $times=date("Y-m-d",strtotime($date['times']));   //��ͨ��strtotimeת��ʱ���
   
  /*һ����¼�ľ�������*/
 $view_content.='
 <li><a href="'.$url.'?id='.$id.'"><span>'.$times.'</span><b>&gt;</b>'.$title.'</a></li>';	
  }

  //*******��ҳ���� start*********
  require_once("page_class_1.php");   
  //ÿҳ��ʾ������   
  $page_size=$nShowNum;   
  //����Ŀ��   
  $nums=$nCount;   
  //ÿ����ʾ��ҳ��   
  $sub_pages=10;   
  //�õ���ǰ�ǵڼ�ҳ   
  $pageCurrent=$_GET["page"];   
  //if(!$pageCurrent) $pageCurrent=1; 
  $pageUrl=$pageUrl;
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$pageUrl,2,$shopx8UrlRewite); 
  $page_ontent='<div  class="page">'.$subPages->subPageCss2().'</div>';
   //*******��ҳ���� end*********

  $new_content='<div class="news"><ul>'.$view_content.'</ul></div>'.$page_ontent;

return $new_content; 
}


function IdContentView($pageId){
  if(!$_GET['id']){
	  $id=$pageId;
	  }else{
	  $id=(int)$_GET['id'];
  }
  $sql="select * from gplat_news where id=".$id;
  $result=mysql_query($sql);
  $data=mysql_fetch_assoc($result);
  $img=$data['img'];
  $title=$data['title'];
  $videoFile=$data['videoFile'];  
  if($videoFile){
  $content='<div id="container" style="width:400px; margin:auto;"><a href="http://www.macromedia.com/go/getflashplayer">��ȡ���²�����</a>����Ƶ��</div>
	<script type="text/javascript" src="inc/flvPlayer/swfobject.js"></script>
	<script type="text/javascript">
		var s1 = new SWFObject("inc/flvPlayer/player.swf","ply","400","300","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","file=../../videofiles/'.$videoFile.'&image=inc/flvPlayer/preview.jpg");
		s1.write("container");
	</script>'.'<br>';
  }
  $content.=$data['content'];  
  
  /******�ж���Ϣ�Ļ�Ա��Ȩ��\\*******/
  $user_groupid=$_SESSION['groupid'];   //��ǰ��Ա���ڵĻ�Ա��id
  $member_group=$data['member_group'];  //��ǰ��Ϣָ���Ļ�Ա��
  $num=strpos('a'.$member_group,$user_groupid);  //��ǰ��Ա���ڵĻ�Ա��id�Ƿ����ڵ�ǰ��Ϣ�Ļ�Ա��
  if ($member_group=='') {           //��ǰ��Ϣû��ָ����Ա�飬�����˶��ܿ���
	$content=$content;
  }else{                            //ָ����Ա��
	  if ($num > 0) {               //ָ����Ա���Ա   
		$content=$content; 	
	  }else{
		$content='<strong style="color:red;">�ܱ�Ǹ�������ڵĻ�Ա��û��Ȩ�޲鿴�����ݣ���������ο����ȵ�¼:)</strong>';
	  }
  }
  /******�ж���Ϣ�Ļ�Ա��Ȩ��//*******/  
  

  $times=$data['times'];
  $times=substr($times,0,10);
  $clickNum=$data['clickNum'];
  $sql2="update gplat_news set clickNum=clickNum +1 where id='$id'";
  $result2=mysql_query($sql2);
  $a=array("img"=>$img,"title"=>$title,"times"=>$times,"clickNum"=>$clickNum,"content"=>$content);
  return $a;
}


function leftMenu($fid,$url){
  global $shopx8UrlRewite;
  $leftMenuContent='<ul>';
  $sqlLeft="select * from gplat_newsClass2 where fid=$fid order by orderbySN asc";
  //echo $sqlLeft;
  $resultLeft=mysql_query($sqlLeft);
  while ($dataLeft=mysql_fetch_assoc($resultLeft)) {
	  //echo
	  $leftMenuContent.='<LI><A href="'.$url.'?fid='.$dataLeft['id'].'&title='.urlencode($dataLeft['name']).'">'.$dataLeft['name'].'</A></LI>';
  }
  $leftMenuContent.='</ul>';
  return $leftMenuContent;
}


function class_name($id){
  $sql="select * from gplat_news_class where CatagoryID=$id ";
  $result=mysql_query($sql);
  $data=mysql_fetch_assoc($result);
  $content=$data['Name'];
  return $content;
}

?>