<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<title>Google Scholar Bot Çalışması</title>
	<style type="text/css">
		body> .toplam>.resim1{
			position: fixed;
			top: 100px;
			left: 35%;
		}
		body> .toplam>.textalani{
			position: fixed;
			border-color: black;
			top: 200px;
			left: 35%;
			height: 20px;
		}
		button.ara{
			size:8;
			margin: 0;
			border-color: black;
			background-color:  #4D90FE;
			color: white;
		}
		body > .toplam> .profil{
			position: fixed;
			right: 5%;
			color:  #4D90FE;
		}
	</style>
</head>
<body>
	<div class="toplam">
		<div class="profil">
			<?php
	$mail=$_POST["e-mail"];
	
	if(($mail!="")){
		$_SESSION["mail"]=$mail;
		echo "" . $mail . "<br />";
	}
	else{
		echo "Boş alan bırakmayınız.<br />";
		echo "<button><a href='index_sess.php'>Geri dön</a></button>";
	}
?>
		</div>
		<div class="resim1">
		<img src="scholar_logo_64dp.png">
		</div>
		<div class="textalani">
			<form action="index1.php" method="post">
				<input type="text" name="aranan" size="40" maxlength="2048" >
				<button type="submit" name="btnara" aria-label="Ara" class="ara">Ara</button>	
			</form>
		</div>
	</div>
	<?php
	$_SESSION["email"]	= $mail;
	?>
</body>
<script type="text/javascript">
	
</script>
</html>