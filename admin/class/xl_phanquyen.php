<?php
class xl_phanquyen extends database
{
	function docchucnangtheocha($cha = 0)
	{
		$sql  = 'select * from chuc_nang where trang_thai=1 and ma_cha=?';
		$this->setquery($sql);
		return $this->loadAllrow(array($cha));
	}
	function docnguoidung()
	{
		$sql  = 'select * from user where trang_thai=1';
		$this->setquery($sql);
		return $this->loadAllrow(array());
	}
	
	function doc1nguoidung($ma)
	{
		$sql  = 'select * from user where Ma = ? and trang_thai=1';
		$this->setquery($sql);
		return $this->loadrow(array($ma));
	}
	
	function docadmin()
	{
		$sql  = 'select * from user where trang_thai=3';
		$this->setquery($sql);
		return $this->loadrow(array());
	}
	
	function docquyencuaai($uid) //quyền hiện có của user
	{
		$sql  = 'select * from phan_quyen where trang_thai=1 and ma_nguoi_dung=?';
		$this->setquery($sql);
		return $this->loadAllrow(array($uid));
	}
	function addquyen($chucnang,$user)
	{
		$sql ='insert into phan_quyen(ma_chuc_nang,ma_nguoi_dung,trang_thai) values(?,?,1)';
		$this->setquery($sql);
		return $this->execute(array($chucnang,$user)); 
	}

	function thuhoiquyen($user)
	{
		$sql ='delete from phan_quyen where ma_nguoi_dung=?';
		$this->setquery($sql);
		return $this->execute(array($user)); 
	}
	
	
	function chucnang($mauser, $cha = 0)
	{
		$sql ='select c.* from chuc_nang c join phan_quyen p on c.Ma=p.Ma_chuc_nang where p.Ma_nguoi_dung = ? and c.Ma_cha = ? ORDER by Ma';
		$this->setquery($sql);
		return $this->loadAllrow(array($mauser, $cha)); 
	}
}
?>