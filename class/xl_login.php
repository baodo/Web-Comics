<?php
class xl_login extends database
{
	var $table = 'user';
	//đăng nhập
	function login($email,$pas)
	{
		$this->setquery('select * from '.$this->table.' where Email = ? and Pass=?');
		return $this->loadrow(array($email,$pas));
	}
	
}
?>