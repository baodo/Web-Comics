<?php
include 'class/mailer.php';
include_once 'class/xl_nguoidung.php';
$xlnd = new xl_nguoidung();
$thongbao = '';
$err_email = '';
if(isset($_POST['submit']))
{
	$pass = rand_txt(10);
	$noidung = 'Mật khẩu mới của bạn là:<b> ' . $pass . '</b></br> Vui lòng đăng nhập và đổi lại mật khẩu!!';
	if(isset($_POST['email']))
	{
		if(!$xlnd->checkemail($_POST['email']))
		{
			$err_email = 'Email không tồn tại. Vui lòng nhập lại';
		}
		else
		{
			if(sendMail($_POST['email'],'Mật khẩu mới từ Truyenqq.com', $noidung, 1)) 
			{
				$thongbao = '<div class = "alert alert-success">Mật khẩu đã được gửi đến mail của bạn </div>';
				$xlnd->recoverypass(md5($pass), $_POST['email']);	
			}
		}
	}
}
?>
<script>
	 // Hàm kiểm tra Email
            function isEmail(emailStr)
            {
                    var emailPat=/^(.+)@(.+)$/
                    var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
                    var validChars="\[^\\s" + specialChars + "\]"
                    var quotedUser="(\"[^\"]*\")"
                    var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
                    var atom=validChars + '+'
                    var word="(" + atom + "|" + quotedUser + ")"
                    var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
                    var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
                    var matchArray=emailStr.match(emailPat)
                    if (matchArray==null) {
                            return false
                    }
                    var user=matchArray[1]
                    var domain=matchArray[2]

                    // See if "user" is valid
                    if (user.match(userPat)==null) {
                        return false
                    }
                    var IPArray=domain.match(ipDomainPat)
                    if (IPArray!=null) {
                        // this is an IP address
                              for (var i=1;i<=4;i++) {
                                if (IPArray[i]>255) {
                                    return false
                                }
                        }
                        return true
                    }
                    var domainArray=domain.match(domainPat)
                    if (domainArray==null) {
                        return false
                    }

                    var atomPat=new RegExp(atom,"g")
                    var domArr=domain.match(atomPat)
                    var len=domArr.length

                    if (domArr[domArr.length-1].length<2 ||
                        domArr[domArr.length-1].length>3) {
                       return false
                    }

                    if (len<2)
                    {
                       return false
                    }

                    return true;
            }
            
            $(document).ready(function()
            {
                $('#khoiphuc').submit(function(){

                    // BƯỚC 1: Lấy dữ liệu từ form
                    var email       = $.trim($('#email').val());

                    // BƯỚC 2: Validate dữ liệu
                    // Biến cờ hiệu
                    var flag = true;

                    // Email
                    if (!isEmail(email)){
                        $('#email_error').text('Email không được để trống và phải đúng định dạng');
                        flag = false;
                    }
                    else{
                        $('#email_error').text('');
                    }
					

                    return flag;
                });
            });
</script>
<div class="outsite regis_contai" style="min-height: 363px; background:url(<?php echo TEMPLATE_PATH ?>/login/images/regis-bg.png) left top no-repeat #0288e4;">
  <div class="container">
    <title>Lấy Lại Mật Khẩu</title>
    <div class="row regis_content">
      <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-4 col-xs-12 col-xs-offset-0">
        <div class="regis_public">
          <h2 class="regis_title"><img src="<?php echo TEMPLATE_PATH ?>/login/images/lost-pass-img01.png"></h2>
          <div class="regis_form">
            <div class="col-md-9 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1 lost_pass"> Để khôi phục mật khẩu, vui lòng nhập Email. Hệ thống sẽ gửi mật khẩu mới qua email của bạn. </div>
            <form class="form-horizontal" method="post" id="khoiphuc">
              <div class="form-group">
                <div class="col-md-9 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="">
                  <span id="email_error" style="color:#F00"><?= $err_email ?></span>
                </div>
              </div>
           <!--   <div class="form-group">
                <div class="col-md-9 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1">
                  <div class="row">
                    <div class="col-md-8 col-sm-7 col-xs-7">
                      <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Mã xác nhận">
                      <input type="hidden" name="id_captcha" value="Q0a4ad67bcfda3e098b7f0f332a8928ce">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-5">
                      <p class="charater"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAeBAMAAAAodabAAAAAIVBMVEX///+g0vRgtO6Aw/EhludBpeq/4fjf8PsCiOT///////+U9uLMAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAXlJREFUOI3tU01PwkAQXQp0e2wChh5FjOkRSKo9EoLaoyLGHhtiYo9GjHiEfsj8bLe7M9sl9exFJ2l2+mbezpvplLF/+2XbrO4aWP/1p0y+VWcbYIaQ3ZtgauxSVrCYJxSO4Uk6Yf5Ct8QAmcw7gTFCXQDYo58WMVRX2kWt4XEUwKk4WwCk1brYrgH9aMz9Crf2zDRvV1V5CGcGFqlL7ZIxpwp3dkcUR706hyalnQudX8L5nK2Xbh32lCIZQnvLmKZYknINUOpogJ0ZcmMaRaukKvDQ0/NJiysMZ7WsDOfD4f7DqwQ7gpdSPxv/lulW0XifRKZi4LL9g3owvqAb61440XmwDKtWu/ujZv0E5RgbY9B9F5uqqyiMGRtzRMHikcvCei9jrBIOJwTZhY6+5/LwyhWoPCsRqyIF8WmEk+8O2LPKY9ZoKtdJKIvgRmGd4ixWYRtgfik9B/SidwByKjxAR5DpCw0Tws5hTo3oX8Mw3hs0MMab0N+zb7v/U+kAj6UwAAAAAElFTkSuQmCC" alt="Mã Xác Nhận"></p>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center"> <a href="trang-chu.html" class="btn btn-default regis_btn">BỎ QUA</a>
                  <button type="submit" name="submit" class="btn btn-default regis_btn">KHÔI PHỤC</button>
                </div>
              </div>
            </form>
          </div>
		  <?= $thongbao ?>
        </div>
      </div>
    </div>
   <!-- <script>
</script> -->
</div>
 <!-- <div id="regis_foot">
    <div class="container">
      <div class="row regis_footer">
        <div class="col-md-7 col-sm-5 col-xs-12 col-md-push-5 col-sm-push-7">
          <ul class="regis_list01">
            <li><a href="//truyenqq.com">Trang Chủ</a></li>
            <li><a href="//forum.qiqi.vn">Diễn Đàn</a></li>
          </ul>
        </div>
        <div class="col-md-5 col-sm-7 col-xs-12 col-md-pull-7 regis_copy col-sm-pull-5">Copyright © 2018 - TruyenQQ.Com - All Rights Reserved</div>
      </div>
    </div>
  </div> -->
</div>
