<?php
require_once 'class/xl_stories.php';
$xltruyen = new xl_stories();

if(isset($_GET['search']))
{
	//$search = addcslashes($_GET['search']);
	$kq = $xltruyen->searchstories($_GET['search']);
	//echo "select * from ". $xltruyen->table." where Tu_khoa like '%".$_GET['search'] ."%'";
	//xemmang($kq);
}

?>

<div id="content">
  <div class="container content">
    <div class="row">
      <div class="col-md-9 col-sm-9 col-xs-12 detail_info sear_content">
        <div class="search_ct">
          <div class="row">
            <h3 class="search_title">Kết quả tìm kiếm với từ khóa “<span><?php echo $_GET['search'] ?></span>”</h3>
            <div class="search_menu">
             
              <p>Tìm kiếm theo: </p>
              <p><a href="javascript:void(0);">Truyện(<?php echo count($kq)?>)</a></p>
            </div>
            <div class="sear_search">
             <?php
			if(!isset($kp) && !$kq)
			{
				echo '<div class="alert alert-danger">Không tìm thấy truyện nào!!</div>';	
			}			
			else
			{
			?>
              <?php
					foreach($kq as $t)
					{
				?>
              <div class="search_gr sear_truyen">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="sear_img"> <a href="?page=overviewstory&ma=<?php echo $t->Ma ?>"> <img src="<?php echo $t->Hinh ?>" alt="<?php echo $t->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="104"> </a> </div>
                    <div class="sear_text">
                      <p class="sear_name"><a href="?page=overviewstory&ma=<?php echo $t->Ma ?>"><?php echo $t->Ten ?></a></p>
                      <p>Lượt xem: <?php echo number_format($t->Luot_xem) ?></p>
                      <p>Chap mới nhất: <?php echo $xltruyen->lastestchap($t->Ma) ?></p>
                      <p>Tình trạng: <?php echo $t->Trang_thai==1?'Hoàn thành':'Đang tiến hành' ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
				}
				?>
            </div>
            <?php
			}
			 ?>
          </div>
        </div>
      </div>
      <!--	<div class="col-md-3 col-sm-3 col-xs-12 side_layout">
	<div class="ind_side">
		<div class="side_gr">
			<div style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
									<div id="bg_130422327"></div><script type="text/javascript" src="//vn-platform.bidgear.com/async.php?domainid=1304&amp;sizeid=2&amp;zoneid=2327&amp;k=5b330eb941231" defer="" async=""></script>
							</div>
		</div>
	</div>
</div> --> 
      <!--
<div class="col-md-3 col-sm-3 col-xs-12 side_layout">
    <div class="ind_side">
            <div class="side_gr">
            	<h2 class="side_h2_title text-center">Truyện Mới</h2>
            	                <div class="side_info">
                    <a href="https://truyenqq.com/truyen-tranh/ore-ga-suki-nano-wa-imouto-dakedo-imouto-ja-nai-5209.html">
                        <div class="side_img side_img01">
                            <img src="https://truyenqq.com/ebook/80x105/ore-ga-suki-nano-wa-imouto-dakedo-imouto-ja-nai_1532417858.jpg" alt="Ore Ga Suki Nano Wa Imouto Dakedo Imouto Ja Nai">
                            <span class="ind_in01 side_a glyphicon glyphicon-picture"></span>                        </div>
                        <div class="side_text side_text01">
                            <h3>Ore Ga Suki Nano Wa Imouto Dakedo Imouto Ja Nai</h3>
                            <p class="side_view">Lượt Xem: 455</p>
                            <p class="side_chap">Chương 2</p>
                        </div>
                    </a>
                </div>
                                <div class="side_info">
                    <a href="https://truyenqq.com/truyen-tranh/kyougaku-koukou-no-genjitsu-5208.html">
                        <div class="side_img side_img01">
                            <img src="https://truyenqq.com/ebook/80x105/kyougaku-koukou-no-genjitsu_1532415771.jpg" alt="Kyougaku Koukou No Genjitsu">
                            <span class="ind_in01 side_a glyphicon glyphicon-picture"></span>                        </div>
                        <div class="side_text side_text01">
                            <h3>Kyougaku Koukou No Genjitsu</h3>
                            <p class="side_view">Lượt Xem: 170</p>
                            <p class="side_chap">Chương 2</p>
                        </div>
                    </a>
                </div>
                                <div class="side_info">
                    <a href="https://truyenqq.com/truyen-tranh/chitose-etc-5207.html">
                        <div class="side_img side_img01">
                            <img src="https://truyenqq.com/ebook/80x105/chitose-etc_1532410112.jpg" alt="Chitose Etc">
                            <span class="ind_in01 side_a glyphicon glyphicon-picture"></span>                        </div>
                        <div class="side_text side_text01">
                            <h3>Chitose Etc</h3>
                            <p class="side_view">Lượt Xem: 669</p>
                            <p class="side_chap">Chương 18</p>
                        </div>
                    </a>
                </div>
                                <div class="side_info">
                    <a href="https://truyenqq.com/truyen-tranh/ky-mon-nu-menh-su-5206.html">
                        <div class="side_img side_img01">
                            <img src="https://truyenqq.com/ebook/80x105/ky-mon-nu-menh-su_1532401988.jpg" alt="Kỳ Môn Nữ Mệnh Sư">
                            <span class="ind_in01 side_a glyphicon glyphicon-picture"></span>                        </div>
                        <div class="side_text side_text01">
                            <h3>Kỳ Môn Nữ Mệnh Sư</h3>
                            <p class="side_view">Lượt Xem: 822</p>
                            <p class="side_chap">Chương 48</p>
                        </div>
                    </a>
                </div>
                                <div class="side_info">
                    <a href="https://truyenqq.com/truyen-tranh/okyu-no-trinity-5205.html">
                        <div class="side_img side_img01">
                            <img src="https://truyenqq.com/ebook/80x105/okyu-no-trinity_1532395705.jpg" alt="Okyu No Trinity">
                            <span class="ind_in01 side_a glyphicon glyphicon-picture"></span>                        </div>
                        <div class="side_text side_text01">
                            <h3>Okyu No Trinity</h3>
                            <p class="side_view">Lượt Xem: 293</p>
                            <p class="side_chap">Chương 1</p>
                        </div>
                    </a>
                </div>
                            </div>
        </div>
     </div>																														<div class="col-md-3 col-sm-3 col-xs-12 side_layout">
    <div class="ind_side">
        <div class="side_gr side_padding">
        	<h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
		<div class="g-page" data-layout="landscape" data-href="https://plus.google.com/105265762423004587049"></div>
			<div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1498603730425925&amp;container_width=0&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f320ec7011922f4" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FbSTT5dUx9MY.js%3Fversion%3D42%23cb%3Dfb9ff6243de62%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff133f09ef85d4fc%26relation%3Dparent.parent&amp;container_width=0&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
        </div>
    </div>
</div>
-->

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
              <div class="side_img side_img01"> <img src="<?php echo $truyenmoi->Hinh ?>" alt="<?php echo $truyenmoi->Ten ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="80" height="104"> <span class="ind_in01 side_a fa fa-image"></span> </div>
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
    </div>
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
