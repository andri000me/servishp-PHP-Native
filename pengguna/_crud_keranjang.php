<?php 
include_once '../config/dao.php';
$dao = new Dao();

if (!empty($_POST['aksi'])) {
	$id = $_POST['id'];
	if ($_POST['aksi'] == 'add' && !empty($_POST['id']) && !empty($_POST['id_barang'])) {
		$data = array($_POST['id'],$_POST['id_barang'],$_POST['jumlah'],$_POST['harga']*$_POST['jumlah']);
		$dao->tambahKeranjang($data);
	}
	// elseif ($_POST['aksi'] == 'checkout') {
	// 	$dao->prosesCheckout($id);
	// }
}
$url = "keranjang.php";
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>