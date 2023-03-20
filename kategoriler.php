<?php
if (isset($_GET['d']))
{
$sql_text = " SELECT * FROM kategoriler WHERE k_id=".$_GET['d'];
$sql=mysqli_query($conn,$sql_text);
$sql_data=mysqli_fetch_assoc($sql);
$kadi=$sql_data['k_adi'];
$kdetay=$sql_data['k_detay'];
$kdurum=$sql_data['k_durum'];
}
?>
<body>
<div id="nd-cv">	<!-- Yeni Kategori -->
	<div id="ndc-tcv">
		<div id="ndct-txt">Yeni Kategori</div>
	</div>
	<form method="post" action="islem-<?php echo $islem; ?>.php?i=kategoriler<?php if(isset($_GET['d'])) {echo "&id=".$_GET['d'];} ?>" id="nd-form">
		<div id="ndf-cv">
    		<div id="ndfc-txt">Kategori Adı :</div>
    		<div id="ndfc-txt">Detay :</div>
		</div>
		<div id="ndtb-cv">
			<input <?php if(isset($kadi)) { echo 'value="'.$kadi.'"'; } else { echo""; } ?> type="text" name="k_adi" placeholder="Kategori Adı :" id="ndtb-tb">
			<input <?php if(isset($kdetay)) { echo 'value="'.$kdetay.'"'; } else { echo""; } ?> type="text" name="k_detay" placeholder="Detay :" id="ndtb-tb">
		</div>
		<div id="ndf-cv">
    		<div id="ndfc-txt">Durumu :</div>
		</div>
		<select name="k_durum" placeholder="Durumu :" id="ndtb-cb">
			<option value="Aktif" <?php if(isset($kdurum)){if($kdurum=="Aktif") {echo "selected";}} ?>>Aktif</option>
			<option value="Deaktif" <?php if(isset($kdurum)){if($kdurum=="Deaktif") {echo "selected";}} ?>>Deaktif</option>
		</select>
		<input id="ndbt" value="<?php echo $buton; ?>" type="submit">
	</form>
</div>
<div id="ad-cv">	<!-- Tüm Kategorilar -->
	<div id="adc-tcv">
		<div id="adfc-txt">Tüm Kategoriler</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Kategori Adı</div>
			<div id="adl-itm">Detay</div>
			<div id="adl-itm">Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
$sql_text = " SELECT * FROM kategoriler ";
$sql=mysqli_query($conn,$sql_text);
while($sql_data=mysqli_fetch_assoc($sql))
{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sql_data["k_id"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["k_adi"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["k_detay"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["k_durum"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=kategoriler&d=<?php echo $sql_data['k_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
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
<div id="ad-cv">	<!-- Son Eklenen 5 Kategori -->
	<div id="adc-tcv">
		<div id="adfc-txt">Son Eklenen 5 Kategori</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Kategori Adı</div>
			<div id="adl-itm">Detay</div>
			<div id="adl-itm">Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
	$sqls_text = " SELECT * FROM kategoriler ORDER BY k_id DESC LIMIT 5; ";
	$sqls=mysqli_query($conn,$sqls_text);
	while($sqls_data=mysqli_fetch_assoc($sqls))
	{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sqls_data["k_id"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["k_adi"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["k_detay"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["k_durum"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=kategoriler&d=<?php echo $sqls_data['k_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
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