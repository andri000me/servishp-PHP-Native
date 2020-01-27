<?php 
include_once '../config/dao.php';
$dao = new Dao();

if (!empty($_POST['aksi'])) {
	if ($_POST['aksi'] == 'add' && !empty($_POST['id'])) {
		$data = array($_POST['id'],$_POST['tipe_hp'],$_POST['gejala'],'6');
		$dao->tambahKonsultasi($data);
		$url = "konsultasi.php";
	}
	elseif ($_POST['aksi'] == 'delete' && !empty($_POST['id_pertanyaan'])) {
		$dao->hapusKonsultasi($_POST['id_pertanyaan']);
		$url = "konsultasi.php";
	}
	elseif ($_POST['aksi'] == 'add_servis' && !empty($_POST['id_servis'])){
		$data = array($_POST['id_servis'],$_POST['tgl_masuk']);
		$dao->pindahKeServis($data);
		$url = "servis.php";
	}
	elseif ($_POST['aksi'] == 'add_rating' && !empty($_POST['id_servis'])){
		$data = array($_POST['id_servis'],$_POST['rating']."-".$_POST['komentar']);
		$dao->tambahPenilaian($data);
		$url = "servis.php";
	}
}
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>