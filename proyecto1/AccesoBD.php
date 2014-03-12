<?php
include("EnvioCorreo.php");//hacemos un includ del archivo enviar correo


date_default_timezone_set("America/Costa_Rica");
$fecha = date("dmY");
$fila = "";
$ruta = 'C:\\xampp\\htdocs\\proyecto1\\' .$fecha.'.csv';//guarda la ruta del archivo csv
echo $ruta;
$numero=0;
if (($Archivo = fopen($ruta,'a+')) !== FALSE) {//guarda la ruta establecida en la variable archivo

$mysqli = new mysqli("localhost", "root", "", "proyecto1") //hace la conexion a la base de datos alambrada
or die('No se pudo conectar: ');

while (($datos = fgetcsv($Archivo, 1000, ",")) !== FALSE) {//recorre el archivo
$numero = count($datos);

foreach ($datos as $row) {// recoorre el archivo guardandolo en la variable fila
    $fila .= "'".$row."'".",";
    echo $fila."\n";
}
$fila = substr($fila, 0, -1);


echo $fila."\n";


// Realizar una consulta MySQL
mysqli_query($mysqli,'INSERT INTO `registro`(`Nombre`, `Apellido` ,`Cedula`, `Telefono`,`Correo`) VALUES ('.$fila.')')
or die('Consulta fallida: '.mysqli_error($mysqli)); 

echo $fila."\n";

// Cerrar la conexión
$fila = "";
}
mysqli_close($mysqli);

$email  = new Correos();//instaciamos la clase
$email->Correoo($fecha, $numero);// a la funcion correoo le mandamos la fecha y el archivo co la cantidad de personas ingresadas
}
?>