<?php 
	$path = '../../data/sanpham.xml';
	$data = simplexml_load_file($path);		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width=100% border="1" cellspacing="2" cellpadding="2" align="center" style="text-align:center">
  <tr>
    <td>Mã</td>
    <td>Hình</td>
    <td>Tên</td>
    <td>Giá</td>
    <td>Số lượng</td>
    <td>Mô tả</td>
    <td>Trạng thái</td>
    <td>Tác vụ</td>
  </tr>
<?php 
	if(isset($data->sanpham) && $data->sanpham){
	foreach($data->sanpham as $pro)
	{
?>
  <tr>
    <td><?php echo $pro->ma ?> </td>
    <td><img src="<?php echo $pro->hinh?>" width="50px" /></td>
    <td><?php echo $pro->ten?></td>
    <td><?php echo $pro->gia?></td>
    <td><?php echo $pro->soluong?></td>
    <td><?php echo $pro->mota?></td>
    <td><?php echo $pro->trangthai?></td>
    <td><input type="button" value="Xem chi tiết" /> <input type="button" value="Sửa" /> <input type="button" value="Xóa" /> </td>
  </tr>
<?php 
	}
}
?>
</table>


</body>
</html>




