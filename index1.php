<?php
session_start();
?>
<!doctype html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<title>Google Scholar Bot Çalışması</title>
</head>
<body>
	<button>
		<a href="mailer.php">
			Mail olarak gönder
		</a>
	</button>
	<?php
	$servername = "127.0.0.1";
$database = "g_s_search_bot";
$username = "testforphp@gmail.com";
$password = "622161";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
echo " <br/> <br/> Connected successfully <br/>";
	$mail = $_SESSION["email"];
	echo $mail. "<br/>";
	$anahtarkelime = $_POST["aranan"];
	$bol = explode(" ", $anahtarkelime);
	$aranacaklink = implode("+", $bol);
	$sql = "INSERT INTO keywords (keyword, mail) VALUES ('$anahtarkelime','$mail')";
	if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
	} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	$sess		=	curl_init();
	curl_setopt($sess, CURLOPT_URL, "https://scholar.google.com.tr/scholar?hl=tr&as_sdt=0%2C5&q=". $aranacaklink . "&btnG=");
	curl_setopt($sess, CURLOPT_RETURNTRANSFER, true);
	$veri		=	curl_exec($sess);
	$veri = iconv('ISO-8859-9','UTF-8',$veri);
	curl_close($sess);
	// echo $veri;
	preg_match_all('/<a (.*?)href="(.*?)\"(.*?)\>/', $veri, $alinanveriler);
	$sil=array(""," ");
	$Temiz_Dizi = array_diff($alinanveriler[2], $sil);
	$boyutu=count($Temiz_Dizi);
	for ($i=0; $i <$boyutu ; $i++) { 
		$pdfbul	=	substr($Temiz_Dizi[$i], -4);
		if(($pdfbul == ".pdf")){
			 echo "<br/>" .$Temiz_Dizi[$i] . "<br /> <br />";
	$sql = "INSERT INTO searched_results (result_link, keyword) VALUES ('$Temiz_Dizi[$i]','$anahtarkelime')";
	if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
	} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		}
	}
	mysqli_close($conn);
	?>
</body>
</html>