	function getid(obj)//ȡ��Ӧid��Ԫ��
		  {
			return document.getElementById(obj);
		  }

	function getNames(obj,name,tij)//ȡobjԪ���±�ǩΪtij��Ԫ�ز�Ҫ������name����=name;����һ������
	{	
		var p = getid(obj);
		var plist = p.getElementsByTagName(tij);
		var rlist = new Array();
		for(i=0;i<plist.length;i++)
		{
			if(plist[i].getAttribute("name") == name)
			{
				rlist[rlist.length] = plist[i];
			}
		}
		return rlist;
	}

	function ri(obj)//ȡ�ö�Ӧ��Сͼ�б��е�ǰԪ�ض�Ӧ�����
	{
		var p = getid("simg").getElementsByTagName("td");
		for(i=0;i<p.length;i++)
		{
			if(obj == p[i])
			{
				return i;
			}
		}
	}

	function ci(obj)//Сͼѡ���Ĵ�����
	{
		var p = getid("simg").getElementsByTagName("td");
		for(i=0;i<p.length;i++)
		{
			if(obj ==p[i])
			{
				p[i].className ="s";
			}
			else
			{
				p[i].className ="";
			}
		}
	}
	function fiterplay(obj,num,t,name)//����ҳ���ĺ���.���ö�Ӧ���ݵ����غ���ʾ obj:Ԫ�ص�id  name:Ԫ�ض�Ӧ��name���Ե�ֵ, t:��Ӧ���ݵı�ǩ num:��ǰѡ���Ԫ�ص����
	{
		var fitlist = getNames(obj,name,t);
		for(i=0;i<fitlist.length;i++)
		{

			if(i == num)
			{
				fitlist[i].className = "dis";
			}
			else
			{
				fitlist[i].className = "undis";
			}
		}
	}
		  
		  	
	function play(obj,n1)//���ŵĺ���
	{
		var p = obj.parentNode.parentNode.getElementsByTagName("img");
		var au = getid(n1);
		var num = ri(obj);
		try	//ie�µĴ�����
		{
			with(au)
			{
				filters[0].Apply();	//�����˾�
				ci(obj); //���Сͼ��ѡ��.���Է���try����.
				fiterplay(n1,num,"div","f");//�����˾��ж�Ӧ���ֵ���ʾ������
				filters[0].play();	//�����˾�
			}
		}
		catch(e)//ff�µĴ�����
		{
				ci(obj);
				fiterplay(n1,num,"div","f");
		}
	}
var n=0;
function clearAuto() {clearInterval(autoStart);};
function setAuto(){autoStart=setInterval("auto(n)", 4000)}
function auto()
{
	var x = getid("simg").getElementsByTagName("td");
	n++;
	if(n>3)n=0;
	play(x[n],"au");
}
function tabs_z(o,n){
			var m_n = document.getElementById(o).getElementsByTagName("em");
			var c_n = document.getElementById(o).getElementsByTagName("ol");
			for(i=0;i<m_n.length;i++){
				 m_n[i].className=i==n?"tab_on":"";
 				 c_n[i].style.display=i==n?"block":"none";
				 }
		}