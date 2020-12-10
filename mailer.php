<?php
session_start();
$e_mail = $_SESSION["email"];
$mailBaslik = "Günlük kişisel arama sonuçlarınız : ";
$mailicerik = array();
for ($i=0; $i <15 ; $i++) { 

	if(isset($_COOKIE["link".$i])){

	$mailicerik[$i] = " Günlük arama sonuçlarınız : " . $_COOKIE["link".$i] . "<br />";
	}
}
$mailicerikkk = implode("<br />", $mailicerik);/// düz metin oldu linklerr

require("class.phpmailer.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
$mail->Host = "smtp.gmail.com"; // Mail sunucusuna ismi
$mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "testforphpesma@gmail.com"; // Mail adresimizin kullanicı adi
$mail->Password = "622161tp"; // Mail adresimizin sifresi
$mail->SetFrom("testforphpesma@gmail.com", "esma test"); // Mail attigimizda gorulecek ismimiz
$mail->AddAddress($e_mail); // Maili gonderecegimiz kisi yani alici
$mail->Subject = $mailBaslik; // Konu basligi
$mail->Body = $mailicerikkk; // Mailin icerigi
if(!$mail->Send()){
    echo "Mailer Error: ".$mail->ErrorInfo;
} else {
    echo "Mesaj gonderildi";
}
?>