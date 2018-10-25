<?php
function xemmang($mang)
{
	echo '<pre>';
	print_r($mang);
	echo '</pre>';	
}

function myupload($thumuc,$mangfile,$loaifile = array('jpg','png','gif','jpeg'),$kichthuoc = 1,$ten = 'file_')
{
	//check du lieu dau vao
	if(is_array($mangfile) && count($mangfile)==5)
	{
		$maxsize = $kichthuoc*1024*1024;
		//check loi đẩy file len server va kich thuoc
		if($mangfile['error'] == 0 &&  $mangfile['size']>0  &&  $mangfile['size']<=$maxsize)
		{
			//check duoi file
			//lay duoi file ra
			$ar =  explode('.',$mangfile['name']);
			$duoi = strtolower( $ar[count($ar)-1]);
			if(in_array($duoi,$loaifile))
			{
				//lam tiep dat lai ten khoi trung
				$tenmoi = $ten.time();
				$fullpath = $thumuc.'/'.$tenmoi.'.'.$duoi;
				if(move_uploaded_file($mangfile['tmp_name'],$fullpath))
					return $fullpath;
				else
					return false;				
			}else
				return false;
		}else
			return false;	
	}
	else 
		return false;
}

function chuyentrang($url)
{
	header('location: '.$url);
}

function lamtronnoidung($chuoi, $sokytumuoncat)
{
	$chuoimoi = '';
	$sokytumuoncat = abs($sokytumuoncat);
	$len = mb_strlen($chuoi,'utf-8');
	if($len > $sokytumuoncat)
	{
		$chuoi .= ' ';
		$sokytumuoncat = mb_strpos($chuoi, ' ', $sokytumuoncat,'utf-8');
		$chuoimoi = mb_substr($chuoi,0,$sokytumuoncat,'utf-8');
		if($len != $sokytumuoncat)
			$chuoimoi .= '...';
		else $chuoimoi = $chuoi;
	}
	return $chuoimoi;
}

function facetime($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
	
}

function rand_txt($sokitumuonlay)
{
	$str = '';
	$char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$size = strlen($char)-1;
	for($i = 1; $i <= $sokitumuonlay; $i++)
	{
		$vitri = rand(0,$size);
		$str .= substr($char, $vitri, 1);	
	}
	return $str;
}

?>