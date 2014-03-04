<?php

date_default_timezone_set("America/Costa_Rica");
$fecha = date("dmY");
$fila = "";
$ruta = 'C:\\xampp\\htdocs\\proyecto1\\' .$fecha.'.csv';
echo $ruta;

if (($Archivo = fopen($ruta,'a+')) !== FALSE) {

    $mysqli = new mysqli("localhost", "root", "", "proyecto1") 
    or die('No se pudo conectar: ');

while (($datos = fgetcsv($Archivo, 1000, ",")) !== FALSE) {
 $numero = count($datos);
    //echo "Fila $fila: \n";
    //$fila++;
    foreach ($datos as $row) {
        $fila .= "'".$row."'".",";
        echo $fila."\n";
    }
    $fila = substr($fila, 0, -1);


    echo $fila."\n";
    
    //mysql_select_db('proyecto1') or die('No se pudo seleccionar la base de datos');

    // Realizar una consulta MySQL
    mysqli_query($mysqli,'INSERT INTO `registro`(`Nombre`, `Apellido` ,`Cedula`, `Telefono`,`Correo`) VALUES ('.$fila.')')
     or die('Consulta fallida: '.mysqli_error($mysqli));
    
    echo $fila."\n";
    
    // Cerrar la conexión
    //echo $centencia;
    $fila = "";
}
mysqli_close($mysqli);
}
?>