<?php
class modules{
	
	private $conn;
	private $table_name = "list";
	
	public $id;
	public $user;
	public $module_name;	
	public $description;
	public $porcentaje;
	public $state;
	public $hr_encendido;
	public $min_encendido;
	public $hr_apagado;
	public $min_apagado;
	public $flag_update_module;
	public $flag_update_hr;
	public $fin_de_carrera;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function get_modules($user){		
		$query = "SELECT * FROM ". $this->table_name ." WHERE user=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute([$user]); 				
		$json_array = array();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$json_array[] = $row;
		}
		//$json_array += array('count' => $count);
		return ($json_array);
	}

	function get_module($id){			
		$query = "SELECT * FROM ". $this->table_name ." WHERE id=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute([$id]); 			

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//$json_array += array('count' => $count);
		return ($row);
	}
		
	function change_state($state, $user, $id){		
		$query = "UPDATE ". $this->table_name ." SET state=? WHERE user=? and id=?";
		$stmt = $this->conn->prepare($query);		
		
		$success = $stmt->execute(array($state, $user, $id));
		return ($success);
	}

	function change_fin_de_carrera($fin_de_carrera, $user, $id){		
		$query = "UPDATE ". $this->table_name ." SET fin_de_carrera=? WHERE user=? and id=?";
		$stmt = $this->conn->prepare($query);		
		
		$success = $stmt->execute(array($fin_de_carrera, $user, $id));
		return ($success);
	}
	
	function get_state($user, $id){		
		$query = "SELECT * FROM ". $this->table_name ." WHERE user=? and id=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute(array($user, $id));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return ($row);
	}	
	
	function get_all_states($user){		
		$query = "SELECT id, porcentaje, fin_de_carrera, state FROM ". $this->table_name ." WHERE user=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute([$user]); 				
		$json_array = array();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$json_array[] = $row;
		}
		return ($json_array);
	}
	
	function get_id($user, $module_name){		
		$query = "SELECT id FROM ". $this->table_name ." WHERE user=? and module_name=?";
		$stmt = $this->conn->prepare($query);		
		
		$stmt->execute(array($user, $module_name));		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return ($row);
	}

	function change_porcentaje($porcentaje, $user, $id){		
		$query = "UPDATE ". $this->table_name ." SET porcentaje=? WHERE user=? and id=?";
		$stmt = $this->conn->prepare($query);		
		
		$success = $stmt->execute(array($porcentaje, $user, $id));
		return ($success);
	}

	function new_module($user, $module_name, $description){
		$query = "INSERT INTO `list` (`id`, `user`, `module_name`, `description`, `porcentaje`, `state`, `hr_encendido`, `min_encendido`, `hr_apagado`, `min_apagado`, `flag_update_module`, `flag_update_hr`) 
		VALUES (NULL, '". $user ."', '". $module_name ."', '". $description ."', '100', '0', '25', '0', '25', '0', '0', '0')";
		
		$stmt = $this->conn->prepare($query);	

		$success = $stmt->execute();
		return ($success);
	}

	function update_module_data($id, $user, $module_name, $description){
		$query = "UPDATE ". $this->table_name ." SET module_name=?, description=? WHERE user=? and id=?";

		$stmt = $this->conn->prepare($query);		
		
		$success = $stmt->execute(array($module_name, $description, $user, $id));
		return ($success);
	}

	function update_module_data_fromindex($id, $user, $module_name, $description, $hr_encendido, $min_encendido, $hr_apagado, $min_apagado){
		$query = "UPDATE ". $this->table_name ." SET module_name=?, description=?, hr_encendido=?, min_encendido=?, hr_apagado=?, min_apagado=? WHERE user=? and id=?";

		$stmt = $this->conn->prepare($query);		
		
		$success = $stmt->execute(array($module_name, $description, $hr_encendido, $min_encendido, $hr_apagado, $min_apagado, $user, $id));
		return ($success);
	}

	function set_flags($id){
		$query = "UPDATE ". $this->table_name ." SET flag_update_module=?, flag_update_hr=? WHERE id=?";

		$stmt = $this->conn->prepare($query);

		$success = $stmt->execute(array('1', '1', $id));
		return ($success);
	}

	function reset_flags($id){
		$query = "UPDATE ". $this->table_name ." SET flag_update_module=?, flag_update_hr=? WHERE id=?";

		$stmt = $this->conn->prepare($query);

		$success = $stmt->execute(array('0', '0', $id));
		return ($success);
	}
}
?>