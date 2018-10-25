<?php 
require 'class/xl_comments.php';
$thongbao = '';
//tim user can sua
$xlbl = new xl_comments();
$cmt = $xlbl->comment($_GET['ma']);

if(!$cmt)
 chuyentrang('index.php?page=comments');
else
{
	$xlbl->delcmt($cmt->Ma);
} 
chuyentrang('index.php?page=comments');


?>
