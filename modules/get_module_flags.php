<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/jason; charset=UTF-8");

include_once '../config/database.php';
include_once '../modules/modules.php';

$okMessage = 'OK';
$user_empty = 'Introduzca el Usuario';
$no_modules_message = 'Lista Vacía';

$database = new Database();
$db = $database->getConnection();

$module = new modules($db);


$module->id = $_POST['id'];

$stmt = $module->get_module($module->id);

if ($stmt != []) { 
	http_response_code(200);	

	echo (''. $stmt['flag_update_module'] .','. $stmt['flag_update_hr'] .'
	');

}
else {
	http_response_code(201);	
	$responseArray = array('type' => 'danger', 'message' => $no_modules_message, 'code' => '201');
	echo json_encode($responseArray);
}
?>