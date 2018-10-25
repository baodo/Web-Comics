<?php
require_once 'class/xl_nguoidung.php';
$xlnd = new xl_nguoidung();
$listus = $xlnd->listuser();
$thongbao = '';
$err_same_name =  ''; 
$err_same_email = '';
if(isset($_POST['signup']))
{
	'$ten, $email, $ns, $username, $pass';
	$birthday = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
	//đổi chuỗi đúng định dạng php hỗ trợ
	$birthday = str_replace("/", "-", $birthday);
	$date = strtotime($birthday); //chuyển sang php	
	//$date += 24*3600; //sau 1 ngày
	//lưu vào mysql
	$store_mysql_date = date("Y-m-d", $date);
	
	if(isset($_POST['username'], $_POST['email'], $_POST['gender'], $_POST['username'], $_POST['password']))
	{
		if($xlnd->checkname($_POST['username'])) 
		{
			$err_same_name =  'Tên đăng nhập đã tồn tại'; 
		}
		if($xlnd->checkemail($_POST['email']))
		{
			$err_same_email = 'Email đã tồn tại';
		}
		if($err_same_name ==  '' && $err_same_email == '')
		{
			$mess = $xlnd->signup($_POST['name'],$_POST['email'],$store_mysql_date,$_POST['gender'],$_POST['username'],md5($_POST['password']));
			$thongbao = '<div class="alert alert-success">Đăng ký thành công</div>';
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
                $('#dangki').submit(function(){

                    // BƯỚC 1: Lấy dữ liệu từ form
                    var username    = $.trim($('#username').val());
                    var password    = $.trim($('#password').val());
                    var re_password = $.trim($('#password_confirm').val());
                    var email       = $.trim($('#email').val());
                    var name       = $.trim($('#last_name').val());
                    var ngay     = $.trim($('#day').val());
					var thang     = $.trim($('#month').val());
					var nam     = $.trim($('#year').val());

                    // BƯỚC 2: Validate dữ liệu
                    // Biến cờ hiệu
                    var flag = true;

                    // Username
                    if (username == '' || username.length < 4){
                        $('#username_error').text('Tên đăng nhập phải lớn hơn 4 ký tự');
                        flag = false;
                    }
					else{
                        $('#username_error').text('');
                    }
					
					
                    // Password
                    if (password.length <= 0){
                        $('#password_error').text('Bạn phải nhập mật khẩu');
                        flag = false;
                    }
                    else{
                        $('#password_error').text('');
                    }

                    // Re password
                    if (password != re_password){
                        $('#password_confirm_error').text('Mật khẩu nhập lại không đúng');
                        flag = false;
                    }
                    else{
                        $('#password_confirm_error').text('');
                    }

                    // Email
                    if (!isEmail(email)){
                        $('#email_error').text('Email không được để trống và phải đúng định dạng');
                        flag = false;
                    }
                    else{
                        $('#email_error').text('');
                    }
					
					 //Name
                    if (name == '' || name.length < 4){
                        $('#name_error').text('Họ tên phải lớn hơn 4 ký tự');
                        flag = false;
                    }
                    else{
                        $('#name_error').text('');
                    }
					
					// Day
                    if (day == 'Ngày' ){
                        $('#day_error').text('Vui lòng nhập ngày');
                        flag = false;
                    }
                    else{
                        $('#day_error').text('');
                    }
					
					// Month
                    if (month == 'Tháng' ){
                        $('#month_error').text('Vui lòng nhập tháng');
                        flag = false;
                    }
                    else{
                        $('#month_error').text('');
                    }
					
					// Year
                    if (year == 'Năm' ){
                        $('#year_error').text('Vui lòng nhập năm');
                        flag = false;
                    }
                    else{
                        $('#year_error').text('');
                    }

                    return flag;
                });
            });
</script>
<div class="outsite regis_contai" style="min-height: 446px; background:url(<?php echo TEMPLATE_PATH ?>/login/images/regis-bg.png) left top no-repeat #0288e4;">
  <div class="container">
    <title>Đăng Ký</title>
    <div class="row regis_content pos_padding">
      <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-4 col-xs-12 col-xs-offset-0">
      <?= $thongbao ?>
        <div class="regis_public">
          <h2 class="regis_title"><img src="<?php echo TEMPLATE_PATH ?>login/images/regis-img01.png"></h2>
          <div class="regis_form">
            <form class="form-horizontal" method="post" id="dangki">
              <div class="form-group">
                <label for="username" class="col-md-3 col-sm-4 col-xs-4 control-label">Tên đăng nhập</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="username" name="username" value="" placeholder="Chấp nhận chữ, số và dấu gạch dưới (_).">
                  <span id="username_error" style="color:#F00">
                  <?= $err_same_name ?>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-md-3 col-sm-4 col-xs-4 control-label">Mật khẩu</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="password" class="form-control" id="password" name="password" value="">
                  <span id="password_error" style="color:#F00"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="password_confirm" class="col-md-3 col-sm-4 col-xs-4 control-label">Nhập lại mật khẩu</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="">
                  <span id="password_confirm_error" style="color:#F00"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-3 col-sm-4 col-xs-4 control-label">Email</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="email" class="form-control" id="email" name="email" value="">
                  <span id="email_error" style="color:#F00">
                  <?= $err_same_email ?>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="last_name" class="col-md-3 col-sm-4 col-xs-4 control-label">Họ Tên</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="last_name" name="name" value="">
                  <span id="name_error" style="color:#F00"></span>
                </div>
              </div>
            <!--  <div class="form-group">
                <label for="first_name" class="col-md-3 col-sm-4 col-xs-4 control-label">Tên</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="first_name" name="first_name" value="">
                </div>
              </div> -->
              <div class="form-group">
                <label for="day" class="col-md-3 col-sm-4 col-xs-4 control-label">Ngày sinh</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <select class="form-control" name="day" id="day">
                        <option value="">Ngày</option>
                        <?php
						for($i = 1; $i<=31;$i++)
						{
						 ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php 
						}
						?>
                      </select>
                    </div>
                    <span id="day_error" style="color:#F00"></span>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <select class="form-control" name="month" id="month">
                        <option value="">Tháng</option>
                        <?php
						for($i = 1; $i<=12;$i++)
						{
						 ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php 
						}
						?>
                      </select>
                    </div>
                    <span id="month_error" style="color:#F00"></span>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <select class="form-control" name="year" id="year">
                        <option value="">Năm</option>
                        <?php
						for($i = 1920; $i<=date ('Y',time());$i++)
						{
						 ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php 
						}
						?>
                      </select>
                    </div>
                    <span id="year_error" style="color:#F00"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-md-3 col-sm-4 col-xs-4 control-label">Giới tính</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <label class="checkbox-inline">
                    <input type="radio" id="gender" name="gender" value="1" checked="">
                    Nam </label>
                  <label class="checkbox-inline">
                    <input type="radio" id="gender" name="gender" value="0">
                    Nữ </label>
                </div>
              </div>
             <!-- <div class="form-group">
                <label for="inputname3" class="col-md-3 col-sm-4 col-xs-4 control-label">Mã xác nhận</label>
                <div class="col-md-9 col-sm-8 col-xs-8">
                  <div class="row">
                    <div class="col-md-8 col-sm-7 col-xs-7">
                      <input type="text" class="form-control" id="captcha" name="captcha">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-5">
                      <p class="charater"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAeBAMAAAAodabAAAAAIVBMVEX///8hludBperf8Pug0vRgtO6Aw/G/4fgCiOT///////+SCK8YAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAX9JREFUOI3tUsFOAjEQLZRlOSoY7XEVSXoEJWGPJCYLRyQGOa6GJXtETXSPbIVlPtsuM20x6tUTc+lL+97rm2kZO9Z/lJ88EBpEyeXqT15/ac64BGghnAPA8AeV3+6XVwDVxZ1evnjKEabnizfL9BSFkNAuV1AJBMQLGBcoH08OvCVJslxCeXzGWPhJaXQUSZLASXpqi0DEfE771R1JtPUpGZ5YhZ+/Fwj0ZY01ZSVJtl3VCYabpek+bXubPagXzr1KwXwBgogNgBwjelvDKyXW3QTProBiVztmKDJmFbSsKXeLpIfhTVYTtm8cCs9noxAb4HA9GJOanFl946anM+w78PWbgooxhIaoDluGtHM3G4n+OlNBGflzJw2+5WKe7q9iJU48frTfbT48cCsTwoql9kGytUFpbBAH9Jgw/kFzUPeAhi+zBCwRrcvqFTiSaAr0iW4ALhCFAIXhmeSetpnYkXTosH9HwI8WXSuhr1oxNrw5G7nTX0tQI4c2x2LsCwm7XK4eVQ1IAAAAAElFTkSuQmCC">
                        <input type="hidden" name="id_captcha" value="Qdcfccdbbd151b76b7187501ba5647e73">
                      </p>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center"> <a href="dang-ky.html" class="btn btn-default regis_btn">BỎ QUA</a>
                  <button type="submit" name="signup" class="btn btn-default regis_btn">ĐĂNG KÝ</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
</script> </div>
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
  </div> ->
</div>
