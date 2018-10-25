<?php
class xl_comments extends database
{
	var $table = 'binh_luan';
	
	//select 1 bình luận
	function comment($ma)
	{
		$this->setquery('select * from '. $this->table.' where Ma = ?');
		$param=array($ma);
		return $this->loadrow($param);	
	}
	//select 1 danh sách bình luận
	function listcomments($vitri = 0, $soluong = 0)
	{
		$limit = '';
		if($soluong > 0)
		{
			$limit = " limit $vitri, $soluong";	
		}
		$this->setquery('select * from '.$this->table. ' order by Duyet' .$limit);
		$param=array();
		return $this->loadAllrow($param);
	}
	
	//select các bình luận của người dùng
	function commentsuser($mauser, $vitri = 0, $soluong = 0)
	{
		$limit = '';
		if($soluong > 0)
		{
			$limit = " limit $vitri, $soluong";	
		}
		$this->setquery('select * from '.$this->table. ' where Ma_user = ?' . $limit);
		$param=array($mauser);
		return $this->loadAllrow($param);
	}
	//select các bình luận của 1 bộ truyện
	function commentstory($matruyen, $vitri = 0, $soluong = 0)
	{
		$limit = '';
		if($soluong > 0)
		{
			$limit = " limit $vitri, $soluong";	
		}
		$this->setquery('select * from '.$this->table. ' where  Story_id = ? ' . $limit);
		$param=array($matruyen);
		return $this->loadAllrow($param);
	}
	
	//thêm 1 bình luận mới
	function postcomment($noidung, $mauser, $username, $matruyen , $trangthai)
	{
		$sql = 'INSERT INTO `binh_luan`(`Noi_dung`, `Ma_user`, `Ten_user`, `Story_id`, `Duyet`) VALUES (?,?,?,?,?)';
		$this->setquery($sql);
		$param = array($noidung, $mauser, $username, $matruyen , $trangthai);
		
		return $this->execute($param);
	}
	
	//xóa 1 bình luận
	function delcmt($ma)
	{
		$sql = "DELETE FROM `binh_luan` WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($ma));
	}
	
	function tongsodong()
	{
		$this->setquery('select count(Ma) tong from '. $this->table);
		return $this->loadrow()->tong;
	}
	
}
?>