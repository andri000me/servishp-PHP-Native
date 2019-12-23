<?php 

include_once '../config/dao.php';
$dao = new Dao();

$pesan = null;
if (isset($_POST['aksi_teknisi'])) {
	if ($_POST['aksi_teknisi'] == 'tambah') {
		$nama = $_POST['nama_teknisi'];
		$no_tlp = $_POST['no_tlp_teknisi'];
		$alamat_teknisi = $_POST['alamat_teknisi'];
		$query = "INSERT INTO `teknisi`(`nama`, `alamat`, `no_tlp`) VALUES ('$nama','$alamat_teknisi','$no_tlp')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_teknisi'] == 'ubah' && !empty($_POST['id_teknisi'])) {
		$id_teknisi = $_POST['id_teknisi'];
		$nama = $_POST['nama_teknisi'];
		$no_tlp = $_POST['no_tlp_teknisi'];
		$alamat_teknisi = $_POST['alamat_teknisi'];
		$query = "UPDATE `teknisi` SET nama='$nama', no_tlp = '$no_tlp', alamat='$alamat_teknisi' WHERE id_teknisi = '$id_teknisi'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_teknisi'] == 'hapus' && !empty($_POST['id_teknisi'])) {
		$id_teknisi = $_POST['id_teknisi'];
		$query = "DELETE FROM `teknisi` WHERE id_teknisi = '$id_teknisi'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "teknisi.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>