<?php
require("lib/config.php");
session_start();
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
}else{
  header("Location:login.php");
}
$sqls="select id from lc_user where user_name='$username'";
$results = mysql_query($sqls);
$rows=mysql_fetch_row($results);
//用户商品检索
$sql = "SELECT count(*) FROM lc_sp WHERE user_id='$rows[0]'";
$rowz=mysql_fetch_row(mysql_query($sql));
$page=(int)$_GET['page'];
$num=($page-1)*10;
if($rowz[0]%10!=0){
  $totalpage=$rowz[0]/10+1;
}else{
  $totalpage=$rowz[0]/10;
}
$i=1;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="#" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="format-detection" content="telephone=no">
<title>山科SHOP</title
><link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/baoliao.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="layer/layer.js"></script>
<script type="text/javascript">

	$("#msg_gw").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
	});
    $("#msg_qd").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
    });
    $("#msg_dd").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
     });
    $("#msg_hy").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
    });
});
</script>
<script src="http://ku.zzfriend.com/js/ie.js"></script>
</head>

<body>
<header>
  <div class="header"> <a class="new-a-back" href="javascript:history.go(-1)"> <span><img src="images/iconfont-fanhui.png"></span> </a>
    <h2>个人中心</h2>
    <div class="head_right" style="top:13px;"><a href="lib/logout.php" style="color:#FFFFFF; font-size:14px;">注销</a></div>
  </div>
</header>


<br>
<div class="go_buy"><a href="admin/views/wangEditor.php" id="btn1">发布商品</a></div>
<br>




  <div class="m_baoliao w">
  	<div class="baoliao_title"><span>我发布的商品</span><em><a href="user.php?page=<?php echo $page+$i; ?>"><img src="images/iconfont-shuaxin.png"></a></em></div>
    <div class="baoliao_list">
 
    <?php
      if($page<=$totalpage){
         
          $sql="select id,sp_info,sp_time from lc_sp WHERE user_id='$rows[0]' ORDER BY id DESC limit $num , 10 ";
        
              if($result=mysql_query($sql)){
                  while($row=mysql_fetch_array($result)){	
                    	$obj=json_decode($row['1']); 
    ?>              
    	<a href="baoliao_view.php?body=<?php echo $row['0']; ?>">
        <div class="baoliao_content">
            <div class="bl_img"><img src="<?php echo $obj->img; ?>" /></div>
            <div class="bl_right">
                <div class="bl_title"><?php echo $obj->title; ?></div>
                <div class="bl_note"><?php echo $obj->note; ?></div>
                <div class="bl_tag">
                    <div class="bl_price">¥<?php echo $obj->price; ?></div>
                    <div class="bl_oprice">¥<?php echo $obj->oprice; ?></div>
                    <div class="bl_time"><?php echo $row['2']; ?></div>
                    <div class="bl_mall"><?php echo $obj->source; ?></div>
                </div>
            </div>
        </div> 
        </a>
        
        <?php }}  ?>       
        </div>
        <div class="bl_more"><a href="user.php?page=<?php echo $page+$i; ?>">浏览更多</a></div>
       
        <?php }else{ ?>
          </div>
          <div class="bl_more"><span>没有更多商品了</span></div>   
          <div class="bl_more"><img src="images/nothing.png"></img></div>  
          <div class="bl_more"><a href="user.php?page=1">返回首页</a></div>  
        <?php } ?>
        
                
    
  </div>
  <?php require("foot.php"); ?>


</body>
</html>
