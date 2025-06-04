<?php
$name = $_POST['nombre'];
$email = $_POST['mail'];
$subject = $_POST['asunto'];
$contact_message = $_POST['mensaje'];

$header = "From: " . $email . "\r\n";
$header .= "X/mailer: PHP/". phpversion() . "\r\n";
$header .= "Mime-Version: 1.0\r\n";
$header .= "Content-Type: text/plain";

$message = "Este mensaje fue enviado por: " . $contactName . "<br />";
$message .= "Su e-mail es: " . $contactEmail . "<br />";
$message .= "Asunto del mensaje:" . $contactSubject . "<br />";
$message .= "Mensaje " . $contactMessage; . "<br />";
$message .= "Enviado el: " . date('d/m/Y', time());

$para = 'andriusribe29@gmail.com';
$asunto = 'Mensaje de la pagina web';

email($para, $asunto, utf8_decode($message), $header);

header("Location:index.html");
?>