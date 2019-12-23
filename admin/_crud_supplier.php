<?php 

include_once '../config/dao.php';
$dao = new Dao();

$pesan = null;
if (isset($_POST['aksi_supplier'])) {
	if ($_POST['aksi_supplier'] == 'tambah') {
		$nama = $_POST['nama_supplier'];
		$no_tlp = $_POST['no_tlp_supplier'];
		$alamat_supplier = $_POST['alamat_supplier'];
		$query = "INSERT INTO `supplier`(`nama_supplier`, `alamat`, `no_tlp`) VALUES ('$nama','$alamat_supplier','$no_tlp')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_supplier'] == 'ubah' && !empty($_POST['id_supplier'])) {
		$id_supplier = $_POST['id_supplier'];
		$nama = $_POST['nama_supplier'];
		$no_tlp = $_POST['no_tlp_supplier'];
		$alamat_supplier = $_POST['alamat_supplier'];
		$query = "UPDATE `supplier` SET nama_supplier='$nama', no_tlp = '$no_tlp', alamat='$alamat_supplier' WHERE id_supplier = '$id_supplier'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_supplier'] == 'hapus' && !empty($_POST['id_supplier'])) {
		$id_supplier = $_POST['id_supplier'];
		$query = "DELETE FROM `supplier` WHERE id_supplier = '$id_supplier'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "supplier.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>