<?php
header("Content-Type: text/html; charset=UTF-8");
//数据库配置
	$host="66.66.66.66";//数据库IP地址
	$un="MaHuaTeng";//数据库用户
	$pw="WoW";//数据库密码
	$dbname="authme";//数据库名

	$conn=new MySQLi($host,$un,$pw,$dbname); //MySQL连接测试

	if($conn->connect_error){
		die("数据库连接失败！".$conn->connect_error);
	}
?>