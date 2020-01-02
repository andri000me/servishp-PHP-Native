<?php 
error_reporting('off');
include_once '../config/dao.php';
$dao = new Dao();
$target_dir = "../images";

$id_beli = $_POST['id_beli'];
$pesan = null;
$foto = "http://localhost/servishp/images/default.jpg";
if (isset($_POST['aksi_barang'])) {
	if ($_POST['aksi_barang'] == 'tambah') {
		$nama = $_POST['nama_barang'];
		$nama_barang = $_POST['nama_barang'];
		$harga_beli = $_POST['harga_beli'];
		$harga_jual = $_POST['harga_jual'];
		$stok = $_POST['stok'];
		$satuan = $_POST['satuan'];
		$deskripsi = $_POST['deskripsi'];
		$uploadOk = 1;
		if(isset($_POST['aksi_barang'])) {
			if (isset($_FILES["foto"])) {
				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if ($check != false) {
					$temp = explode(".", $_FILES["foto"]["name"]);
					$nama_baru = $nama_barang.'-'.date("dmy").'.'.end($temp);
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir."/" . $nama_baru)) {
						$foto = "http://localhost/servishp/images/".$nama_baru;
					}
				}
			}
		}
		$query = "INSERT INTO `barang`(`id_pembelian`, `nama_barang`,`harga_beli`,`harga_jual`,`stok`,`satuan`,`foto`,`deskripsi`) VALUES ('$id_beli','$nama_barang','$harga_beli','$harga_jual','$stok','$satuan', '$foto', '$deskripsi')";
		$dao->execute($query);
		$query = "UPDATE `pembelian` SET `total_beli` = total_beli+($harga_beli*$stok) WHERE id_pembelian='$id_beli'";
		if ($dao->execute($query)) {
			$pesan = "?id=$id_beli&pesan=bg-orange,Sukses, Data berhasil ditambah.";
		}
		else{
			$pesan = "?id=$id_beli&pesan=bg-red,Gagal, Data Gagal ditambah!";
		}
	}
	elseif ($_POST['aksi_barang'] == 'ubah' && !empty($_POST['id_barang'])) {
		// echo '<pre>',print_r($_POST),'</pre>';
		$id_barang = $_POST['id_barang'];
		$nama = $_POST['nama_barang'];
		$nama_barang = $_POST['nama_barang'];
		$harga_beli = $_POST['harga_beli'];
		$harga_lama = $_POST['harga_lama'];
		$harga_jual = $_POST['harga_jual'];
		$stok_lama = $_POST['stok_lama'];
		$stok = $_POST['stok'];
		$satuan = $_POST['satuan'];
		if (isset($_FILES["foto"]) && !empty($_FILES['foto'])) {
			$check = getimagesize($_FILES["foto"]["tmp_name"]);
			if ($check != false) {
				$temp = explode(".", $_FILES["foto"]["name"]);
				$nama_baru = $nama_barang.'-'.date("dmy").'.'.end($temp);
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir."/" . $nama_baru)) {
					$foto = "http://localhost/servishp/images/".$nama_baru;
				}
			}
		}
		$query = "UPDATE `barang` SET nama_barang='$nama_barang', harga_beli = '$harga_beli', harga_jual='$harga_jual', stok='$stok', satuan='$satuan', deskripsi='$deskripsi' WHERE id_barang = '$id_barang'";
		$dao->execute($query);

		if ($foto != null) {
			$query = "UPDATE barang SET foto = '$foto' WHERE id_barang='$id_barang'";
			$dao->execute($query);
		}

		$query = "UPDATE `pembelian` SET `total_beli` = total_beli-($harga_lama*$stok_lama)+($harga_beli*$stok) WHERE id_pembelian='$id_beli'";
		if ($dao->execute($query)) {
			$pesan = "?id=$id_beli&pesan=bg-orange,Sukses, Data berhasil diubah.";
		}
		else{
			$pesan = "?id=$id_beli&pesan=bg-red,Gagal, Data Gagal diubah!";
		}
	}
	elseif ($_POST['aksi_barang'] == 'hapus' && !empty($_POST['id_barang'])) {
		$id_barang = $_POST['id_barang'];
		$harga_beli = $_POST['harga_beli'];
		$stok = $_POST['stok_lama'];
		$query = "DELETE FROM `barang` WHERE id_barang = '$id_barang'";
		$dao->execute($query);
		$query = "UPDATE `pembelian` SET `total_beli` = total_beli-($harga_beli*$stok) WHERE id_pembelian='$id_beli'";
		if ($dao->execute($query)) {
			$pesan = "?id=$id_beli&pesan=bg-orange,Sukses, Data berhasil dihapus.";
		}
		else{
			$pesan = "?id=$id_beli&pesan=bg-red,Gagal, Data Gagal dihapus!";
		}
	}
}
$url = "det_pembelian.php".$pesan;
?>
<script type="text/javascript">
	document.location = '<?php echo $url ?>';
</script>