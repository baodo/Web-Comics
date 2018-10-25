<?php 
	require 'class/xl_stories.php';	
	
	$temp = isset($_GET['trang'])?$_GET['trang']:1;
	$cur = max(1,$temp); //Lấy trang hiện tại
	
	$xltruyen = new xl_stories();
	
	$tongsodong = $xltruyen->tongsodong();
	
	//tính số trang
	$sotrang = ceil($tongsodong/SODONGTRENTRANG);
	
	//Tìm biến trang để xác định trang của người dùng muốn vào
	$trang = isset($_GET['trang']) && $_GET['trang'] > 1 && $_GET['trang'] <= $sotrang ? $_GET['trang'] : 1;
	
	//Tìm vị trí
	$vitri = ($trang -1) * SODONGTRENTRANG;
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
              <th>Hình</th>
              <th>Tên truyện</th>
              <th>Mô tả</th>
              <th>Loại truyện</th>
              <th>Số chương</th>
              <th>Trạng thái</th>
              <th>Chương</th>
              <th>Ngày cập nhật</th>
            </tr>
  </thead>
          <?php 
	$chitiettruyen = $xltruyen->story($_GET['ma']);
	$t = $xltruyen->tenloai($chitiettruyen->Category_id); // Lấy tên loại	
?>
          <tbody>
    <tr>
              <td><span class="bt-content"><img src="<?php echo $chitiettruyen->Hinh ?>" width="50px" height="50px"></span></td>
              <td><span class="bt-content"><?php echo $chitiettruyen->Ten ?></span></td>
              <td><span class="bt-content"><?php echo $chitiettruyen->Mo_ta ?></span></td>
              <td><span class="bt-content"><?php echo $t->Ten ?></span></td>
              <td><span class="bt-content"><?php echo $xltruyen->sochuongtruyen($chitiettruyen->Ma) ?></span></td>
              <td><span class="bt-content"><?php echo $chitiettruyen->Trang_thai==1?'Đã hoàn thành':'Đang tiến hành' ?></span></td>
              
              <td><span class="bt-content"> 
                
                <!--<select name="chapter_id[]" style="width:170px">
				      <option value="">--- Chọn chương ---</option>  
                      <?php 
					 /* $dschuong = $xltruyen->dschuong($chitiettruyen->Ma);
					  foreach($dschuong as $tenchuong)
							{
					  ?>
     					                <a href="?page=&<?php echo $tenchuong->Ordering.'/'.$tenchuong->Alias?>"><option value="<?php echo $tenchuong->Ordering . '. ' . $tenchuong->Ten;?>"><?php echo $tenchuong->Ordering . '. ' . $tenchuong->Ten;?></option></a>
                      <?php } */?>
                    </select> -->
                
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Chọn chương <span class="caret"></span></button>
                <ul class="dropdown-menu">
                <?php 
					$dschuong = $xltruyen->dschuong($chitiettruyen->Ma);
					  foreach($dschuong as $tenchuong)
							{
				?>
                    <li><a href="?page=chap&matruyen=<?php echo $chitiettruyen->Ma ?>&machuong=<?php echo $tenchuong->Ordering ?>"><?php echo $tenchuong->Ordering . '. ' . $tenchuong->Ten;?></a></li>
                 <?php 
							}
				 ?>
                </ul>
              </div>
                </span></td>
                <td><span class="bt-content"><?php echo $chitiettruyen->Ngay_cap_nhat ?></span></td>
            </tr>
    <?php 
	/*if(isset($_POST['chapter_id']))
	{
		$arr = implode('. ', $_POST['chapter_id']);
		$chuong = explode('. ',$arr);	
	}
	xemmang($chuong);
	$chuong = $xltruyen->chuong($chitiettruyen->Ma, $chitiettruyen->Ordering);
  		foreach($dschuong as $tenchuong)
		{
			$arrtrangtruyen = explode('|', $tenchuong->Link_img);
			foreach($arrtrangtruyen as $trang)
			{
  ?>
  <img src="<?php echo $trang ?>">
  <?php
  			}
		}*/
  ?>
  </tbody>
        </table>
        <a href="?page=addchap&ma=<?php echo $chitiettruyen->Ma ?>" class="btn btn-success">Thêm chương mới</a>
        
</div>
</body>
</html>