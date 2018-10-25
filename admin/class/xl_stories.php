<?php
class xl_stories extends database
{
	var $table = 'stories';
	
	//select 1 story
	function story($ma)
	{
		$this->setquery('select * from '. $this->table.' where Ma = ?');
		$param=array($ma);
		return $this->loadrow($param);	
	}
	//select 1 danh sách story
	function liststories($vitri = 0, $soluong = 0)
	{
		$limit = '';
		if($soluong > 0)
		{
			$limit = " limit $vitri, $soluong";	
		}
		$this->setquery('select * from '.$this->table. $limit);
		$param=array();
		return $this->loadAllrow($param);
	}
	//thêm 1 story mới
	function addstory($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase, $ngaytao)
	{
		//Xử lý phần hình
		/*$hinh = myupload('../uploads/coverstories', $hinh);
		if($hinh)
		{
			$hinh = str_replace('../', FONTPAGE, $hinh);	
		}
		else
		{
			$hinh = FONTPAGE.'uploads/coverstories/noimage.png';
		}
		//Xử lý phần hình chia sẻ
		$hinhchiase = myupload('../uploads/coverstories', $hinhchiase);
		if($hinhchiase)
		{
			$hinhchiase = str_replace('../', FONTPAGE, $hinhchiase);	
		}
		else
		{
			$hinhchiase = FONTPAGE.'uploads/coverstories/noimage.png';
		}*/
		
		if(!$hinh && !$hinhchiase)
		{
			$hinh = FONTPAGE.'uploads/coverstories/noimage.png';
			$hinhchiase = FONTPAGE.'uploads/coverstories/noimage.png';	
		}
		
		$sql = 'INSERT INTO `stories`(`Ten`, `Alias`, `Mo_ta`, `Category_id`, `Tu_khoa`, `Tieu_de`, `Mo_ta_tim_kiem`, `Hinh`, `Hinh_chia_se`, `Ngay_tao`) VALUES (?,?,?,?,?,?,?,?,?,?)';
		$this->setquery($sql);
		$param = array($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase,$ngaytao);
		
		return $this->execute($param);
	}
	
	//sửa 1 story
	function editstory($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase, $trangthai, $ngaycapnhat, $ma)
	{
		/*$trangthai = 0;
		if(isset($trangthai))
			$trangthai = 1;*/
		//Xử lý phần hình và hình chia sẻ
		//$hinh = myupload('../uploads/coverstories', $hinh);
		//$hinhchiase = myupload('../uploads/coverstories', $hinhchiase);
		
		if(isset($hinh) && $hinh)
		{
			//$hinh = str_replace('../', FONTPAGE, $hinh);
			
			$sql = "UPDATE `stories` SET `Ten`=?,`Alias`=?,`Mo_ta`=?,`Category_id`=?,`Tu_khoa`=?,`Tieu_de`=?,`Mo_ta_tim_kiem`=?,`Hinh`=?,`Trang_thai`=?,`Ngay_cap_nhat`=? WHERE Ma = ?";
			$param = array($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $trangthai, $ngaycapnhat, $ma);
		}
		else if(isset($hinhchiase) && $hinhchiase)
		{
			//$hinhchiase = str_replace('../', FONTPAGE, $hinhchiase);
			$sql = "UPDATE `stories` SET `Ten`=?,`Alias`=?,`Mo_ta`=?,`Category_id`=?,`Tu_khoa`=?,`Tieu_de`=?,`Mo_ta_tim_kiem`=?,`Hinh_chia_se`=?,`Trang_thai`=?,`Ngay_cap_nhat`=? WHERE Ma = ?";
			$param = array($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinhchiase, $trangthai, $ngaycapnhat, $ma);
		}
		else if(isset($hinh) && $hinh && isset($hinhchiase) && $hinhchiase)
		{
			//$hinh = str_replace('../', FONTPAGE, $hinh);
			//$hinhchiase = str_replace('../', FONTPAGE, $hinhchiase);
			$sql = "UPDATE `stories` SET `Ten`=?,`Alias`=?,`Mo_ta`=?,`Category_id`=?,`Tu_khoa`=?,`Tieu_de`=?,`Mo_ta_tim_kiem`=?,`Hinh`=?,`Hinh_chia_se`=?,`Trang_thai`=?,`Ngay_cap_nhat`=? WHERE Ma = ?";
			$param = array($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $hinh, $hinhchiase, $trangthai, $ngaycapnhat, $ma);
		}	
		else //không cập nhật hình
		{
			$sql = "UPDATE `stories` SET `Ten`=?,`Alias`=?,`Mo_ta`=?,`Category_id`=?,`Tu_khoa`=?,`Tieu_de`=?,`Mo_ta_tim_kiem`=?,`Trang_thai`=?,`Ngay_cap_nhat`=? WHERE Ma = ?";
			$param = array($ten, $alias, $mota, $category_id, $tukhoa, $tieude, $motatimkiem, $trangthai, $ngaycapnhat, $ma);
		}
		
		$this->setquery($sql);

		return $this->execute($param);
	}
	//xóa 1 story
	function delstory($ma)
	{
		$sql = "UPDATE `user` SET `Trang_thai`= 2 WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($ma));
	}
	
	function tongsodong()
	{
		$this->setquery('select count(Ma) tong from '. $this->table);
		return $this->loadrow()->tong;
	}
	
	
	
	///CHƯƠNG TRUYỆN
	
	function sochuongtruyen($ma)
	{
		$this->setquery('select count(Ma) tong from chapters where Story_id = ?');
		$param = array($ma);
		return $this->loadrow($param)->tong;
	}
	function tenloai($ma)
	{
		$this->setquery('select * from category where Ma = ?');
		$param=array($ma);
		return $this->loadrow($param);
	}
	function dstenloai()
	{
		$this->setquery('select * from category');
		$param=array();
		return $this->loadAllrow($param);
	}
	function dschuong($matruyen)
	{
		$this->setquery('SELECT * FROM `chapters` WHERE Story_id = ?');
		$param=array($matruyen);
		return $this->loadAllrow($param);	
	}
	function chuong($matruyen, $ordering)
	{
		$this->setquery('SELECT * FROM `chapters` WHERE Story_id = ? AND Ordering = ?');
		$param=array($matruyen, $ordering);
		return $this->loadrow($param);	
	}
}
?>