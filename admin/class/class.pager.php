<?php
class pager
{
/***********************************************************************************
* Ham int findStart (int limit)
* Tra ve dong bat dau cua trang duoc chon dua tren trang lay duoc va bien limit
***********************************************************************************/
	function tim_vi_tri_bat_dau($so_mau_tin_tren_mot_trang)
	{
		if ((!isset($_GET['trang'])) || ($_GET['trang'] == "1"))
		{
			$start = 0;
			$_GET['trang'] = 1;
		}
		else
		{
			$start = ($_GET['trang']-1) * $so_mau_tin_tren_mot_trang;
		}
		
		return $start;
	}
/***********************************************************************************
* Ham int findtrangs (int count, int limit)
* Tra ve so luong trang can thiet dua tren tong so dong co trong table va limit
***********************************************************************************/
	function tim_tong_so_trang($tong_so_mau_tin, $so_mau_tin_tren_mot_trang)
	{
		return ceil($tong_so_mau_tin / $so_mau_tin_tren_mot_trang);
	}

	function in_bo_nut($tong_so_trang)
	{
		if (empty($_GET['trang'])) $curtrang = 1;
		else $curtrang = $_GET['trang'];
		
		echo '<ul class="pagination no-margin pull-right">';
		
		$query_string = $this->deleteParam($_SERVER['QUERY_STRING'], 'trang');
				
		/* In trang dau tien va nhung link toi trang truoc neu can */
		if (($curtrang != 1) && ($curtrang))
		{
			echo  "<li><a class=\"number\"  href=\"".$_SERVER['PHP_SELF']."?".$query_string."trang=1\" title=\"Trang đầu\"><i class='fa fa-step-backward' aria-hidden='true'></i></a> </li>";
		} else {
			echo  "<li><a class=\"number \"  disable title=\"Trang đầu\"><i class='fa fa-step-backward' aria-hidden='true'></i></a></li>";
		}
	
		if (($curtrang-1) > 0)
		{
			echo  "<li><a class=\"number\"  href=\"".$_SERVER['PHP_SELF']."?".$query_string."trang=".($curtrang-1)."\" title=\"Về trang trước\"><i class='fa fa-backward' aria-hidden='true'></i></a></li>";
		} else {
			echo  "<li><a class=\"number \" disable title=\"Về trang trước\"><i class='fa fa-backward' aria-hidden='true'></i></a></li>";
		}
			
		/* In ra danh sach cac trang va lam cho trang hien tai dam hon va mat link o chan*/
		$vt_dau = max($curtrang - 3, 1);
		$vt_sau = min($curtrang + 3, $tong_so_trang);
		
		if ($vt_dau > 1) echo '<li><a>...</a></li>';
		for ($i=$vt_dau; $i<=$vt_sau; $i++)
		{
			if ($i == $curtrang)
			{
				echo  "<li><a class=\"number current\" disable><b>".$i."</b></a></li>";
			}
			else
			{
				echo  "<li><a class=\"number\" href=\"".$_SERVER['PHP_SELF']."?".$query_string."trang=".$i."\" title=\"Trang ".$i."\">".$i."</a></li>";
			}
		}
		if ($vt_sau < $tong_so_trang) echo '<li><a>...</a></li>';

		/* In linh cua trang tiep theo va trang cuoi cung neu can*/
		if (($curtrang+1) <= $tong_so_trang)
		{
			echo  "<li><a class=\"number\"  href=\"".$_SERVER['PHP_SELF']."?".$query_string."trang=".($curtrang+1)."\" title=\"Đến trang sau\"><i class='fa fa-forward' aria-hidden='true'></i></a></li>";
		} else {
			echo  "<li><a class=\"number\" disable title=\"Dến trang sau\"><i class='fa fa-forward' aria-hidden='true'></i></a> ";
		}
		
		if (($curtrang != $tong_so_trang) && ($tong_so_trang != 0))
		{
			echo  "<li><a  class=\"number\" href=\"".$_SERVER['PHP_SELF']."?".$query_string."trang=".$tong_so_trang."\" title=\"Trang cuối\"><i class='fa fa-step-forward' aria-hidden='true'></i></a></li>";
		} else {
			echo  "<li><a  class=\"number\" disable title=\"Trang cuối\"><i class='fa fa-step-forward' aria-hidden='true'></i></a></li>";
		}
		echo '<ul>';
	}
	
/***********************************************************************************
* Ham: string trangList (int curtrang, int trangs)
* Tra ve danh sach trang theo dinh dang "Trang dau tien  < [cac trang] > Trang cuoi cung"
***********************************************************************************/
	private function deleteParam($query_string, $param)
	{
		//////xử lý giữ tham số trên url
		
		if($query_string!='')
		{
			$query_string = preg_replace('/(^'.$param.'=[\da-zA-Z]*&)|(&?'.$param.'=[\da-zA-Z]*)|/', '', $query_string);

			if($query_string)
				$query_string = "$query_string&";

		}
		//////xử lý giữ tham số trên url
		return $query_string;
	}	
}
?>