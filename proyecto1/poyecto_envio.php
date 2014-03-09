<?php
include("proyecto_AccesoDatos.php");
include("class.phpmailer.php");

$ejemplo = new Correos();
$ejemplo->envioCorreos();

class Correos
{
	public $estudiante;
	public $test;
	function __construct()
	{
		$this->estudiante = 0;
	}
	
	public function envioCorreos()
	{
		$datos=new AccesoDatos();
		$conexion = $datos->Conexion();
		$DatosJson = $datos->DatosEmail();
		$limit = 0;
		while ($limit < $DatosJson["email_batch_limit"]) 
		{
			$quiz = $this->RecorridoQuiz($conexion);
			if ($this->test == 0) 
			{
				$IdGroup = $quiz["group_id"];
				$idtest = $quiz["id"];
				$curso= $this->RecorridoCurso($conexion,$IdGroup);
				$profesor = $this-> RecorridoProfesor($conexion,$IdGroup);
				$estudiantes = $this->RecorridoEstudiantes($conexion,$IdGroup,$idtest);
				if ($this->estudiante == 0) 
				{
					while ($row=mysqli_fetch_array($estudiantes)) 
					{
						$nombreStudent = $row["first_name"]." ".$row["last_name"];
						echo $nombreStudent;
						$nombreProfesor = $profesor["first_name"]." ".$profesor["last_name"];
						if ($DatosJson["email_smtp_user"]=="") {
							$DatosJson["email_smtp_user"]= $profesor["email"];
						}
						$datos=array($nombreStudent,$quiz["description"],$curso["name"],$quiz["application_date"],$quiz["term_in_minutes"],
						$idtest,$nombreProfesor,$DatosJson["email_from"],$DatosJson["email_from_name"],$DatosJson["email_smtp_host"],
						$DatosJson["email_smtp_port"],$DatosJson["email_smtp_user"],$DatosJson["email_smtp_pass"],$row["email"],$profesor["email"]);
						$this->Correo($datos);
						$query=("INSERT INTO `notification_sent`(`student_id`, `test_id`) VALUES (".$row['id'].",$idtest)");
						$dato = mysqli_query($conexion,$query);
						$limit++;
					}
				}
			}else
			{
				echo "No hay Quiz Pendientes";
				$limit = $DatosJson["email_batch_limit"];

			}
			
		}
		
	}
	private function Correo($pDatos)
	{
		require_once "Mail.php";
		$mailBody = "<html><p>Hola ".$pDatos[0]."</p><br>
		<p>El quiz ".$pDatos[1]."  del curso ".$pDatos[2]." ha sido activado a partir de
		".$pDatos[3]." y por un lapso de ".$pDatos[4]."min.</p><br>
		<a href=”http://localhost/test/".$pDatos[5]."”>Link</a><br>
		<p>".$pDatos[6]."</p></html>";	


		$from = $pDatos[6]." <".$pDatos[7].">";
		$to = $pDatos[0]." <".$pDatos[14].">";
		$subject = "Sistema de quiz UTN";
		$body = $mailBody;

		$host ="ssl://".$pDatos[9];
		$port = $pDatos[10];
		$username = $pDatos[11];
		$password = $pDatos[12];
		$contentType="text/html; charset=iso-8859-1";
		$headers = array ('From' => $from,
			'To' => $to,
			'Subject' => $subject,
			'Content-type' =>$contentType);
		$smtp = Mail::factory('smtp',
			array ('host' => $host,
				'port' => $port,
				'auth' => true,
				'username' => $username,
				'password' => $password));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
			echo("<p>" . $mail->getMessage() . "</p>");
		} else {
			echo("<p>Message successfully sent!</p>");
		}
	}
}

?>