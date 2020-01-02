<?php 
include_once 'config/dao.php';
$dao = new Dao();

if (empty($_GET['token']) || empty($_GET['email'])) {
	header("location:error/");
}

if (!$dao->validToken($_GET['email'],$_GET['token'])) {
	header("location:error/");
}

if (!$dao->aktivasi($_GET['email'])) {
	header("location:error/");
}
header("location:login.php?pesan=primary,Sukses, Aktivasi Berhasil");
?>