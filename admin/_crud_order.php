<?php 

include_once '../config/dao.php';
$dao = new Dao();
$pesan = null;

if (isset($_POST['aksi_order'])) {
	if ($_POST['aksi_order'] == 'tambah') {
		$id_order = $_POST['id_order'];
		$tgl_order = $_POST['tgl_order'];
		$nama_pembeli = $_POST['nama_pembeli'];
		$total_order = $_POST['total_order'];
		$status_order = $_POST['status_order'];

		$query = "INSERT INTO `penjualan`(`id_penjualan`,`id_user`,`tgl_jual`,`total_penjualan`,`status_penjualan`) VALUES ('$id_order','$nama_pembeli','$tgl_order','$total_order','$status_order')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_order'] == 'ubah' && !empty($_POST['id_order'])) {
		$id_order = $_POST['id_order'];
		$tgl_order = $_POST['tgl_order'];
		$nama_pembeli = $_POST['nama_pembeli'];
		$total_order = $_POST['total_order'];
		$status_order = $_POST['status_order'];

		$query = "UPDATE `penjualan` SET tgl_jual='$tgl_order', id_user = '$nama_pembeli', total_penjualan='$total_order', status_penjualan='$status_order' WHERE id_penjualan = '$id_order'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_order'] == 'hapus' && !empty($_POST['id_order'])) {
		$id_order = $_POST['id_order'];
	
		$result = $dao->viewDetOrder($id_order);
		foreach ($result as $value) {
			$id_brg = $value['id_barang'];
			$jml = $value['jml_jual'];
			$dao->execute("UPDATE `barang` SET stok = stok+$jml WHERE id_barang = '$id_brg'");
		}

		$query = "DELETE FROM `penjualan` WHERE id_penjualan = '$id_order'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "order.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>