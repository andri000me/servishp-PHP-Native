<?php 

include_once '../config/dao.php';
$dao = new Dao();
$pesan = null;
if (isset($_POST['aksi_pembelian'])) {
	if ($_POST['aksi_pembelian'] == 'tambah') {
		$tgl_beli = $_POST['tgl_beli'];
		$nama_supplier = $_POST['nama_supplier'];
		$status = $_POST['status'];
		$query = "INSERT INTO `pembelian`(`tgl_beli`, `id_supplier`, `status_beli`) VALUES ('$tgl_beli','$nama_supplier','$status')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_pembelian'] == 'ubah' && !empty($_POST['id_pembelian'])) {
		$id_pembelian = $_POST['id_pembelian'];
		$tgl_beli = $_POST['tgl_beli'];
		$nama_supplier = $_POST['nama_supplier'];
		$status = $_POST['status'];
		$total_beli = $_POST['total_beli'];
		$query = "UPDATE `pembelian` SET tgl_beli='$tgl_beli', id_supplier = '$nama_supplier', total_beli='$total_beli', status_beli='$status' WHERE id_pembelian = '$id_pembelian'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_pembelian'] == 'hapus' && !empty($_POST['id_pembelian'])) {
		$id_pembelian = $_POST['id_pembelian'];
		$query = "DELETE FROM `pembelian` WHERE id_pembelian = '$id_pembelian'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "pembelian.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>