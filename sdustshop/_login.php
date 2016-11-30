<?php
require_once 'lib/config.php';
session_start();
$username= $_POST['username'];
$password = $_POST['password'];
$sql="select user_password from lc_user where user_name='$username'";
$result = mysql_query($sql);
$row=mysql_fetch_row($result);
if($password!=null&&$username!=null){
	if($row[0]==$password){
		$rs['code'] = '1';
		$rs['ok'] = '1';
		$_SESSION['username']=$username;
	}else{
		$rs['code'] = '0';
		$rs['msg'] = "邮箱或者密码错误";
	}
}else{
	$rs['code'] = '0';
    $rs['msg'] = "请填写邮箱或密码";
}

echo json_encode($rs);