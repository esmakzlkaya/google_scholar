<?php
require("class.phpmailer.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";

$mail->Username = "testforphp@gmail.com"; // Mail adresi
$mail->Password = "622161"; // Parola
$mail->SetFrom("testforphp@gmail.com", "mesaj başlığı"); // Mail adresi

$mail->AddAddress("esmakzlkaya@gmail.com"); // Gönderilecek kişi

$mail->Subject = "Sideden Gönderildi";
$mail->Body = "$name<br />$email<br />$subject<br />$message";

if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
} else {
                echo "Message has been sent";
}

?>