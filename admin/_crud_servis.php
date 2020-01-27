<?php 

include_once '../config/dao.php';
$dao = new Dao();
$pesan = null;
if (isset($_POST['aksi_servis'])) {
	if ($_POST['aksi_servis'] == 'tambah') {
		$id_servis = $_POST['id_servis'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$nama_teknisi = $_POST['nama_teknisi'];
		$gejala = $_POST['gejala'];
		$diagnosa = $_POST['diagnosa'];
		$tipe_hp = $_POST['tipe_hp'];
		$kelengkapan = $_POST['kelengkapan'];
		$tgl_selesai = $_POST['tgl_selesai'];
		$total_biaya = $_POST['total_biaya'];
		$status_servis = $_POST['status_servis'];
		$status_pembayaran = $_POST['status_pembayaran'];

		$query = "INSERT INTO `servis`(`id_servis`, `id_user`, `id_teknisi`, `tgl_masuk`, `tgl_selesai`, `gejala`, `kelengkapan`, `total_biaya`, `diagnosa`, `status_servis`, `status_bayar`,`tipe_hp`) VALUES ('$id_servis','$nama_pelanggan','$nama_teknisi','$tgl_masuk','$tgl_selesai','$gejala','$kelengkapan','$total_biaya','$diagnosa','$status_servis','$status_pembayaran','$tipe_hp')";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_servis'] == 'ubah' && !empty($_POST['id_servis'])) {
		$id_servis = $_POST['id_servis'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$nama_teknisi = $_POST['nama_teknisi'];
		$tipe_hp = $_POST['tipe_hp'];
		$gejala = $_POST['gejala'];
		$diagnosa = $_POST['diagnosa'];
		$kelengkapan = $_POST['kelengkapan'];
		$tgl_selesai = $_POST['tgl_selesai'];
		$total_biaya = $_POST['total_biaya'];
		$status_servis = $_POST['status_servis'];
		$status_pembayaran = $_POST['status_pembayaran'];

		$query = "UPDATE `servis` SET `id_user`='$nama_pelanggan',`id_teknisi`='$nama_teknisi',`tgl_masuk`='$tgl_masuk',`tgl_selesai`='$tgl_selesai',`gejala`='$gejala',`kelengkapan`='$kelengkapan',`total_biaya`='$total_biaya',`diagnosa`='$diagnosa',`status_servis`='$status_servis',`status_bayar`='$status_pembayaran',`tipe_hp`='$tipe_hp' WHERE id_servis = '$id_servis'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_servis'] == 'hapus' && !empty($_POST['id_servis'])) {
		$id_servis = $_POST['id_servis'];

		$result = $dao->viewDetservis($id_servis);
		foreach ($result as $value) {
			$id_brg = $value['id_barang'];
			$jml = $value['jml'];
			$dao->execute("UPDATE `barang` SET stok = stok+$jml WHERE id_barang = '$id_brg'");
		}

		$query = "DELETE FROM `servis` WHERE id_servis = '$id_servis'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
	elseif ($_POST['aksi_servis'] == 'ubah_konsul' && !empty($_POST['id_servis'])) {
		// var_dump($_POST);die;
		$id_servis = $_POST['id_servis'];
		$diagnosa = $_POST['diagnosa']."-".$_POST['estimasi_harga'];
		if (empty($_POST['pindah'])) {
			$status = 'konsul-terjawab';
		}
		else{
			$status = $_POST['pindah'];
		}

		$query = "UPDATE `servis` SET `diagnosa`='$diagnosa',`status_servis`='$status' WHERE id_servis = '$id_servis'";
		if ($dao->execute($query)) {
			$pesan = "?pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
}
if ($_POST['aksi_servis'] == 'ubah_konsul') {
	$url = "konsultasi.php".$pesan;
}
else{
	$url = "servis.php".$pesan;
}
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>