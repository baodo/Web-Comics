<?php 
	require 'class/xl_stories.php';
	require 'class/class.pager.php';	
	$temp = isset($_GET['trang'])?$_GET['trang']:1;
	$cur = max(1,$temp); //Lấy trang hiện tại
	
	$xltruyen = new xl_stories();
	$pager = new pager();
	
	$tongsodong = $xltruyen->tongsodong();
	
	//tính số trang
		//$sotrang = ceil($tongsodong/SODONGTRENTRANG);
		$sotrang = $pager->tim_tong_so_trang($tongsodong,SODONGTRENTRANG);
	//Tìm biến trang để xác định trang của người dùng muốn vào
		//$trang = isset($_GET['trang']) && $_GET['trang'] > 1 && $_GET['trang'] <= $sotrang ? $_GET['trang'] : 1;
	
	//Tìm vị trí
		//$vitri = ($trang -1) * SODONGTRENTRANG;
		$vitri = $pager->tim_vi_tri_bat_dau(SODONGTRENTRANG);
	$list = $xltruyen->liststories($vitri, SODONGTRENTRANG);
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
              <th>Hình</th>
              <th>Tên truyện</th>
              <th>Mô tả</th>
              <th>Loại truyện</th>
              <th>Số chương</th>
              <th>Trạng thái</th>
              <th>Ngày tạo</th>
              <th>Tác vụ</th>
            </tr>
  </thead>
          <?php 
	
	if(isset($list) && $list){
	foreach($list as $story)
	{
		$t = $xltruyen->tenloai($story->Category_id); // Lấy tên loại	
?>
          <tbody>
    <tr>
              <td><span class="bt-content"><?php echo $story->Ma ?></span></td>
              <td><span class="bt-content"><img src="<?php echo $story->Hinh ?>" width="50px" height="50px"></span></td>
              <td><span class="bt-content"><?php echo $story->Ten ?></span></td>
              <td><span class="bt-content"><?php echo lamtronnoidung($story->Mo_ta,50) ?></span></td>
              <td><span class="bt-content"><?php echo $t->Ten ;?></span></td>
              <td><span class="bt-content"><?php echo $xltruyen->sochuongtruyen($story->Ma) ?></span></td>
              <td><span class="bt-content"><?php echo $story->Trang_thai==1?'Đã hoàn thành':'Đang tiến hành' ?></span></td>
              <td><span class="bt-content"><?php echo $story->Ngay_tao ?></span></td>
              <td><span class="bt-content">
                <a href="?page=detailstory&ma=<?php echo $story->Ma ?>" class="btn btn-success">Xem chi tiết</a> 
                <a href="?page=editstory&ma=<?php echo $story->Ma ?>" class="btn btn-primary">Sửa</a>
                <a onClick="return confirm('Bạn có muốn xoá không?')" href="?page=delstory&ma=<?php echo $story->Ma ?>" class="btn btn-danger">Xóa</a>
                </span></td>
            </tr>
    <?php 
  		}
  }
  ?>
  </tbody>
        </table>
<a href="?page=addstory" class="btn btn-info" style="float:right">Thêm truyện mới</a>
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
          <li><a href="<?php //echo '?page=stories&trang='. $prev ?>" aria-label="Previous"><span aria-="true">«</span></a></li>
          <?php
  	//for($i=1;$i<=$sotrang;$i++)
	//{
?>
          <li><a href="<?php //echo '?page=stories&trang='.$i ?>"><?php //echo $i ?></a></li>
          <?php 
	//}
  //} 
?>
          <li><a href="<?php //echo '?page=stories&trang='.$next ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul> -->
</div>
</body>
</html>