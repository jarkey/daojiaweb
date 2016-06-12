<SCRIPT type=text/javascript>
            function OpenUrl(url)
            {
				//alert(url);
                window.parent.mainFrame.leftFrame.location.href=url;
            }
        </SCRIPT>

<SCRIPT language=JavaScript>
        <!--
        var checkedNavID = "1";
        var changeNavType = 1; //ÏÔÊ¾·½Ê½ //1 //0 NavIndex

        function _onmouseover(id)
        {
            if(checkedNavID == id) return;

            var e = eval("document.getElementById('nav"+ id + "')");
            e.className="left_btn_over";
        }

        function _onmouseout(id)
        {
            if(checkedNavID == id) return;

            var e = eval("document.getElementById('nav"+ id + "')");
            e.className="left_btn_link";
        }

        function checkNav(id)
        {
            var e = eval("document.getElementById('nav"+ checkedNavID + "')");
            e.className="left_btn_link";

            checkedNavID = id;
            var e = eval("document.getElementById('nav"+ id + "')");
            e.className="left_btn_hit";
        }

        //-->
    </SCRIPT>