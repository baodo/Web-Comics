<?php
require_once 'class/xl_nguoidung.php';
$xl = new xl_nguoidung();
$user = $xl->user($_SESSION['ma']);
$thongbao = '';
if(isset($_POST['gui'],$_POST['day'],$_POST['month'],$_POST['year']))
{
	$birthday = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
	//đổi chuỗi đúng định dạng php hỗ trợ
	$birthday = str_replace("/", "-", $birthday);
	$date = strtotime($birthday); //chuyển sang php	
	//$date += 24*3600; //sau 1 ngày
	//lưu vào mysql
	$store_mysql_date = date("Y-m-d", $date);
	//echo $store_mysql_date;
	$hinh = $user->Avatar;
	$hinh = isset($_FILES['files'])?$_FILES['files']:$hinh;
	$mess = $xl->editinfo($hinh, $_POST['first_name'], $store_mysql_date, $_POST['gender'], $_POST['phone'], $_SESSION['ma']);
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Cập nhật thành công</div>';
	}
}
?>

<div id="content">
  <div class="container content">
    <div class="row">
      <title>Sửa Thông Tin Cá Nhân</title>
      <div class="col-md-6 col-sm-8 col-xs-8">
        <div class="user_gr01">
        <?php
		echo $thongbao;
		?>
          <h3 class="user_title">SỬA THÔNG TIN CÁ NHÂN </h3>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <!--<div class="form-group">
              <label for="inputname1" class="col-md-3 col-sm-3 col-xs-3 control-label">Họ</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="last_name" name="last_name" value="Đỗ">
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputname1" class="col-md-3 col-sm-3 col-xs-3 control-label">Tên</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $user->Ten ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputname2" class="col-md-3 col-sm-3 col-xs-3 control-label">Ngày sinh</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="row">
                  <div class="col-md-3 col-sm-4 col-xs-4">
                    <select class="form-control" name="day" id="day">
                      <option value="">Ngày</option>
                      <?php
					 for($i=1;$i<=31;$i++)
					  {
					  ?>
                      <option <?php date('m', strtotime($user->Ngay_sinh))==$i?'selected':'' ?> value="<?= $i ?>">
                      <?= $i ?>
                      </option>
                      <?php 
					  }
					  ?>
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-4">
                    <select class="form-control" name="month" id="month">
                      <option value="">Tháng</option>
                      <?php
					 for($i=1;$i<=12;$i++)
					  {
					  ?>
                      <option <?php date('d', strtotime($user->Ngay_sinh))==$i?'selected':'' ?> value="<?= $i ?>">
                      <?= $i ?>
                      </option>
                      <?php 
					  }
					  ?>
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-4">
                    <select class="form-control" name="year" id="year">
                      <option value="">Năm</option>
                      <?php
					 for($i=1920;$i<=2018;$i++)
					  {
					  ?>
                      <option <?php date('Y', strtotime($user->Ngay_sinh))==$i?'selected':'' ?> value="<?= $i ?>">
                      <?= $i ?>
                      </option>
                      <?php 
					  }
					  ?>
                    </select>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputname2" class="col-md-3 col-sm-3 col-xs-3 control-label">Giới tính</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <label class="checkbox-inline">
                  <input type="radio" id="gender" name="gender" value="1" <?php echo $user->Gioi_tinh==1?'checked':'' ?>>
                  Nam </label>
                <label class="checkbox-inline">
                  <input type="radio" id="gender" name="gender" value="0" <?php echo $user->Gioi_tinh==0?'checked':'' ?>>
                  Nữ </label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputname1" class="col-md-3 col-sm-3 col-xs-3 control-label">Điện Thoại</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->SDT ?>">
              </div>
            </div>
          <!--  <input type="hidden" id="avatar" name="avatar" value="">
            <input type="hidden" id="inputDelImage" name="inputDelImage" value=""> -->
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                <button type="submit" name="gui" class="btn btn-danger">Lưu</button>
              </div>
            </div>
          
        </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-4">
        <div class="user_images">
          <div><img src="<?php echo $user->Avatar ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="100" height="100"></div>
          <p class="text-center">
            <label class="btn btn-success"> <span>Chọn Hình...</span>
              <input type="file" multiple="false" name="files" id="uploadavatar" value="<?php echo $user->Avatar ?>" style="display: none;">
            </label>
          </p>
        </div>
      </div>
      </form>
      <script type="text/javascript" src="<?= TEMPLATE_PATH ?>/frontend/js/jquery.ui.widget.js"></script> 
      <script type="text/javascript" src="<?= TEMPLATE_PATH ?>/frontend/js/jquery.fileupload.js"></script> 
      <script type="text/javascript" src="<?= TEMPLATE_PATH ?>/frontend/js/jquery.iframe-transport.js"></script> 
      <script>

$(document).ready(function(){
	 $("#uploadavatar").fileupload({
			url: "/frontend/user/upload",
			dataType: 'json',
			done: function (e, data) {			
				$.each(data.result.files, function (index, file) {
					if (file.error){
						alert(file.error);
					} else {
						if($('#inputDelImage').val() == ''){
							$('#inputDelImage').val($('#avatar').val());
						}else{
							$('#inputDelImage').val($('#inputDelImage').val() + ',' + $('#avatar').val());
						}
						$(".user_images img").attr("src","https://truyenqq.com/avatar/160x160/" + file.url);
						$("#avatar").val(file.url);
					}
				});
				$(".fileinput-button span").text('Chọn Hình...');
			},
			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$(".fileinput-button span").text(progress +"%");
			},
		});
});
</script> 
      <!--  <div class="col-md-3 col-sm-3 col-xs-12 side_layout">
        <div class="ind_side">
          <div class="side_gr side_padding">
            <h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
            <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;">
              <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I0_1533366956323" name="I0_1533366956323" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.48o1mK7EHFM.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNFQFKTH3v5_SQBimaBzR5aTztazg%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1533366956323&amp;_gfid=I0_1533366956323&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=27093422" data-gapiattached="true" title="+Badge"></iframe>
            </div>
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1498603730425925&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 300px; height: 196px;">
              <iframe name="f29078f647969fc" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df12d6c389092758%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff35dd98b556be98%26relation%3Dparent.parent&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 300px; height: 196px;" class=""></iframe>
              </span></div>
          </div>
        </div>
      </div> --> 
    </div>
  </div>
</div>
