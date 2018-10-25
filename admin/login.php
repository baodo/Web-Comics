<?php
//khắc phục lỗi header giữa trang html
ob_start();
$thongbao='';
require 'config.php';
require 'lib/func.php';
require 'class/database.php';
require 'class/xl_nguoidung.php';
if(isset($_COOKIE['login']) && $_COOKIE['login'] == 1)
{
	$_SESSION['login'] = true;
	$_SESSION['ten'] = $_COOKIE['ten'];
	$_SESSION['avatar'] = $_COOKIE['avatar'];	
}

if(isset($_SESSION['login']))
{
	chuyentrang('index.php');
}
if(isset($_POST['tdn'],$_POST['pass']) && $_POST['tdn'] && $_POST['pass'])
{
	/*$db = new database();
	$db->setquery("select * from quan_tri where ten_dang_nhap = ? and mat_khau = ?");
	$param = array($_POST['tdn'],$_POST['pass']);
	$user = $db->loadrow($param);*/
	$xlus = new xl_nguoidung();
	//$mk = md5($_POST['pass']);
	$user = $xlus->login($_POST['tdn'],md5($_POST['pass']));
	if($user)
	{
		$_SESSION['login'] = true;
		$_SESSION['ten'] = $user->Ten;
		$_SESSION['ma'] = $user->Ma;
		$_SESSION['avatar'] = $user->Avatar;
		if(isset($_POST['checkbox']))
			{
				//cai dat cookie ghi lai thong tin dang nhap
				$time = time()+7*86400;
				setcookie('login',true,$time);
				setcookie('ten',$_SESSION['ten'],$time);
				setcookie('avatar',$_SESSION['avatar'],$time);
			}
		chuyentrang('index.php');
	}
	else
	{
		$thongbao = '<div class="alert alert-danger">Tài khoản hoặc mật khẩu không chính xác</div>';
	}
		
	
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Esteem  An Admin Panel Category Flat Bootstrap Responsive Website Template | Sign In:: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="<?php echo TEMPLATE_PATH?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo TEMPLATE_PATH?>css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo TEMPLATE_PATH?>css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo TEMPLATE_PATH?>css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo TEMPLATE_PATH?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="<?php echo TEMPLATE_PATH?>css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
<!-- /pages_agile_info_w3l -->

<div class="pages_agile_info_w3l"> 
  <!-- /login -->
  <div class="over_lay_agile_pages_w3ls">
    <div class="registration">
      <div class="signin-form profile">
        <h2>Đăng Nhập</h2>
        <?php echo $thongbao ?>
        <div class="login-form">
          <form method="post">
            <input type="text" name="tdn" placeholder="Tên đăng nhập" required="">
            <input type="password" name="pass" placeholder="Password" required="">
            <input type="checkbox" name="remember"> Nhớ tài khoản
            <div class="tp">
              <input type="submit" value="Đăng nhập">
            </div>
          </form>
        </div>
        <div class="login-social-grids">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>
        <p><a href="signup.html"> Don't have an account?</a></p>
        <h6>
        <a href="index.php">Back To Home</a>
        <h6>
      </div>
    </div>
    <!--copy rights start here-->
    <div class="copyrights_agile">
      <p>© 2017 Esteem. All Rights Reserved | Design not by <a href="https://www.facebook.com/gjabao.do.7" target="_blank">Bảo Đỗ</a> </p>
    </div>
    <!--copy rights end here--> 
  </div>
</div>
<!-- /login --> 
<!-- //pages_agile_info_w3l --> 

<!-- js --> 

<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>js/jquery-2.1.4.min.js"></script> 
<script src="<?php echo TEMPLATE_PATH ?>js/modernizr.custom.js"></script> 
<script src="<?php echo TEMPLATE_PATH ?>js/classie.js"></script> 
<script src="<?php echo TEMPLATE_PATH ?>js/gnmenu.js"></script> 
<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		 </script> 

<!-- //js --> 

<script src="<?php echo TEMPLATE_PATH ?>js/screenfull.js"></script> 
<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script> 
<script src="<?php echo TEMPLATE_PATH ?>js/jquery.nicescroll.js"></script> 
<script src="<?php echo TEMPLATE_PATH ?>js/scripts.js"></script> 
<script src="<?php echo TEMPLATE_PATH ?>js/snow.js"></script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>js/bootstrap-3.1.1.min.js"></script> 
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
</body>
</html>