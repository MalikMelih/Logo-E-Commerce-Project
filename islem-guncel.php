<?php
session_start();
include("baglanti.php");
if ($_GET['i']=="kullanicilar")
{
	$sql=" UPDATE kullanicilar SET k_klladi='".$_POST['k_klladi']."' , k_sifre='".$_POST['k_sifre']."' , k_adi='".$_POST['k_adi']."' , k_soyadi='".$_POST['k_soyadi']."' , k_durum='".$_POST['k_durum']."' WHERE k_id='".$_GET['id']."' ";
}
elseif ($_GET['i']=="musteriler")
{
	$sql=" UPDATE musteriler SET m_adi='".$_POST['m_adi']."' , m_soyadi='".$_POST['m_soyadi']."' , m_durum='".$_POST['m_durum']."' WHERE m_id='".$_GET['id']."' ";
}
elseif ($_GET['i']=="kategoriler")
{
	$sql=" UPDATE kategoriler SET k_adi='".$_POST['k_adi']."' , k_detay='".$_POST['k_detay']."' , k_durum='".$_POST['k_durum']."' WHERE k_id='".$_GET['id']."' ";
}
elseif ($_GET['i']=="urunler")
{
	$sql=" UPDATE urunler SET u_adi='".$_POST['u_adi']."' , u_detay='".$_POST['u_detay']."' , u_kategori='".$_POST['u_kategori']."' , u_durum='".$_POST['u_durum']."' , WHERE u_id='".$_GET['id']."' ";
}
elseif ($_GET['i']=="satis")
{
$sql=mysqli_query($conn," SELECT * FROM urunler WHERE u_adi='".$_POST['s_urun']."'");
if($sql_data=mysqli_fetch_assoc($sql))
{ $kat=$sql_data['u_kategori']; }
	$sql=" UPDATE satislar SET s_musteri='".$_POST['s_musteri']."' ,  s_urun='".$_POST['s_urun']."' , s_kat='".$kat."' , s_adet='".$_POST['s_adet']."' WHERE s_id='".$_GET['id']."' ";
}
else
{
header('location:admin.php');
}
	$lokasyon="location:admin.php?s=".$_GET[i];
	mysqli_query($conn,$sql);
	header($lokasyon);
?>