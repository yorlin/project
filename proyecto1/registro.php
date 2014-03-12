<?php

date_default_timezone_set("America/Costa_Rica");
$fecha = date("dmY");

    // se traen los datos del html
	$name = $_POST["firstname"];
	$lastName = $_POST["lastName"];
	$number = $_POST["number"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];

	$ruta = 'C:\xampp\htdocs\proyecto1/'.$fecha.'.csv';   // se guardo la ruta  donde se va a ir creando el archivo csv

	$lista = array (   // se crean las lineas que van a tener el csv
		array($name, $lastName, $number, $email,$phone)
		);

	$fp = fopen($ruta,'a+');   // se  abre el archivo existente y se no existe se crea uno 

	foreach ($lista as $campos) {   //  a la lista le vamos agragando los datos vinientes
		fputcsv($fp, $campos);

	}

	echo "<h1>------ud ha sido registrado existosamente gracias!!!------</h1>";
	fclose($fp);


?>