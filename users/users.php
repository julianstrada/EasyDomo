<?php
class users{
	
	private $conn;
	private $table_name = "clientes";
	
	public $nombre;
	public $apellido;
	public $email;	
	public $usuario;
	public $contraseña;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function check_user($usuario){		
		$query = "SELECT * FROM ". $this->table_name ." WHERE usuario=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute([$usuario]); 
		return $stmt;
	}
	
	function check_password($contraseña){		
		$query = "SELECT * FROM ". $this->table_name ." WHERE contraseña=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute([$contraseña]); 
		return $stmt;
	}
	
	function new_user($nombre, $apellido, $email, $usuario, $contraseña){
		$sql = "INSERT INTO ". $this->table_name ." (nombre, apellido, email, usuario, contraseña)
		VALUES ('". $nombre ."', '". $apellido ."', '". $email ."', '". $usuario ."', '". $contraseña ."')";
				
		return ($this->conn->query($sql));
	}
}
?>