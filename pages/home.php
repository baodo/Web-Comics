<?php
require 'includes/slideshow.php';
require 'class/class.pager.php';

$xltruyen = new xl_stories();
$pager = new pager();

$tongtruyen = $xltruyen->tongsotruyen();
//tính số trang
$sotrang = $pager->tim_tong_so_trang($tongtruyen,SOTRUYENTRENTRANG);
//tìm vị trí
$vitri = $pager->tim_vi_tri_bat_dau(SOTRUYENTRENTRANG);

$list = $xltruyen->liststories($vitri, SOTRUYENTRENTRANG);

?>
<div id="content">
  <div class="container content">
    <div class="row">
      <div class="col-md-9 col-sm-9 col-xs-12 content_layout">
        <div class="ind_gr01">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 ind_navlist"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#manga" aria-controls="manga" role="tab" data-toggle="tab"><!--Truyện Mới Cập Nhật -->Danh sách truyện</a></li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="manga">
              <div class="row">
                <?php
				
			  foreach($list as $t)
			  {
				  $truyen = $xltruyen->story($t->Ma);
				  $loai = $xltruyen->tenloai($truyen->Category_id);
			  ?>
                <div class="col-md-2 col-xs-6 col-sm-3">
                  <div style="display: none">
                    <div class="ind_popover">
                      <h4><?php echo $t->Ten ?></h4>
                      <p class="popo_p02">Thể Loại: <a href="the-loai/action-26.html"><?php echo $loai->Ten ?></a><!--, <a href="the-loai/adventure-27.html">Adventure</a>, <a href="the-loai/comedy-28.html">Comedy</a>, <a href="the-loai/fantasy-30.html">Fantasy</a>, <a href="the-loai/manhua-35.html">Manhua</a>, <a href="the-loai/romance-36.html">Romance</a>, <a href="the-loai/mystery-39.html">Mystery</a>, <a href="the-loai/harem-47.html">Harem</a>, <a href="the-loai/historical-51.html">Historical</a> --></p>
                      <p class="popo_p01">Tình Trạng: <?php echo $t->Trang_thai==1?'Hoàn thành':'Đang tiến hành' ?></p>
                      <p class="popo_p01">Lượt Xem: <?php echo number_format($t->Luot_xem) ?></p>
                      
                     <!-- <p class="popo_p03">Đánh Giá: <span class="like" data-id="440"><span class="glyphicon glyphicon-thumbs-up"></span><span class="total_like">4</span></span> <span class="dislike" data-id="440"><span class="glyphicon glyphicon-thumbs-down"></span><span class="total_dislike">0</span></span> </p> -->
                      <p class="popover_text">
                      <p class="popo_p01">Mô tả: <?php echo lamtronnoidung($t->Mo_ta, 100) ?></p>
                      </p>
                    </div>
                  </div>
                  <div class="ind_info"> <!-- <a href="?page=overviewstory&ma=<?php //echo $t->Ma ?>"> -->
                    <div><a href="<?php echo $t->Ma ?>/<?php echo $t->Alias ?>.html"><img src="<?php echo $t->Hinh?>" alt="<?= $t->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="163" height="212"></a>
                   
                      
                    </div>
                    <span class="ind_in01 glyphicon glyphicon-picture"></span> 
                    <p class="ind_update text-center"><?php echo facetime($xltruyen->lastestchapver2($truyen->Ma)->Ngay_tao) ?></p>
                    <p class="ind_p01 text-center">Chương <?php echo $xltruyen->lastestchap($t->Ma) ?></p>
                  </div>
                  <p class="ind_text text-center" title="<?php echo $t->Ten ?>"><a href="<?php echo $t->Ma ?>/<?php echo $t->Alias ?>.html"><?php echo $t->Ten ?></a></p>
                </div>
                <?php
			  }
			  ?>
              </div>
              <nav class="info_pager">
                <ul class="pagination">
              <?php
			   $pager->in_bo_nut($sotrang);
			  ?>
              </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr">
            <h2 class="side_h2_title text-center">Truyện Mới</h2>
            <?php
			$truyenmois = $xltruyen->newstories();
			//xemmang($truyenmois);
			foreach($truyenmois as $truyenmoi )
			{
			?>
            <div class="side_info"> <a href="<?php echo $truyenmoi->Ma ?>/<?php echo $truyenmoi->Alias ?>.html">
              <div class="side_img side_img01"> <img src="<?php echo $truyenmoi->Hinh ?>" alt="<?php echo $truyenmoi->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="104"> <span class="ind_in01 side_a glyphicon glyphicon-picture"></span> </div>
              <div class="side_text side_text01">
                <h3><?php echo $truyenmoi->Ten ?></h3>
                <p class="side_view">Lượt Xem: <?php echo $truyenmoi->Luot_xem ?></p>
                <p class="side_chap">Chương <?php echo $xltruyen->lastestchap($truyenmoi->Ma) ?></p>
              </div>
              </a> </div>
            <?php 
			}
			?>  
            
          </div>
        </div> 
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr side_padding">
            <h2 class="side_h2_title text-center">Truyện Hoàn Thành</h2>
            <?php
			$truyenhoanthanhs = $xltruyen->donestories();
			foreach($truyenhoanthanhs as $t)
			{
			?>
            <div class="side_info"> <a href="<?php echo $t->Ma ?>/<?php echo $t->Alias ?>.html">
              <div class="side_img side_img01"> <img src="<?php echo $t->Hinh ?>" alt="<?php echo $t->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="104"> <span class="ind_in01 side_a glyphicon glyphicon-picture"></span> </div>
              <div class="side_text side_text01">
                <h3><?php echo $t->Ten ?></h3>
                <p class="side_view">Lượt Xem: <?php echo $t->Luot_xem ?></p>
                <p class="side_chap">Hoàn Thành</p>
              </div>
              </a> </div>
            <?php
			}
			?>
          </div>
        </div>
      </div>
    <!--  <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr side_padding">
            <h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
            <div id="___page_0" style="position: absolute; width: 450px; left: -10000px;">
              <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I0_1532017506929" name="I0_1532017506929" src="https://apis.google.com/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=file%3A%2F%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.mCVPJIAPrEU.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMH1eFSPRDf27Yh_EyLMEGjdUDbew%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1532017506929&amp;_gfid=I0_1532017506929&amp;parent=file%3A%2F%2F&amp;pfname=&amp;rpctoken=12267506" data-gapiattached="true"></iframe>
            </div>
            <div class="g-page" data-layout="landscape" data-href="https://plus.google.com/105265762423004587049" data-gapiscan="true" data-onload="true" data-gapistub="true"></div>
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="parsed">
              <blockquote cite="https://www.facebook.com/congdongthichdoctruyen" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/congdongthichdoctruyen">Cộng Đồng Thích Đọc Truyện</a></blockquote>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <!-- SIZE: 300X250 - BOTTOM - LEFT --> 
  
</div>
