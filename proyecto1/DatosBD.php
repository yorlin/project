<?php
		
		class DatosBD
		{
			public function Conexion()
			{
				$str_datos = file_get_contents(('C:\\xampp\\htdocs\\proyecto1\\proyecto.json'));
				$datos = json_decode($str_datos,true);
				$mysqli = new mysqli($datos["database_host"],$datos["database_user"],$datos["database_pass"],$datos["database_name"]);
				return $mysqli;
			}
			public function DatosEmail()
			{
				$str_datos = file_get_contents('C:\xampp\htdocs\proyecto1\proyecto.json');
				$datos = json_decode($str_datos,true);
				return $datos;
			}

		}
		
?>