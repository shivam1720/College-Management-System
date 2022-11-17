<?php
$to_email = 'patelneel504@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: noreply @ company . com';
ini_set('SMTP','myserver');
ini_set('smtp_port',25);
mail($to_email,$subject,$message,$headers);
?>
