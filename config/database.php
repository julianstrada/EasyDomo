<?php
class Database{
	
	//credentials
	private $host = "localhost";
	private $db_name = "id9725272_easydomo_modules";
	private $username = "id9725272_easydomo";
	private $password = "2019easydomo";
	public $conn;
	
	public function getConnection(){
		
		$this->conn = null;
		
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->exec("set names utf8");
		}
		catch(PDOException $exception)
		{
			echo "Connection Error: ".$exception->getMessage();
		}
		return $this->conn;
	}
}
?>