<?php 
error_reporting('off');
include_once '../config/dao.php';
$dao = new Dao();
// echo '<pre>',var_dump($_POST),'</pre>';
$id_pembelian = $_POST['id_pembelian'];
$pesan = null;


if (isset($_POST['aksi_det_order'])) {
	if ($_POST['aksi_det_order'] == 'tambah') {
		$id_jual = $_POST['id_jual'];
		$nama_barang = $_POST['nama_barang'];
		$jml_order = $_POST['jml_order'];
		$result = $dao->execute("SELECT * FROM `barang` WHERE id_barang = '$nama_barang'");
		$result = $result->fetch_array();
		$sub_total = $result['harga_jual'] * $jml_order;

		$query = "INSERT INTO `detail_penjualan`(`id_jual`, `id_barang`, `jml_jual`, `subtotal_jual`) VALUES ('$id_jual','$nama_barang','$jml_order','$sub_total')";
		$dao->execute($query);
		$query = "UPDATE `penjualan` SET total_penjualan = total_penjualan+$sub_total WHERE id_penjualan = '$id_jual'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok-$jml_order WHERE id_barang = '$nama_barang'";

		if ($dao->execute($query)) {
			$pesan = "?id=$id_jual&pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?id=$id_jual&pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_det_order'] == 'ubah' && !empty($_POST['id_pembelian'])) {
		// echo '<pre>',print_r($_POST),'</pre>';
		$id_jual = $_POST['id_jual'];
		$nama_barang = $_POST['nama_barang'];
		$harga_beli = $_POST['harga_beli'];
		$jml_order = $_POST['jml_order'];
		$jml_order_lama = $_POST['jml_order_lama'];
		$sub_total_lama = $_POST['sub_total'];

		$result = $dao->execute("SELECT * FROM `barang` WHERE id_barang = '$nama_barang'");
		$result = $result->fetch_array();
		$sub_total = $result['harga_jual'] * $jml_order;
		$query = "UPDATE `detail_penjualan` SET `id_barang`='$nama_barang',`jml_jual`='$jml_order',`subtotal_jual`='$sub_total' WHERE `id_detpenjualan`='$id_pembelian'";
		$dao->execute($query);
		$query = "UPDATE `penjualan` SET `total_penjualan` = total_penjualan-$sub_total_lama+$sub_total WHERE id_penjualan = '$id_jual'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok+$jml_order_lama-$jml_order WHERE id_barang = '$nama_barang'";

		if ($dao->execute($query)) {
			$pesan = "?id=$id_jual&pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?id=$id_jual&pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_det_order'] == 'hapus' && !empty($_POST['id_pembelian'])) {
		$id_jual = $_POST['id_jual'];
		$sub_total_lama = $_POST['sub_total'];
		$nama_barang = $_POST['nama_barang'];
		$jml_order = $_POST['jml_order'];

		$query = "DELETE FROM `detail_penjualan` WHERE id_detpenjualan = '$id_pembelian'";
		$dao->execute($query);
		$query = "UPDATE `penjualan` SET `total_penjualan` = total_penjualan-$sub_total_lama WHERE id_penjualan='$id_jual'";
		$dao->execute($query);
		$query = "UPDATE `barang` SET stok = stok+$jml_order WHERE id_barang = '$nama_barang'";
		if ($dao->execute($query)) {
			$pesan = "?id=$id_jual&pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?id=$id_jual&pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "det_order.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>