<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  } );
  </script>
<?php 
require 'class/xl_stories.php';
$thongbao = '';
//tim story can sua
$xltruyen = new xl_stories();
//$list = $xltruyen->liststories();
//di tim
/*foreach($list as $story)
{
	if($story->Ma ==$_GET['ma'] ){
		$storycansua = $story->Ma;
		break;
	}
}*/

$storycansua = $xltruyen->story($_GET['ma'])->Ma;
//$storycansua = $xltruyen->story($_GET['ma']);
if(!$storycansua)
 chuyentrang('index.php?page=story');
if(isset($_POST['gui']))
{
	//$ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase, $trangthai, $ngaycapnhat, $ma
	/*if(isset($_POST['category_id']))
	{
		$arr = implode('. ', $_POST['category_id']);
		$maloai = explode('. ',$arr);
	}*/
	$trangthai = isset($_POST['trangthai'])?$_POST['trangthai']:0;
	$mess = $xltruyen->editstory($_POST['ten'], $_POST['alias'], $_POST['mota'], $_POST['category_id'], $_POST['tukhoa'],$_POST['tieude'], $_POST['motatimkiem'], $_POST['hinh'], $_POST['hinhchiase'], $trangthai, $_POST['ngaycapnhat'], $storycansua);
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Cập nhật thành công</div>';
	}
} 

?>

<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Cập nhật truyện</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
        <?php
	 //$xltruyen->setquery("select * from stories where Ma = ?");
	 $story = $xltruyen->story($storycansua);
	 $t = $xltruyen->tenloai($story->Category_id); // Lấy tên loại
	 //$ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase, $trangthai, $ngaycapnhat, $ma
	 ?>
     
        <div class="form-group">
          <label for="ma">Mã</label>
          <input type="text" name="ma" disabled="disabled" value="<?php echo $story->Ma; ?>" class="form-control" id="ma" placeholder="Mã">
        </div>
        <div class="form-group">
          <label for="ten">Tên truyện</label>
          <input type="text" name="ten" onchange="taoalias('ten','alias')" value="<?php echo $story->Ten;?>" class="form-control" id="ten" placeholder="Tên">
        </div>
        <div class="form-group">
          <label for="ten">Alias</label>
          <input type="text" name="alias" value="<?php echo $story->Alias;?>" class="form-control" id="alias" placeholder="Alias">
        </div>
        <div class="form-group">
          <label for="mota">Mô tả</label>
          <textarea name="mota" rows="10" id="mota" class="form-control"><?php echo $story->Mo_ta;?></textarea>
          <!--<input type="text" name="mota" value="<?php //echo $story->Mo_ta;?>" class="form-control" id="mota" placeholder="Mô tả"> -->
        </div>
        <div class="form-group">
          <label for="category_id">Loại truyện</label>
         <!-- <input type="text" name="category_id" value="<?php //echo $story->Category_id;?>" class="form-control" id="category_id" placeholder="Loại truyện"> -->
          <select name="category_id" style="width:170px">
				      <option value="">--- Chọn loại truyện ---</option>  
                      <?php 
					  $dstenloai = $xltruyen->dstenloai();
					  foreach($dstenloai as $tenloai)
							{
					  ?>
     					                        <option <?php echo $tenloai->Ma==$t->Ma?'selected':'' ?> value="<?php echo $tenloai->Ma . '. ' . $tenloai->Ten; ;?>"><?php echo $tenloai->Ma . '. ' . $tenloai->Ten;?></option>
                      <?php } ?>
                    </select>
        </div>
        <div class="form-group">
          <label for="tukhoa">Từ khóa</label>
          <input type="text" name="tukhoa" value="<?php echo $story->Tu_khoa;?>" class="form-control" id="tukhoa" placeholder="Từ khóa">
        </div>
        <div class="form-group">
          <label for="tieude">Tiêu đề</label>
          <input type="text" name="tieude" value="<?php echo $story->Tieu_de;?>" class="form-control" id="tieude" placeholder="Tiêu đề">
        </div>
        <div class="form-group">
          <label for="motatimkiem">Mô tả tìm kiếm</label>
          <input type="text" name="motatimkiem" value="<?php echo $story->Mo_ta_tim_kiem;?>" class="form-control" id="motatimkiem" placeholder="Mô tả tìm kiếm">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Hình</label>
          <img src="<?php echo $story->Hinh;?>" width="50px" />
          <div>
          <button type="button" onclick="chonfile('hinh')">Chọn Avatar mới</button><img src="" width="50px" /><input type="hidden" name="hinh" value="<?php //echo $user->Avatar;?>" id="hinh">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Hình chia sẻ</label>
          <img src="<?php echo $story->Hinh_chia_se;?>" width="50px" />
         <div>
          <button type="button" onclick="chonfile('hinhchiase')">Chọn Avatar mới</button><img src="" width="50px" /><input type="hidden" name="hinhchiase" value="<?php //echo $user->Avatar;?>" id="hinhchiase">
          </div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" <?php echo $story->Trang_thai==1?'checked':'' ?> value="1" name="trangthai">
            Đã hoàn thành </label>
        </div>
        <div class="form-group">
          <label for="tendangnhap">Ngày cập nhật</label>
          <input type="text" name="ngaycapnhat" value="<?php echo $story->Ngay_cap_nhat;?>" class="form-control" id="datepicker">
        </div>
        <button type="submit" name="gui" class="btn btn-default">Sửa</button>
        <a href="?page=stories"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>
