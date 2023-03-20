<?php
$adet=0;
$skll=" ";
if(isset($_GET['kll']))
{
	$skll="WHERE s_kullanici='".$_GET['kll']."'";
}
if(isset($_GET['c']))
{
	$c=$_GET['c']+1;
}
else if(isset($_GET['a']))
{
	$a=$_GET['a']-1;
}
else
{
	$adet=0;
}
if (isset($_GET['d']))
{
$sql=mysqli_query($conn," SELECT * FROM satislar WHERE s_id=".$_GET['d']);
$sql_data=mysqli_fetch_assoc($sql);
$smus=$sql_data['s_musteri'];
$surun=$sql_data['s_urun'];
if(isset($sql_data['s_adet'])) { $adet=$sql_data['s_adet']; }
if(isset($c)) { $adet=$c; }
if(isset($a)) { $adet=$a; }
$id=$_GET['d'];
}
?>
<body>
<div id="nd-cv">	<!-- Yeni Satış -->
	<div id="ndc-tcv">
		<div id="ndct-txt">Yeni Satış</div>
	</div>
	<form method="post" action="islem-<?php echo $islem; ?>.php?i=satis<?php if(isset($_GET['d'])) {echo "&id=".$_GET['d'];} ?>" id="nd-form">
		<div id="ndf-cv">
    		<div id="ndfc-txt">Müşteri Adı :</div>
    		<div id="ndfc-txt">Ürün :</div>
		</div>
		<div id="ndtb-cv">
			<select name="s_musteri" placeholder="Müşteri :" id="s-cb">
				<?php
					$sql_text = " SELECT * FROM musteriler WHERE m_durum='Aktif' ";
					$sql=mysqli_query($conn,$sql_text);
					while($sql_data=mysqli_fetch_assoc($sql))
					{
						echo '<option value="'.$sql_data['m_adi'].'">'.$sql_data['m_adi']."</option>";
					}
					if(isset($smus)){echo '<option style="background-color: #80e5ff;" value="'.$smus.'" selected>>'.$smus.'<</option>';}
				?>
			</select>
			<select name="s_urun" placeholder="Ürün :" id="s-cb">
				<?php
					$sql_text = " SELECT * FROM urunler WHERE u_durum='Var'";
					$sql=mysqli_query($conn,$sql_text);
					while($sql_data=mysqli_fetch_assoc($sql))
					{
						echo '<option value="'.$sql_data['u_adi'].'">'.$sql_data['u_kategori']." | ".$sql_data['u_adi']."</option>"; 
					}
					if(isset($surun)){echo '<option style="background-color: #80e5ff;" value="'.$surun.'" selected>>'.$surun.'<</option>';}
				?>
			</select>
		</div>
		<div id="ndf-cv">
    		<div id="ndfc-txt">Satış Adedi :</div>
		</div>
		<div id="ndtb-cv">
			<a href="admin.php?s=satis&c=<?php echo $adet; if(isset($id)) { echo "&d=".$id; } ?>">
				<div id="sbutton">+</div>
			</a>
			<input type="text" name="s_adet" value="<?php echo $adet;?>" placeholder="Satış Adedi :" id="ndtb-tb">
			<a href="admin.php?s=satis&a=<?php echo $adet; if(isset($id)) { echo "&d=".$id; } ?>">
				<div id="sbutton">-</div>
			</a>
			<input id="ndbt" value="<?php echo $buton; ?>" type="submit">
		</div>
	</form>
</div>
<div id="ad-cv">	<!-- Tüm Satışlar -->
	<div id="adc-tcv">
		<div id="adfc-txt">Tüm Satışlar</div>
	</div>
	<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-edt">ID</div>
			<div id="adl-itm">Müşteri</div>
			<div id="adl-itm">Ürün</div>
			<div id="adl-itm">Kategori</div>
			<div id="adl-edt">Adet</div>
			<div id="adl-itm">Kullanıcı</div>
			<div id="adl-edt">Tarih</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
$sql=mysqli_query($conn," SELECT * FROM satislar ".$skll);
while($sql_data=mysqli_fetch_assoc($sql))
{
?>
		<div id="adll-cv">
			<div id="adl-ledt">#<?php echo $sql_data["s_id"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["s_musteri"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["s_urun"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["s_kat"];?></div>
			<div id="adl-ledt">x<?php echo $sql_data["s_adet"];?></div>
			<div id="adl-lcv"><?php echo $sql_data["s_kullanici"];?></div>
			<div id="adl-ledt"><?php echo $sql_data["s_tarih"];?></div>
			<div id="adl-ledt">
				<a style="text-decoration: none;" href="admin.php?s=satis&d=<?php echo $sql_data['s_id']; ?>">
					<img style="height: 80%;margin: 5%;" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=satis">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
<div id="ad-cv">	<!-- Son Yapılan 5 Satış -->
<div id="adc-tcv">
	<div id="adfc-txt">Son Yapılan 5 Satış</div>
</div>
<div id="adl-cv">
		<div id="adl-br">
			<div id="adl-edt">ID</div>
			<div id="adl-itm">Müşteri</div>
			<div id="adl-itm">Ürün</div>
			<div id="adl-itm">Kategori</div>
			<div id="adl-edt">Adet</div>
			<div id="adl-itm">Kullanıcı</div>
			<div id="adl-edt">Tarih</div>
			<div id="adl-edt">Düzenle</div>
		</div>
<?php
	$sqls=mysqli_query($conn," SELECT * FROM satislar ".$skll." ORDER BY s_id DESC LIMIT 5");
	while($sqls_data=mysqli_fetch_assoc($sqls))
	{
?>
		<div id="adll-cv">
			<div id="adl-ledt">#<?php echo $sqls_data["s_id"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["s_musteri"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["s_urun"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["s_kat"];?></div>
			<div id="adl-ledt">x<?php echo $sqls_data["s_adet"];?></div>
			<div id="adl-lcv"><?php echo $sqls_data["s_kullanici"];?></div>
			<div id="adl-ledt"><?php echo $sqls_data["s_tarih"];?></div>
			<div id="adl-ledt">
				<a href="admin.php?s=satis&d=<?php echo $sqls_data['s_id']; ?>">
					<img id="edt-img" src="./img/icons/edit.png">
				</a>
			</div>
		</div>
<?php
}
?>
		<div id="dlist">
			<a href="admin.php?s=satis">
				<div id="dlist-txt">Listeyi Yenile</div>
			</a>
		</div>
	</div>
</div>
</div>
</body>