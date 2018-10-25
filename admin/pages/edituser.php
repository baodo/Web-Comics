<?php 
require 'class/xl_nguoidung.php';
$thongbao = '';
//tim user can sua
$xlnd = new xl_nguoidung();
$list = $xlnd->listuser();
//di tim
/*foreach($list as $user)
{
	if($user->Ma ==$_GET['ma'] ){
		$usercansua = $user->Ma;
		break;
	}
}*/
$us = $xlnd->user($_GET['ma']);
$usercansua = $xlnd->user($_GET['ma'])->Ma;
if(!$usercansua)
 chuyentrang('index.php?page=user');
if(isset($_POST['gui']))
{
	$trangthai = isset($_POST['trangthai'])?$_POST['trangthai']:0;
	$mk = isset($_POST['matkhau'])?md5($_POST['matkhau']):$us->Mat_khau;
	$avatar = isset($_POST['avatar'])?$_POST['avatar']:$us->Avatar;
	$mess = $xlnd->edituser($avatar, $_POST['ten'], $_POST['email'], $_POST['sdt'], $mk, $trangthai,$usercansua);
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Cập nhật thành công</div>';
		xemmang($_POST);
		xemmang($us);
	}
} 

//xemmang($_POST);
?>

<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Cập nhật người dùng</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
        <?php
	 $xlnd->setquery("select * from user where Ma = ?");
	 $user = $xlnd->loadrow(array($usercansua));
	 ?>
        <div class="form-group">
          <label for="ma">Mã</label>
          <input type="text" name="ma" disabled="disabled" value="<?php echo $user->Ma; ?>" class="form-control" id="ma" placeholder="Mã">
        </div>
        <div class="form-group">
          <label for="ten">Tên</label>
          <input type="text" name="ten" value="<?php echo $user->Ten;?>" class="form-control" id="ten" placeholder="Tên">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Avatar</label>
          <img src="<?php echo $user->Avatar;?>" width="50px" />
          <div>
          <button type="button" onclick="chonfile('avatar')">Chọn Avatar mới</button><img src="" width="50" /><input type="hidden" name="avatar" value="<?php  echo $user->Avatar;?>" id="avatar">
          </div>
        </div>
        <div class="form-group">
          <label for="tendangnhap">Tên đăng nhập</label>
          <input type="text" name="tendangnhap" disabled="disabled" value="<?php echo $user->User;?>" class="form-control" id="tendangnhap" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
          <label for="tendangnhap">Email</label>
          <input type="text" name="email" value="<?php echo $user->Email;?>" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="matkhau">Mật khẩu</label>
          <input type="password" name="matkhau" value="<?php //echo $user->Mat_khau; ?>"  class="form-control" id="matkhau" placeholder="Mật khẩu mới">
        </div>
        <div class="form-group">
          <label for="matkhau">Số điện thoại</label>
          <input type="text" name="sdt" value="<?php echo $user->SDT;  ?>" class="form-control" id="sdt" placeholder="Số điện thoại">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" <?php echo $user->Trang_thai==1?'checked':'' ?> value="1" name="trangthai">
            Kích hoạt </label>
        </div>
        <button type="submit" name="gui" class="btn btn-default">Sửa</button>
        <a href="?page=user"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>
