<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  } );
  </script>
<?php 
require 'class/xl_chuong.php';
require 'class/xl_stories.php';
$thongbao = '';
$xltruyen = new xl_stories();
//tim story can sua
$xlchuong = new xl_chuong();
//$list = $xltruyen->liststories();
//di tim
/*foreach($list as $story)
{
	if($story->Ma ==$_GET['ma'] ){
		$storycansua = $story->Ma;
		break;
	}
}*/
	if(isset($_GET['matruyen'], $_GET['machuong']))
	{
		$chuong = $xlchuong->chap($_GET['matruyen'],$_GET['machuong']);
		//$hinhs = explode('|',$chuong->Link_img);
		
		$tentruyen = $xltruyen->story($_GET['matruyen']);
	}
	//xemmang($chuong);

$chuongcansua = $chuong->Ma;
if(!$chuongcansua)
	 chuyentrang('index.php?page=chap&matruyen='.$_GET['matruyen'].'&machuong'.$_GET['machuong']);
 
if(isset($_POST['gui']))
{
	//$ten, $alias, $stroy_id, $link_img, $ngaycapnhat, $ordering, $ma
	$mess = $xlchuong->editchap($_POST['tenchuong'], $_POST['alias'], $_POST['link_img'], $_POST['ngaycapnhat'],$_POST['ordering'],$chuongcansua, $tentruyen->Ma );
	
	if($mess)
	{
		$thongbao = '<div class="alert alert-success">Cập nhật thành công</div>';
	}
} 

?>

<div class="forms-main_agileits">
  <div class="graph-form agile_info_shadow">
    <h3 class="w3_inner_tittle two">Cập nhật chương truyện</h3>
    <?php echo $thongbao ?>
    <div class="form-body">
      <form method="post" action="" enctype="multipart/form-data">
       	<div class="form-group">
        <?php //$tentruyen =  $xltruyen->story($_GET['ma'])->Ten?>
           <label for="ten">Tên truyện</label>
           <input type="text" disabled="disabled" value="<?php echo $tentruyen->Ten?>" name="tentruyen" class="form-control" id="ten" placeholder="Tên truyện">
        </div>
        <div class="form-group">
          <label for="ten">Tên chương</label>
          <input type="text" name="tenchuong" onchange="taoalias('tenchuong','alias')" value="<?php echo $chuong->Ten?>" class="form-control" id="ten" placeholder="Tên chương">
        </div>
        <div class="form-group">
          <label for="tendangnhap">Alias</label>
          <input type="text" name="alias" value="<?php echo $chuong->Alias?>" class="form-control" id="alias" placeholder="Alias">
        </div>
         <div class="form-group">
          <label for="matkhau">Đường dẫn trang truyện</label>
          <textarea name="link_img" rows="10" class="form-control" id="link_img" placeholder="Link Images"><?php echo $chuong->Link_img?></textarea>
        </div>
        <div class="form-group">
          <label for="matkhau">Chương số</label>
          <input type="text" name="ordering" value="<?php echo $chuong->Ordering?>" class="form-control" id="ordering" placeholder="Thứ tự chương ">
        </div>
         <div class="form-group">
          <label for="matkhau">Ngày cập nhật</label>
          <input type="text" name="ngaycapnhat" class="form-control" id="datepicker">
        </div>
       
        
        <button type="submit" name="gui" class="btn btn-default">Sửa</button>
        <a href="?page=chap&matruyen=<?php echo $tentruyen->Ma?>&machuong=<?php echo $chuong->Ordering?>"  class="btn btn-danger">Bỏ qua</a>
      </form>
    </div>
  </div>
</div>
