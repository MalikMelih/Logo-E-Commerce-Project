<?php
$skll=" ";
if(isset($_GET['kll']))
{
	$skll="WHERE m_kll='".$_GET['kll']."'";
}
if (isset($_GET['d']))
{
$sql_text = " SELECT * FROM musteriler WHERE m_id=".$_GET['d'];
$sql=mysqli_query($conn,$sql_text);
$sql_data=mysqli_fetch_assoc($sql);
$madi=$sql_data['m_adi'];
$msoyad=$sql_data['m_soyadi'];
}
?>
<body>
<div id="nd-cv">	<!-- Yeni Müşteri -->
	<div id="ndc-tcv">
		<div id="ndct-txt">Yeni Müşteri</div>
	</div>
	<form method="post" action="islem-<?php echo $islem; ?>.php?i=musteriler<?php if(isset($_GET['d'])) {echo "&id=".$_GET['d'];} echo "&kll=".$_SESSION['k_adi']; ?>" id="nd-form">
		<div id="ndf-cv">
    		<div id="ndfc-txt">Müşteri Adı :</div>
    		<div id="ndfc-txt">Müşteri Soyadı :</div>
		</div>
		<div id="ndtb-cv">
			<input value="<?php if(isset($madi)) { echo $madi; } else { echo""; } ?>" type="text" name="m_adi" placeholder="Müşteri Adı :" id="ndtb-tb">
			<input value="<?php if(isset($msoyad)) { echo $msoyad; } else { echo""; } ?>" type="text" name="m_soyadi" placeholder="Soyadı :" id="ndtb-tb">
		</div>
		<div id="ndf-cv">
    		<div id="ndfc-txt">Hesap Durumu :</div>
		</div>
		<select name="m_durum" placeholder="Hesap Durumu :" id="ndtb-cb">
			<option value="Aktif" <?php if(isset($sql_data['m_durum'])){if($sql_data['m_durum']=="Aktif") {echo "selected";}} ?>>Aktif</option>
			<option value="Deaktif" <?php if(isset($sql_data['m_durum'])){if($sql_data['m_durum']=="Deaktif") {echo "selected";}} ?>>Deaktif</option>
		</select>
		<input id="ndbt" value="<?php echo $buton; ?>" type="submit">
	</form>
</div>
<div id="ad-cv">	<!-- Tüm Müşteriler -->
	<div id="adc-tcv">
		<div id="adfc-txt">Tüm Müşteriler</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Müşteri Adı</div>
			<div id="adl-itm">Soyadı</div>
			<div id="adl-itm">Hesap Durumu</div>
			<div id="adl-itm">Ekleyen Kullanıcı</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
$sql_text = " SELECT * FROM musteriler ".$skll;
$sql=mysqli_query($conn,$sql_text);
while($sql_data=mysqli_fetch_assoc($sql))
{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sql_data["m_id"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["m_adi"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["m_soyadi"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["m_durum"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["m_kll"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=musteriler&d=<?php echo $sql_data['m_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=musteriler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
<div id="ad-cv">	<!-- Son Eklenen 5 Müşteri -->
	<div id="adc-tcv">
		<div id="adfc-txt">Son Eklenen 5 Müşteri</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Müşteri Adı</div>
			<div id="adl-itm">Soyadı</div>
			<div id="adl-itm">Hesap Durumu</div>
			<div id="adl-itm">Ekleyen Kullanıcı</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
	$sqls_text = " SELECT * FROM musteriler ".$skll." ORDER BY m_id DESC LIMIT 5; ";
	$sqls=mysqli_query($conn,$sqls_text);
	while($sqls_data=mysqli_fetch_assoc($sqls))
	{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sqls_data["m_id"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["m_adi"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["m_soyadi"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["m_durum"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["m_kll"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=musteriler&d=<?php echo $sqls_data['m_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=musteriler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
</div>
</body>