<?php
require 'class/xl_comments.php';
require 'class/xl_stories.php';
require 'class/class.pager.php';
	/*$db = new database();
	$db->setquery('select * from user');
	$param=array();
	$list = $db->loadAllrow($param);*/
	//$temp = isset($_GET['trang'])?$_GET['trang']:1;
	//$cur = max(1,$temp); //Lấy trang hiện tại
	$xlbl = new xl_comments();
	$xltruyen = new xl_stories();
	$pager = new pager();
	
	$tongsodong = $xlbl->tongsodong();
	
	//tính số trang
		//sotrang = ceil($tongsodong/SODONGTRENTRANG);
	$sotrang = $pager->tim_tong_so_trang($tongsodong,SODONGTRENTRANG);
	//Tìm biến trang để xác định trang của người dùng muốn vào
		//$trang = isset($_GET['trang']) && $_GET['trang'] > 1 && $_GET['trang'] <= $sotrang ? $_GET['trang'] : 1;
	
	//Tìm vị trí
		//$vitri = ($trang -1) * SODONGTRENTRANG;
		$vitri = $pager->tim_vi_tri_bat_dau(SODONGTRENTRANG);
	$list = $xlbl->listcomments($vitri, SODONGTRENTRANG);
?>
<!DOCTYPE html>
<html lang="zxx">
		<head>
		<title>Esteem  An Admin Panel Category Flat Bootstrap Responsive Website Template | Tables  :: w3layouts</title>
		<!-- custom-theme -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //custom-theme -->
		<link href="<?php echo TEMPLATE_PATH ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH ?>css/table-style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH ?>css/basictable.css" />
		<link href="<?php echo TEMPLATE_PATH ?>css/component.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo TEMPLATE_PATH ?>css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo TEMPLATE_PATH ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- font-awesome-icons -->
		<link href="<?php echo TEMPLATE_PATH ?>css/font-awesome.css" rel="stylesheet">
		<!-- //font-awesome-icons -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
		</head>
		<body>
<table id="table">
          <thead>
    <tr>
              <th>Mã</th>
              <th>Nội dung</th>
              <th>Truyện</th>
              <th>Người bình luận</th>
              <th>Trạng thái</th>
              <th>Tác vụ</th>
            </tr>
  </thead>
          <?php 
	if(isset($list) && $list){
		foreach($list as $cmt)
		{ 
?>
          <tbody>
    <tr>
              <td><span class="bt-content"><?php echo $cmt->Ma ?></span></td>
              <td><span class="bt-content"><?php echo $cmt->Noi_dung ?></span></td>
              <td><span class="bt-content"><img src="<?php echo $xltruyen->story($cmt->Story_id)->Hinh?>" width="50px" height="50px"> <?php echo $xltruyen->story($cmt->Story_id)->Ten ?></span></td>
              <td><span class="bt-content"><?php echo $cmt->Ten_user ?></span></td>
              <td><span class="bt-content"><?php echo $cmt->Duyet==1?'Duyệt':'Ẩn' ?></span></td>
              <td><span class="bt-content"><a onClick="return confirm('Bạn có muốn xoá không?')" href="?page=delcmt&ma=<?php echo $cmt->Ma ?>" class="btn btn-danger">Xóa</a></span></td>
            </tr>
    <?php 
	}
  }
  ?>
  </tbody>
        </table>
<!--<a href="?page=adduser" class="btn btn-info" style="float:right">Thêm người dùng</a> -->


<?php
$pager->in_bo_nut($sotrang);
  /*if($sotrang > 1)
  {
  	for($i=1;$i<=$sotrang;$i++)
	{
		echo '<a href="?page=user&trang='.$i.'">Trang '.$i.'</a> ';
	}
  }
  ?>*/
  /*$prev = $cur-1;
  $next = $cur+1;
  if($sotrang > 1)
  {*/
?>
<!-- <ul class="pagination">
	  	<li><a href="<?php //echo '?page=user&trang='. $prev ?>" aria-label="Previous"><span aria-="true">«</span></a></li>
<?php
  	//for($i=1;$i<=$sotrang;$i++)
	//{
?>

          <li><a href="<?php //echo '?page=user&trang='.$i ?>"><?php //echo $i ?></a></li>
<?php 
	//}
  //} 
?> 
      <li><a href="<?php //echo '?page=user&trang='.$next ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>          
  
        </ul> -->
</div>
</body>
</html>