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


$module->user = $_POST['username'];

if($module->user==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $user_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}

$stmt = $module->get_modules($module->user);

if ($stmt != []) { 
	http_response_code(200);	
	echo (json_encode($stmt));
}
else {
	http_response_code(201);	
	$responseArray = array('type' => 'danger', 'message' => $no_modules_message, 'code' => '201');
	echo json_encode($responseArray);
}

?>