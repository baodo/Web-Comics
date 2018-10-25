<br /><br/>
<?php
require_once 'class/xl_phanquyen.php';
$xl_phanquyen = new xl_phanquyen();


if(isset($_POST['machucnang'],$_GET['id']))
{
	//xemmang($_POST['machucnang']);
	//thu hoi quyen
	$xl_phanquyen->thuhoiquyen($_GET['id']);
	foreach($_POST['machucnang'] as $quyen)
	{
			$xl_phanquyen->addquyen($quyen,$_GET['id']);
	}
}
$dsquyendangco = $xl_phanquyen->docquyencuaai($_GET['id']);
//xemmang($dsquyendangco);
/*function checkquyen($listquyen,$quyen)
{
	foreach($listquyen as $q )
		{
			if($q->Ma_chuc_nang==$quyen)
				return true;
		}
		return false;
}*/

$dscn = $xl_phanquyen->docchucnangtheocha(0);

?>
<form method="post">
<?php 
$user = $xl_phanquyen->doc1nguoidung($_GET['id']);
echo '<span class="bt-content"><img src="'.$user->Avatar.'"  width= "50px" height="50px"></span><strong>  '.$user->Ten.'</strong><br/><br/>';
foreach($dscn as $cn)
{
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input '.(checkquyen($dsquyendangco,$cn->Ma)?'checked':'').' value="'.$cn->Ma.'" name="machucnang[]" type="checkbox"/><strong>'.$cn->Ten.'</strong></label><br>';
	$dscncon = $xl_phanquyen->docchucnangtheocha($cn->Ma);
	foreach($dscncon as $cncon)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input  '.(checkquyen($dsquyendangco,$cncon->Ma)?'checked':'').' value="'.$cncon->Ma.'" name="machucnang[]" type="checkbox"/>'.$cncon->Ten.'</label><br>';
	}
}
?>
<button class="btn btn-success">Ghi</button>
</form>