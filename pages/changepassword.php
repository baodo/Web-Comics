<?php
require_once 'class/xl_nguoidung.php';
$xl = new xl_nguoidung();
$thongbao='';
$err_oldpass = '';
if(isset($_POST['change'],$_POST['password_old'],$_POST['password_new'],$_POST['confirm_password_new']))
{
	if($xl->user($_SESSION['ma'])->Pass != md5($_POST['password_old']))
	{
		$err_oldpass = 'Mật khẩu không đúng. Vui lòng nhập lại';	
	}
	else 
	{
		$mess = $xl->changepass($_SESSION['ma'], md5($_POST['password_new']));
		$thongbao = '<div class="alert alert-success">Đổi mật khẩu thành công</div>';
	}
}
?>
<script> 
            $(document).ready(function()
            {
                $('#changepass').submit(function(){

                    // BƯỚC 1: Lấy dữ liệu từ form
                    var mkmoi       = $.trim($('#password_new').val());
					var re_mk       = $.trim($('#confirm_password_new').val());

                    // BƯỚC 2: Validate dữ liệu
                    // Biến cờ hiệu
                    var flag = true;

                     // Password mới
                    if (mkmoi.length <= 0){
                        $('#password_new_error').text('Bạn phải nhập mật khẩu');
                        flag = false;
                    }
                    else{
                        $('#password_new_error').text('');
                    }

                    // Re password
                    if (mkmoi != re_mk){
                        $('#confirm_password_new_error').text('Mật khẩu nhập lại không đúng');
                        flag = false;
                    }
                    else{
                        $('#confirm_password_new_error').text('');
                    }
					

                    return flag;
                });
            });
</script>
<div id="content">
				<div class="container content">
					<div class="row">
						<title>Thay Đổi Mật Khẩu</title><div class="col-md-9 col-sm-12 col-xs-12">
	<div class="user_gr01">
		<h3 class="user_title">THAY ĐỔI MẬT KHẨU</h3>
		<form class="form-horizontal" method="post" id="changepass">
						<div class="form-group">
			<label class="col-md-3 col-sm-3 col-xs-3 control-label">Mật Khẩu Cũ</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<input class="form-control" type="password" value="" name="password_old" id="password_old">
                <span id="pass_error" style="color:#F00"><?= $err_oldpass ?></span>
			</div>
		</div>
				<div class="form-group">
			<label class="col-md-3 col-sm-3 col-xs-3 control-label">Mật Khẩu Mới</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<input class="form-control" type="password" value="" name="password_new" id="password_new">
                <span id="password_new_error" style="color:#F00"></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 col-sm-3 col-xs-3 control-label">Nhập Lại Mật Khẩu</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<input class="form-control" type="password" value="" name="confirm_password_new" id="confirm_password_new">
                <span id="confirm_password_new_error" style="color:#F00"></span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<button type="submit" name="change" class="btn btn-danger">Lưu</button>
			</div>
		</div>
		<?= $thongbao; ?>
		</form>
	</div>	
</div>
<script>
</script>																																				  <!--<!-- class="col-md-3 col-sm-3 col-xs-12 side_layout">
    <div class="ind_side">
        <div class="side_gr side_padding">
        	<h2 class="side_h2_title text-center">Mạng Xã Hội</h2>
		<div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I0_1533365372467" name="I0_1533365372467" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;layout=landscape&amp;href=https%3A%2F%2Fplus.google.com%2F105265762423004587049&amp;origin=https%3A%2F%2Ftruyenqq.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.48o1mK7EHFM.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNFQFKTH3v5_SQBimaBzR5aTztazg%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1533365372467&amp;_gfid=I0_1533365372467&amp;parent=https%3A%2F%2Ftruyenqq.com&amp;pfname=&amp;rpctoken=27097107" data-gapiattached="true" title="+Badge"></iframe></div>
			<div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/congdongthichdoctruyen" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1498603730425925&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 300px; height: 196px;"><iframe name="f2a3be432f159cc" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=1498603730425925&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df243e94ffb58ec%26domain%3Dtruyenqq.com%26origin%3Dhttps%253A%252F%252Ftruyenqq.com%252Ff10b6030bc63538%26relation%3Dparent.parent&amp;container_width=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcongdongthichdoctruyen&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 300px; height: 196px;" class=""></iframe></span></div>
        </div>
    </div>
</div> -->
											</div>
				</div>
							</div>