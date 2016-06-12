<?php

	
	include_once "log_.php";
	include_once "../WxPayPubHelper/WxPayPubHelper.php";
	  require('../inc/config.inc.php');
    //使用通用通知接口
	$notify = new Notify_pub();

	//存储微信的回调
	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];	
	$notify->saveData($xml);
	
	
	if($notify->checkSign() == FALSE){
		$notify->setReturnParameter("return_code","FAIL");//返回状态码
		$notify->setReturnParameter("return_msg","签名失败");//返回信息
	}else{
		$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
	}
	$returnXml = $notify->returnXml();
	echo $returnXml;
	
	
	$log_ = new Log_();
	$log_name="./notify_url.log";//log文件路径
	$log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

	if($notify->checkSign() == TRUE)
	{
		if ($notify->data["return_code"] == "FAIL") {
			
			$log_->log_result($log_name,"【通信出错】:\n".$xml."\n");
		}
		elseif($notify->data["result_code"] == "FAIL"){
			
			$log_->log_result($log_name,"【业务出错】:\n".$xml."\n");
		}
		else{
			
			$log_->log_result($log_name,"【支付成功】:\n".$xml."\n");
			$out_trade_no = $notify->data["out_trade_no"];
			$sql_up2 = "UPDATE gplat_order_cart SET  payment=1,pay=2  WHERE orderNo='$out_trade_no'";
	        $result_up2=mysql_query($sql_up2);
		}
		
		
	}
?>