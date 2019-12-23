<?php 

include_once '../config/dao.php';
$dao = new Dao();
$pesan = null;
if (isset($_POST['aksi_pengguna'])) {
	if ($_POST['aksi_pengguna'] == 'tambah') {
		$username = $_POST['username_pengguna'];
		$password = $_POST['password_pengguna'];
		$nama = $_POST['nama_pengguna'];
		$no_tlp = $_POST['no_tlp_pengguna'];
		$alamat_pengguna = $_POST['alamat_pengguna'];
		$status = $_POST['status'];
		$level = $_POST['level'];
		$email = $_POST['email'];

		$query = "INSERT INTO `users`(`username`, `password`, `nama`, `no_tlp`, `alamat`, `status`,`level`,`email`) VALUES ('$username',PASSWORD('$password'),'$nama','$no_tlp','$alamat_pengguna','$status','$level','$email')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_pengguna'] == 'ubah' && !empty($_POST['id_pengguna'])) {
		$id_pengguna = $_POST['id_pengguna'];
		$username = $_POST['username_pengguna'];
		$password = $_POST['password_pengguna'];
		$nama = $_POST['nama_pengguna'];
		$no_tlp = $_POST['no_tlp_pengguna'];
		$alamat_pengguna = $_POST['alamat_pengguna'];
		$status = $_POST['status'];
		$level = $_POST['level'];
		$email = $_POST['email'];

		$query = "UPDATE `users` SET `password`=PASSWORD('$password'), nama='$nama', no_tlp='$no_tlp', alamat='$alamat_pengguna', status='$status', level='$level', email='$email' WHERE id_user = '$id_pengguna'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_pengguna'] == 'hapus' && !empty($_POST['id_pengguna'])) {
		$id_pengguna = $_POST['id_pengguna'];
		$query = "DELETE FROM `users` WHERE id_user = '$id_pengguna'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "pengguna.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>