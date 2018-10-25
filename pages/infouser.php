<?php
require_once 'class/xl_nguoidung.php';
$xlus = new xl_nguoidung();
$user = $xlus->user($_SESSION['ma']);
?>

<div id="content">
  <div class="container content">
    <div class="row">
      <title>Thông Tin Tài Khoản</title>
      <div class="col-md-6 col-sm-8 col-xs-8">
        <div class="user_gr02">
          <h3 class="user_title">THÔNG TIN TÀI KHOẢN</h3>
          <div class="user_01">
            <p class="col-md-2 col-md-offset-1 col-sm-3 col-xs-3">Tài Khoản</p>
            <p class="col-md-9 col-sm-9 col-xs-9">giabao12374</p>
          </div>
          <div class="user_01">
            <p class="col-md-2 col-md-offset-1 col-sm-3 col-xs-3">Email</p>
            <p class="col-md-9 col-sm-9 col-xs-9"><?php echo $user->Email ?></p>
          </div>
          <div class="user_01">
            <p class="col-md-2 col-md-offset-1 col-sm-3 col-xs-3">Mật khẩu</p>
            <!--<p class="col-md-6 col-sm-5 col-xs-5">******</p> -->
            <p class="col-md-3 col-sm-4 col-xs-4 text-right"><a href="doi-mat-khau.html">Đổi Mật Khẩu</a></p>
          </div>
        </div>
        <div class="user_gr01">
          <h3 class="user_title">THÔNG TIN CÁ NHÂN</h3>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-md-3 col-sm-3 col-xs-3 control-label">Họ Tên</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" value="<?php echo $user->Ten ?>" disabled="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-sm-3 col-xs-3 control-label">Ngày sinh</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" value="<?php echo date('d/m/Y', strtotime($user->Ngay_sinh)) ?>" disabled="">
              </div>
            </div>
            <!--<div class="form-group">
				<label class="col-md-3 col-sm-3 col-xs-3 control-label">Giới Tính</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
					<input class="form-control" type="text" value="Nam" disabled="">
				</div>
			</div> -->
            <div class="form-group">
              <label for="inputname1" class="col-md-3 col-sm-3 col-xs-3 control-label">Điện Thoại</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" value="<?php echo $user->SDT ?>" disabled="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="text-right" style="padding-right: 12px;"><a href="sua-thong-tin.html">Sửa Thông Tin Cá Nhân</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-4">
        <div class="user_images">
          <div><img src="<?php echo $user->Avatar ?>" style="background-position:center center; background-size:cover; object-fit: cover;"   width="104" height="104"></div>
        </div>
      </div>
   <!--   <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr side_padding">
            <h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
            <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;">
              <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I0_1533363932251" name="I0_1533363932251" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.48o1mK7EHFM.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNFQFKTH3v5_SQBimaBzR5aTztazg%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1533363932251&amp;_gfid=I0_1533363932251&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=31653810" data-gapiattached="true" title="+Badge"></iframe>
            </div>
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1498603730425925&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 300px; height: 196px;">
              <iframe name="f36c6ebfd51b7c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df15ba379dc10f9%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff6a7cd57512e28%26relation%3Dparent.parent&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 300px; height: 196px;" class=""></iframe>
              </span></div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
