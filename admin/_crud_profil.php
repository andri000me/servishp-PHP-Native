 <?php
 include_once '../config/dao.php';
$dao = new Dao();
 if ($_POST['aksi'] == 'edit') {
 	$id_pengguna = $_POST['id_pengguna'];
 	$password = $_POST['password_pengguna'];
 	$nama = $_POST['nama_pengguna'];
 	$no_tlp = $_POST['no_tlp_pengguna'];
 	$alamat_pengguna = $_POST['alamat_pengguna'];
 	$email = $_POST['email'];

 	$query = "UPDATE `users` SET `password`=PASSWORD('$password'), nama='$nama', no_tlp='$no_tlp', alamat='$alamat_pengguna', email='$email' WHERE id_user = '$id_pengguna'";
 	if ($dao->execute($query)) {
 		$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
 	}
 	else{
 		$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
 	}
 }
 $url = "profil.php".$pesan;
 ?>
 <script type="text/javascript">
 	document.location = '<?php echo $url ?>';
 </script>