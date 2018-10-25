<?php
include 'class/xl_category.php';
$xl = new xl_category();
$loais = $xl->listloai();


?>
<div class="global_nav">
	<div class="container ind_nav_content">
		<button type="button" class="nav-toggle" data-toggle="collapse" data-target="#nav-collapse">MENU</button>
		<nav id="nav-collapse" class="collapse container container-full">
			<ul class="nav navbar-nav col-xs-12 col-sm-12 col-md-12"> 
				<li><a href="trang-chu.html">Trang Chủ</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" href="danh-sach-truyen-tranh.html">Thể Loại</a>
					<ul class="dropdown-menu" role="menu">
                    <?php
					foreach($loais as $loai)
					{
					?>
													<li><a href="<?php echo $loai->Alias ?>/<?php echo $loai->Ma ?>.html"><?php echo $loai->Ten ?></a></li>
					<?php
					}
					?>								
											</ul>
				</li>
			<!--	<li class="dropdown">
					<a data-toggle="dropdown" href="#">Xếp Hạng</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="top-ngay.html">Top Ngày</a></li>
						<li><a href="top-tuan.html">Top Tuần</a></li>
						<li><a href="top-thang.html">Top Tháng</a></li>
						<li><a href="truyen-yeu-thich.html">Yêu Thích</a></li>
						<li><a href="truyen-moi-cap-nhat.html">Mới Cập Nhật</a></li>
						<li><a href="truyen-tranh-moi.html">Truyện Mới</a></li>
					</ul>
				</li> -->
				<li><a href="https://forum.qiqi.vn/">Diễn Đàn</a></li>
				<li><a href="https://www.facebook.com/groups/438911163131883">Trò Chuyện</a></li>
			<!--	<li><a href="tin-tuc/tuyen-nhan-su.html">Tìm Người Thân</a></li> -->
			</ul>
		</nav>
		<!-- <div class="ind_icon01">
			<p><a href="#"><span class="glyphicon glyphicon-cloud-upload"></span>Upload Truyện</a></p>
			<p><a href="#"><span class="glyphicon glyphicon-ban-circle"></span>Tắt quảng cáo</a></p>
		</div>
		 -->
	</div>
</div>