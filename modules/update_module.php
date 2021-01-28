<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/jason; charset=UTF-8");

include_once '../config/database.php';
include_once '../modules/modules.php';

$okMessage = 'OK';
$user_empty = 'Introduzca el Usuario';
$not_crated = 'Error al generar';

$database = new Database();
$db = $database->getConnection();

$module = new modules($db);


$module->id = $_POST['id'];
$module->user = $_POST['username'];
$module->module_name = $_POST['module_name'];
$module->description = $_POST['module_type'];
$module->hr_encendido = $_POST['hr_encendido'];
$module->min_encendido = $_POST['min_encendido'];
$module->hr_apagado = $_POST['hr_apagado'];
$module->min_apagado = $_POST['min_apagado'];

if($module->user==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $user_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}

if($module->id=='0')				//new_module
{
	$stmt = $module->new_module($module->user, $module->module_name, $module->description);

	if ($stmt == true) { 
		$stmt = $module->get_id($module->user, $module->module_name);

		if ($stmt != []) {
			http_response_code(200);
			$responseArray = (''. $stmt["id"] .'
		');	
			echo($responseArray);
		}
	}
	else {
		http_response_code(201);	
		$responseArray = array('type' => 'danger', 'message' => $not_crated, 'code' => '201');
		echo json_encode($responseArray);
	}
}
else{
	$stmt = $module->update_module_data($module->id, $module->user, $module->module_name, $module->description);

	if ($stmt == true) { 
		$stmt = $module->get_id($module->user, $module->module_name);

		if ($stmt != []) {
			http_response_code(200);
			$responseArray = (''. $stmt["id"] .'
		');	
			echo($responseArray);
		}
	}
	else {
		http_response_code(201);	
		$responseArray = array('type' => 'danger', 'message' => $not_crated, 'code' => '201');
		echo json_encode($responseArray);
	}
}
?>