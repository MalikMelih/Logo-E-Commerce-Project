<?php
$kul=0;
$sat=0;
$mus=0;
$urn=0;
	$sql=mysqli_query($conn," SELECT * FROM kullanicilar");
	while($sql_data=mysqli_fetch_assoc($sql))
	{
		$kul=$kul+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM satislar");
	while($sql_data=mysqli_fetch_assoc($sql))
	{
		$sat=$sat+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM musteriler");
	while($sql_data=mysqli_fetch_assoc($sql))
	{
		$mus=$mus+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM urunler");
	while($sql_data=mysqli_fetch_assoc($sql))
	{
		$urn=$urn+1;
	}
?>
<body>
<a href="admin.php?s=kullanicilar">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/users.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Toplam Kullanıcı : <?php echo $kul; ?></div>
		</div>
	</div>
</a>
<a href="admin.php?s=satis">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/sales.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Toplam Satış Miktarı : <?php echo $sat; ?></div>
		</div>
	</div>
</a>
<a href="admin.php?s=musteriler">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/customers.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Toplam Müşteri : <?php echo $mus; ?></div>
		</div>
	</div>
</a>
<a href="admin.php?s=urunler">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/products.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Toplam Ürün Miktarı : <?php echo $urn; ?></div>
		</div>
	</div>
</a>
</body>