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
	function signup($ten, $email, $ns, $gt, $username, $pass)
	{
		//Xử lý phần trạng thái
		/*$trangthai=0;
		if(isset($trangthai))
			$trangthai=1;*/
		//Xử lý phần avatar
		//$avatar = myupload('../uploads/avatar', $avatar);
		/*if($avatar)
		{
			$avatar = str_replace('../', FONTPAGE, $avatar);	
		}*/
		
			$avatar = FONTPAGE.'images/noimage.png';
		
		
		$sql = 'insert into user(`Avatar`, `Ten`, `Email`, `Ngay_sinh`, `Gioi_tinh`, `User`, `Pass`) value(?,?,?,?,?,?,?)';
		$this->setquery($sql);
		$param = array($avatar, $ten, $email, $ns, $gt, $username, $pass);
		
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
	
	//Đổi mật khẩu (trang client)
	function changepass($ma, $mk)
	{
		$sql = "UPDATE `user` SET `Pass`=? WHERE Ma = ?";
		$this->setquery($sql);
		return $this->execute(array($mk,$ma));
	}
	
	//Đổi thông tin người dùng(trang client)
	function editinfo($avatar, $ten, $ns, $gt, $sdt, $ma)
	{
		//Xử lý phần avatar
		if(isset($avatar))
		{
			$avatar = myupload('images', $avatar);
		}
		
		/*if((isset($pass) && $pass ) && $avatar)
		{
			$avatar = str_replace('../', FONTPAGE, $avatar);
			$sql = "UPDATE `user` SET `Avatar`=?,`Ten`=?,`Email`=?,`SDT`=?,`Pass`=?,`Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $pass, $trangthai, $ma);
		}*/
		/*if(isset($pass) && $pass)
		{
			$sql = "UPDATE `user` SET `Avatar`=?, `Ten`=?,`Email`=?,`SDT`=?,`Pass`=?, `Trang_thai`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $email, $sdt, $pass, $trangthai, $ma);	
		}*/
		if(isset($avatar) && $avatar)
		{
			$avatar = str_replace('images', FONTPAGE.'images', $avatar);
			$sql = "UPDATE `user` SET `Avatar`=?,`Ten`=?,`Ngay_sinh`=?,`Gioi_tinh`=?,`SDT`=? WHERE Ma = ?";
			$param = array($avatar, $ten, $ns, $gt, $sdt, $ma);
		}
		/*else if(isset($avatar) && $avatar)
		{
			$sql = "UPDATE `user` SET `Avatar`=? WHERE Ma = ?";
			$param = array($avatar, $ma);
		}*/
		else
		{
			$sql = "UPDATE `user` SET `Ten`=?,`Ngay_sinh`=?,`Gioi_tinh`=?,`SDT`=? WHERE Ma = ?";
			$param = array($ten, $ns, $gt, $sdt, $ma);
		}	
		
		
		$this->setquery($sql);

		return $this->execute($param);
	}
	function recoverypass($pass, $mail)
	{
		$sql = "UPDATE `user` SET `Pass`=? WHERE Email = ?";
		$param = array($pass, $mail);
		
		$this->setquery($sql);

		return $this->execute($param);
	}
	
	function checkname($username)
	{
		$this->setquery('select * from '. $this->table.' where User = ?');
		$param=array($username);
		return $this->loadrow($param);	
	}
	
	function checkemail($mail)
	{
		$this->setquery('select * from '. $this->table.' where Email = ?');
		$param=array($mail);
		return $this->loadrow($param);	
	}
	
	function checkmk($ma)
	{
		$this->setquery('select * from '. $this->table.' where Ma = ?');
		$param=array($ma);
		return $this->loadrow($param);	
	}
}
?>