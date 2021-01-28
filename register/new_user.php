<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/jason; charset=UTF-8");

include_once '../config/database.php';
include_once '../users/users.php';

$okMessage = 'OK';
$firstname_empty = 'Introduzca su Nombre';
$lasttname_empty = 'Introduzca su Apellido';
$email_empty = 'Introduzca su Email';
$user_empty = 'Introduzca el Usuario';
$password_empty = 'Introduzca la Contraseña';
$database_error = 'Error al Crear Cuenta';

$user_errorMessage = 'El Usuario ya Existe';
$password_errorMessage = 'Contraseña Incorrecta';

$database = new Database();
$db = $database->getConnection();

$user = new users($db);


$user->nombre = $_POST['first_name'];
$user->apellido = $_POST['last_name'];
$user->email = $_POST['email'];
$user->usuario = $_POST['username'];
$user->contraseña = $_POST['password'];

if($user->nombre==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $firstname_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}
if($user->apellido==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $lasttname_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}
if($user->email==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $email_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}
if($user->usuario==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $user_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}
if($user->contraseña==null)
{
	http_response_code(201);	
	$responseArray = array('type' => 'warning', 'message' => $password_empty, 'code' => '304');
	echo json_encode($responseArray);
	return;
}

$stmt = $user->check_user($user->usuario);
$exist = $stmt->fetch();

if ($exist) {        	
		http_response_code(201);	
		$responseArray = array('type' => 'warning', 'message' => $user_errorMessage, 'code' => '201');	
		echo json_encode($responseArray);
}
else {
	
	$stmt = $user->new_user($user->nombre, $user->apellido, $user->email, $user->usuario, $user->contraseña);
	if($stmt)
	{
		http_response_code(200);	
		$responseArray = array('type' => 'success', 'message' => $okMessage, 'code' => '200');
		echo json_encode($responseArray);
	}
	else 
	{
		http_response_code(201);	
		$responseArray = array('type' => 'danger', 'message' => $database_error, 'code' => '201');
		echo json_encode($responseArray);		
	}
}

?>