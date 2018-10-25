<?php
require 'class/xl_login.php';
require_once 'class/xl_stories.php';
$xltruyen = new xl_stories();
$truyens = $xltruyen->liststories();

?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    var availableTags = [
      <?php
	  foreach($truyens as $truyen)
	  {
	   		echo '"'.$truyen->Ten.'",';	  
	  }
	   ?>
	   
    ];
    $( "input#text-search" ).autocomplete({
      source: availableTags
    });
  } );
    </script>
<style>
.autocomplete-suggestions {
	border: 1px solid #999;
	background: #fff;
	cursor: default;
	overflow: auto;
}
.autocomplete-suggestion {
	padding: 10px 5px;
	font-size: 1.2em;
	white-space: nowrap;
	overflow: hidden;
}
.autocomplete-selected {
	background: #f0f0f0;
}
.autocomplete-suggestions strong {
	font-weight: normal;
	color: #3399ff;
}
</style>
<div class="ind_head01">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-xs-12">
        <div class="logo"> <a href="trang-chu.html"><img src="<?= TEMPLATE_PATH ?>frontend/images/name.png" alt="My Truyện" height="35px" width="156px"> <span>QiQi Truyện</span> </a> </div>
      </div>
      <div class="col-md-5 col-md-offset-1 col-xs-12 col-xs-offset-0 tmp_search">
        <form method="get" action="?pages=search">
          <input type="text" class="form-control" placeholder="Từ khoá..." name="search" id="text-search" >
          <input type="hidden" name= "page" value="search" /><!-- để hiện get trên url -->
          <input type="submit" name="gui" value="Tìm Kiếm" id="btn_search">
          <div class="search_info" style="display: block;"></div>
        </form>
      </div>
      <script type="text/javascript">
<!--
var login = 0;
var user_id = 0;
var ip_link_socket = "https://qqtaku.net/";
var urlLogin = "https://truyenqq.com/frontend/public/login";
//-->
</script>
      <div class="col-md-4 col-xs-12 tmp_login">
        <?php
//if(!isset($_SESSION['login']))
//{//hiện phần đăng nhập đăng ký
if(isset($_COOKIE['login']) && $_COOKIE['login'] == 1)
{
	$_SESSION['login'] = true;
	$_SESSION['ten'] = $_COOKIE['ten'];
	$_SESSION['avatar'] = $_COOKIE['avatar'];	
}

?>
<?php
$thongbao = '';
if(isset($_POST['email'],$_POST['pass']) && $_POST['email'] && $_POST['pass'])
{
	$login = new xl_login();

	$user = $login->login($_POST['email'],md5($_POST['pass']));
	if($user)
	{
		$_SESSION['login'] = true;
		$_SESSION['ten'] = $user->Ten;
		$_SESSION['avatar'] = $user->Avatar;
		$_SESSION['ma'] = $user->Ma;
		if(isset($_POST['expire']))
			{
				//cai dat cookie ghi lai thong tin dang nhap
				$time = time()+7*86400;
				setcookie('login',true,$time);
				setcookie('ten',$_SESSION['ten'],$time);
				setcookie('avatar',$_SESSION['avatar'],$time);
			}
		//chuyentrang('index.php');	
	}
	else
	{
		$thongbao = '<div class="alert alert-danger"><center>Tài khoản hoặc mật khẩu không chính xác</center></div>';
	}	
}

if(!isset($_SESSION['login']))
{//hiện phần đăng nhập đăng ký
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
                $('#login').submit(function(){

                    // BƯỚC 1: Lấy dữ liệu từ form
                    var email       = $.trim($('#email_login').val());
					var mk = $.trim($('#password_login').val());

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
					
					// Email
                    if (mk == ''){
                        $('#pass_error').text('Mật khẩu không được để trống');
                        flag = false;
                    }
                    else{
                        $('#email_error').text('');
                    }
					
					

                    return flag;
                });
            });
</script>
        <div class="ind_login text-right"><a rel="nofollow" href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-sm">Đăng nhập</a> | <a rel="nofollow" href="dang-ky.html">Đăng Ký</a></div>
        <div id="loginModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="login_ind"> <span class="login_img01"><img src="template/frontend/images/login-img01.png" alt="Kết nối QiQi"></span>
                <div class="login_input">
                  <form method="post" id="login">
                    <div class="form-group">
                      <input type="email" name="email" id="email_login" class="form-control" placeholder="Email">
                      <span id="email_error" style="color:#F00"></span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" id="password_login" class="form-control" placeholder="Mật Khẩu">
                      <span id="pass_error" style="color:#F00"></span>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="expire" name="expire" value="1">
                        Nhớ Mật Khẩu </label>
                    </div>
                    <span class="login_forget"><a rel="nofollow" href="quen-mat-khau.html" target="_blank">Quên Mật Khẩu</a></span>
                    <div class="text-center login_sub"><a rel="nofollow" href="dang-ky.html" target="_blank" class="btn">ĐĂNG KÝ</a>
                      <button type="submit" class="btn" id="button_login">ĐĂNG NHẬP</button>
                    </div>
                   <?= $thongbao ?>
                  </form>
                </div>
               
               <!-- <div class="login_func"> <span>Hoặc đăng nhập bằng: </span> <a rel="nofollow" href="https://www.facebook.com/v2.8/dialog/oauth?client_id=1498603730425925&amp;state=15992b84d439fb8ce0364b698a002d97&amp;response_type=code&amp;sdk=php-sdk-5.0.0&amp;redirect_uri=https%3A%2F%2Ftruyenqq.com%2Ffrontend%2Fpublic%2Floginfb&amp;scope=email%2Cpublic_profile%2Cuser_friends"><img src="template/frontend/images/login-face.png" alt="Đăng Nhập Bằng Facebook"></a> <a rel="nofollow" href="https://accounts.google.com/o/oauth2/auth?client_id=600336167183-qkfuc7cvm8tki5v4cnmeugoph502eb4c.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Ftruyenqq.com%2Ffrontend%2Fpublic%2Floging&amp;response_type=code&amp;scope=openid%20email%20profile&amp;state=83faa5382a5d250c1caa66e1b17078b7b343e3809399af85b306673ddd90635c"><img src="template/frontend/images/login-mail.png" alt="Đăng Nhập Bằng Google"></a> </div> -->
              </div>
            </div>
          </div>
        </div>
        <?php
}
if(isset($_SESSION['login']))
{
	echo '<script>login = 1;</script>'; //login = 1 thì mới hiện mấy cái emoji ở chỗ bình luận
?>
        <!--<div class="col-md-4 col-xs-12 tmp_login"> -->
        <div class="ind_facebook notifCentered"> 
          <!-- BEGIN: Message block --> 
          <!-- <p class="text-right ind_face" data-id="message"><span class="glyphicon glyphicon-comment"></span><span class="span04">15</span></p>
	<div class="ind_info_face">
		<div class="ind_facehead">
			<h5>Tin nhắn</h5>
			<p><a href="javascript:void(0);"><span class="glyphicon glyphicon-envelope"></span>Gửi tin nhắn</a></p>
		</div>
		<div class="ind_info_txt">
			<a href="">
				<div><img src="https://truyenqq.com/template/frontend/images/img00.png" /></div>
				<p class="tin_text">Faster Than A Kiss (Truyện Tranh)</p>
				<p class="tin_icon"><span class="label label-default">Mới</span></p>
			</a>
			<a href="">
				<div><img src="https://truyenqq.com/template/frontend/images/img00.png" /></div>
				<p class="tin_text">Faster Than A Kiss (Truyện Tranh)</p>
				<p class="tin_icon"><span class="label label-default">Mới</span></p>
			</a>
			<a href="">
				<div><img src="https://truyenqq.com/template/frontend/images/img00.png" /></div>
				<p class="tin_text">Faster Than A Kiss (Truyện Tranh)</p>
				<p class="tin_icon"><span class="label label-default">Mới</span></p>
			</a>
			<a href="">
				<div><img src="https://truyenqq.com/template/frontend/images/img00.png" /></div>
				<p class="tin_text">Faster Than A Kiss (Truyện Tranh)</p>
				<p class="tin_icon"><span class="label label-default">Mới</span></p>
			</a>
		</div>
		<p class="ind_info_link"><a href="#">Xem tất cả</a></p>
	</div> --> 
          <!-- END: Message block --> 
          
          <!-- BEGIN: Notification block -->
          <p class="text-right ind_face ind_face01" data-id="notification"><span class="glyphicon glyphicon-globe"></span></p>
          <div class="ind_info_face">
            <div class="ind_facehead">
              <h5>Thông Báo</h5>
            </div>
            <div class="no-result" style="padding: 10px 0px;">Không Có Thông Báo Nào!</div>
          </div>
          <!-- END: Notification block --> 
        </div>
        <script>
	 var urlNotification = 'https://truyenqq.com/frontend/public/notification';
</script>
        <div class="dropdown logined"> <a id="dLabel" data-target="#" href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo isset($_SESSION['avatar'])?$_SESSION['avatar']:'' ?>" style="background-position:center center; background-size:cover; object-fit: cover;" width="32px" height="32px"><?php echo isset($_SESSION['ten'])?$_SESSION['ten']:'' ?> <span class="caret"></span> </a>
          <ul class="dropdown-menu" aria-labelledby="dLabel">
            <li><a href="thong-tin.html"><span class="glyphicon glyphicon-user"></span>Thông tin cá nhân</a></li>
            <li><a href="doi-mat-khau.html"><span class="glyphicon glyphicon-lock"></span>Đổi mật khẩu</a></li>
            <li><a href="sua-thong-tin.html"><span class="glyphicon glyphicon-pencil"></span>Sửa thông tin</a></li>
           <!-- <li><a href="https://truyenqq.com/truyen-danh-dau.html"><span class="glyphicon glyphicon-bookmark"></span>Truyện Đánh Dấu</a></li>
            <li><a href="https://truyenqq.com/truyen-dang-theo-doi.html"><span class="glyphicon glyphicon-bullhorn"></span>Truyện Theo Dõi</a></li> -->
            <li><a rel="nofollow" href="logout.html"><span class="glyphicon glyphicon-off"></span>Thoát</a></li>
          </ul>
        </div>
        <!-- </div> -->
        <?php 
}
?>
      </div>
    </div>
  </div>
</div>
