// JavaScript Document

var wait=60;
document.getElementById("btn").disabled = false;  
function time(o) {
        if (wait == 0) {
            o.removeAttribute("disabled");          
            o.value="��ѻ�ȡ��֤��";
            wait = 60;
        } else {
            o.setAttribute("disabled", true);
            o.value="���·���(" + wait + ")";
            wait--;
            setTimeout(function() {
                time(o)
            },
            1000)
        }
    }
//document.getElementById("btn").onclick=function(){time(this);}
