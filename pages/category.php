<?php
require_once 'class/xl_category.php';
require_once 'class/xl_stories.php';
$xlloai = new xl_category();
$xltruyen = new xl_stories();
if(isset($_GET['maloai']))
	$loai = $xlloai->loai($_GET['maloai']);
	$ds = $xltruyen->truyentheoloai($_GET['maloai']);
?>

<div class="container content">
  <div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12 content_layout">
      <div class="ind_gr01">
        <div class="list_content">
          <div class="list_info01">
            <h2>Truyện <?php echo $loai->Ten ?></h2>
           <!-- <p class="list_book_p01"> <a href="javascript:void(0)" id="btn_filter_category">Lọc Truyện <span class="glyphicon glyphicon-menu-down"></span></a> </p>
            <form method="post" id="form_order">
              <p class="list_book_p02">Sắp xếp theo
                <select name="type_order" id="type_order">
                  <option value="1" selected="selected">Ngày Đăng Giảm Dần</option>
                  <option value="2">Ngày Đăng Tăng Dần</option>
                  <option value="3">Ngày Cập Nhật Giảm Dần</option>
                  <option value="4">Ngày Cập Nhật Tăng Dần</option>
                  <option value="5">Lượt Xem Giảm Dần</option>
                  <option value="6">Lượt Xem Tăng Dần</option>
                </select>
              </p>
            </form>
          </div>
          <div class="list_sub01" style="display: none;" id="list_filter_category">
            <input id="type_category" type="hidden" value="2">
            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <h3 class="list_book_title">Thể loại</h3>
                <ul class="list_list01_1">
                  <li><a title="Truyện Yaoi" data-category="70" href="javascript:void(0);">Yaoi</a></li>
                  <li><a title="Truyện Anime" data-category="62" href="javascript:void(0);">Anime</a></li>
                  <li><a title="Truyện Comic" data-category="60" href="javascript:void(0);">Comic</a></li>
                  <li><a title="Truyện Magic" data-category="58" href="javascript:void(0);">Magic</a></li>
                  <li><a title="Truyện Sports" data-category="57" href="javascript:void(0);">Sports</a></li>
                  <li><a title="Truyện Webtoon" data-category="55" href="javascript:void(0);">Webtoon</a></li>
                  <li><a title="Truyện Josei" data-category="54" href="javascript:void(0);">Josei</a></li>
                  <li><a title="Truyện Isekai" data-category="85" href="javascript:void(0);">Isekai</a></li>
                  <li><a title="Truyện Shounen Ai" data-category="86" href="javascript:void(0);">Shounen Ai</a></li>
                  <li><a title="Truyện Ngôn Tình" data-category="87" href="javascript:void(0);">Ngôn Tình</a></li>
                  <li><a title="Truyện Xuyên Không" data-category="88" href="javascript:void(0);">Xuyên Không</a></li>
                  <li><a title="Truyện Cổ Đại" data-category="90" href="javascript:void(0);">Cổ Đại</a></li>
                  <li><a title="Truyện Chuyển Sinh" data-category="91" href="javascript:void(0);">Chuyển Sinh</a></li>
                  <li><a title="Truyện Truyện Màu" data-category="92" href="javascript:void(0);">Truyện Màu</a></li>
                  <li><a title="Truyện Đam Mỹ" data-category="93" href="javascript:void(0);">Đam Mỹ</a></li>
                  <li><a title="Truyện Doujinshi" data-category="94" href="javascript:void(0);">Doujinshi</a></li>
                  <li><a title="Truyện One shot" data-category="95" href="javascript:void(0);">One shot</a></li>
                  <li><a title="Truyện Doujinshi" data-category="96" href="javascript:void(0);">Doujinshi</a></li>
                  <li><a title="Truyện Smut" data-category="97" href="javascript:void(0);">Smut</a></li>
                  <li><a title="Truyện Shoujo Ai" data-category="98" href="javascript:void(0);">Shoujo Ai</a></li>
                  <li><a title="Truyện Demons" data-category="99" href="javascript:void(0);">Demons</a></li>
                  <li><a title="Truyện Action" data-category="26" href="javascript:void(0);">Action</a></li>
                  <li><a title="Truyện Adventure" data-category="27" href="javascript:void(0);">Adventure</a></li>
                  <li><a title="Truyện Manhua" data-category="35" href="javascript:void(0);">Manhua</a></li>
                  <li><a title="Truyện Romance" data-category="36" href="javascript:void(0);">Romance</a></li>
                  <li><a title="Truyện Yuri" data-category="75" href="javascript:void(0);">Yuri</a></li>
                  <li><a title="Truyện Mafia" data-category="69" href="javascript:void(0);">Mafia</a></li>
                  <li><a title="Truyện Comedy" data-category="28" href="javascript:void(0);">Comedy</a></li>
                  <li><a title="Truyện School Life" data-category="37" href="javascript:void(0);">School Life</a></li>
                  <li><a title="Truyện Drama" data-category="29" href="javascript:void(0);">Drama</a></li>
                  <li><a title="Truyện Shoujo" data-category="38" href="javascript:void(0);">Shoujo</a></li>
                  <li><a title="Truyện Mystery" data-category="39" href="javascript:void(0);">Mystery</a></li>
                  <li><a title="Truyện Psychological" data-category="40" href="javascript:void(0);">Psychological</a></li>
                  <li><a title="Truyện Martial Arts" data-category="41" href="javascript:void(0);">Martial Arts</a></li>
                  <li><a title="Truyện Seinen" data-category="42" href="javascript:void(0);">Seinen</a></li>
                  <li><a title="Truyện Horror" data-category="44" href="javascript:void(0);">Horror</a></li>
                  <li><a title="Truyện Gender Bender" data-category="45" href="javascript:void(0);">Gender Bender</a></li>
                  <li><a title="Truyện Slice of life" data-category="46" href="javascript:void(0);">Slice of life</a></li>
                  <li><a title="Truyện Harem" data-category="47" href="javascript:void(0);">Harem</a></li>
                  <li><a title="Truyện Manhwa" data-category="49" href="javascript:void(0);">Manhwa</a></li>
                  <li><a title="Truyện Historical" data-category="51" href="javascript:void(0);">Historical</a></li>
                  <li><a title="Truyện Tragedy" data-category="52" href="javascript:void(0);">Tragedy</a></li>
                  <li><a title="Truyện Fantasy" data-category="30" href="javascript:void(0);">Fantasy</a></li>
                  <li><a title="Truyện Sci-fi" data-category="43" href="javascript:void(0);">Sci-fi</a></li>
                  <li><a title="Truyện Shounen" data-category="31" href="javascript:void(0);">Shounen</a></li>
                  <li><a title="Truyện Supernatural" data-category="32" href="javascript:void(0);">Supernatural</a></li>
                </ul>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="list_book_gr01">
                  <h3 class="list_book_title">Tình trạng</h3>
                  <ul class="list_list01 text-center">
                    <li><a data-pending="0" href="javascript:void(0);">Đang tiến hành</a></li>
                    <li><a data-pending="1" href="javascript:void(0);">Tạm ngưng</a></li>
                    <li><a data-pending="2" href="javascript:void(0);">Hoàn thành</a></li>
                  </ul>
                </div>
                <div class="list_book_gr01">
                  <h3 class="list_book_title">Quốc gia</h3>
                  <ul class="list_list01 list_list03">
                    <li><a title="Truyện Trung Quốc" data-country="1" href="javascript:void(0);">Trung Quốc</a></li>
                    <li><a title="Truyện Việt Nam" data-country="2" href="javascript:void(0);">Việt Nam</a></li>
                    <li><a title="Truyện Hàn Quốc" data-country="3" href="javascript:void(0);">Hàn Quốc</a></li>
                    <li><a title="Truyện Nhật Bản" data-country="4" href="javascript:void(0);">Nhật Bản</a></li>
                    <li><a title="Truyện Mỹ" data-country="5" href="javascript:void(0);">Mỹ</a></li>
                    <li><a title="Truyện Anh" data-country="6" href="javascript:void(0);">Anh</a></li>
                    <li><a title="Truyện Úc" data-country="7" href="javascript:void(0);">Úc</a></li>
                    <li><a title="Truyện Pháp" data-country="8" href="javascript:void(0);">Pháp</a></li>
                    <li><a title="Truyện Cộng hòa Ireland" data-country="9" href="javascript:void(0);">Cộng hòa Ireland</a></li>
                    <li><a title="Truyện Ý" data-country="10" href="javascript:void(0);">Ý</a></li>
                  </ul>
                </div>
                <div class="list_book_gr01">
                  <h3 class="list_book_title">Ký Từ Đầu</h3>
                  <ul class="list_list02">
                    <li><a href="javascript:void(0);" data-char="a">a</a></li>
                    <li><a href="javascript:void(0);" data-char="b">b</a></li>
                    <li><a href="javascript:void(0);" data-char="c">c</a></li>
                    <li><a href="javascript:void(0);" data-char="d">d</a></li>
                    <li><a href="javascript:void(0);" data-char="a">e</a></li>
                    <li><a href="javascript:void(0);" data-char="f">f</a></li>
                    <li><a href="javascript:void(0);" data-char="g">g</a></li>
                    <li><a href="javascript:void(0);" data-char="h">h</a></li>
                    <li><a href="javascript:void(0);" data-char="i">i</a></li>
                    <li><a href="javascript:void(0);" data-char="j">j</a></li>
                    <li><a href="javascript:void(0);" data-char="k">k</a></li>
                    <li><a href="javascript:void(0);" data-char="m">m</a></li>
                    <li><a href="javascript:void(0);" data-char="n">n</a></li>
                    <li><a href="javascript:void(0);" data-char="o">o</a></li>
                    <li><a href="javascript:void(0);" data-char="p">p</a></li>
                    <li><a href="javascript:void(0);" data-char="q">q</a></li>
                    <li><a href="javascript:void(0);" data-char="r">r</a></li>
                    <li><a href="javascript:void(0);" data-char="s">s</a></li>
                    <li><a href="javascript:void(0);" data-char="t">t</a></li>
                    <li><a href="javascript:void(0);" data-char="u">u</a></li>
                    <li><a href="javascript:void(0);" data-char="v">v</a></li>
                    <li><a href="javascript:void(0);" data-char="w">w</a></li>
                    <li><a href="javascript:void(0);" data-char="x">x</a></li>
                    <li><a href="javascript:void(0);" data-char="y">y</a></li>
                    <li><a href="javascript:void(0);" data-char="z">z</a></li>
                  </ul>
                </div>
                <div class="list_book_gr01" id="btn_filter_book">
                  <button class="btn" onclick="getCategoryFilter();">Lọc Truyện</button>
                </div>
              </div>
            </div>-->
          </div> 
          <div id="content_category" class="tab-pane">
            <div class="row">
            <?php
			if(!$ds)
				echo '<div class="col-md-2 col-xs-6 col-sm-3"><div class="alert alert-success">Chưa có truyện thuộc loại này!!!</div></div>';
			foreach($ds as $truyen)
			{
			?>
              <div class="col-md-2 col-xs-6 col-sm-3">
                <div style="display: none">
                  <div class="ind_popover">
                    <h4><?php echo $truyen->Ten ?></h4>
                    <p class="popo_p02">Thể Loại:<!-- <a href="https://truyenqq.com/the-loai/school-life-37.html">School Life</a> --> <a href="?page=category&maloai=<?php echo $loai->Ma ?>"><?php echo $loai->Ten ?></a></p>
                    <p class="popo_p01">Tình Trạng: <?php echo $truyen->Trang_thai==1?'Hoàn thành':'Đang tiến hành' ?></p>
                    <p class="popo_p01">Lượt Xem: <?php echo $truyen->Luot_xem ?></p>
                   <!-- <p class="popo_p03">Đánh Giá: <span class="like" data-id="5246"><span class="glyphicon glyphicon-thumbs-up"></span><span class="total_like">0</span></span> <span class="dislike" data-id="5246"><span class="glyphicon glyphicon-thumbs-down"></span><span class="total_dislike">0</span></span> </p> -->
                    <p class="popover_text"><?php echo lamtronnoidung($truyen->Mo_ta, 100) ?> </p>
                  </div>
                </div>
                <div class="ind_info">
                  <div><a href="<?php echo $truyen->Ma ?>/<?php echo $truyen->Alias ?>.html"><img src="<?php echo $truyen->Hinh ?>" alt="<?php echo $truyen->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="163" height="212"></a></div>
                  <span class="ind_in01 glyphicon glyphicon-picture"></span>
                 <!-- <p class="ind_update text-center">7 Giờ Trước</p> -->
                  <p class="ind_p01 text-center">Chương <?php echo $xltruyen->lastestchap($truyen->Ma)?></p>
                </div>
                <p class="ind_text text-center" title="<?php echo $truyen->Ten ?>"><a href="<?php echo $truyen->Ma ?>/<?php echo $truyen->Alias ?>.html"><?php echo $truyen->Ten ?></a></p>
              </div>
            <?php
			}
			?>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
      <div class="ind_side">
        <div class="side_gr side_padding">
          <h2 class="side_h2_title text-center">Truyện Mới Cập Nhật</h2>
          <?php 
		  $truyenmois = $xltruyen->newstories();
		  foreach($truyenmois as $truyenmoi)
		  {
		  ?>
          <div class="side_info"> <a href="<?php echo $truyenmoi->Ma ?>/<?php echo $truyenmoi->Alias ?>.html">
            <div class="side_img side_img01"> <img src="<?php echo $truyenmoi->Hinh ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="105" alt="<?php echo $truyenmoi->Ten ?>"> <span class="ind_in01 side_a glyphicon glyphicon-picture"></span> </div>
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
          <h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
          <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;">
            <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I0_1532774053617" name="I0_1532774053617" src="https://apis.google.com/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.8rFBG6aFtN8.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMYsCHxw_XQ649QhIioKssRndPWRg%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1532774053617&amp;_gfid=I0_1532774053617&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=37269072" data-gapiattached="true" title="+Badge"></iframe>
          </div>
          <div class="fb-page" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/congdongthichdoctruyen" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/congdongthichdoctruyen">Cộng Đồng Thích Đọc Truyện</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
