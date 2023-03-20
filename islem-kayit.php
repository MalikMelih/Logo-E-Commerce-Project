<?php
session_start();
include("baglanti.php");
if ($_GET['i']=="kullanicilar")
{
$sql=" INSERT INTO kullanicilar (k_klladi,k_sifre,k_adi,k_soyadi,k_durum) VALUES ('".$_POST['k_klladi']."','".$_POST['k_sifre']."','".$_POST['k_adi']."','".$_POST['k_soyadi']."','".$_POST['k_durum']."') ";
}
elseif ($_GET['i']=="musteriler")
{
$sql=" INSERT INTO musteriler (m_adi,m_soyadi,m_durum,m_kll,mk_id) VALUES ('".$_POST['m_adi']."','".$_POST['m_soyadi']."','".$_POST['m_durum']."','".$_SESSION['k_adi']."','".$_SESSION['k_id']."') ";
}
elseif ($_GET['i']=="kategoriler")
{
$sql=" INSERT INTO kategoriler (k_adi,k_detay,k_durum) VALUES ('".$_POST['k_adi']."','".$_POST['k_detay']."','".$_POST['k_durum']."') ";
}
elseif ($_GET['i']=="urunler")
{
$sql=" INSERT INTO urunler (u_adi,u_detay,u_kategori,u_durum,u_kll,uk_id) VALUES ('".$_POST['u_adi']."','".$_POST['u_detay']."','".$_POST['u_kategori']."','".$_POST['u_durum']."','".$_SESSION['k_adi']."','".$_SESSION['k_id']."') ";
}
elseif ($_GET['i']=="satis")
{
$sql=mysqli_query($conn," SELECT * FROM urunler WHERE u_adi='".$_POST['s_urun']."' ");
if($sql_data=mysqli_fetch_assoc($sql))
{ $kat=$sql_data['u_kategori']; }
$sql=" INSERT INTO satislar (s_kullanici,s_musteri,s_urun,s_kat,s_adet,s_tarih,sk_id) VALUES ('".$_SESSION['k_adi']."','".$_POST['s_musteri']."','".$_POST['s_urun']."','".$kat."','".$_POST['s_adet']."','".date("d:M:y")."','".$_SESSION['k_id']."')";
}
else
{
header('location:admin.php');
}

	$lokasyon="location:admin.php?s=".$_GET[i];
	mysqli_query($conn,$sql);
	header($lokasyon);

?>