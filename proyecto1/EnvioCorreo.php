<?php
include("DatosBD.php");//includ del archi donde esta la conexion al correo


class Correos
{
	public function Correoo($fecha, $numero)// le pasamos por parametro la fecha y la cantida de personas 
	{
		
		$datos=new DatosBD();//instanciamos la clase
		$DatosJson = $datos->DatosEmail();//asisgnamos los datos del jason 

		require ('class.phpmailer.php');
		require("class.smtp.php");

		$mail = new PHPMailer();
		$mail->IsSMTP();
$mail->SMTPDebug = $DatosJson['smtp_debug']; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = $DatosJson['SMTPAuth']; // authentication enabled
$mail->SMTPSecure = $DatosJson['SMTPSecure'];
$mail->SMTPAuth = $DatosJson['email_name'];//nombre del usuario 
//indico el servidor de Gmail para SMTP
$mail->Host = $DatosJson["email_smtp_host"];
//indico el puerto que usa Gmail
$mail->Port = $DatosJson["email_smtp_port"];
//indico un usuario / clave de un usuario de gmail 
$mail->Username = $DatosJson["email_smtp_user"];
$mail->Password = $DatosJson["email_smtp_pass"];
$mail->From = $DatosJson["email_smtp_user"];
$mail->FromName = $DatosJson['email_from_name'];
$mail->Subject = $DatosJson["email_name"];
$mail->body= "agregado exitosamente!";
$mail->MsgHTML("*Fecha".$fecha."<br>*Cantidad:".$numero);//al mensaje le asignamos la fecha y la cantidad que trajimos por parametro


//indico destinatario
$address = $DatosJson["email_from"];
$mail->AddAddress($address); // Esta es la dirección a donde enviamos
if(!$mail->Send()) {
	echo "Error al enviar: " . $mail->ErrorInfo;
} else {
	echo "Mensaje enviado!";
} 

}
}

?>