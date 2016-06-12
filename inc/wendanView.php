<?php
/*问答显示函数，第一个参数是问题状态，第二个是用户的id号，没有参数传入的话，即显示全部的问题*/

function wendaView ($stick_num='',$userid='')
{
	/*判断分页数*/
   if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}
$nShowNum=WENDA_VIEW_NUM;          //显示条数
//$stick_num=1;
$stick_str='';
if($stick_num!=0)
{
	$stick_str='status='.$stick_num.' and';           //stick:状态；获取状态参数
	}
	
if($userid!=0)
{
	$stick_str='userid='.$userid.' and';        //userid 取出该用户的提问
	}
		
$sql="select id from gplat_wenda where $stick_str  view=1 or notice=1";    //

//echo"$sql";
$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum;         //取出当前分页的起始行数
$sql="select * from gplat_wenda where $stick_str  view=1 order by notice desc,id desc limit $page_num,$nShowNum";   //运行sql，取出内容   
//echo"$sql";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$name=$date['name'];                          //提问者
    $ip=$date['ip'];                              //提问者IP
    $times_old=$date['times'];
    $times_str=timesStr($times_old);             //取得与当前的时间差
   $title=$date['title'];                        //标题
	//$title=chinesesubstr($title,0,60);
    //$class_id=$date['class_id'];
	$id=$date['id'];                              //记录id
	$content=$date['content'];
	$content=strip_tags($content); 
	$content=mysubstr($content,'0','100').' .....';   //截取汉字字符串
	//提问内容
	//$content=chinesesubstr($content,0,160).'.....';
	
	$clickNum =$date['clickNum'];                 //浏览数
	
	$stick=$date['status'];                        //问题状态
	$notice=$date['notice'];                      //是否公告
	if ($stick==1) {
		$stick_img='casewt.gif';  //待处理
		$stick_font='&nbsp;<font color="#f0870a">待处理</font>';
		}
	if ($stick==2) {
		$stick_img='casedw.gif';  //处理中
		$stick_font='&nbsp;<font color="#f0dc00">处理中</font>';
		}
		if ($stick==3) {
		$stick_img='caseok.gif';  //已处理
		$stick_font='&nbsp;<font color="#d8d8d8">已处理</font>';
		}
	if ($notice==1)
	{
		$stick_img='casebt.gif';
		$stick_font='&nbsp;<font color="#62be00">公&nbsp;&nbsp;告</font>';
		}
	$sql_answer="select * from gplat_wenda_answer where fid='$id' limit 0,1";      //回答sql
	$result_answer=mysql_query($sql_answer);
	$date_answer=mysql_fetch_assoc($result_answer);
	$content_answer=$date_answer['content'];  
	$content_answer=strip_tags($content_answer);                                     //内容
	$content_answer=mysubstr($content_answer,'0','100');  
	/*累积取得所有问题的内容*/
	$content_all.='<tr>
      <td height="60" class="wenwenTd2">&nbsp;<img src="css/icon/'.$stick_img.'"><br>'.$stick_font.'</td><td class="wenwenTd2">&nbsp;<a href="wenwen_view.php?id='.$id.'" target="_blank" style="font-size:14px;">'.$title.'</a>&nbsp;&nbsp;&nbsp;&nbsp;'.$times_str.'前<br><span style="color:#999;">'.$content.'</span><br>'.GUEST_CLOTHING.'：'.$content_answer.'</td><td class="wenwenTd2">&nbsp;'.$name.'</td><td class="wenwenTd2">&nbsp;'.$clickNum.'</td>
    </tr>';	
	}


/*分页的内容*/
//include ("inc/wendanView_page_class.php");      //调用分页类，已经每页显示数目

include ("inc/lib/BluePage.class.php");
$pBP = new BluePage ;
$intCount    = $nCount ; // 假设记录总数为1000
$intShowNum  = 10 ;   // 每页显示10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;

$page='<tr><td height="26" colspan="4"><div class="BPbar">总页数:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">首页</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">上一页</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">下一页</a>&nbsp;&nbsp; '.'分页条:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
/*循环累积取得分页码*/
foreach ( $aPDatas['bar'] as $aBar ) 
	{
       $page_str.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
	$page2='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div> </td></tr>';
	/*返回循环的记录以及分页的内容*/
	return $content_str=$content_all.$page.$page_str.$page2;


  }
 ?>