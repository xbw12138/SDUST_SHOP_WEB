<?php
require_once 'lib/config.php';
$email = $_POST['email'];
$qq = $_POST['qq'];
$username = $_POST['username'];
$password = $_POST['password'];


if($email==''||$qq==''||$username==''||$password==''){
  $rs['code'] = '0';
  $rs['msg'] = "请填写完整信息";
}else{
  $sqls="select * from lc_user where user_name='$username'";  
  $results = mysql_query($sqls);  
  $data = mysql_num_rows($results);
  if($data){
    $rs['code'] = '0';
    $rs['msg'] = "该用户名已经被注册";
  }else{
    $sql = "INSERT INTO lc_user (user_name, user_password, user_email, user_qq) VALUES ( '$username', '$password',  '$email', '$qq')";
    $result = mysql_query($sql);
    if($result){
      $rs['code'] = '1';
      $rs['ok'] = '1';
    }else{
      $rs['code'] = '0';
      $rs['msg'] = "请填写完整信息";
    }
  }

}
echo json_encode($rs);