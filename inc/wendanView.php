<?php
/*�ʴ���ʾ��������һ������������״̬���ڶ������û���id�ţ�û�в�������Ļ�������ʾȫ��������*/

function wendaView ($stick_num='',$userid='')
{
	/*�жϷ�ҳ��*/
   if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}
$nShowNum=WENDA_VIEW_NUM;          //��ʾ����
//$stick_num=1;
$stick_str='';
if($stick_num!=0)
{
	$stick_str='status='.$stick_num.' and';           //stick:״̬����ȡ״̬����
	}
	
if($userid!=0)
{
	$stick_str='userid='.$userid.' and';        //userid ȡ�����û�������
	}
		
$sql="select id from gplat_wenda where $stick_str  view=1 or notice=1";    //

//echo"$sql";
$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum;         //ȡ����ǰ��ҳ����ʼ����
$sql="select * from gplat_wenda where $stick_str  view=1 order by notice desc,id desc limit $page_num,$nShowNum";   //����sql��ȡ������   
//echo"$sql";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$name=$date['name'];                          //������
    $ip=$date['ip'];                              //������IP
    $times_old=$date['times'];
    $times_str=timesStr($times_old);             //ȡ���뵱ǰ��ʱ���
   $title=$date['title'];                        //����
	//$title=chinesesubstr($title,0,60);
    //$class_id=$date['class_id'];
	$id=$date['id'];                              //��¼id
	$content=$date['content'];
	$content=strip_tags($content); 
	$content=mysubstr($content,'0','100').' .....';   //��ȡ�����ַ���
	//��������
	//$content=chinesesubstr($content,0,160).'.....';
	
	$clickNum =$date['clickNum'];                 //�����
	
	$stick=$date['status'];                        //����״̬
	$notice=$date['notice'];                      //�Ƿ񹫸�
	if ($stick==1) {
		$stick_img='casewt.gif';  //������
		$stick_font='&nbsp;<font color="#f0870a">������</font>';
		}
	if ($stick==2) {
		$stick_img='casedw.gif';  //������
		$stick_font='&nbsp;<font color="#f0dc00">������</font>';
		}
		if ($stick==3) {
		$stick_img='caseok.gif';  //�Ѵ���
		$stick_font='&nbsp;<font color="#d8d8d8">�Ѵ���</font>';
		}
	if ($notice==1)
	{
		$stick_img='casebt.gif';
		$stick_font='&nbsp;<font color="#62be00">��&nbsp;&nbsp;��</font>';
		}
	$sql_answer="select * from gplat_wenda_answer where fid='$id' limit 0,1";      //�ش�sql
	$result_answer=mysql_query($sql_answer);
	$date_answer=mysql_fetch_assoc($result_answer);
	$content_answer=$date_answer['content'];  
	$content_answer=strip_tags($content_answer);                                     //����
	$content_answer=mysubstr($content_answer,'0','100');  
	/*�ۻ�ȡ���������������*/
	$content_all.='<tr>
      <td height="60" class="wenwenTd2">&nbsp;<img src="css/icon/'.$stick_img.'"><br>'.$stick_font.'</td><td class="wenwenTd2">&nbsp;<a href="wenwen_view.php?id='.$id.'" target="_blank" style="font-size:14px;">'.$title.'</a>&nbsp;&nbsp;&nbsp;&nbsp;'.$times_str.'ǰ<br><span style="color:#999;">'.$content.'</span><br>'.GUEST_CLOTHING.'��'.$content_answer.'</td><td class="wenwenTd2">&nbsp;'.$name.'</td><td class="wenwenTd2">&nbsp;'.$clickNum.'</td>
    </tr>';	
	}


/*��ҳ������*/
//include ("inc/wendanView_page_class.php");      //���÷�ҳ�࣬�Ѿ�ÿҳ��ʾ��Ŀ

include ("inc/lib/BluePage.class.php");
$pBP = new BluePage ;
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = 10 ;   // ÿҳ��ʾ10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;

$page='<tr><td height="26" colspan="4"><div class="BPbar">��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
/*ѭ���ۻ�ȡ�÷�ҳ��*/
foreach ( $aPDatas['bar'] as $aBar ) 
	{
       $page_str.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
	$page2='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div> </td></tr>';
	/*����ѭ���ļ�¼�Լ���ҳ������*/
	return $content_str=$content_all.$page.$page_str.$page2;


  }
 ?>