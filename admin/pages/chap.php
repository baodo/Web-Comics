<?php 
	require 'class/xl_stories.php';
	require 'class/xl_chuong.php';
	
	$xltruyen = new xl_stories();
	$xlchuong = new xl_chuong();
	
	if(isset($_GET['matruyen'], $_GET['machuong']))
	{
		$chuong = $xlchuong->chap($_GET['matruyen'],$_GET['machuong']);
		$hinhs = explode('|',$chuong->Link_img);
		
		$tentruyen = $xltruyen->story($_GET['matruyen']);
	}
	//xemmang($chuong);

?>
<ol class="breadcrumb">
  <li><a href="?page=home">Trang chủ</a></li>
  <li><a href="?page=detailstory&ma=<?php echo $tentruyen->Ma?>"><?php echo $tentruyen->Ten ?></a></li>
  <li class="active"><?php echo $chuong->Ten ?></li>
</ol>
	<a href="?page=editchap&matruyen=<?php echo $chuong->Story_id ?>&machuong=<?php echo $chuong->Ordering?>" class="btn btn-primary">Sửa chương</a>
<?php
	foreach($hinhs as $hinh)
	{
?>
<center>
  <img class="img-reponsive" src="<?php echo $hinh?>"><br>
</center>
<?php 
	}
?>
