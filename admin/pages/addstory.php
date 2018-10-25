<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  } );
  </script>
<?php
require 'class/xl_stories.php';
$thongbao='';
$xltruyen = new xl_stories();
if(isset($_POST['gui']))
{
	if(isset($_POST['category_id']))
	{
		$arr = implode('. ', $_POST['category_id']);
		$maloai = explode('. ',$arr);
	}
	$mess = $xltruyen->addstory($_POST['ten'], $_POST['alias'], $_POST['mota'], $maloai[0], $_POST['tukhoa'], $_POST['tieude'], $_POST['motatimkiem'], $_POST['hinh'], $_POST['hinhchiase'], $_POST['ngaytao']);
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Thêm thành công</div>';
	}
}

?>
<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Thêm Truyện Mới</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="ten">Tên truyện</label>
          <input type="text" onchange="taoalias('ten','alias')" name="ten" class="form-control" id="ten" placeholder="Tên truyện">
        </div>
        <div class="form-group">
          <label for="ma">Alias</label>
          <input type="text" name="alias" class="form-control" id="alias" placeholder="Alias">
        </div>
        <div class="form-group">
          <label for="ma">Mô tả</label>
          <textarea name="mota" class="form-control" id="mota" placeholder="Mô tả truyện"></textarea>
        </div>
        <div class="form-group">
          <label for="ma">Loại truyện</label>
          <!-- <input type="text" name="category_id" class="form-control" id="category_id" placeholder="Loại truyện"> -->
          <select name="category_id[]" style="width:170px"> 
				      <option value="">--- Chọn loại truyện ---</option>  
                      <?php 
					  $dstenloai = $xltruyen->dstenloai();
					  foreach($dstenloai as $tenloai)
							{
					  ?>
     					                        <option value="<?php echo $tenloai->Ma . '. ' . $tenloai->Ten; ;?>"><?php echo $tenloai->Ma . '. ' . $tenloai->Ten;?></option>
                      <?php } ?>
                    </select>
        </div>
        <div class="form-group">
          <label for="ma">Từ khóa</label>
          <input type="text" name="tukhoa" class="form-control" id="tukhoa" placeholder="Từ khóa để nhập vào khi tìm truyện">
        </div>
        <div class="form-group">
          <label for="ma">Tiêu đề</label>
          <input type="text" name="tieude" class="form-control" id="tieude" placeholder="Tiêu đề trang">
        </div>
        <div class="form-group">
          <label for="ma">Mô tả tìm kiếm</label>
          <input type="text" name="motatimkiem" class="form-control" id="motatimkiem" placeholder="Mô tả khi nhập từ khóa vào thanh tìm kiếm">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Hình truyện</label>
          <!--<input type="file" name="hinh" id="exampleInputFile"> -->
          <div>
          	<img src="" width="100" /><input type="hidden" id="hinh" name="hinh" /> <button type="button" onclick="chonfile('hinh')">Chọn</button>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Hình chia sẻ</label>
          <!--<input type="file" name="hinhchiase" id="exampleInputFile"> -->
          <div>
          	<img src="" width="100" /><input type="hidden" id="hinhchiase" name="hinhchiase" /> <button type="button" onclick="chonfile('hinhchiase')">Chọn</button>
          </div>
        </div>
       	<div class="form-group">
          <label for="exampleInputFile">Ngày tạo</label>
          <input type="text" name="ngaytao" id="datepicker">
        </div>
       	
        <button type="submit" name="gui" class="btn btn-default">Thêm</button>
        <a href="?page=stories"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>