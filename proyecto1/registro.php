<?php


$fechados=date_default_timezone_set("America/Costa_Rica");
$fechauno = date("d/m/Y");
$fecha=$fechados.$fechauno;
$name = $_POST["firstname"];
$lastName = $_POST["lastName"];
$number = $_POST["number"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$fecha=str_replace("/", "-", $fecha);
$ruta = 'C:\xampp\htdocs\proyecto1/'.$fecha.'.csv';

$lista = array (
	array($name, $lastName, $number, $email,$phone)
	);

$fp = fopen($ruta,'a+');

foreach ($lista as $campos) {
	fputcsv($fp, $campos);

}

echo "<h1>------ud ha sido registrado existosamente gracias!!!------</h1>";
fclose($fp);
?>