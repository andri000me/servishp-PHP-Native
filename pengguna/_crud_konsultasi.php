<?php 
include_once '../config/dao.php';
$dao = new Dao();

if (!empty($_POST['aksi'])) {
	if ($_POST['aksi'] == 'add' && !empty($_POST['id'])) {
		$data = array($_POST['id'],$_POST['tipe_hp'],$_POST['gejala'],'6');
		$dao->tambahKonsultasi($data);
	}
	elseif ($_POST['aksi'] == 'delete' && !empty($_POST['id_pertanyaan'])) {
		$dao->hapusKonsultasi($_POST['id_pertanyaan']);
	}
	elseif ($_POST['aksi'] == 'add_servis' && !empty($_POST['id_servis'])){
		$data = array($_POST['id_servis'],$_POST['tgl_masuk']);
		$dao->pindahKeServis($data);
	}
}
$url = "konsultasi.php";
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>