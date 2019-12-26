<?php 
error_reporting('off');
include_once '../config/dao.php';
$dao = new Dao();
// echo '<pre>',var_dump($_POST),'</pre>';
$id_servis_ = $_POST['_id_servis_'];
$id_det_servis = $_POST['id_det_servis'];
$pesan = null;


if (isset($_POST['aksi_det_servis'])) {
	if ($_POST['aksi_det_servis'] == 'tambah') {
		$nama_barang = $_POST['nama_barang'];
		$jml = $_POST['jml'];
		$result = $dao->execute("SELECT * FROM `barang` WHERE id_barang = '$nama_barang'");
		$result = $result->fetch_array();
		$subtotal = $result['harga_jual'] * $jml;

		$query = "INSERT INTO `detail_servis` (`servis_id`, `id_barang`, `jml`, `subtotal`) VALUES ('$id_servis_','$nama_barang','$jml','$subtotal')";
		$dao->execute($query);
		$query = "UPDATE `servis` SET total_biaya = total_biaya+$subtotal WHERE id_servis = '$id_servis_'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok-$jml WHERE id_barang = '$nama_barang'";

		if ($dao->execute($query)) {
			$pesan = "?id=$id_servis_&pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?id=$id_servis_&pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_det_servis'] == 'ubah' && !empty($_POST['_id_servis_'])) {
		// echo '<pre>',print_r($_POST),'</pre>';
		$nama_barang = $_POST['nama_barang'];
		$jml_lama = $_POST['jml_lama'];
		$jml = $_POST['jml'];
		$subtotal_lama = $_POST['subtotal'];

		$result = $dao->execute("SELECT * FROM `barang` WHERE id_barang = '$nama_barang'");
		$result = $result->fetch_array();
		$subtotal = $result['harga_jual'] * $jml;
		// echo $subtotal.' '.$jml;
		$query = "UPDATE `detail_servis` SET `id_barang`='$nama_barang',`jml`='$jml',`subtotal`='$subtotal' WHERE `id_detservis`='$id_det_servis'";
		$dao->execute($query);
		$query = "UPDATE `servis` SET `total_biaya` = total_biaya-$subtotal_lama+$subtotal WHERE id_servis = '$id_servis_'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok+$jml_lama-$jml WHERE id_barang = '$nama_barang'";

		if ($dao->execute($query)) {
			$pesan = "?id=$id_servis_&pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?id=$id_servis_&pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}

	elseif ($_POST['aksi_det_servis'] == 'hapus' && !empty($_POST['_id_servis_'])) {
		$subtotal = $_POST['subtotal'];
		$nama_barang = $_POST['nama_barang'];
		$jml_lama = $_POST['jml_lama'];

		$query = "DELETE FROM `detail_servis` WHERE id_detservis = '$id_det_servis'";
		$dao->execute($query);
		$query = "UPDATE `servis` SET `total_biaya` = total_biaya-$subtotal WHERE id_servis='$id_servis_'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok+$jml_lama WHERE id_barang = '$nama_barang'";
		if ($dao->execute($query)) {
			$pesan = "?id=$id_servis_&pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?id=$id_servis_&pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "det_servis.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>