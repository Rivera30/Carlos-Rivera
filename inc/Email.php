<?php

// Replace this with your own email address
$siteOwnersEmail = 'andriusribe29@gmail.com';


if($_POST) {

   $name = trim(stripslashes($_POST['nombre']));
   $email = trim(stripslashes($_POST['mail']));
   $subject = trim(stripslashes($_POST['asunto']));
   $contact_message = trim(stripslashes($_POST['mensaje']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Por favor, escriba su nombre.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Por favor, introduce una dirección de correo electrónico válida.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Por favor ingrese su mensaje. Debe tener al menos 15 caracteres.";
	}
   // Subject
	if ($subject == '') { $subject = "Envío del formulario"; }


   // Set Message
   $message = "Este mensaje fue enviado por: " . $contactName . "<br />";
   $message .= "Su e-mail es: " . $contactEmail . "<br />";
   $message .= "Asunto del mensaje:" . $contactSubject . "<br />";
   $message .= "Mensaje " . $contactMessage; . "<br />";
   $message .= "Enviado el: " . date('d/m/Y', time());

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $email = email($siteOwnersEmail, $subject, $message, $headers);

		if ($email) { echo "OK"; }
      else { echo "Algo salió mal. Inténtalo de nuevo."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>