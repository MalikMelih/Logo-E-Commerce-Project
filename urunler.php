<?php
$skll=" ";
if(isset($_GET['kll']))
{
	$skll="WHERE u_kll='".$_GET['kll']."'";
}
if (isset($_GET['d']))
{
$sql=mysqli_query($conn," SELECT * FROM urunler WHERE u_id=".$_GET['d']);
$sql_data=mysqli_fetch_assoc($sql);
$uadi=$sql_data['u_adi'];
$udetay=$sql_data['u_detay'];
$udurum=$sql_data['u_durum'];
$ukat=$sql_data['u_kategori'];
}
?>
<body>
<div id="nd-cv">	<!-- Yeni Ürün -->
	<div id="ndc-tcv">
		<div id="ndct-txt">Yeni Ürün</div>
	</div>
	<form method="post" action="islem-<?php echo $islem; ?>.php?i=urunler<?php if(isset($_GET['d'])) {echo "&id=".$_GET['d'];} ?>" id="nd-form">
		<div id="ndf-cv">
    		<div id="ndfc-txt">Ürün Adı :</div>
    		<div id="ndfc-txt">Detay :</div>
		</div>
		<div id="ndtb-cv">
			<input <?php if(isset($uadi)) { echo 'value="'.$uadi.'"'; } else { echo""; } ?> type="text" name="u_adi" placeholder="Ürün Adı :" id="ndtb-tb">
			<input <?php if(isset($udetay)) { echo 'value="'.$udetay.'"'; } else { echo""; } ?> type="text" name="u_detay" placeholder="Detay :" id="ndtb-tb">
		</div>
		<div id="und-cv">
			<div id="ndf-cv">
    			<div id="ndfc-txt">Kategori | Stok Durumu </div>
			</div>
			<select name="u_kategori" placeholder="Kategori :" id="ndtb-cb">
				<?php
					$sql_text = " SELECT * FROM kategoriler WHERE k_durum='Aktif' ";
					$sql=mysqli_query($conn,$sql_text);
					while($sql_data=mysqli_fetch_assoc($sql))
					{
				?>
				<option <?php echo 'value="'.$sql_data['k_adi'].'">'.$sql_data['k_adi']; ?></option>
				<?php
					}
					if(isset($ukat)){echo '<option style="background-color: #80e5ff;" value="'.$ukat.'" selected>>'.$ukat.'<</option>';}
					?>
			</select>
			<select name="u_durum" placeholder="Stok Durumu :" id="mini-cb">
				<option value="Var" <?php if(isset($udurum)){if($udurum=="Var") {echo "selected";}} ?>>Var</option>
				<option value="Yok" <?php if(isset($udurum)){if($udurum=="Yok") {echo "selected";}} ?>>Yok</option>
			</select>
		</div>
		<input id="ndbt" value="<?php echo $buton; ?>" type="submit">
	</form>
</div>
<div id="ad-cv">	<!-- Tüm Ürünler -->
	<div id="adc-tcv">
		<div id="adfc-txt">Tüm Ürünler</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Ürün Adı</div>
			<div id="adl-itm">Kategori</div>
			<div id="adl-itm">Detay</div>
			<div id="adl-itm">Stok Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
$sql=mysqli_query($conn," SELECT * FROM urunler ".$skll);
while($sql_data=mysqli_fetch_assoc($sql))
{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sql_data["u_id"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["u_adi"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["u_kategori"];?></div>
			<div id="adl-lcv"><?php if ($sql_data["u_detay"]!="") {echo $sql_data["u_detay"];} else {echo "Detay Yok";} ?></div>
			<div id="adl-lcv"><?php echo $sql_data["u_durum"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=urunler&d=<?php echo $sql_data['u_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=urunler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
<div id="ad-cv">	<!-- Son Eklenen 5 Ürün -->
	<div id="adc-tcv">
		<div id="adfc-txt">Son Eklenen 5 Ürün</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-itm">ID</div>
			<div id="adl-itm">Ürün Adı</div>
			<div id="adl-itm">Kategori</div>
			<div id="adl-itm">Detay</div>
			<div id="adl-itm">Stok Durumu</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
	$sqls=mysqli_query($conn," SELECT * FROM urunler ".$skll." ORDER BY u_id DESC LIMIT 5; ");
	while($sqls_data=mysqli_fetch_assoc($sqls))
	{
?>
		<div id="adll-cv">
			<div id="adl-lcv">#<?php echo $sqls_data["u_id"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["u_adi"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["u_kategori"];?></div>
			<div id="adl-lcv"><?php if ($sqls_data["u_detay"]!="") {echo $sqls_data["u_detay"];} else {echo "Detay Yok";} ?></div>
			<div id="adl-lcv"><?php echo $sqls_data["u_durum"];?></div>
			<div id="adl-edt">
				<a href="admin.php?s=urunler&d=<?php echo $sqls_data['u_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=urunler">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
</div>
</body>