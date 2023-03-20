<?php
include("./baglanti.php");
session_start();
if(isset($_SESSION['ht_id']))
{
	
}
?>
<html>
<head>
	<title>Logo. | Satış Takibi Giriş Sayfası</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="./img/icons/favicon.ico"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body id="ibody">
    <div id="ib-cv">
		<div id="ibc-logo">
			<img src="./img/logo.png" id="ibc-img">
		</div>
		<div id="ibc-cv">
			<form method="post" action="kontrol.php">
    			<input name="k_adi" type="text" id="ibcc-tb" placeholder="Kullanıcı Adınız :">
        		<input name="k_sifre" type="password" id="ibcc-tb" placeholder="Şifreniz :">
        		<input type="submit" id="ibcc-sb" value="Giriş Yap">
    		</form>
		</div>
	</div>
</html>