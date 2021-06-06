<?php
header("Content-Type: text/html; charset=UTF-8");


$status="true"; //是否启用API接口
$key="123456";//API接口密钥(如果API接口启用必须更改!否则可能引起撞库攻击!)


//以下配置勿动
$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];
//API配置
include('config.php'); //导入配置文件

if ($status=="false"||$_GET['key']!=$key||$username==""||$password==""||$email=="")
{
	$data=[
	'code'=>"false",
	'msg'=>"注册失败!",
	'ps'=>"您提交的参数不全!"
	];

$message=json_encode($data,JSON_UNESCAPED_UNICODE);
echo $message;
	return;
};


$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];

if ($username==""||$password==""||$email=="")
{
	$data=[
	'code'=>"false",
	'msg'=>"注册失败!",
	'ps'=>"您提交的参数不全!"
	];

$message=json_encode($data,JSON_UNESCAPED_UNICODE);
echo $message;
return;
};


$check=$_GET['username'];
if ($check=="")
{
    echo "false";
    return;
};
include('sha256.php');//导入SHA256加密文件
include( 'config.php' );//导入配置文件

function generateRandomString( $length = 10 ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ( $i = 0; $i < $length; $i++ ) {
        $randomString .= $characters[ rand( 0, strlen( $characters ) - 1 ) ];
    }
    return $randomString;
}

$username = sqlCheck($_GET[ "username" ]);//SQL效验

$email = $_GET[ "email" ];
$salt = generateRandomString( 16 );
$regdate = time();
$regip = $_SERVER[ 'REMOTE_ADDR' ];
$password = '$SHA$' . $salt . '$' . hash( "SHA256", hash( "SHA256", $_GET[ "password" ] ) . "$salt" );
$result = $conn->query( "SELECT * FROM authme WHERE username='$username'" );
if ( $result->num_rows > 0 ) {
$data=[
	'code'=>"false",
	'msg'=>"注册失败!",
	'ps'=>"您注册的ID已经存在了!"
	];

$message=json_encode($data,JSON_UNESCAPED_UNICODE);
echo $message;
} else {
    if ( $conn->query( "INSERT INTO authme(username,password,regdate,email) VALUES('$username','$password','$regdate','$email')" ) === True ) {
$data=[
	'code'=>"success",
	'msg'=>"注册成功!",
	'ps'=>"您可以进入服务器了!"
	];

$message=json_encode($data,JSON_UNESCAPED_UNICODE);
echo $message;

    }
}
$conn->close();


?>