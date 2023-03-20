<?php
session_start();

unset($_SESSION['k_adi']);
unset($_SESSION['k_sifre']);
unset($_SESSION['giris']);
header('location:index.php');
?>