<?php
include("./baglanti.php");
session_start();
$sql_kladi = " SELECT * FROM kullanicilar WHERE k_klladi='".$_POST['k_adi']."' ";
$sql_klsif = " SELECT * FROM kullanicilar WHERE k_klladi='".$_POST['k_adi']."' && k_sifre='".$_POST['k_sifre']."' ";

$sqlad=mysqli_query($conn,$sql_kladi);
$sqlsif=mysqli_query($conn,$sql_klsif);
if($satirad=mysqli_fetch_assoc($sqlad))
 {
 	if($satirad['k_durum']=="Aktif")
 	{
 		//Kullanıcı Hesabı Aktif
		if($satirsif=mysqli_fetch_assoc($sqlsif))
		{
			//Giriş Başarılı
			$_SESSION['ht_id']=0;
			$_SESSION['k_id']=$satirsif['k_id'];
			$_SESSION['k_adi']=$satirsif['k_klladi'];
			header('location:admin.php');
		}
		else
		{
			//Şifreniz Hatalı!
			$_SESSION['ht_id']=1;
			header('location:index.php');
		}
 	}
 	else
 	{
 		//Hesabınız Bir Sistem Yöneticisi Tarafından Kapatılmış
 		$_SESSION['ht_id']=3;
 		header('location:index.php');
 	}
 }
 else
 {
 	//Böyle Bir Kullanıcı Bulunamadı.
 	$_SESSION['ht_id']=2;
 	header('location:index.php');
 }

?>