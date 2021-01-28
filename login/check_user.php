<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/jason; charset=UTF-8");

include_once '../config/database.php';
include_once '../users/users.php';

$okMessage = 'OK';
$user_empty = 'Introduzca el Usuario';
$password_empty = 'Introduzca la Contraseña';
$user_errorMessage = 'Usuario Incorrecto';
$password_errorMessage = 'Contraseña Incorrecta';

$database = new Database();
$db = $database->getConnection();

$user = new users($db);

$user->usuario = $_POST['username'];
$user->contraseña = $_POST['password'];

if($user->usuario==null){
	http_response_code(201);	
	$responseArray = array('type'=>'warning','message'=>$user_empty,'code'=>'304');
	echo json_encode($responseArray);
	return;
}
else if($user->contraseña==null){	
	http_response_code(202);
	$responseArray = array('type'=>'warning','message'=>$password_empty,'code'=>'304');
	echo json_encode($responseArray);
	return;
}
else {
	$stmt = $user->check_user($user->usuario);
	$exist = $stmt->fetch();

	if ($exist) {    
		$stmt = $user->check_password($user->contraseña);
		$exist = $stmt->fetch();
		if ($exist) {    	
			http_response_code(200);	
			$responseArray = array('type' => 'success', 'message' => $okMessage, 'user' => $user->usuario, 'code' => '200');	
			echo json_encode($responseArray);
			return;
		}
		else {		
			http_response_code(203);	
			$responseArray = array('type' => 'danger', 'message' => $password_errorMessage);
			echo json_encode($responseArray);
			return;
		}
	}
	else {
		http_response_code(205);	
		$responseArray = array('type' => 'danger', 'message' => $user_errorMessage);
		echo json_encode($responseArray);
		return;
	}
}
?>