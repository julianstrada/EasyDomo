<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/jason; charset=UTF-8");

$okMessage = 'OK';

// gmdate("d/m/y H:i:s", time() - 3*60*60). "<br><br>"; 
$responseArray = (''. gmdate("d", time()) .','. gmdate("m", time()) .','. gmdate("y", time()) .','. gmdate("w", time()) .','. gmdate("H", time() - 3*60*60) .','. gmdate("i", time()) .','. gmdate("s", time()) .'
');

echo($responseArray);

?>