<?php
require 'class/xl_chuong.php';
require_once 'class/xl_stories.php';

$xltruyen = new xl_stories();
$xlchuong = new xl_chuong();

if(isset($_GET['matruyen'], $_GET['machuong']))
	{
		$chuong = $xlchuong->chap($_GET['matruyen'],$_GET['machuong']);
		$hinhs = explode('|',$chuong->Link_img);
		
		$tentruyen = $xltruyen->story($_GET['matruyen']);
		
		$listchaps = $xlchuong->listchaps($_GET['matruyen']); //nằm trong select option
	}
	//xemmang($listchaps);
?>
<div id="content">
  <div class="container content">
    <div class="row"> 
      <script>
	var url = "http://360game.vn/landing-360game/gunny/boss-ga-tro-lai-sound?utm_source=Banner&utm_medium=Ad_Qmedia_Adnet_CPA_GNAD&utm_term=GUNNY&utm_content=M18_GUNNY-m18_FC-1&utm_campaign=1107_CB&from3rd=Qmedia";

	function closepopup() {
		$('#image_popup').popup('hide');
		Cookies.set('preload_banner', '1', { expires: 0.04166666666 });
		var win = window.open(url, '_blank');
		win.focus();
		return false;
	}
	$(document).on('click', '#image_popup', function(){
		$('#image_popup').popup('hide');
		Cookies.set('preload_banner', '1', { expires: 0.04166666666 });
		var win = window.open(url, '_blank');
		win.focus();
		return false;
	});
</script> 
      <script>
	if(Cookies.get('preload_banner') == undefined){
		$('#image_popup').popup({
			opacity: 0.7,
			type: 'overlay',
			autoopen: true,
			outline: true,
			blur: false
		});
	}
</script>
      <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="trang-chu.html"> <span itemprop="name">Trang Chủ</span> </a>
          <meta itemprop="position" content="1">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="<?php echo $tentruyen->Ma ?>/<?php echo $tentruyen->Alias ?>.html"> <span itemprop="name"><?php echo $tentruyen->Ten ?></span> </a>
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="<?php echo $tentruyen->Ma ?>/<?php echo $chuong->Ordering ?>/<?php echo $chuong->Alias ?>.html"> <span itemprop="name"><?php echo $chuong->Ten ?></span> </a>
          <meta itemprop="position" content="3">
        </li>
      </ol>
      <div class="row">
        <div class="detail_ct">
          <div class="col-md-5 col-sm-5 dis_play">
            <h1 class="detail_title01"><?php echo $chuong->Ten ?></h1>
          </div>
          <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 dis_play">
            <div class="detail_right"> 
              <!-- <p class="dtl_p02"><a href="#">Hiển thị</a></p>
                <select class="dtl_p03">
                    <option>Tất cả trang</option>
                </select>-->
              
             <!-- <p class="dtl_p04"><a rel="nofollow" href="javascript:void(0)" class="report_error">Báo Lỗi</a></p> -->
            </div>
          </div>
        </div>
      </div>
     <!-- <div class="reading-control">
        <div class="mrb10"> <span>Nếu không xem được truyện vui lòng đổi "SERVER ẢNH" bên dưới hoặc xem bài viết <a target="_blank" href="/tin-tuc/huong-dan-fix-anh-die-toan-trang.html">HƯỚNG DẪN SỬA LỖI KHÔNG XEM ĐƯỢC TRUYỆN</a></span>
          <div class="mrt10"> <a rel="nofollow" href="javascript:void(0)" data-server="1" class="loadchapter btn mrb5 btn-primary">Server Ảnh 1</a> <a rel="nofollow" href="javascript:void(0)" data-server="2" class="loadchapter btn mrb5 btn-success">Server Ảnh 2</a> </div>
        </div>
        <div class="mrb10"> <span>Nếu vẫn không đọc được truyện hoặc truyện chưa được dịch, up không đúng truyện, vui lòng <a href="#truyenqq">Bình Luận</a> bên dưới hoặc nhấn <a rel="nofollow" href="javascript:void(0)" class="alertError">Báo Lỗi</a> giúp nhé.</span> </div>
        <div class="alert alert-info mrb0 hidden-xs hidden-sm"> <i class="fa fa-info-circle"></i> <em>Sử dụng mũi tên trái (←) hoặc phải (→) để chuyển chapter</em> </div>
      </div> -->
      <div class="row menu-fixed scroll-to-fixed-fixed" style="z-index: 1000; position: fixed; top: 0px; margin-left: 0px; width: 1240px; left: 12px;">
        
        
      </div>
      <div style="display: block; width: 1240px; height: 38px; float: none;"><div class="dtl_menu">
          <p> <a href="trang-chu.html"> <i class="fa fa-home" aria-hidden="true"></i> </a> </p>
          <p><a class="link-prev-chap" href="<?php echo $_GET['matruyen'] ?>/<?php echo $chuong->Ordering>1?($chuong->Ordering - 1):1  ?>/<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering>1?($chuong->Ordering - 1):1)->Alias ?>.html" title="<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering>1?($chuong->Ordering - 1):1)->Ten ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></p>
          <select class="selectEpisode" style="width:auto">
          <?php
		  
		  foreach($listchaps as $chap)
		  {
		  ?>
            <option <?php echo $_GET['machuong']==$chap->Ordering?'selected':'' ?> value="<?php echo $_GET['matruyen'] ?>/<?php echo $chap->Ordering ?>/<?php echo $chap->Alias ?>.html"><?php echo $chap->Ten ?></option>
          <?php
		  }
		  ?>
          </select>
          <p><a class="link-next-chap" href="<?php echo $_GET['matruyen'] ?>/<?php echo $chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1)  ?>/<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1))->Alias ?>.html" title="<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1))->Ten ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
         <!-- <p class="dtl_p04"><a rel="nofollow" href="javascript:void(0)" class="report_error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></p> -->
        </div>
       </div>
      <div class="row">
        <div style="text-align: center; margin-bottom: 10px; max-width: 960px; margin: 0 auto;">
          <style>
#M222918ScriptRootC186438 {min-height: 200px; text-align: center;}
</style>
          <!-- Composite Start -->
          <div id="M222918ScriptRootC186438">
            <div id="M222918PreloadC186438"> Loading... </div>
            <script> (function(){ var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById'; var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M222918ScriptRootC186438")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];} catch(e){var iw=d;var c=d[gi]("M222918ScriptRootC186438");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=186438;c[ac](dv); var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/t/r/truyenqq.com.186438.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})(); </script>
            <iframe style="display: none;"></iframe>
          </div>
          <!-- Composite End --> 
        </div>
        <div class="dtl_img col-md-12 col-sm-12 col-xs-12">
          <h2 class="des-detail"><?php echo $chuong->Ten ?></h2>
          <h4 class="detail-manga"> Bạn đang <a title="Đọc Truyện Tranh" href="https://truyenqq.com">Đọc Truyện Tranh</a> <strong><a href="?page=overviewstory&ma=<?php echo $tentruyen->Ma ?>"><?php echo $chuong->Ten ?></a></strong> tại <span>TruyenQQ.Com</span> </h4>
          <div class="full-social">
            <div class="detail-social"> <span style="position: relative; top: -6px;"><span class="fb-like face-detail fb_iframe_widget" data-href="https://truyenqq.com/truyen-tranh/black-clover-499-chap-146.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1498603730425925&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fblack-clover-499-chap-146.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;">
              <iframe name="f3c6b864ab0454c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Df1d71d8c38b8d7c%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff1a27cd450abfb%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fblack-clover-499-chap-146.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe>
              </span></span></span> <span class="button_google"><span class="g-plusone" data-size="medium" data-count="false"></span></span> </div>
          </div>
          <!-- <p class="fix-image "><a rel="nofollow" href="https://play.google.com/store/apps/details?id=com.truyenqq.truyen">App Đọc Black Clover Trên Điện Thoại Android</a></p>
		<p class="fix-image "><a rel="nofollow" href="https://itunes.apple.com/us/app/truyenqq/id1282215661?ls=1&amp;mt=8">App Đọc Black Clover Trên Iphone</a></p>
		-->
          
          <div class="detail-chap"> 
          <?php
		  foreach($hinhs as $hinh)
		  {
		  ?>
          <img src="<?php echo $hinh ?>" alt="<?php $chuong->Ten ?>"><br>
           <?php
		  }
		   ?>
          </div>
        </div>
        <div class="full-social">
          <div class="detail-social"> <span style="position: relative; top: -6px;"><span class="fb-like face-detail fb_iframe_widget" data-href="https://truyenqq.com/truyen-tranh/black-clover-499-chap-146.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1498603730425925&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fblack-clover-499-chap-146.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;">
            <iframe name="f384e0aa0ccbee8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Df40c12496f937%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff1a27cd450abfb%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fblack-clover-499-chap-146.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe>
            </span></span></span> <span class="button_google"><span class="g-plusone" data-size="medium" data-count="false"></span></span> </div>
        </div>
        
        <div class="dtl_menu">
          <p> <a href="trang-chu.html"> <i class="fa fa-home" aria-hidden="true"></i> </a> </p>
          <p><a class="link-prev-chap" href="<?php echo $_GET['matruyen'] ?>/<?php echo $chuong->Ordering>1?($chuong->Ordering - 1):1  ?>/<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering>1?($chuong->Ordering - 1):1)->Alias?>.html" title="<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering>1?($chuong->Ordering - 1):1)->Ten ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></p>
          <select class="selectEpisode" style="width:auto">
          <?php
		  
		  foreach($listchaps as $chap)
		  {
		  ?>
            <option <?php echo $_GET['machuong']==$chap->Ordering?'selected':'' ?> value="<?php echo $_GET['matruyen'] ?>/<?php echo $chap->Ordering ?>/<?php echo $chap->Alias ?>.html"><?php echo $chap->Ten ?></option>
          <?php
		  }
		  ?>
          </select>
          <p><a class="link-next-chap" href="<?php echo $_GET['matruyen'] ?>/<?php echo $chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1)  ?>/<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1))->Alias ?>.html" title="<?php echo $xlchuong->chap($_GET['matruyen'],$chuong->Ordering==$xltruyen->lastestchap($chuong->Story_id)?$xltruyen->lastestchap($chuong->Story_id):($chuong->Ordering + 1))->Ten ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
         <!-- <p class="dtl_p04"><a rel="nofollow" href="javascript:void(0)" class="report_error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></p> -->
        </div>
        
      </div>
      <div style="text-align: center; margin-bottom: 10px; max-width: 960px; margin: 0 auto;">
        <style>
#M222918ScriptRootC188329 {min-height: 300px;}
</style>
        <!-- Composite Start -->
        <div id="M222918ScriptRootC188329">
          <div id="M222918PreloadC188329"> Loading... </div>
          <script>
				(function(){
					var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
					var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M222918ScriptRootC188329")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
					catch(e){var iw=d;var c=d[gi]("M222918ScriptRootC188329");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=188329;c[ac](dv);
					var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/t/r/truyenqq.com.188329.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
			</script>
          <iframe style="display: none;"></iframe>
        </div>
        <!-- Composite End --> 
      </div>
     <!-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="journalitem">
            <div class="fanpage"> <b class="mod">Quản trị viên</b> Like <a rel="nofollow" href="https://www.facebook.com/congdongthichdoctruyen" target="_blank">PAGE</a> để tạo động lực cho nhóm dịch ra truyện nhanh hơn nhé.
              <div class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen/" data-send="false" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1498603730425925&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;">
                <iframe name="f17665a3eec5704" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Df2e57d3ad5f30b8%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff1a27cd450abfb%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe>
                </span></div>
            </div>
          </div>
        </div>
      </div> -->
      <input type="hidden" id="book_id" value="<?php echo $tentruyen->Ma ?>">
      <input type="hidden" id="total_page" value="<?php echo count($hinhs) ?>">
      <input type="hidden" id="current_page" value="1">
      <input type="hidden" id="id_textarea" value="">
      <input type="hidden" id="parent_id" value="">
      <input type="hidden" id="episode_name" value="146">
      <input type="hidden" id="episode_id" value="145064">
      <input type="hidden" id="slug" value="<?php echo $tentruyen->Alias ?>">
      <script type="text/javascript">
	var urlComment = 'https://truyenqq.com/frontend/comment/index';
	var urlCommentLoad = 'https://truyenqq.com/frontend/comment/list';
	var urlCommentRemove = 'https://truyenqq.com/frontend/comment/remove';
	var urlError = 'https://truyenqq.com/frontend/user/error';
</script>
    <!--  <div id="report_error" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Báo Lỗi</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="book_id" value="499">
                <input type="hidden" id="order" value="146">
                <div class="form-group">
                  <label for="username" class="col-md-3 col-sm-4 col-xs-4 control-label">Loại Lỗi</label>
                  <div class="col-md-9 col-sm-8 col-xs-8">
                    <select class="form-control" name="typeError" id="typeError">
                      <option value="0">Chọn</option>
                      <option value="1">Hình Bị Hư</option>
                      <option value="2">Chương Tiếng Anh</option>
                      <option value="3">Không Có Hình</option>
                      <option value="-1">Khác</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="username" class="col-md-3 col-sm-4 col-xs-4 control-label">Nội Dung</label>
                  <div class="col-md-9 col-sm-8 col-xs-8">
                    <textarea class="form-control" rows="3" id="contentError" name="contentError" disabled=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="captcha" class="col-md-3 col-sm-4 col-xs-4 control-label">Mã xác nhận</label>
                  <div class="col-md-9 col-sm-8 col-xs-8">
                    <div class="row">
                      <div class="col-md-8 col-sm-7 col-xs-7">
                        <input type="text" class="form-control" id="captcha" name="captcha">
                      </div>
                      <div class="col-md-2 col-sm-3 col-xs-3">
                        <p class="charater"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAeBAMAAAAodabAAAAAIVBMVEX///+Aw/FBpeohludgtO7f8Pug0vS/4fgCiOT///////9+bL3bAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAYFJREFUOI3tUsFOwkAQnZaW5YhGkSMSSfaIJugeC6LhWEUTjnCRHomGpEfo1jKfbXdnlhJjOHrRSZq+zszbffM6AP/xGyHeVsfK4eKRQH18zqkXRB1z9VTdOHr4yqCNOSUUIhdlNlZ9ggF2VUHQU3hrgY/DJQHdkgMqDmOYur45eJrgREuM7CXcBukA/O1erldBQFJRakh29ptFQxJBqH+icLZe6g9yBjxTE0DtjQqKPcUnKDQf5BXOUEOZzF1fbePQSHNS9qBmhAVbhVnsKEl0eCeFcpRnvZQGBpiNscOzQNrhPlFNBR+ssS3xwWrOY5hZH2Z9ekjXZ0URGU2Xh5PCORNYdxqbA0o1FDiTy5qw9hrHyFB/V1EO/4qjGOF2QmM6GWrIbpakfIffhJlc29ojmzAl4WoeKtIT6sVIUWNt5XYnLVVYxyDNz1REx2SSfRJYBlEaukuLVS7jxTvvAfImG9QDvuWqtebkPV5zUiLeEXw6cVsi1nAsxOgyPtrwZ+MLy2tZDSGUHLsAAAAASUVORK5CYII=">
                          <input type="hidden" name="idcaptcha" id="idcaptcha" value="Q03f9ea9286abc18d4b70830428cfce1a">
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
              <button type="button" class="btn btn-primary" id="submit_error">Gửi</button>
            </div>
          </div>
          <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
      </div> -->
      <!-- /.modal --> </div>
  </div>
  <!-- SIZE: 300X250 - BOTTOM - LEFT -->
  <div id="ads_left"> 
    <!-- SIZE: 300x250 - BOTTOM + RIGHT -->
    <div data-ads="300x250" style="position: fixed; bottom: 0; right: 0; width: 300px; height: 250px; z-index: 999; background: white;" "=""> <a href="#" onclick="close_ads(); return false;" class="ads_close"></a>
      <div id="bg_130421886"></div>
      <script type="text/javascript" src="//vn-platform.bidgear.com/async.php?domainid=1304&amp;sizeid=2&amp;zoneid=1886&amp;k=5b3313b762f5c" defer=""  ="" async=""></script> 
    </div>
  </div>
</div>
