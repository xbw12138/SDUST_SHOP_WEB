<?php
require("lib/config.php");
//require("lib/webname.php");
//$rowz=mysql_fetch_row(mysql_query("select count(*) from lc_sp"));
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
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/*$(".mall_list a").click(function(){
		var index = layer.open({
			type: 1,
			title: false,
			closeBtn: false,
			shadeClose: false,
			offset: '25%',
			content: "<div class='no_login_show'><h1>亲！您还没登录哦！</h1><a href='login.php'>马上登录</a><a href='register.php'>免费注册</a><a href='index.php'>山科SHOP</a><a href='javascript:layer.closeAll();'>取消</a></div>"
		});
	});*/
	$("#msg_gw").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
	});
      
});
</script>
<script src="http://ku.zzfriend.com/js/ie.js"></script>
</head>

<body>

<?php require("header.php"); ?>
	<div class="top w">
   	<div class="m_banner" id="owl">
            <a href="index.php" class="item"><img src="images/10250290397.png"></a>
            <a href="index.php" class="item"><img src="images/10225357963.jpg"></a>
      </div>
        <div class="m_nav">
        	
            <a href="javascript:void(0);" id="msg_gw"><img src="images/m-index_16.png"><span>购物资讯</span></a>
            <a href="admin/views/wangEditor.php" id="msg_qd"><img src="images/m-index_24.png"><span>发布商品</span></a>
            <a href="http://v.ecfun.cc" id="msg_dd"><img src="images/m-index_26.png"><span>科学上网</span></a>
            <a href="user.php?page=1" id="msg_hy"><img src="images/m-index_27.png"><span>个人中心</span></a>
        </div>
  </div>
  
  
<?php require("search.php"); ?>
  
  
  <div class="m_mall w">
  	<div class="mall_title"><span>购物分类</span><em><a href="index.php">更多</a></em></div>
    <div class="mall_list">
   	  <a href="search_more.php?type=A&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-2@2x.png" width="160" height="120"/><br><span>电脑办公</span></a>
        <a href="search_more.php?type=B&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-1@2x.png" width="160" height="120"/><br><span>生活用品</span></a>
        <a href="search_more.php?type=C&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-5@2x.png" width="160" height="120"/><br><span>汽车用品</span></a>
        <a href="search_more.php?type=D&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-7@2x.png" width="160" height="120"/><br><span>医药保健</span></a>
        <a href="search_more.php?type=E&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-4@2x.png" width="160" height="120"/><br><span>图书</span></a>
        <a href="search_more.php?type=F&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-8@2x.png" width="160" height="120"/><br><span>家用电器</span></a>
        <a href="search_more.php?type=G&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-6@2x.png" width="160" height="120"/><br><span>服装</span></a>
        <a href="search_more.php?type=H&page=1" class="mall"><img src="http://img.ecfun.cc/QQ20161130-9@2x.png" width="160" height="120"/><br><span>吃货</span></a>
    </div>
  </div>
  

  
  <div class="m_baoliao w">
  	<div class="baoliao_title"><span>最新推送</span><em><a href="sp_more.php?page=1"><img src="images/iconfont-shuaxin.png"></a></em></div>
    <div class="baoliao_list">
    
    <?php
      if(1){
        $sql="select id,sp_info,sp_time from lc_sp  ORDER BY id DESC limit 0 , 10 ";
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

        <?php }}} ?>
    </div>
    <div class="bl_more"><a href="sp_more.php?page=1">浏览更多</a></div>
  </div>
  <?php require("foot.php"); ?>


</body>
</html>

