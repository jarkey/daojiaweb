<?php
		
class Mysql{
           var $linkid;
           var $db_host;
           var $db_user;
           var $db_pwd;
           var $db_name;
           var $querynum=0;
           var $selectid;
           var $result= null;
           var $pconnect = true;

//构造函数,初始化类时需带入数据库参数
function Mysql($db_host,$db_user,$db_pwd,$db_name,$pconnect = true){
           $this->db_host =$db_host;
           $this->db_user =$db_user;
           $this->db_pwd  =$db_pwd;
           $this->db_name =$db_name;

           if($this->pconnect == $pconnect){
             $this->linkid=@mysql_pconnect($this->db_host,$this->db_user,$this->db_pwd);
             }
             else{
             $this->linkid=@mysql_connect($this->db_host,$this->db_user,$this->db_pwd);
             }
             mysql_query("set names 'gbk'");
             if($this->linkid){
               if($this->db_name!=""){
                 $dbselect=@mysql_select_db($this->db_name) or $this->mysql_err("database not exists");
                 }
               }
               else{
               $this->Mysql_err("cannot connect the database server,pls chk your password");
               }
           //$this->query("SET NAMES 'utf8'");
           }

//用于执行SQL语句
function Query($sql){
                    $this->result=@mysql_query($sql,$this->linkid) or $this->mysql_err("SQL语句".$sql."错误");
                    $this->querynum++;
                    return $this->result;
                    }

function fetch_array($sql) {
		return mysql_fetch_array($sql,MYSQL_ASSOC);
	}

//用于统计记录的数目
function Number($sql){
                     $this->result=$this->query($sql);
                     $number=mysql_num_rows($this->result);
                     $this->Free();
                     return $number;
                     }

//取得一条记录
function GetRow($sql){
                     $this->query($sql);
                     $row=mysql_fetch_array($this->result,MYSQL_ASSOC);
                     $this->Free();
                     return $row;
                     }
//取得全部记录
function GetRows($sql){
                      $this->result=$this->query($sql);
                      while($row=mysql_fetch_array($this->result,MYSQL_ASSOC))
                           {
                           $allrows[]=$row;
                           }
                      $this->Free();
                      return $allrows;
                      }

//取得当前插入ID
function InsertID() {
                $id = mysql_insert_id();
                return $id;
                     }
//关闭数据库
function Close(){
                @mysql_close($this->linkid);
                }
//打印错误信息
function Mysql_err($msg){
                        echo $msg;
                        exit;
                        }
//释放
function Free(){
               @mysql_free_result($this->result);
               $this->result=null;
               }

 }
?>
