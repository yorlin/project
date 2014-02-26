<?php
$fecha = date("d/m/Y");
$name = $_POST["firstname"];
$lastName = $_POST["lastName"];
$number = $_POST["number"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$fecha=str_replace("/", "-", $fecha);
$ruta = 'C:/xampp/htdocs/'.$fecha.'.csv';

$lista = array (
	array($name, $lastName, $number, $email,$phone)
	);

$fp = fopen($ruta,'a+');

foreach ($lista as $campos) {
	fputcsv($fp, $campos);
}

fclose($fp);
?>