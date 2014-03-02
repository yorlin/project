<?php

date_default_timezone_set("America/Costa_Rica");
$fecha = date("dmY");
$fila = "";
$ruta = 'C:\\xampp\\htdocs\\proyecto1\\' .$fecha.'.csv';
echo $ruta;

if (($Archivo = fopen($ruta,'a+')) !== FALSE) {

    while (($datos = fgetcsv($Archivo, 1000, ",")) !== FALSE) {
	 $numero = count($datos);
        //echo "Fila $fila: \n";
        //$fila++;
        foreach ($datos as $row) {
            $fila .= "'".$row."'".",";

        }
        $fila = substr($fila, 0, -1);


    $mysqli = mysqli_connect("localhost", "root", "", "proyecto1")
        or die('No se pudo conectar: ' . mysql_error());
        //mysql_select_db('proyecto1') or die('No se pudo seleccionar la base de datos');

        // Realizar una consulta MySQL
        echo $celdas."\n";
        echo $fila."\n";
        $centencia = 'INSERT INTO registro (Nombre, Apellido) VALUES ('.$fila.');';
        echo $centencia."\n";

        $result = mysqli_query( $mysqli,$centencia) or die('Consulta fallida: ' .mysql_error());
        // Cerrar la conexión
        mysql_close($conect);
        //echo $centencia;
        $fila = "";

}

fclose ($Archivo);
}
?>