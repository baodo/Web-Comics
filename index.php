<?php
require 'class/database.php';
require 'lib/func.php';
require 'config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<head>
<base href="<?= HOME ?>"/>
<meta charset="utf-8">
<meta name="keywords" content="doc truyen tranh, manga, doc manga, ngon tinh, tien hiep">
<meta name="description" content="Trang đọc truyện tranh, manga, ngôn tình, tiên hiệp online hay và mới nhất cập nhật liên tục tại TruyenQQ.Com">
<meta property="og:site_name" content="TruyenQQ.Com">
<meta property="og:type" content="book">
<meta property="fb:app_id" content="1498603730425925">
<meta property="og:url" content="index.html">
<!--<title>Đọc Truyện Tranh, Manga, Truyện Ngôn Tình, Tiên Hiệp, Manhua Online</title>-->
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes"/>
<meta name="admicro-site-verification" content="29000d1130079d5316b54c8a363c9180" />
<link href="https://plus.google.com/+QiQiVN" rel="publisher" />
<meta name="google-site-verification" content="eMht2fTIWtUpJkY7DfL1ihwmQoO2EtKCLDD9VJxpx2A" />
<meta name="google-site-verification" content="secQyxM3_3HYQ3OJhOBNht6hBR8T6vIBB5untIGvEIY" />
<link rel="shortcut icon" href="<?php echo TEMPLATE_PATH ?>frontend/images/faviconf9e3.ico?v=1.1" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH ?>frontend/css/styled9ee.css"/>
<link rel="alternate" type="application/atom+xml" title="TruyenQQ.Com Atom Feed - Rss" href="rss.html" />
<link rel="alternate" href="index.html" hreflang="vi-vn" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="<?php echo TEMPLATE_PATH ?>frontend/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?php echo TEMPLATE_PATH ?>frontend/css/styled9ee.css?v=1.6.1" rel="stylesheet" media="screen">

<link href="<?php echo TEMPLATE_PATH ?>frontend/fonts/glyphicons-halflings-regular.woff2" rel="stylesheet" media="screen">

<link rel="stylesheet" href="<?php echo TEMPLATE_PATH ?>/frontend/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/jquery.popupoverlay.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/js.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/js.cookie.min.js"></script>

<script type="text/javascript">
				var device = 0;
		var urlSearch = 'https://truyenqq.com/frontend/search/search';
		</script>
		
<!-- <script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','../www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-55970084-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script> -->
<link rel="manifest" href="manifest.json" />

<script>
			function getCookie(name){
				var pattern = RegExp(name + "=.[^;]*")
				matched = document.cookie.match(pattern)
				if(matched){
					var cookie = matched[0].split('=')
					return cookie[1]
				}
				return false
			}
		</script>
</head>
<body>
<div id="title-home" style="margin-top: -13px;">
  <h1>Đọc Truyện Tranh Online tiếng Việt hay nhất nhanh nhất</h1>
</div>
<div class="outsite" style="">
  <?php 
			//header
			require 'includes/header.php';
			?>
  <?php
			//menu
			require 'includes/menu.php';
			?>
  <?php
			//slideshow
			//if($_GET['page'] == 'home')
			//	require 'includes/slideshow.php';
			?>
  <?php
						//Xử lý load nội dung theo trang
						$page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 'home';
						$path = 'pages/'.$page.'.php';
						
						if(file_exists($path))
							include $path;
						else
							include 'pages/404.php';
						
						?>
  <div style="width: 730px; margin: 0px auto 10px auto;">
    <div id="bg_130411885"></div>
   <!-- <script type="text/javascript" src="http://vn-platform.bidgear.com/async.php?domainid=1304&amp;sizeid=1&amp;zoneid=1885&amp;k=5b330e91b417f" defer  async=""></script>  -->
  </div>
</div>
<?php
							//footer
							require 'includes/footer.php';
						?>
</div>
<div id="notification_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title">Đăng Ký Nhận Thông Báo</span> </div>
      <div class="modal-body"> Để kích hoạt tính năng này vui lòng nhấn nút "Bật" bên dưới, sau đó sẽ có hộp thoại hiện thị hỏi lại bạn nhấn "Có" rồi nhấn "Allow" (Cho phép). </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary request-notification">Bật</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/jquery-scrolltofixed-min.js"></script> 
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/readmore.min.js"></script> 
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/functionsbab9.js"></script> 
<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>frontend/js/socket6c54.js"></script> 
<!--  <script src="../apis.google.com/js/platform.js" async defer></script> -->
<div id="fb-root"></div>
<!--  <script>
			function close_ads() {
				$('#ads_left').remove();
				Cookies.set('left_banner', '1', { expires: 0.02083333333 });
				return false;
			}
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1498603730425925";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script> -->
</body>

<!-- Mirrored from truyenqq.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jul 2018 03:40:00 GMT -->
</html>