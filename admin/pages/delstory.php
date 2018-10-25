<?php 
require 'class/xl_stories.php';
$thongbao = '';
//tim story can sua
$xltruyen = new xl_stories();
$story = $xltruyen->story($_GET['ma']);

if(!$story)
 chuyentrang('index.php?page=stories');
else
{
	$xlnd->deluser($user->Ma);
} 
chuyentrang('index.php?page=user');


?>
