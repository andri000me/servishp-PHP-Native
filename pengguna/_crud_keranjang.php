<?php 
include_once '../config/dao.php';
$dao = new Dao();

if (!empty($_POST['aksi'])) {
	if ($_POST['aksi'] == 'add' && !empty($_POST['id']) && !empty($_POST['id_barang'])) {
		$data = array($_POST['id'],$_POST['id_barang'],$_POST['jumlah'],$_POST['harga']*$_POST['jumlah']);
		$dao->tambahKeranjang($data);
	}
	elseif ($_POST['aksi'] == 'edit' && !empty($_POST['id_keranjang']) && !empty($_POST['id_barang'])) {
		$data = array($_POST['id_keranjang'],$_POST['jumlah'],$_POST['harga']*$_POST['jumlah']);
		$dao->ubahKeranjang($data);
	}
	elseif ($_POST['aksi'] == 'delete' && !empty($_POST['id_keranjang'])) {
		$dao->hapusKeranjang($_POST['id_keranjang']);
	}
}
$url = "keranjang.php";
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>