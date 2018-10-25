<?php
class xl_chuong extends database
{
	var $table = 'chapters';
	
	//select 1 story
	function chap($matruyen, $machuong)
	{
		$this->setquery('select * from '. $this->table.' where Story_id = ? and Ordering = ?');
		$param=array($matruyen, $machuong);
		return $this->loadrow($param);	
	}
	//select 1 danh sách story
	function listchaps($matruyen)
	{
		$this->setquery('select * from '.$this->table. ' where Story_id = ?');
		$param=array($matruyen);
		return $this->loadAllrow($param);
	}
	//thêm 1 chương mới
	function addchap($ten, $alias, $stroy_id, $link_img, $ngaytao, $ordering)
	{
		$sql = 'INSERT INTO `chapters`(`Ten`, `Alias`, `Story_id`, `Link_img`, `Ngay_tao`, `Ordering`) VALUES (?,?,?,?,?,?)';
		$this->setquery($sql);
		$param = array($ten, $alias, $stroy_id, $link_img, $ngaytao, $ordering);
		
		return $this->execute($param);
	}
	
	//sửa 1 chương
	function editchap($ten, $alias, $link_img, $ngaycapnhat, $ordering, $ma, $stroy_id)
	{
		$sql = "UPDATE `chapters` SET `Ten`=?,`Alias`=?,`Link_img`=?,`Ngay_cap_nhat`=?,`Ordering`=? WHERE Ma = ? AND Story_id = ?";
		$param = array($ten, $alias, $link_img, $ngaycapnhat, $ordering, $ma, $stroy_id);
		
		$this->setquery($sql);

		return $this->execute($param);
	}
	//xóa 1 story
	/*function deluser($ma)
	{
		$sql = "UPDATE `user` SET `Trang_thai`= 2 WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($ma));
	}*/
	
	function tongsodong()
	{
		$this->setquery('select count(Ma) tong from '. $this->table);
		return $this->loadrow()->tong;
	}
	
	
	
	///CHƯƠNG TRUYỆN
	
	/*function sochuongtruyen($ma)
	{
		$this->setquery('select count(Ma) tong from '.$this->table.' where Story_id = ?');
		$param = array($ma);
		return $this->loadrow($param)->tong;
	}
	function tenloai($ma)
	{
		$this->setquery('select Ten from category where Ma = ?');
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
		$this->setquery('SELECT * FROM '.$this->table.' WHERE Story_id = ?');
		$param=array($matruyen);
		return $this->loadAllrow($param);	
	}
	function chuong($matruyen, $ordering)
	{
		$this->setquery('SELECT * FROM '.$this->table.' WHERE Story_id = ? AND Ordering = ?');
		$param=array($matruyen, $ordering);
		return $this->loadrow($param);	
	}*/
}
?>