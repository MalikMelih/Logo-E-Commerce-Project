<?php
$mus=0;
$sat=0;
$urn=0;
if(isset($_GET['id']))
{
	$sql_text = " SELECT * FROM kullanicilar WHERE k_id='".$_GET['id']."'";
	$sql=mysqli_query($conn," SELECT * FROM satislar WHERE sk_id='".$_GET['id']."'");
	while(mysqli_fetch_assoc($sql))
	{
		$sat=$sat+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM musteriler WHERE mk_id='".$_GET['id']."' ");
	while(mysqli_fetch_assoc($sql))
	{
		$mus=$mus+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM urunler WHERE uk_id='".$_GET['id']."'");
	while(mysqli_fetch_assoc($sql))
	{
		$urn=$urn+1;
	}
}
else
{
	$sql_text = " SELECT * FROM kullanicilar WHERE k_klladi='".$_SESSION['k_adi']."' ";
	$sql=mysqli_query($conn," SELECT * FROM satislar WHERE s_kullanici='".$_SESSION['k_adi']."'");
	while(mysqli_fetch_assoc($sql))
	{
		$sat=$sat+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM musteriler WHERE m_kll='".$_SESSION['k_adi']."'");
	while(mysqli_fetch_assoc($sql))
	{
		$mus=$mus+1;
	}
	$sql=mysqli_query($conn," SELECT * FROM urunler WHERE u_kll='".$_SESSION['k_adi']."'");
	while(mysqli_fetch_assoc($sql))
	{
		$urn=$urn+1;
	}
}
	$sql=mysqli_query($conn,$sql_text);
	if($sql_data=mysqli_fetch_assoc($sql))
	 {
?>
<body>
<div id="ecv">
	<div id="ecv-cv">
		<img id="ecvc-img" src="./img/icons/128x128/users.png">
	</div>
	<div id="ecv-tb">
		<div id="ecvt-txt">Kullanıcı ID : #<?php echo $sql_data["k_id"];?></div>
	</div>
</div>
<a href="admin.php?s=satis&kll=<?php echo $sql_data['k_adi']; ?>">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/sales.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Yapılan Satış : <?php echo $sat; ?></div>
		</div>
	</div>
</a>
<a href="admin.php?s=musteriler&kll=<?php echo $sql_data['k_adi']; ?>">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/customers.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Eklenen Müşteri : <?php echo $mus; ?></div>
		</div>
	</div>
</a>
<a href="admin.php?s=urunler&kll=<?php echo $sql_data['k_adi']; ?>">
	<div id="ecv">
		<div id="ecv-cv">
			<img id="ecvc-img" src="./img/icons/128x128/products.png">
		</div>
		<div id="ecv-tb">
			<div id="ecvt-txt">Eklenen Ürün : <?php echo $urn; ?></div>
		</div>
	</div>
</a>
<div id="banner-cv">
	<div id="bc-br">
		<div style="width: 100%;height: 100%;overflow: hidden;display: block;margin: auto;border-top-left-radius: 10px;border-top-right-radius: 10px;background-image: url(./img/usr/banner/<?php echo $sql_data['k_banner']; ?>);background-size: cover;background-position:center center;"></div>
	</div>
	<div style="float: left;width: 100%;height: 65%;">
		<div style="float: left;width: 95%;padding: 0 2.5%;height: 30px;background-color: #80e5ff;">
<div style="font-size: 26px;margin-top: -29px;color: #fff;margin-left: 248px;line-height: 30px;"><?php echo $sql_data["k_adi"]." ".$sql_data["k_soyadi"];?></div><div style="font-size: 14px;font-weight: bold;margin-left: 254px;line-height: 28px;">@<?php echo $sql_data["k_klladi"];?></div>

</div>
		<img style="float: left;margin-left: 80px;border-radius: 999px;width: 180px;border: 8px solid #80e5ff;margin-top: -135px;" src="./img/usr/<?php echo $sql_data['k_resim']; ?>">
		

	</div>
</div>
</body>
<?php
}
?>