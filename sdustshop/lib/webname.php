<?php
require("config.php");
$sql = "SELECT webname FROM config WHERE id='1'";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
$webtitle=$row[0];
?>
