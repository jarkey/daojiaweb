<?php
/*
About: ����DJд��BluePage��ҳ���Ĭ�������ļ����벻Ҫɾ��
������ �����������ļ�����һ��
       ����������Ҫ������Ӧ�ı����ʽ����ansi��utf-8
������ ��ʹ�õ�ʱ��·�����뵽 $pBP->getHTML( $aPDatas , '���·������ļ���' );
*/

// ���±�ǩ���ƣ�����������ϣ���|����
// t  ��¼����
// f  ��ҳ
// pg ��һ��ҳ��
// p  ��һҳ
// bar  ��ҳ��
// ng ��һ��ҳ��
// n  ��һҳ
// m  ��ҳ��
// sl ����ѡҳ
// i  Input��

/***  ����ΪHTML��ʽ���ã���Ҫ��һ��HTML֪ʶ  ***/
//�������޸�Ϊ�Լ���Ҫ��������ʽ���������ּ���
//
$PA['t']   = '<a class="BPtotal"><span style="margin:0 8px 0 8px">%d</span></a>' ;     //��¼����
$PA['f']   = '<a href="%s" class="BPside" title="��һҳ">1</a>' ;                      //��ҳ
$PA['pg']  = '<a href="%s" class="BPside" title="��һ��ҳ��">&lsaquo;&lsaquo;</a>' ;   //��һ��ҳ��
$PA['p']   = '<a href="%s" class="BPside" title="��һҳ">&lsaquo;</a>' ;               //��һҳ
$PA['bar'] = '<a href="%1$s" class="BPnum">%2$d</a>' ;                                 //��ҳ��
$PA['bar_cur'] = '<a class="BPcur" >%d</a>';                                           //��ǰҳ
$PA['ng']  = '<a href="%s" class="BPside" title="��һ��ҳ��">&rsaquo;&rsaquo;</a>' ;   //��һ��ҳ��
$PA['n']   = '<a href="%s" class="BPside" title="��һҳ">&rsaquo;</a>' ;               //��һҳ
$PA['m']   = '<a href="%s" class="BPside" title="��ĩҳ">%d</a>' ;                     //��ҳ



//��ת��
$PA['i'] = '<input class="BPinput" type="text" name="toPage" onkeydown="if(event.keyCode==13) {window.location=\'?%s%s=%s\'+this.value+\'%s\'; return false;}">' ;



$PA['sl']  = '<option value="?%s%s=%s%5$d%s">%5$d</option>\n' ;                        //������ҳ��,
//������ͷ�� ����Ҫ�޸�
$PA['sl_head'] =  "<select name=\"goPage\" onchange=\"window.location=this.value\">\n" ; 
//������β�� ����Ҫ�޸�
$PA['sl_end'] =  "</select>" ; 



//�������ڷ�ҳ���ǰ��,��������
$PA['head'] = '<div class="BPbar">' ;
//�������ڷ�ҳ�������
$PA['end'] = '</div>' ;
?>