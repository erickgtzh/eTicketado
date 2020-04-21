<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getProducts()
{
	$sql = "SELECT * FROM product";

	return (sqlSelect($sql));
}


function getTicket($id_product)
{
	$sql = "SELECT id_product, name, price, description, image FROM product WHERE id_product = $id_product ";

	return (sqlSelect($sql));
}

function getTicketByUsername($username)
{
	$sql = "SELECT id_product, name, price, description, image FROM product WHERE id_product = $username ";

	return (sqlSelect($sql));
}


function getBoletoById($sIdBoleto)
{
	//0Codigo, 1Transaccion, 2Fecha, 3Cliente, 4phone_number, 5Email
	$sql = "SELECT boletos.unique_code as Codigo, boletos.transaction_code as Transaccion, boletos.purchase_date as Fecha, clientes.nombre as Cliente, clientes.phone_number as phone_number, clientes.email as Email FROM boletos LEFT JOIN clientes ON boletos.id_client = clientes.id_client WHERE boletos.id_ticket = '" . $sIdBoleto . "'";

	//echo $sql;
	return (sqlSelect($sql));
}

function getAllTickets()
{
	$sql = "SELECT
	sale.purchase_date,
	`user`.`name`,
	sale.unique_code,
	sale.transaction_code,
	`user`.email,
	`user`.phone_number
	FROM
	sale
	INNER JOIN `user` ON sale.id_user = `user`.id_user";

	return (sqlSelect($sql));
}

function sendEmail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $txt_message, $mail_subject, $template, $quantity, $id_sale)
{
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = $mail_username;                   // SMTP username
		$mail->Password   = $mail_userpassword;                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('erickgtzh@gmail.com', 'eTicketado Founder');
		$mail->addAddress($mail_addAddress, '¡Your tickets!');               // Name is optional

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $mail_subject;

		$content = 'Nombre de tu evento: ' . $txt_message[0]['name'] . '<br>Número de Id de tu compra: ' . $txt_message[0]['id_product'] . '<br>Descripción del evento: ' . $txt_message[0]['description'] . '<br>Precio por unidad de boleto para tu evento: $' . $txt_message[0]['price'] . '<br>Agregamos una vista previa de tu evento, haz clic en ella: ' . $txt_message[0]['image'] . '<br>Cantidad de boletos: ' . $quantity . '<br>Id de tu compra: ' . $id_sale;
		// Content Message
		$message = file_get_contents($template);
		$message = str_replace('{{first_name}}', $mail_setFromName, $message);
		$message = str_replace('{{message}}', $content, $message);
		$message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);

		$mail->Subject = $mail_subject;
		$mail->msgHTML($message);
		$mail->send();
		echo '<p style="color:green">¡Tus tickets se han enviado a tu correo electrónico! Por favor revisa tu bandeja de entrada y no los olvides el día del evento.</p>';
	} catch (Exception $e) {
		echo '<p style="color:red">No se pudo enviar el mensaje..';
		echo 'Error de correo: ' . $mail->ErrorInfo . "</p>";
	}
}
