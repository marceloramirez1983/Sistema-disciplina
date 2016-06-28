<?php

$to='ramirezmarcelo257@gmail.com';
$subject='Testing sendmail.exe';
$message='Prueba de mensaje';
$headers = 'From: ramirezmarcelo257@gmail.com' . "\r\n" .
    'Reply-To: ramirezmarcelo257@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to,$subject,$message,$headers)){
  echo "Email enviado";
}else{
  echo "Email fallado";
}
 ?>
