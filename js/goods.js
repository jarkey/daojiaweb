$(function() {

    /*���빺�ﳵ����������ť����Ч��*/
    /*$(".add_cart").hover(function(){
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("disable")>0)
            return false;
        $(this).val("Ajouter au panier");
    },function(){
        if($(this).attr("class").indexOf("disable")>0)
            return false;
        $(this).val("���빺�ﳵ");
    });

    $(".buy_now").hover(function(){
        if($(this).attr("class").indexOf("disable")>0)
            return false;
        $(this).val("Commander");
    },
    function(){
        if($(this).attr("class").indexOf("disable")>0)
            return false;
        $(this).val("��������");
    });*/

    /*���ϵ�����Ϣ�л�*/
    $("ul.Select_view li").click(function(){
        var _index=$(this).index();
        $("ul.Select_view li,ul.view_list > li").removeClass("cur");
        $(this).addClass("cur");
        $("ul.view_list > li").eq(_index).addClass("cur");
    });

    
	/*ѡ�����*/
    $("ul.change_p li").click(function(){
        
        $(this).addClass("");
        G.goods.sizeChange($(this).attr('id').replace('size_id_', ''), 1);
    });

    //�Ӽ���ť
    $(".n_right").click(function(){
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //ȡ�����ڵ�ֵ����ʹ��parseIntתΪint��������

        if(oldValue >= 49)
            $(this).addClass('nopoint');

        if(oldValue >= 50)
            return false;

        oldValue++;   //�Լ�1
        num.val(oldValue);  //�����Ӻ��ֵ�����ؼ�
        $(".n_left").removeClass("nopoint");
    });
    $(".n_left").click(function(){
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //ȡ�����ڵ�ֵ����ʹ��parseIntתΪint��������
        oldValue--;   //�Լ�1
        num.val(oldValue);  //�����Ӻ��ֵ�����ؼ�
        $(".n_right").removeClass('nopoint');
        if ( num.val() < 2) {
            $(this).addClass("nopoint");
            num.val(1);
        }
    });

    //�ֶ�������Ʒ��������
    $(document).on('keyup', '#buy_number', function(){
        var value = E.trim($(this).val());
        if(!E.isInt(value) || value < 1)
            value = 1;

        if(value > 50)
            value = 50;

        $(this).val(value);
    });

    var temp_buy_number = 0;
    $('#buy_number').focus(function() {
        temp_buy_number = $(this).val();
    }).blur(function() {
        var buy_number = $(this).val();
        if (buy_number <= 0 || buy_number > 99) {
            $(this).val(temp_buy_number);
        }
    });


   

    //���빺�ﳵ
    $('#add_cart').click(function() {
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("disable")>0)
            return false;

        var goods_amount = E.trim($("#buy_number").val());
        if (!E.isDigital(goods_amount)) {
            goods_amount = 1;
        }
        G.cart.general.add($("#pro_id").val(), goods_amount);
    });

    //��������
    $('#buy_now').click(function() {
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("disable")>0)
            return false;
        var goods_amount = E.trim($("#buy_number").val());
        if (!E.isDigital(goods_amount)) {
            goods_amount = 1;
        }
        G.cart.now_buy($("#pro_id").val(), goods_amount);
    });

});


G.goods.init = function() {
    E.ajax_get({
        action: "goods",
        operFlg: 2,
        data: {
            id: this.postID
        },
        call: "G.goods.display"
    });
    if(G.goods.useFlg==2){
        //������ť��ʽ����
        $(".n_right,.n_left").addClass("nopoint");
        //����0
        $("#buy_number").attr("disabled","disabled").val(0);
        //��������ͼ��빺�ﳵ��ť��ʽ����
        $(".add_cart,.buy_now").addClass("disable");
        $("#buy_now").val("������");
    }
}

G.goods.display = function( o ) {

    if (o.code == 200) {

        if (o.data.goodsList.length == 1) {

            $("body").append("<input type='hidden' value='0' id='size_id_" + this.postID + "' />");
            $("#size_id_" + this.postID).data(o.data.goodsList[0]);
            this.sizeChange(this.postID, 0);

        } else {

            var id = "";
            $.each(o.data.goodsList, function(k, v) {
                if (v.useFlg == 1) {
                    if (id == "" || v.postID == G.goods.postID)
                        id = v.postID;
                    $("#size_id_" + v.postID).data(v);
                } else {
                    //MK-FUN-1018-MCAKE-��Ʒ�������� add by jackie.zhao Start
                    if (id == "" || v.postID == G.goods.postID)
                        id = v.postID;
                    $("#size_id_" + v.postID).data(v);
                    //MK-FUN-1018-MCAKE-��Ʒ�������� add by jackie.zhao End
                    $("#size_id_" + v.postID).addClass("stockout");
                }
            });
            if (id != "") {
                this.sizeChange(id, 1);
            } else {
                $("#addCart").text("��ǰ��Ʒ���¼ܻ��治�㣬��ѡ��������Ʒ").addClass("empty");
            }

        }

        $('#comments_count').html('�ۼƵ���(' + o.data.comment_count + ')');

        if (o.data.comment_item) {
            $.each(o.data.comment_item, function(k, v) {
                if (k == 1) {
                    var item = '�ǳ��ó�';
                } else if (k == 2) {
                    var item = '���ͷ����';
                } else if (k == 3) {
                    var item = '�ڸ�ϸ��';
                } else if (k == 4) {
                    var item = '����ɿ�';
                } else if (k == 5) {
                    var item = '�����Ư��';
                }
                $('.Review_top').find('dl').append('<dd><a href="javascript: void(0);" onclick="G.goods.commentForItem(' + k +', 1);">' + item + '<span>(' + v +')</span></a></dd>');
            });
        }

    }

}



G.goods.sizeChange = function( id, flg ) {

    $("#size_id_" + id).addClass("cur");
    $("#size_id_" + id).siblings('li').removeClass("cur");

    var obj = $("#size_id_" + id);
    var dt = obj.data();

    //��Ʒ����״̬
    var useFlg = dt.useFlg;
    //�ж�����״̬
    if(useFlg != 1){
        //������ť��ʽ����
        $(".n_right,.n_left").addClass("nopoint");
        //����0
        $("#buy_number").attr("disabled","disabled").val(0);
        //��������ͼ��빺�ﳵ��ť��ʽ����
        $(".add_cart,.buy_now").addClass("disable");
        $("#buy_now").val("������");
    }else{
        //������ť��ʽ����
        $(".n_right").removeClass("nopoint");
        //����1
        $("#buy_number").attr("disabled",false).val(1);
        //��������ͼ��빺�ﳵ��ť��ʽ����
        $(".add_cart,.buy_now").removeClass("disable");
        $("#buy_now").val("��������");
    }

    $("#price").text(parseFloat(dt.price).toFixed(2));
    $("#pro_id").val(dt.postID);
    $('#g_edible').text(obj.attr('edible'));
    $('#g_size').text(obj.attr('size'));
    $('#g_aheadTime').text(obj.attr('aheadTime'));

    if (dt.promotion || dt.bill) {
        var html = "";
        if (dt.promotion) {
            $.each(dt.promotion, function(k, v) {
                if (html != "")
                    html += "�� ";
                html += v.remark
            });
        }
        if (dt.bill) {
            $.each(dt.bill, function(k, v) {
                if (html != "") {
                    html += "�� ";
                }
                html += v.remark
            });
        }
        $("#promotionInfo").html(html).show();
    } else {
        $("#promotionInfo").html("").hide();
    }

}

G.goods.comment = function( page ) {
    E.ajax_get({
        action: 'goodsComment',
        operFlg: 1,
        data: {
            twoPostID: this.twoPostID,
            page: page
        },
        call: function( o ) {
            if (o.code == 200) {
                var html = '';
                $.each(o.data.comment, function(k, v) {
                    html += '<li>';
                    html += '<p class=\'com_txt\'>';
                    html += v.comment_content;
                    html += '</p>';
                    html += '<div><p><span>' + v.creator + '</span></p><small>' + v.createTime + '</small></div>';
                    html += '</li>';
                });
                $('#comment_list').html(html);
                $('#paging').html(o.data.paging);
            } else {
                $('.Review_top').hide();
                $('#comment_list').html('<li>���޵���</li>');
                $('#paging').hide();
            }
        }
    });
}

G.goods.comment(1);


G.goods.commentForItem = function( item, page ) {

    E.ajax_get({
        action: 'goodsComment',
        operFlg: 4,
        data: {
            twoPostID: this.twoPostID,
            item: item,
            page: page
        },
        call: function( o ) {
            if (o.code == 200) {
                var html = '';
                $.each(o.data.comment, function(k, v) {
                    html += '<li>';
                    html += v.comment_content;
                    html += '<div><p><span>' + v.creator + '</span></p><small>' + v.createTime + '</small></div>';
                    html += '</li>';
                });
                $('#comment_list').html(html);
                $('#paging').html(o.data.paging);
            }
        }
    });

}

