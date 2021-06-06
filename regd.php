<?php
//此文件请勿动!

$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];

if ($username==""||$password==""||$email=="")
{
echo "false";
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
echo "false";
} else {
    if ( $conn->query( "INSERT INTO authme(username,password,regdate,email) VALUES('$username','$password','$regdate','$email')" ) === True ) {
echo "true";
    }
}
$conn->close();
?>