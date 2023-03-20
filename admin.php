<?php
include("baglanti.php");
session_start();
if(isset($_SESSION['k_adi'])){}else{header('location:index.php');}
if(isset($_GET['s']))
{
	$sayfa=$_GET['s'];
}
else
{
	$sayfa="ev";
}
if (isset($_GET['d']))
{
	$islem="guncel";
	$buton="Kayıt Güncelle";
}
else
{
	$islem="kayit";
	$buton="Yeni Kayıt";
}
$sql=mysqli_query($conn," SELECT * FROM kullanicilar WHERE k_klladi='".$_SESSION['k_adi']."'");
$data=mysqli_fetch_assoc($sql);
$kresim=$data['k_resim'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logo. | Satış Takibi Yönetim Sayfası</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="./img/icons/favicon.ico"/>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body id="abody">
	<div id="atb">
		<a href="admin.php">
			<div id="atb-logo">
				<img id="atb-img" src="./img/logo.png">
			</div>
		</a>

		<div id="atb-pr">
			<a href="admin.php?s=profil">
				<div id="atbp-cv">
					<img id="atbp-img" src="./img/usr/<?php echo $kresim; ?>">
				</div>
			</a>
			<a href="logout.php">
				<div id="atbp-log"></div>
			</a>
			<a href="admin.php?s=profil">
				<div id="atbp-set"></div>
			</a>
		</div>
		
	</div>
	<div id="alb">
		
	<a href="admin.php?s=kullanicilar">
		<div id="alb-cv">
			<img id="alb-img" src="./img/icons/users.png">
			<div id="alb-txt">Kullanıcılar</div>
		</div>
	</a>

	<a href="admin.php?s=musteriler">
		<div id="alb-cv">
			<img id="alb-img" src="./img/icons/customers.png">
			<div id="alb-txt">Müşteriler</div>
		</div>
	</a>

	<a href="admin.php?s=kategoriler">
		<div id="alb-cv">
			<img id="alb-img" src="./img/icons/category.png">
			<div id="alb-txt">Kategoriler</div>
		</div>
	</a>

	<a href="admin.php?s=urunler">
		<div id="alb-cv">
			<img id="alb-img" src="./img/icons/products.png">
			<div id="alb-txt">Ürünler</div>
		</div>
	</a>

	<a href="admin.php?s=satis">
		<div id="alb-cv">
			<img id="alb-img" src="./img/icons/sales.png">
			<div id="alb-txt">Satış İşlemleri</div>
		</div>
	</a>
	</div>
	<div id="ab-include">
		
		<?php if($sayfa!="Sayfalar") {include( $sayfa.".php");}?>

	</div>
</body>
</html>