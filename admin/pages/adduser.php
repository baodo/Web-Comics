<?php
require 'class/xl_nguoidung.php';
$thongbao = '';
if(isset($_POST['gui']))
{
	/*//Xử lý phần trạng thái
	$trangthai=0;
	if(isset($_POST['trangthai']))
		$trangthai=1;
	//Xử lý phần avatar
	$avatar = myupload('../uploads/avatar', $_FILES['avatar']);
	if($avatar)
	{
		$avatar = str_replace('../', FONTPAGE, $avatar);	
	}
	else
	{
		$avatar = FONTPAGE.'uploads/avatar/noimage.png';
	}
	$db = new database();
	$sql = 'insert into user(`Avatar`, `Ten`, `Email`, `SDT`, `User`, `Pass`, `Khoa`) value(?,?,?,?,?,?,?)';
	$db->setquery($sql);
	$param = array($avatar, $_POST['ten'], $_POST['email'], $_POST['sdt'], $_POST['tendangnhap'], $_POST['matkhau'], $trangthai);
	
	$db->execute($param);
	*/
	$xlng = new xl_nguoidung();
	$mess = $xlng->adduser($_POST['avatar'], $_POST['ten'], $_POST['email'], $_POST['sdt'], $_POST['tendangnhap'], md5($_POST['matkhau']), $_POST['trangthai']);
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Thêm thành công</div>';
	}
}

?>
<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Thêm người dùng</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="ten">Tên</label>
          <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Avatar</label>
          <div>
          	<img src="" width="100" /><input type="hidden" id="avatar" name="avatar" /> <button type="button" onclick="chonfile('avatar')">Chọn</button>
          </div>
          <!--<input type="file" name="avatar" id="exampleInputFile"> -->
        </div>
        <div class="form-group">
          <label for="tendangnhap">Tên đăng nhập</label>
          <input type="text" name="tendangnhap" class="form-control" id="tendangnhap" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
          <label for="matkhau">Mật khẩu</label>
          <input type="password" name="matkhau" class="form-control" id="tendangnhap" placeholder="Mật khẩu">
        </div>
         <div class="form-group">
          <label for="matkhau">Số điện thoại</label>
          <input type="text" name="sdt" class="form-control" id="tendangnhap" placeholder="Sđt">
        </div>
        <div class="form-group">
          <label for="tendangnhap">Email</label>
          <input type="text" name="email" class="form-control" id="sdt" placeholder="Emails">
        </div>
        
        <div class="checkbox">
          <label>
            <input type="checkbox" name="trangthai">
            Kích hoạt </label>
        </div>
        <button type="submit" name="gui" class="btn btn-default">Thêm</button>
        <a href="?page=user"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>
