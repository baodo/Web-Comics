<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  } );
  </script>
<?php
require 'class/xl_chuong.php';
$thongbao = '';
if(isset($_POST['gui']))
{
	//$ten, $alias, $stroy_id, $link_img, $ngaytao, $ordering
	$xlchuong = new xl_chuong();
	$mess = $xlchuong->addchap($_POST['ten'], $_POST['alias'], $_GET['ma'], $_POST['link_img'], $_POST['ngaytao'], $_POST['ordering']);
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Thêm thành công</div>';
	}
}

?>
<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Thêm chương mới</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="ten">Tên</label>
          <input type="text" name="ten" onchange="taoalias('ten','alias')" class="form-control" id="ten" placeholder="Tên chương">
        </div>
        <div class="form-group">
          <label for="tendangnhap">Alias</label>
          <input type="text" name="alias" class="form-control" id="alias" placeholder="Alias">
        </div>
         <div class="form-group">
          <label for="matkhau">Đường dẫn trang truyện</label>
          <textarea name="link_img" class="form-control" id="link_img" placeholder="Link Images"></textarea>
        </div>
        <div class="form-group">
          <label for="matkhau">Chương số</label>
          <input type="text" name="ordering" class="form-control" id="ordering" placeholder="Thứ tự chương ">
        </div>
         <div class="form-group">
          <label for="matkhau">Ngày tạo</label>
          <input type="text" name="ngaytao" class="form-control" id="datepicker">
        </div>
       
        
        <button type="submit" name="gui" class="btn btn-default">Thêm</button>
        <a href="?page=detailstory&ma=<?php echo $_GET['ma'] ?>"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>
