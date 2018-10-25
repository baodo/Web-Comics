<?php 
require 'class/xl_nguoidung.php';
$thongbao = '';
//tim user can sua
$xlnd = new xl_nguoidung();
$user = $xlnd->user($_GET['ma']);

if(!$user)
 chuyentrang('index.php?page=user');
else
{
	$xlnd->deluser($user->Ma);
} 
chuyentrang('index.php?page=user');


?>
