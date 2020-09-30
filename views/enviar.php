<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['name']) ? $_POST['name'] : 'Não informado';
$numeroCelular = isset($_POST['phone']) ? $_POST['phone'] : 'Não informado';
$data = date('d/m/Y H:i:s');

if($nome && $numeroCelular) {
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'henriqueroldao.contato@gmail.com';
	$mail->Password = 'xxxxxx;
	$mail->Port = 587;
	
	$mail->setFrom('henriqueroldao.contato@gmail.com');
	$mail->addAddress('endereco1@provedor.com.br');
	
	$mail->isHTML(true);
	$mail->Subject = 'Lead da Campanha Google Ads';
	$mail->Body = "Nome: {$nome}<br>
				   Celular: {$numeroCelular}<br>
					Data/hora: {$data}";
	
	if($mail->send()) {
		header('Location: ./obrigado.html');
	} else {
		echo 'Email nao enviado';
	}
} else {
	echo'Email não enviado!!';
}
