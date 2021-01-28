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

$module->fin_de_carrera = $_POST['fin_de_carrera'];
$module->user = $_POST['username'];
$module->id = $_POST['id'];

if($module->user==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $user_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}

$stmt = $module->change_fin_de_carrera($module->fin_de_carrera, $module->user, $module->id);

if ($stmt==true) { 
	http_response_code(200);	
	echo('1
');
}
else {
	http_response_code(201);			
	echo('0
');
}

?>