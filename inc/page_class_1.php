<?php   
class SubPages{   

private $each_disNums;//ÿҳ��ʾ����Ŀ��   
private $nums;//����Ŀ��   
private $current_page;//��ǰ��ѡ�е�ҳ   
private $sub_pages;//ÿ����ʾ��ҳ��   
private $pageNums;//��ҳ��   
private $page_array = array();//���������ҳ������   
private $subPage_link;//ÿ����ҳ������   
private $subPage_type;//��ʾ��ҳ������   
private $shopx8UrlRewite; //�Ƿ�Ϊ��̬

   /* 
   __construct��SubPages�Ĺ��캯���������ڴ������ʱ���Զ�����. 
   @$each_disNums   ÿҳ��ʾ����Ŀ�� 
   @nums     ����Ŀ�� 
   @current_num     ��ǰ��ѡ�е�ҳ 
   @sub_pages       ÿ����ʾ��ҳ�� 
   @subPage_link    ÿ����ҳ������ 
   @subPage_type    ��ʾ��ҳ������ 
    
   ��@subPage_type=1��ʱ��Ϊ��ͨ��ҳģʽ 
         example��   ��4523����¼,ÿҳ��ʾ10��,��ǰ��1/453ҳ [��ҳ] [��ҳ] [��ҳ] [βҳ] 
         ��@subPage_type=2��ʱ��Ϊ�����ҳ��ʽ 
         example��   ��ǰ��1/453ҳ [��ҳ] [��ҳ] 1 2 3 4 5 6 7 8 9 10 [��ҳ] [βҳ] 
   */ 
function __construct($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type,$shopx8UrlRewite){   
   $this->each_disNums=intval($each_disNums);   
   $this->nums=intval($nums); 
   $this->shopx8UrlRewite=intval($shopx8UrlRewite);    
    if(!$current_page){   
    $this->current_page=1;   
    }else{   
    $this->current_page=intval($current_page);   
    }   
   $this->sub_pages=intval($sub_pages);   
   $this->pageNums=ceil($nums/$each_disNums);   
   $this->subPage_link=$subPage_link;    
   $this->show_SubPages($subPage_type);    
   //echo $this->pageNums."--".$this->sub_pages;   
}   
     
     
/* 
    __destruct�������������಻��ʹ�õ�ʱ����ã��ú��������ͷ���Դ�� 
   */ 
function __destruct(){   
    unset($each_disNums);   
    unset($nums);   
    unset($current_page);   
    unset($sub_pages);   
    unset($pageNums);   
    unset($page_array);   
    unset($subPage_link);   
    unset($subPage_type);   
   }   
     
/* 
    show_SubPages�������ڹ��캯�����档���������ж���ʾʲô���ӵķ�ҳ    
   */ 
function show_SubPages($subPage_type){   
    if($subPage_type == 1){   
    $this->subPageCss1();   
    }elseif ($subPage_type == 2){   
    $this->subPageCss2();   
    }   
   }   
     
     
/* 
    ������������ҳ�������ʼ���ĺ����� 
   */ 
function initArray(){   
    for($i=0;$i<$this->sub_pages;$i++){   
    $this->page_array[$i]=$i;   
    }   
    return $this->page_array;   
   }   
     
     
/* 
    construct_num_Page�ú���ʹ����������ʾ����Ŀ 
    ��ʹ��[1][2][3][4][5][6][7][8][9][10] 
   */ 
function construct_num_Page(){   
    if($this->pageNums < $this->sub_pages){   
    $current_array=array();   
     for($i=0;$i<$this->pageNums;$i++){    
     $current_array[$i]=$i+1;   
     }   
    }else{   
    $current_array=$this->initArray();   
     if($this->current_page <= 3){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$i+1;   
      }   
     }elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;   
      }   
     }else{   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$this->current_page-2+$i;   
      }   
     }   
    }   
      
    return $current_array;   
   }   
     
/* 
   ������ͨģʽ�ķ�ҳ 
   ��4523����¼,ÿҳ��ʾ10��,��ǰ��1/453ҳ [��ҳ] [��ҳ] [��ҳ] [βҳ] 
   */ 
function subPageCss1(){   
   $subPageCss1Str="";   
   $subPageCss1Str.="��".$this->nums."����¼��";   
   $subPageCss1Str.="ÿҳ��ʾ".$this->each_disNums."����";   
   $subPageCss1Str.="��ǰ��".$this->current_page."/".$this->pageNums."ҳ ";   
    if($this->current_page > 1){   
    $firstPageUrl=$this->subPage_link."1";   
    $prewPageUrl=$this->subPage_link.($this->current_page-1);   
    $subPageCss1Str.="[<a href='$firstPageUrl'>��ҳ</a>] ";   
    $subPageCss1Str.="[<a href='$prewPageUrl'>��һҳ</a>] ";   
    }else {   
    $subPageCss1Str.="[��ҳ] ";   
    $subPageCss1Str.="[��һҳ] ";   
    }   
      
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->subPage_link.$this->pageNums;   
    $nextPageUrl=$this->subPage_link.($this->current_page+1);   
    $subPageCss1Str.=" [<a href='$nextPageUrl'>��һҳ</a>] ";   
    $subPageCss1Str.="[<a href='$lastPageUrl'>βҳ</a>] ";   
    }else {   
    $subPageCss1Str.="[��һҳ] ";   
    $subPageCss1Str.="[βҳ] ";   
    }   
      
    echo $subPageCss1Str;   
      
   }   
     
     
/* 
   ���쾭��ģʽ�ķ�ҳ 
   ��ǰ��1/453ҳ [��ҳ] [��ҳ] 1 2 3 4 5 6 7 8 9 10 [��ҳ] [βҳ] 
   */ 
function subPageCss2(){   
   $subPageCss2Str="";   
   //$subPageCss2Str.="��ǰ��".$this->current_page."/".$this->pageNums."ҳ ";   
      
      
    if($this->current_page > 1){   
	  if($this->shopx8UrlRewite==1){
		  $firstPageUrl=$this->subPage_link.'_1.html';
          $prewPageUrl=$this->subPage_link.'_'.($this->current_page-1).".html"; 		  
	  }else{
		  $firstPageUrl=$this->subPage_link.'.php?page=1';
          $prewPageUrl=$this->subPage_link.'.php?page='.($this->current_page-1); 		  
	  }  
   // $subPageCss2Str.="[<a href='$firstPageUrl'>��ҳ</a>] ";   
    $subPageCss2Str.="[<a href='$prewPageUrl'>��һҳ</a>] ";   
    }else {   
   // $subPageCss2Str.="[��ҳ] ";   
    $subPageCss2Str.="[��һҳ] ";   
    }   
      
   $a=$this->construct_num_Page();   
    for($i=0;$i<count($a);$i++){   
    $s=$a[$i];   
     if($s == $this->current_page ){   
     $subPageCss2Str.="[<span style='color:red;font-weight:bold;'>".$s."</span>]";   
     }else{  
	    if($this->shopx8UrlRewite==1){	 
          $url=$this->subPage_link.'_'.$s.'.html'; 
		}else{
          $url=$this->subPage_link.'.php?page='.$s; 
		}
     $subPageCss2Str.="[<a href='$url'>".$s."</a>]";   
     }   
    }   
      
    if($this->current_page < $this->pageNums){   
	  if($this->shopx8UrlRewite==1){	
        $lastPageUrl=$this->subPage_link.'_'.$this->pageNums.'.html';   
        $nextPageUrl=$this->subPage_link.'_'.($this->current_page+1).'.html'; 
	  }else{
        $lastPageUrl=$this->subPage_link.'.php?page='.$this->pageNums;   
        $nextPageUrl=$this->subPage_link.'.php?page='.($this->current_page+1); 
	  }
    $subPageCss2Str.=" [<a href='$nextPageUrl'>��һҳ</a>] ";   
   // $subPageCss2Str.="[<a href='$lastPageUrl'>βҳ</a>] ";   
    }else {   
    $subPageCss2Str.="[��һҳ] ";   
  //  $subPageCss2Str.="[βҳ] ";   
    }   
    return $subPageCss2Str;   
   }   
}   
?> 


<?php  
/*
//��������ʾ����
require_once("SubPages.php");   
//ÿҳ��ʾ������   
$page_size=20;   
//����Ŀ��   
$nums=1024;   
//ÿ����ʾ��ҳ��   
$sub_pages=10;   
//�õ���ǰ�ǵڼ�ҳ   
$pageCurrent=$_GET["p"];   
//if(!$pageCurrent) $pageCurrent=1;   
     
$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"test.php?p=",2);   
*/
?> 

 