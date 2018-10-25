<?php 
	$path = '../../data/tintuc.xml';
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
    <td>Nội dung</td>
    <td>Trạng thái</td>
    <td>Tác vụ</td>
  </tr>
<?php 
	if(isset($data->tintuc) && $data->tintuc){
	foreach($data->tintuc as $news)
	{
?>
  <tr>
    <td><?php echo $news->ma ?> </td>
    <td><img src="<?php echo $news->hinh?>" width="50px" /></td>
    <td><?php echo $news->ten?></td>
    <td width="50%"><?php echo (string)$news->noidung?></td>
    <td><?php echo $news->trangthai?></td>
    <td><input type="button" value="Xem chi tiết" /> <input type="button" value="Sửa" /> <input type="button" value="Xóa" /> </td>
  </tr>
<?php 
	}
}
?>
</table>


</body>
</html>




