<?php 



/**首页新闻列表显示，返回列表标题***/
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

$nShowNum=$num;  //显示条数
//$stick_num=1;
$sql="select id from gplat_news where class='$class'";    //根据父一级ID号，查询出总条数

//echo"$sql";
$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum;         //取出当前分页的起始行数
				 
  $sql="select * from gplat_news where class='$class' order by sort desc,times desc limit $page_num,$nShowNum";
   //echo $sql;
   $result=mysql_query($sql);
   while($date=mysql_fetch_assoc($result))
  {
  $id=$date['id'];
  $title=$date['title'];
  $outLink=$date['outLink'];
  /********截取汉字字符串*******/
  $title=mysubstr($title,'0','100');  
  
  //$times=$date['times'];
  $times=date("Y-m-d",strtotime($date['times']));   //先通过strtotime转换时间戳
   
  /*一条记录的具体内容*/
 $view_content.='
 <li><span>'.$times.'</span><a href="'.$url.'?id='.$id.'">'.$title.'</a></li>';	
  }

  //*******分页代码 start*********
  require_once("page_class_1.php");   
  //每页显示的条数   
  $page_size=$nShowNum;   
  //总条目数   
  $nums=$nCount;   
  //每次显示的页数   
  $sub_pages=10;   
  //得到当前是第几页   
  $pageCurrent=$_GET["page"];   
  //if(!$pageCurrent) $pageCurrent=1; 
  $pageUrl=$pageUrl;
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$pageUrl,2,$shopx8UrlRewite); 
  $page_ontent='<div  class="page">'.$subPages->subPageCss2().'</div>';
   //*******分页代码 end*********

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

$nShowNum=$num;  //显示条数
//$stick_num=1;
$sql="select id from gplat_news where class='$class'";    //根据父一级ID号，查询出总条数

//echo"$sql";
$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum;         //取出当前分页的起始行数
				 
  $sql="select * from gplat_news where class='$class' order by sort desc,times desc limit $page_num,$nShowNum";
   //echo $sql;
   $result=mysql_query($sql);
   while($date=mysql_fetch_assoc($result))
  {
  $id=$date['id'];
  $title=$date['title'];
  $outLink=$date['outLink'];
  /********截取汉字字符串*******/
  $title=mysubstr($title,'0','100');  
  
  //$times=$date['times'];
  $times=date("Y-m-d",strtotime($date['times']));   //先通过strtotime转换时间戳
   
  /*一条记录的具体内容*/
 $view_content.='
 <li><a href="'.$url.'?id='.$id.'"><span>'.$times.'</span><b>&gt;</b>'.$title.'</a></li>';	
  }

  //*******分页代码 start*********
  require_once("page_class_1.php");   
  //每页显示的条数   
  $page_size=$nShowNum;   
  //总条目数   
  $nums=$nCount;   
  //每次显示的页数   
  $sub_pages=10;   
  //得到当前是第几页   
  $pageCurrent=$_GET["page"];   
  //if(!$pageCurrent) $pageCurrent=1; 
  $pageUrl=$pageUrl;
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$pageUrl,2,$shopx8UrlRewite); 
  $page_ontent='<div  class="page">'.$subPages->subPageCss2().'</div>';
   //*******分页代码 end*********

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
  $content='<div id="container" style="width:400px; margin:auto;"><a href="http://www.macromedia.com/go/getflashplayer">获取最新播放器</a>看视频。</div>
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
  
  /******判断信息的会员组权限\\*******/
  $user_groupid=$_SESSION['groupid'];   //当前会员所在的会员组id
  $member_group=$data['member_group'];  //当前信息指定的会员组
  $num=strpos('a'.$member_group,$user_groupid);  //当前会员所在的会员组id是否属于当前信息的会员组
  if ($member_group=='') {           //当前信息没有指定会员组，所有人都能看到
	$content=$content;
  }else{                            //指定会员组
	  if ($num > 0) {               //指定会员组成员   
		$content=$content; 	
	  }else{
		$content='<strong style="color:red;">很抱歉，您所在的会员组没有权限查看此内容！如果您是游客请先登录:)</strong>';
	  }
  }
  /******判断信息的会员组权限//*******/  
  

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