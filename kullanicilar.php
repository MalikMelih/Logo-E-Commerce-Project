<?php
if (isset($_GET['d']))
{
$sql_text = " SELECT * FROM kullanicilar WHERE k_id=".$_GET['d'];
$sql=mysqli_query($conn,$sql_text);
$sql_data=mysqli_fetch_assoc($sql);
$klladi=$sql_data['k_klladi'];
$ksifre=$sql_data['k_sifre'];
$kadi=$sql_data['k_adi'];
$ksoyad=$sql_data['k_soyadi'];
}
?>
<body>
<div id="nd-cv">	<!-- Yeni Kullanıcı -->
	<div id="ndct-txt">
		<div id="ndct-txt">Yeni Kullanıcı</div>
	</div>
	<form method="post" action="islem-<?php echo $islem; ?>.php?i=kullanicilar<?php if(isset($_GET['d'])) {echo "&id=".$_GET['d'];} ?>" id="nd-form">
		<div id="ndf-cv">
    		<div id="ndfc-txt">Kullanıcı Adı :</div>
    		<div id="ndfc-txt">Şifre :</div>
		</div>
		<div id="ndtb-cv">
			<input value="<?php if(isset($klladi)) { echo $klladi; } else { echo""; } ?>" type="text" name="k_klladi" placeholder="Kullanıcı Adı :" id="ndtb-tb">
			<input value="<?php if(isset($ksifre)) { echo $ksifre; } else { echo""; } ?>" type="text" name="k_sifre" placeholder="Şifre :" id="ndtb-tb">
		</div>
		<div id="ndf-cv">
    		<div id="ndfc-txt">Adı :</div>
    		<div id="ndfc-txt">Soyadı :</div>
		</div>
		<div id="ndtb-cv">
		<input value="<?php if(isset($kadi)) { echo $kadi; } else { echo""; } ?>" id="ndtb-tb" name="k_adi" placeholder="Adı :" id="ndtb-tb">
		<input value="<?php if(isset($ksoyad)) { echo $ksoyad; } else { echo""; } ?>" type="text" name="k_soyadi" placeholder="Soyadı :" id="ndtb-tb">
		</div>
		<div id="ndf-cv">
    		<div id="ndfc-txt">Hesap Durumu :</div>
		</div>
		<select name="k_durum" placeholder="Hesap Durumu :" id="ndtb-cb">
			<option value="Aktif" <?php if(isset($sql_data['k_durum'])){if($sql_data['k_durum']=="Aktif") {echo "selected";}} ?>>Aktif</option>
			<option value="Deaktif" <?php if(isset($sql_data['k_durum'])){if($sql_data['k_durum']=="Deaktif") {echo "selected";}} ?>>Deaktif</option>
		</select>
		<input id="ndbt" value="<?php echo $buton; ?>" type="submit">
	</form>
</div>
		<div id="ad-cv">	<!-- Tüm Kullanıcılar -->
	<div id="adc-tcv">
		<div id="adfc-txt">Tüm Kullanıcılar</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-edt">ID</div>
			<div id="adl-itm">Kullanıcı Adı</div>
			<div id="adl-itm">Şifre</div>
			<div id="adl-itm">Adı</div>
			<div id="adl-itm">Soyadı</div>
			<div id="adl-itm">Hesap Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
$sql_text = " SELECT * FROM kullanicilar ";
$sql=mysqli_query($conn,$sql_text);
while($sql_data=mysqli_fetch_assoc($sql))
{
?>
		<a href="admin.php?s=profil&id=<?php echo $sql_data["k_id"];?>">
			<div id="adll-cv">
				<div id="adl-edt">#<?php echo $sql_data["k_id"];?></div>
				<div id="adl-lcv"><?php echo $sql_data["k_klladi"];?></div>
				<div id="adl-lcv"><?php echo $sql_data["k_sifre"];?></div>
				<div id="adl-lcv"><?php echo $sql_data["k_adi"];?></div>
				<div id="adl-lcv"><?php echo $sql_data["k_soyadi"];?></div>
				<div id="adl-lcv"><?php echo $sql_data["k_durum"];?></div>
				<div id="adl-edt">
					<a href="admin.php?s=kullanicilar&d=<?php echo $sql_data['k_id']; ?>">
						<img id="edt-img" src="./img/icons/edit.png">
					</a>
				</div>
			</div>
		</a>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=kategoriler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
<div id="ad-cv">		<!-- Son Eklenen 5 Kullanıcı -->
	<div id="adc-tcv">
		<div id="adfc-txt">Son Eklenen 5 Kullanıcı</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-edt">ID</div>
			<div id="adl-itm">Kullanıcı Adı</div>
			<div id="adl-itm">Şifre</div>
			<div id="adl-itm">Adı</div>
			<div id="adl-itm">Soyadı</div>
			<div id="adl-itm">Hesap Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
	$sqls_text = " SELECT * FROM kullanicilar ORDER BY k_id DESC LIMIT 5; ";
	$sqls=mysqli_query($conn,$sqls_text);
	while($sqls_data=mysqli_fetch_assoc($sqls))
	{
?>
		<a href="admin.php?s=profil&id=<?php echo $sqls_data["k_id"];?>">
			<div id="adll-cv">
				<div id="adl-edt">#<?php echo $sqls_data["k_id"];?></div>
				<div id="adl-lcv"><?php echo $sqls_data["k_klladi"];?></div>
				<div id="adl-lcv"><?php echo $sqls_data["k_sifre"];?></div>
				<div id="adl-lcv"><?php echo $sqls_data["k_adi"];?></div>
				<div id="adl-lcv"><?php echo $sqls_data["k_soyadi"];?></div>
				<div id="adl-lcv"><?php echo $sqls_data["k_durum"];?></div>
				<div id="adl-ledt">
					<a href="admin.php?s=kullanicilar&d=<?php echo $sqls_data['k_id']; ?>">
						<img id="edt-img" src="./img/icons/edit.png">
					</a>
				</div>
			</div>
		</a>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=kategoriler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
</div>
</body>