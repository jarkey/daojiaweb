<div class="header clearfix">
	<div class="logo"><a href="index.php"><img src="images/index_03.png" alt="" /></a></div>
    <div class="city">
    	<h3><img src="images/index_09.png" alt="" /></h3>
       
    </div>
    <div class="search_w">
    	<div class="search clearfix">
        	<form action="product.php" method="get">
            	<h3><span>产品</span></h3>
               <!-- <ul>
                	<li>产品1</li>
                    <li>产品2</li>
                    <li>产品3</li>
                </ul>-->
                <input type="text"  name="search" class="text_k" /><input type="submit" value="搜索" class="ss_btn" />
            </form>
        </div>
        <div class="myxjd">
        	<a href="buy_1.php"><img src="images/nby_20.png" alt="" />我的购物车</a>
            <span id="gwc_c" gwc_c="<?=$pr_num?>"><?=$pr_num?></span>
        </div>
    </div>
	<script type="text/javascript">
		$(function(){
			$('.search').find('h3').click(function(){
				$('.search').find('ul').show();
			})
			$('.search').find('ul li').click(function(){
				$('.search').find('h3 span').html($(this).html());
				$('.search').find('ul').hide();
			})
			$('.search').find('ul').mouseleave(function(){
				$(this).hide();
			})
		})
	</script> 
 

</div>