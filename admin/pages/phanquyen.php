<?php
require_once 'class/xl_phanquyen.php';
$xl_phanquyen = new xl_phanquyen();
$dsus = $xl_phanquyen->docnguoidung();
/*foreach($dsus as $us)
{
	echo $us->Ten.'<a href="?page=capquyen&id='.$us->Ma.'">Cấp quyền</a><br>';
}*/

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
              <th>Avatar</th>
              <th>Tên</th>
              <th>Tên đăng nhập</th>
              <th>SĐT</th>
              <th>Trạng thái</th>
              <th>Email</th>
              <th>Tác vụ</th>
            </tr>
          </thead>
          <?php 
	if(isset($dsus) && $dsus){
		foreach($dsus as $user)
		{ if($user->Trang_thai != 2) {
?>
          <tbody>
            <tr>
              <td><span class="bt-content"><?php echo $user->Ma ?></span></td>
              <td><span class="bt-content"><img src="<?php echo $user->Avatar ?>"  width= "50px" height="50px"></span></td>
              <td><span class="bt-content"><?php echo $user->Ten ?></span></td>
              <td><span class="bt-content"><?php echo $user->User ?></span></td>
              <td><span class="bt-content"><?php echo $user->SDT ?></span></td>
              <td><span class="bt-content"><?php echo $user->Trang_thai==1?'Hoạt động':'Khóa' ?></span></td>
              <td><span class="bt-content"><?php echo $user->Email ?></span></td>
              <td><span class="bt-content"> <a href="?page=capquyen&id=<?php echo $user->Ma ?>" class="btn btn-success">Cấp quyền</a>
            </tr>
            <?php 
  		}
	}
  }
  ?>
          </tbody>
        </table>
</body>
</html>