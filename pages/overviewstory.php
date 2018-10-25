<?php
require_once 'class/xl_stories.php';
require 'class/xl_comments.php';
require 'class/xl_nguoidung.php';
require 'class/xl_chuong.php';
require 'class/class.pager.php';
$xlbl = new xl_comments();
$xltruyen = new xl_stories();
$xlnd = new xl_nguoidung();
$xlchuong = new xl_chuong();
$pager = new pager();



$truyen = $xltruyen->story($_GET['ma']);
$loai = $xltruyen->tenloai($truyen->Category_id);

$tongsodong = $xltruyen->tongsochuong($_GET['ma']);

//tính số trang
$sotrang = $pager->tim_tong_so_trang($tongsodong,SOCHUONGTRENTRANG);
//tìm vị trí
$vitri = $pager->tim_vi_tri_bat_dau(SOCHUONGTRENTRANG);

if(isset($_POST['submit']) && isset($_POST['comment']) && $_POST['comment'])
{
	$trangthai = 1;
	$mabinhluan = isset($_POST['hidden'])?$_POST['hidden']:0;
	//xemmang ($_POST);
	$xlbl->postcomment($_POST['comment'], $_SESSION['ma'], $_SESSION['ten'], $_GET['ma'] , $trangthai, $mabinhluan);
}

?>
<head>
<title><?= $truyen->Ten ?></title>
</head>
<div id="content">
<div class="container content">
  <div class="row">
    <?php
    ?>
    <div class="col-md-9 col-sm-9 col-xs-12 detail_info">
      <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="trang-chu.html"> <span itemprop="name">Trang Chủ</span> </a>
          <meta itemprop="position" content="1">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="trang-chu.html"> <span itemprop="name">Truyện Tranh</span> </a>
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="#"> <span itemprop="name"><?php echo $truyen->Ten?></span> </a>
          <meta itemprop="position" content="3">
        </li>
      </ol>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 info_gr01">
          <div class="info_img01"><img src="<?php echo $truyen->Hinh?>" alt="<?php echo $truyen->Ten?>" title="<?php echo $truyen->Ten?>" style="object-fit: cover;" width="163" height="212" ></div>
          <div class="info_text01">
            <h1 class="info_title" title="<?php echo $truyen->Ten?>"><?php echo $truyen->Ten?></h1>
            <!--<p>Tên khác: Vua Hải Tặc - One Piece</p>--> 
            <!-- <p>Tác giả: <a href="https://truyenqq.com/tac-gia/eiichiro-oda-129.html">Eiichiro Oda</a></p> -->
            <p>Thể loại: <a href="?page=category&maloai=<?php echo $loai->Ma ?>"><?php echo $loai->Ten?></a> <!-- <a href="https://truyenqq.com/the-loai/adventure-27.html">Adventure</a>, <a href="https://truyenqq.com/the-loai/comedy-28.html">Comedy</a>, <a href="https://truyenqq.com/the-loai/drama-29.html">Drama</a>, <a href="https://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a>, <a href="https://truyenqq.com/the-loai/shounen-31.html">Shounen</a>, <a href="https://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a> --> </p>
            <p>Lượt xem: <?php echo number_format($truyen->Luot_xem) ?></p>
            <p>Tình trạng: <?php echo $truyen->Trang_thai==1?'Đã hoàn thành':'Đang tiến hành' ?></p>
           <!-- <p class="popo_p03">Đánh giá: <span class="like" data-id="128"><span class="glyphicon glyphicon-thumbs-up"></span><span class="total_like">291</span></span> <span class="dislike" data-id="128"><span class="glyphicon glyphicon-thumbs-down"></span><span class="total_dislike">-12</span></span> </p> -->
           <!-- <div>
              <div class="fb-like fike_book fb_iframe_widget" data-href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1498603730425925&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fdao-hai-tac-128.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: bottom; width: 134px; height: 20px;">
                <iframe name="f2db7e26e6cbd18" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Dfd5dc4d6cdfd9c%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff3e214fdb84de8%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fdao-hai-tac-128.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 134px; height: 20px;" class=""></iframe>
                </span></div>
              <span class="button_google">
              <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1532248787581" name="I0_1532248787581" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;count=false&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;url=https%3A%2F%2Ftruyenqq.com%2Ftruyen-tranh%2Fdao-hai-tac-128.html&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.1o-4ybCSy04.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOCxs8QC305ZpbxxhCukgnir7jpYQ%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1532248787581&amp;_gfid=I0_1532248787581&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=15704793" data-gapiattached="true" title="G+"></iframe>
              </div>
              </span> </div> -->
            <div class="popover_btn">
            <?php
			
			?>
              <p><a href="<?php echo $_GET['ma'] ?>/<?php echo 1 ?>/<?php echo $xlchuong->chap($_GET['ma'], 1)->Alias ?>.html"><span class="	glyphicon glyphicon-eye-open"></span>Đọc Truyện</a></p>
            </div>
          </div>
          <div class="info_txt01 description-book readmore-js-section readmore-js-collapsed" style="height: 200px;">
            <h2>Nội Dung <?php echo $truyen->Ten ?>:</h2>
            <p><?php echo $truyen->Mo_ta ?></p>
          </div>
          <!-- <p class="readmore readmore-js-toggle"><a href="#">Xem Thêm</a></p> --> 
        </div>
      </div>
      <div class="row" style="text-align: center; margin-bottom: 30px;"> 
        <!-- Composite Start -->
        <div id="M222918ScriptRootC201867" style="margin: 0 auto; max-width: 720px;">
          <div id="M222918PreloadC201867" style="display: none;"> Loading... </div>
          <!--   <script>  
          (function(){
          var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
          var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M222918ScriptRootC201867")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
          catch(e){var iw=d;var c=d[gi]("M222918ScriptRootC201867");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=201867;c[ac](dv);
          var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/t/r/truyenqq.com.201867.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})(); 
          </script>-->
          <iframe style="display: none;"></iframe>
          <!-- <div id="MarketGidComposite201867" style="height: auto; overflow: visible;">
            </div> --> 
          <script type="text/javascript" charset="utf-8" src="https://servicer.mgid.com/201867/3?w=720&amp;h=261&amp;cols=3&amp;pv=5&amp;cbuster=1532248786835329935443&amp;ref=https%3A%2F%2Ftruyenqq.com%2Ftop-thang.html&amp;lu=https%3A%2F%2Ftruyenqq.com%2F&amp;pageView=1&amp;pvid=164c1250794bac4dd1e&amp;muid=i6g5rjdI4696"></script>
          <style class="MarketGidC201867" type="text/css">
@font-face { font-family: 'Roboto'; font-style: normal; font-weight: 400; src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v15/mUdRVCMHGKUBOACHGTH1g-vvDin1pK8aKteLpeZ5c0A.woff) format('woff'); } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/opensans/v10/K88pR3goAWT7BTt32Z01m1tXRa8TVwTICgirnJhmVJw.woff2) format('woff2'); unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/opensans/v10/RjgO7rYTmqiVp7vzi-Q5UVtXRa8TVwTICgirnJhmVJw.woff2) format('woff2'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/opensans/v10/u-WUoqrET9fUeobQW7jkRVtXRa8TVwTICgirnJhmVJw.woff2) format('woff2'); unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/opensans/v10/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 700; src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v10/k3k702ZOKiLJc3WVjuplzCUUniRZcd_wq8DYmIfsw2A.woff2) format('woff2'); unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 700; src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v10/k3k702ZOKiLJc3WVjuplzOXREeHhJi4GEUJI9ob_ak4.woff2) format('woff2'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 700; src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v10/k3k702ZOKiLJc3WVjuplzBUOjZSKWg4xBWp_C_qQx0o.woff2) format('woff2'); unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF; } @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 700; src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v10/k3k702ZOKiLJc3WVjuplzOgdm0LZdjqr5-oayXSOefg.woff2) format('woff2'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000; } #MarketGidComposite201867 .mgresponsive { display: inherit; } #MarketGidComposite201867 .mgbox { padding: 0 !important; position: relative !important; text-align: center; vertical-align: top !important; margin: 0 auto; border-style: solid; border-width: 0px; border-color: ; background-color: ; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-flex-direction: row; -ms-flex-direction: row; flex-direction: row; -webkit-flex-wrap: wrap; -ms-flex-wrap: wrap; flex-wrap: wrap; line-height: 100% !important; transition: none !important; box-sizing: border-box; } #MarketGidComposite201867 .mgbox { width: 100%; max-width: 100%; } #MarketGidComposite201867 div.mcimg { padding: 0px; text-align: center; } #MarketGidComposite201867 img.mcimg { border-style: solid; border-color: #ffffff; border-width: 0px; width: 100% !important; height: auto !important; max-width: 492px; max-height: 328px; box-sizing: border-box; display: block; } #MarketGidComposite201867 .mctitle { margin-top: 10px; text-align: left; } #MarketGidComposite201867 .mctitle a { font-weight: bold; font-size: 18px; line-height: 18px; font-style: normal; text-decoration: none; color: #868585; font-family: Roboto; } #MarketGidComposite201867 .mcdesc { display: none; text-align: center; } #MarketGidComposite201867 .mcdesc a { font-weight: normal; font-size: 12px; line-height: 12px; font-style: normal; text-decoration: none; color: #666666; font-family: 'Open Sans', sans-serif; } #MarketGidComposite201867 .mcdomain { display: block; text-align: left; } #MarketGidComposite201867 .mcdomain a { font-weight: normal; font-size: 13px; line-height: 13px; font-style: normal; text-decoration: none; color: #868585; font-family: Roboto; padding: 4px; display: block; overflow: hidden; } #MarketGidComposite201867 .mcdomain a img.mcimgsrc { vertical-align: bottom; margin-bottom: -3px; height: 20px; width: 20px; display: inline-block; } #MarketGidComposite201867 .mgline { background: none repeat scroll 0 0; background-color: ; cursor: pointer; display: inline-block; _overflow: hidden; *zoom: 1; *display: inline; padding: 0 !important; border-style: solid; border-color: #ffffff; border-width: 0px; width: 32.33333333%; max-width: 32.33333333%; box-sizing: border-box; margin: 10px 0.5%; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; word-wrap: break-word; } #MarketGidComposite201867 .mgline .image-container { position: relative; } #MarketGidComposite201867 .mgline .image-container .mcimgad { position: absolute; right: 0; bottom: 0; width: 20px; height: 20px; } #MarketGidComposite201867 .mgline { vertical-align: top; } #MarketGidComposite201867 .mgline, #MarketGidComposite201867 .mgbox { min-width: 90px; } #MarketGidComposite201867 .mgline[max-width~="120px"] .mcdesc { display: none !important; } @supports not (flex-wrap: wrap) { .mgbox { display: block !important; } #MarketGidComposite201867 .mgline { display: inline-block !important; } } .text-elements a { text-decoration: none; } #MarketGidComposite201867 div.mcprice { text-align: center; } #MarketGidComposite201867 div.mcprice span { font-weight: bold; font-size: 12px; line-height: 12px; font-style: normal; text-decoration: none; color: #ffffff; font-family: 'Open Sans', sans-serif; } #MarketGidComposite201867 div.mgbuybox, #MarketGidComposite201867 div.mgarrowbox { display: false; } #MarketGidComposite201867 div.mgbuybox, #MarketGidComposite201867 div.mgarrowbox, #MarketGidComposite201867 div.mcprice { display: none; } #MarketGidComposite201867 span.mcpriceold { text-decoration: line-through !important; } @media (max-width: 480px) { #MarketGidComposite201867 .mgline { width: 48% !important; margin: 1% !important; max-width: 48% !important; } } @media (max-width: 480px) { #MarketGidComposite201867 .mgline { width: 98% !important; margin: 1% !important; max-width: 98% !important; } } #MarketGidComposite201867 .mgpopular { background-color: rgba(255, 0, 0, 0.2) !important; border-color: rgba(255, 90, 0, 0.3) !important; } #MarketGidComposite201867 img.mcimg { margin: 0; opacity: 1 !important; } #MarketGidComposite201867 .mgline { position: relative; } #MarketGidComposite201867 .mgline .fake { visibility: hidden; position: relative; padding-top: 4px; } #MarketGidComposite201867 .mgline:hover .mctitle a { color: #00bfff; text-decoration: underline !important; } #MarketGidComposite201867 .mgline:hover .mcpriceold + .mcprice, #MarketGidComposite201867 .mgline:hover .mcpriceold { visibility: hidden; } #MarketGidComposite201867 .mgline:hover .mcdiscount { display: block; position: absolute; left: 0px; right: 0px; top: 5px; } #MarketGidComposite201867 .mgarrowbox { position: relative; background: #00bfff; width: 55%; height: 22px; margin: 0px; border-color: transparent; border-left-color: #00bfff; display: inline-block; font-family: 'Open Sans', sans-serif; } #MarketGidComposite201867 .mgarrowbox:after { left: 100%; top: 50%; content: " "; height: 0px; width: 0px; position: absolute; pointer-events: none; margin-top: -11px; border: solid 11px; border-color: inherit; } #MarketGidComposite201867 .mgbuybox { width: 40%; display: inline-block; text-align: right; font-weight: bold; font-family: 'Open Sans', sans-serif; font-size: 12px; color: #666666; text-decoration: underline; } #MarketGidComposite201867 .mctitle { margin-top: 2px; line-height: 1 !important; } #MarketGidComposite201867 .mctitle a { line-height: 110% !important; } #MarketGidComposite201867 .mcdesc { margin-top: 0; margin-bottom: 2px; } #MarketGidComposite201867 .mcdesc a { line-height: 1.5 !important; } #MarketGidComposite201867 div.mcprice { margin-top: 5px; line-height: 12 px !important; } #MarketGidComposite201867 div.mgbuybox, #MarketGidComposite201867 div.mgarrowbox { display: none; } #MarketGidComposite201867 .mgtobottom { position: absolute; bottom: 0; width: 100%; text-align: left; } #MarketGidComposite201867 .mgline .image-with-text, #MarketGidComposite201867 .mgline .mgtobottom { width: 100% !important; margin: 0 auto; } #MarketGidComposite201867 .mgline .image-with-text, #MarketGidComposite201867 .mgline .mgtobottom { max-width: 492px; } #MarketGidComposite201867 .mghead { font-family: Roboto !important; color: #00bfff; font-size: 14px !important; text-transform: uppercase !important; } #MarketGidComposite201867 .mcpriceold { float: left; padding-left: 5px; } #MarketGidComposite201867 .mcdiscount { display: none; } #MarketGidComposite201867 .mcdomain { display: block; overflow: hidden; padding: 4px; } #MarketGidComposite201867 .mcdomain a { padding: 0px; display: block; padding-top: 3.5px; padding-bottom: 2px; overflow: hidden; } #MarketGidComposite201867 div.mcprice, #MarketGidComposite201867 div.mcriceold { font-weight: bold; font-size: 12px; line-height: 12px; font-style: normal; text-decoration: none; color: #ffffff; font-family: 'Open Sans', sans-serif; } #MarketGidComposite201867 div.mcpriceold { text-decoration: line-through !important; } #MarketGidComposite201867 .mgline[max-width~="120px"] .mgarrowbox, #MarketGidComposite201867 .mgline[max-width~="120px"] .mgbuybox { display: none !important; } .image-with-text { min-height: 1px; } @media (max-width: 480px) { #MarketGidComposite201867 .mgline { width: 98% !important; margin: 1% !important; max-width: 98% !important; } } #MarketGidComposite201867 .mgline { box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.25); -moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.25); -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.25); -o-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.25); border-radius: 5px; overflow: hidden; background: #fff; } #MarketGidComposite201867 .mgline .image-container { display: inline-block !important; } #MarketGidComposite201867 .mgline .mgtobottom { left: 0; right: 0; } #MarketGidComposite201867 .mgline .mctitle { margin-top: 5px; min-height: 35px; overflow: hidden; padding: 0 7px; } #MarketGidComposite201867 .mgline .mcdesc { padding: 0 20px; } #MarketGidComposite201867 .mgline .mcdomain { padding: 4px 20px; } #MarketGidComposite201867 .mcdomain a { line-height: 14px; margin-top: 0; margin-bottom: 5px; } #MarketGidComposite201867 .mcdomain a img.mcimgsrc { margin-right: 5px; }  #MarketGidComposite201867 div.mcimg a.close-informer { width: 14px; height: 14px; background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5NzI0ODBDMzY3ODcxMUU1OEM4RUU2RUJCOUREODIyQiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5NzI0ODBDNDY3ODcxMUU1OEM4RUU2RUJCOUREODIyQiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjk3MjQ4MEMxNjc4NzExRTU4QzhFRTZFQkI5REQ4MjJCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjk3MjQ4MEMyNjc4NzExRTU4QzhFRTZFQkI5REQ4MjJCIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+uNcpEQAAAHxJREFUeNqckgEKwCAIRe3fYjfKc2zX6hydaLRbbDnGkLDIPggl/5lKIcbIRJRqbDSnUmOHE6LPm+CEfhj6lnN+o5WVh1VOm6xColCXc/cgLWYev9gaejnQojCab5RDzyDt6RantqoBaz5zq54ZywJ3CXjIwQGd8skfAQYALdQqftYulocAAAAASUVORK5CYIJ0ZW50Ij4NCiA8ZGl2IGNsYXNzPSJjb250ZW50LWNvbnRhaW5lciI+PGZpZWxkc2V0Pg0KICA8aDI+NTAyIC0gV2ViIHNlcnZlciByZWNlaXZlZCBhbiBpbnZhbGlkIHJlc3BvbnNlIHdoaWxlIGFjdGluZyBhcyBhIGdhdGV3YXkgb3IgcHJveHkgc2VydmVyLjwvaDI+DQogIDxoMz5UaGVyZSBpcyBhIHByb2JsZW0gd2l0aCB0aGUgcGFnZSB5b3UgYXJlIGxvb2tpbmcgZm9yLCBhbmQgaXQgY2Fubm90IGJlIGRpc3BsYXllZC4gV2hlbiB0aGUgV2ViIHNlcnZlciAod2hpbGUgYWN0aW5nIGFzIGEgZ2F0ZXdheSBvciBwcm94eSkgY29udGFjdGVkIHRoZSB1cHN0cmVhbSBjb250ZW50IHNlcnZlciwgaXQgcmVjZWl2ZWQgYW4gaW52YWxpZCByZXNwb25zZSBmcm9tIHRoZSBjb250ZW50IHNlcnZlci48L2gzPg0KIDwvZmllbGRzZXQ+PC9kaXY+DQo8L2Rpdj4NCjwvYm9keT4NCjwvaHRtbD4NCg=="); display: block; opacity: 0; position: absolute; right: 3px; top: 3px; z-index: 1; cursor: pointer; } #MarketGidComposite201867 div.mgline:hover a.close-informer { opacity: 0.7; -moz-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; transition: all 0.3s ease-out; } #MarketGidComposite201867 div.mgline a.close-informer:hover { opacity: 1; -moz-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; transition: all 0.3s ease-out; } #MarketGidComposite201867 div.mcimg { position: relative; display: inline-block } div.image-with-price { position: relative; } #MarketGidComposite201867 .mgline .image-container { width: auto; margin: 0 auto; position: relative; }
</style>
          <!-- <script charset="utf-8" src="https://cm.mgid.com/i.js?cbuster=1532248787765219115191" type="text/javascript" async=""></script> --></div>
        <!-- Composite End --> 
      </div>
      
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="info_gr02">
            <h3><img src="<?php echo TEMPLATE_PATH ?>/frontend/images/info-list01.png" alt="Danh sách chương" title="Danh sách chương"></h3>
            <div id="info_scroll">
              <div class="info_text_ct">
                <div class="row">
                  <?php
				  $chuongs = $xltruyen->dschuongdesc($_GET['ma'],$vitri, SOCHUONGTRENTRANG);
				  foreach($chuongs as $chuong)
				  {
				  ?>
                  <div class="info_text_dt">
                    <div class="col-md-10 col-sm-10 col-xs-8"> <!-- ?page=readchap&matruyen=<?php //echo $_GET['ma'] ?>&machuong=<?php //echo $chuong->Ordering ?>"> -->
                      <p><a target="_blank" href="<?php echo $_GET['ma'] ?>/<?php echo $chuong->Ordering ?>/<?php echo $chuong->Alias ?>.html"><?php echo $chuong->Ordering ?>: <?php echo $chuong->Ten ?></a></p>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                      <p class="text-center"><?php echo date('d/m/Y', strtotime($chuong->Ngay_cap_nhat)); ?></p>
                    </div>
                  </div>
                  <?php
				   }
				   ?>
                </div>
              </div>
              <nav class="info_pager">
                <ul class="pagination">
                  <?php $pager->in_bo_nut($sotrang); 
				  /*for($i=1;$i<=$sotrang;$i++)
				  {?>
						<li><a onclick="phantrang()" href=""><?=$i?></a></li>
				<?php
                }*/
				?>
				  
                  
                  <script>
                  function phantrang()
				  {
						var dulieuguikem = { trang: $(".pagination").val(), ma: <?php echo $_GET['ma'] ?>}; 
						$.post('listchapajax.php',dulieuguikem)
						.done(function data()
						{
							$('.info_text_dt').html(data);
						})
				  }
                  </script>
                  <!-- <li class="active"><a href="javascript:void(0)">1</a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-2.html">2</a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-3.html">3</a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-4.html">4</a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-5.html">5</a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-2.html"><span aria-hidden="true">›</span></a></li>
                  <li><a href="https://truyenqq.com/truyen-tranh/dao-hai-tac-128/trang-46.html"><span aria-hidden="true">»</span></a></li> -->
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <input type="hidden" id="book_id" value="128">
        <input type="hidden" id="total_page" value="75">
        <input type="hidden" id="current_page" value="1">
        <input type="hidden" id="id_textarea" value="">
        <input type="hidden" id="parent_id" value="">
        <input type="hidden" id="episode_name" value="">
        <input type="hidden" id="episode_id" value="">
        <input type="hidden" id="slug" value="dao-hai-tac">
        <script type="text/javascript">
		var urlComment = 'https://truyenqq.com/frontend/comment/index';
		var urlCommentLoad = 'https://truyenqq.com/frontend/comment/list';
		var urlCommentRemove = 'https://truyenqq.com/frontend/comment/remove';
	</script> 
      </div>
      
      <!--  <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr">
            <div style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
              <div id="bg_130422327_S7chS8WUUQ">
                <iframe id="bg_130422327_ifr_S7chS8WUUQ" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" width="300" height="250"></iframe>
              </div>
              <script type="text/javascript" src="//vn-platform.bidgear.com/async.php?domainid=1304&amp;sizeid=2&amp;zoneid=2327&amp;k=5b330eb941231" defer="" async=""></script> 
            </div>
          </div>
        </div>
      </div> --> 
      
      <!-- <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr side_padding">
            <h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
            <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;">
              <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I2_1532248787634" name="I2_1532248787634" src="https://apis.google.com/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.1o-4ybCSy04.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOCxs8QC305ZpbxxhCukgnir7jpYQ%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I2_1532248787634&amp;_gfid=I2_1532248787634&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=15319513" data-gapiattached="true" title="+Badge"></iframe>
            </div>
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1498603730425925&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 300px; height: 197px;">
              <iframe name="fdeb615e17ac54" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Df839c3e7d%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff3e214fdb84de8%26relation%3Dparent.parent&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 300px; height: 197px;" class=""></iframe>
              </span></div>
          </div>
        </div>
      </div> --> 
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
      <div class="ind_side">
        <div class="side_gr side_padding">
          <h2 class="side_h2_title text-center">Truyện Liên Quan</h2>
          <?php
			$truyenlienquans = $xltruyen->truyenlienquan($truyen->Category_id);
			foreach($truyenlienquans as $truyenlienquan)
			{
			 ?>
          <div class="side_info"> <a href="<?php echo $truyenlienquan->Ma ?>/<?php echo $truyenlienquan->Alias ?>.html">
            <div class="side_img side_img01"> <img src="<?php echo $truyenlienquan->Hinh ?>" alt="<?php echo $truyenlienquan->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="104"> <span class="ind_in01 side_a glyphicon glyphicon-picture"></span> </div>
            <div class="side_text side_text01">
              <h3><?php echo $truyenlienquan->Ten ?></h3>
              <p class="side_view">Lượt Xem: <?php echo $truyenlienquan->Luot_xem ?></p>
              <p class="side_chap">Chương <?php echo $xltruyen->lastestchap($truyenlienquan->Ma) ?></p>
            </div>
            </a> </div>
          <?php
			  }
			  ?>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <ul class="nav nav-tabs ul-title-comment">
        <li class="active"> <a data-toggle="tab" href="#truyenqq" class="title-total-comment" aria-expanded="true"> <i class="fa fa-comments"></i> MyTruyen (<span class="comment-count">
          <?= $xlbl->tongsodongtheotruyen($_GET['ma']) ?>
          </span>) </a> </li>
        <!--<li class="">
					<a data-toggle="tab" href="#facebook" class="title-total-comment" aria-expanded="false">
						<i class="fa fa-facebook-official"></i> Facebook (<span class="fb-comments-count fb_comments_count_zero" data-href="http://truyen.qiqi.vn/truyen-tranh/ngu-linh-the-gioi-2268.html" fb-xfbml-state="rendered"><span class="fb_comments_count">0</span></span>)
					</a>
				</li>-->
      </ul>
      <div class="tab-content">
        <div id="truyenqq" class="tab-pane fade active in">
          <div class="comments-container">
            <div class="notice-comment list-group-item"> <span class="glyphicon glyphicon-pencil"></span> <span class="taskDescription">Chú Ý: Hãy đọc <a href="https://truyenqq.com/tin-tuc/quy-dinh-binh-luan.html">quy định bình luận</a> để tránh bị cấm bình luận.</span> </div>
            <div class="main_comment">
              <div class="widget-area no-padding blank">
                <div class="status-upload">
                  <form method="post">
                    <textarea id="content_comment" name="comment" placeholder="Vui lòng nhập tiếng việt có dấu."></textarea>
                    <ul>
                      <li> <a class="click_emoji" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Biểu Tượng Cảm Xúc"><i class="fa fa-smile-o fa-2"></i></a> </li>
                    </ul>
                    
                    <button type="submit" name="submit" class="submit_comment btn btn-success green">Bình Luận</button>
                  </form>
                </div>
              </div>
              <div style="clear: both;"></div>
            </div>
            <ul id="comments-list" class="comments-list">
              <?php
		   $cmts = $xlbl->commentstory($_GET['ma']);
		   
		   //xemmang($cmts);
		   if(isset($cmts) && $cmts){
		   foreach($cmts as $cmt)
		   {
			   $user = $xlnd->user($cmt->Ma_user);
			   if($cmt->Ma_binh_luan == 0){
		   ?>
              <li class="child_699 parent_<?php echo $cmt->Ma ?>">
                <div class="comment-main-level">
                  <div class="comment-avatar"><img src="<?php echo $user->Avatar ?>" alt="<?php echo $user->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;"></div>
                  <div class="comment-box"> 
                    
                    <!--cmt head -->
                    <div class="comment-head ">
                      <div class="col-xs-12 col-sm-9 col-md-10"> <span class="comment-name"><?php echo $user->Ten ?></span><?php echo $user->Trang_thai==3?'<span class="title-user title-admin">Quản trị viên</span>': '<span class="title-user title-member">Thành Viên</span>'?> 
                         <span class="time"><?php echo facetime($cmt->Ngay_tao) ?></span>
							<!--<span class="chap">Chapter 1</span> --> 
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-2 control"> <span class="reply" data-id="<?php echo $cmt->Ma ?>" data-user="<?php echo $user->Ma ?>">Trả Lời</span> </div>
                      <script>
                      $(".reply").data("<?php echo $cmt->Ma ?>");
                      </script> 
                    </div>
                    <!--cmt content -->
                    <div class="comment-content">
                      <?php foreach($emojis as $k=>$emoji){
						$cmt->Noi_dung = str_replace($k, $emoji, $cmt->Noi_dung);
						
						}  echo $cmt->Noi_dung;?>
                    </div>
                  </div>
                </div>
              </li>
              <?php
			   $subcmts = $xlbl->subcomment($_GET['ma'],$cmt->Ma);
		   		if($subcmts)
				{
					foreach($subcmts as $subcmt){
					$subuser = $xlnd->user($subcmt->Ma_user);
		   ?>
              <li class="child_728 parent_699">
                <div class="reply-list">
                  <div class="comment-avatar"><img src="<?php echo $subuser->Avatar ?>" alt="<?php echo $subuser->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;"></div>
                  <div class="comment-box">
                    <div class="comment-head ">
                      <div class="col-xs-12 col-sm-9 col-md-10"> <span class="comment-name"><?php echo $subuser->Ten ?></span> <?php echo $subuser->Trang_thai==3?'<span class="title-user title-admin">Quản trị viên</span>': '<span class="title-user title-member">Thành Viên</span>'?> 
                        <span class="time"><?php echo facetime($subcmt->Ngay_tao) ?></span>
							<!--<span class="chap">Chapter 1</span> --> 
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-2 control"> </div>
                    </div>
                    <div class="comment-content">
                      <?php foreach($emojis as $k=>$emoji){
						$subcmt->Noi_dung = str_replace($k, $emoji, $subcmt->Noi_dung);
						
						}  echo $subcmt->Noi_dung; ?>
                    </div>
                  </div>
                </div>
              </li>
              <?php
				}  }
		   		}
			}
		  }
		?>
            </ul>
            
            <script>
			var trang = 1;
            	$(document).ready(function() {
                    $(".load_more_comment").click(function(){
						trang = trang + 1;
						$.get("loadcmt.php", {trang:toancuc}, function(data){
							$("#comments-list").append(data);
							})
						
						})
                });
            </script>
          </div>
        </div>
        <!--<div id="facebook" class="tab-pane fade">
					<div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-width="100%" data-href="http://truyen.qiqi.vn/truyen-tranh/ngu-linh-the-gioi-2268.html" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 0px;"><iframe id="f394c6a11d9b338" name="f202e3849f3118" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=1498603730425925&amp;channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Df1f27279a3e66%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff1c414599a26d64%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Ftruyen.qiqi.vn%2Ftruyen-tranh%2Fngu-linh-the-gioi-2268.html&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.8&amp;width=100%25" style="border: none; overflow: hidden; height: 0px; width: 100%;"></iframe></span></div>
				</div>--> 
      </div>
    </div>
  </div>
  <!-- SIZE: 300X250 - BOTTOM - LEFT --> 
  
</div>
<div id="list_emoji" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <span class="modal-title">Biểu Tượng Cảm Xúc</span> </div>
      <div class="modal-body">
        <?php
	  foreach($emojis as $emoji)
	  {
			echo $emoji;  
	  }
	  ?>
      </div>
    </div>
  </div>
</div>
