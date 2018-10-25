<?php
class database
{
	var $pdo, $sql, $statement;
	function __construct()
	{
		try{
			$opt = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
			$this->pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS,$opt);
			$this->pdo->query('set names utf8');	
		}catch(PDOException $e)
		{
			exit('Server error: ' . $e->getMessage());	
		}
	}
	function setquery($sql)
	{
		$this->sql = $sql;	
	}
	function loadrow($param = array())
	{
		$this->statement = $this->pdo->prepare($this->sql);
		$this->statement->execute($param);
		return $this->statement->fetch(PDO::FETCH_OBJ);	
	}
	function loadAllrow($param)
	{
		$this->statement = $this->pdo->prepare($this->sql);
		$this->statement->execute($param);
		return $this->statement->fetchAll(PDO::FETCH_OBJ);	
	}
	function execute($param = array())
	{
		$this->statement = $this->pdo->prepare($this->sql);
		return $this->statement->execute($param);
		
	}
	
	
	
}
?>