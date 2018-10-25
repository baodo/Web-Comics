<?php
class xl_category extends database
{
	var $table = 'category';
	
	//select 1 story
	function loai($maloai)
	{
		$this->setquery('select * from '. $this->table.' where Ma = ?');
		$param=array($maloai);
		return $this->loadrow($param);	
	}
	//select 1 danh sách story
	function listloai()
	{
		$this->setquery('select * from '.$this->table);
		$param=array();
		return $this->loadAllrow($param);
	}
	//thêm 1 chương mới
	/*function addchap($ten, $alias, $stroy_id, $link_img, $ngaytao, $ordering)
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
	}*/
	//xóa 1 story
	/*function deluser($ma)
	{
		$sql = "UPDATE `user` SET `Trang_thai`= 2 WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($ma));
	}*/
	
	/*function tongsodong()
	{
		$this->setquery('select count(Ma) tong from '. $this->table);
		return $this->loadrow()->tong;
	}*/
}
?>