<?php 
	$path = '../../data/nguoidung.xml';
	$data = simplexml_load_file($path);
	echo '<pre>';
	print_r($data);
	echo '</pre>';		
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
    <td>Avatar</td>
    <td>Tên</td>
    <td>Tên đăng nhập</td>
    <td>Trạng thái</td>
    <td>Email</td>
    <td>Tác vụ</td>
  </tr>
<?php 
	if(isset($data->nguoidung) && $data->nguoidung){
	foreach($data->nguoidung as $user)
	{
?>
  <tr>
    <td><?php echo $user->ma ?> </td>
    <td><img src="<?php echo $user->avatar?>" width="50px" /></td>
    <td><?php echo $user->ten?></td>
    <td><?php echo $user->tendangnhap?></td>
    <td><?php echo $user->trangthai?></td>
    <td><?php echo $user->email?></td>
    <td><input type="button" value="Xem chi tiết" /> <input type="button" value="Sửa" /> <input type="button" value="Xóa" /> </td>
  </tr>
<?php 
	}
}
?>
</table>


</body>
</html>




