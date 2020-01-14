<?php 

include_once '../config/dao.php';
$dao = new Dao();

if (!empty($_POST)) {
	$id = $_POST['id'];
	if ($_POST['aksi'] == 'batal') {
		$dao->gantiStatus($id,'batal');
		$dao->updateStok($id);
	}
	elseif ($_POST['aksi'] == 'checkout') {
		$dao->prosesCheckout($id);
	}
}
$url = "pembelian.php";
?>
<script type="text/javascript">
	// document.location = '<?php echo $url ?>';
</script>