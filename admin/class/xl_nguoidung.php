<?php
class xl_nguoidung extends database
{
	var $table = 'user';
	
	//select 1 user
	function user($ma)
	{
		$this->setquery('select * from '. $this->table.' where Ma = ?');
		$param=array($ma);
		return $this->loadrow($param);	
	}
	//select 1 danh sách user
	function listuser($vitri = 0, $soluong = 0)
	{
		$limit = '';
		if($soluong > 0)
		{
			$limit = " limit $vitri, $soluong";	
		}
		$this->setquery('select * from '.$this->table. ' where Trang_thai != 2 ' . $limit);
		$param=array();
		return $this->loadAllrow($param);
	}
	//thêm 1 user mới
	function adduser($avatar, $ten, $email, $sdt, $username, $pass, $trangthai)
	{
		//Xử lý phần trạng thái
		$trangthai=0;
		if(isset($trangthai))
			$trangthai=1;
		//Xử lý phần avatar
		//$avatar = myupload('../uploads/avatar', $avatar);
		/*if($avatar)
		{
			$avatar = str_replace('../', FONTPAGE, $avatar);	
		}*/
		if(!$avatar)
		{
			$avatar = FONTPAGE.'uploads/avatar/noimage.png';
		}
		
		$sql = 'insert into user(`Avatar`, `Ten`, `Email`, `SDT`, `User`, `Pass`, `Trang_thai`) value(?,?,?,?,?,?,?)';
		$this->setquery($sql);
		$param = array($avatar, $ten, $email, $sdt, $username, $pass, $trangthai);
		
		return $this->execute($param);
		
	}
	//đăng nhập
	function login($user,$pas)
	{
		$this->setquery('select * from '.$this->table.' where User = ? and Pass=?');
		return $this->loadrow(array($user,$pas));
	}
	//sửa 1 user
	function edituser($avatar, $ten, $email, $sdt, $pass, $trangthai, $ma)
	{
		
		//Xử lý phần avatar và mật khẩu
		/*if(isset($avatar))
		{
			$avatar = myupload('../uploads/avatar', $avatar);
		}*/
		
		/*if((isset($pass) && $pass ) && $avatar)
		{
			$avatar = str_replace('../', FONTPAGE, $avatar);
			$sql = "UPDATE `user` SET `Avatar`=?,`Ten`=?,`Email`=?,`SDT`=?,`Pass`=?,`Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $pass, $trangthai, $ma);
		}*/
		if(isset($pass) && $pass)
		{
			$sql = "UPDATE `user` SET `Avatar`=?, `Ten`=?,`Email`=?,`SDT`=?,`Pass`=?, `Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $pass, $trangthai, $ma);	
		}
		/*else if(isset($avatar) && $avatar)
		{
			//$avatar = str_replace('../', FONTPAGE, $avatar);
			$sql = "UPDATE `user` SET `Avatar`=?,`Ten`=?,`Email`=?,`SDT`=?,`Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $trangthai, $ma);
		}*/
		/*else if(isset($avatar) && $avatar)
		{
			$sql = "UPDATE `user` SET `Avatar`=? WHERE Ma = ?";
			$param = array($avatar, $ma);
		}*/
		else
		{
			$sql = "UPDATE `user` SET `Avatar`=?, `Ten`=?,`Email`=?,`SDT`=?, `Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $trangthai, $ma);
		}	
		
		
		$this->setquery($sql);

		return $this->execute($param);
	}
	//xóa 1 user
	function deluser($ma)
	{
		$sql = "UPDATE `user` SET `Trang_thai`= 2 WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($ma));
	}
	
	function tongsodong()
	{
		$this->setquery('select count(Ma) tong from '. $this->table. ' where Trang_thai != 2');
		return $this->loadrow()->tong;
	}
	
}
?>