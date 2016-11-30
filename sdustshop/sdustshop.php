<?php 
$url = "http://182.254.146.68/sdustshop";  
if (!empty($url))    
{    
  Header("HTTP/1.1 303 See Other"); //这条语句可以不写  
  Header("Location: $url");  
}    
?>