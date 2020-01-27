<?php 
include_once 'dbconfig.php';

class Dao 
{ 
	var $link;
	public function __construct()
	{
		$this->link = new Dbconfig();
	}

	// DAO ADMIN

	public function cekLogin($username,$password) {
		$query = "SELECT * FROM users WHERE username ='$username' and password = PASSWORD('$password')";
		return mysqli_query($this->link->conn, $query);
	}

	public function viewBarang()
	{	
		$query = "SELECT barang.* FROM barang, pembelian WHERE `barang`.id_pembelian = `pembelian`.id_pembelian AND id_supplier <> '4'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function view($tabel)
	{	
		$query = "SELECT * FROM $tabel";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewProfil($id)
	{	
		$query = "SELECT * FROM `users` WHERE id_user = '$id'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewCombobox($tabel,$order, $sort = 'ASC')
	{	
		$query = "SELECT * FROM $tabel ORDER by $order $sort";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewPembelian()
	{	
		$query = "SELECT pembelian.*, `supplier`.nama_supplier FROM pembelian, supplier WHERE `supplier`.id_supplier = `pembelian`.id_supplier ORDER BY tgl_beli DESC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewPenjualan()
	{	
		$query = "SELECT `penjualan`.*, `users`.nama FROM `penjualan`,`users` WHERE `users`.id_user = `penjualan`.id_user ORDER BY tgl_jual DESC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewStok()
	{	
		$query = "SELECT barang.*, `supplier`.nama_supplier, `pembelian`.tgl_beli FROM barang, pembelian, supplier WHERE `supplier`.id_supplier = `pembelian`.id_supplier AND `barang`.id_pembelian = `pembelian`.id_pembelian ORDER BY nama_barang ASC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewTerjual()
	{	
		$query = "SELECT `barang`.nama_barang, `penjualan`.tgl_jual, `detail_penjualan`.* FROM barang, detail_penjualan, penjualan WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND `penjualan`.id_penjualan = `detail_penjualan`.id_jual ORDER BY tgl_jual DESC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewKeuntungan()
	{	
		$query = "SELECT nama_barang, nama_supplier, jml_jual, (harga_jual - harga_beli) * jml_jual AS keuntungan FROM barang, detail_penjualan, supplier, pembelian WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND `barang`.id_pembelian = `pembelian`.id_pembelian AND `pembelian`.id_supplier = `supplier`.id_supplier ORDER BY nama_barang ASC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewServis($status)
	{	
		$query = "SELECT servis.*, `teknisi`.nama as nama_teknisi, `users`.nama as nama_user FROM `users`, teknisi, servis WHERE status_servis IN ($status) AND `users`.id_user = `servis`.id_user AND `teknisi`.id_teknisi = `servis`.id_teknisi  ORDER BY tgl_masuk DESC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewDetPembelian($id_pembelian)
	{	
		$query = "SELECT * FROM barang WHERE id_pembelian = '$id_pembelian'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewDetOrder($id_penjualan)
	{	
		$query = "SELECT `detail_penjualan`.*, `barang`.nama_barang, `barang`.stok, `barang`.harga_jual FROM `detail_penjualan`, `barang` WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND id_jual = '$id_penjualan'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewDetServis($id_servis)
	{	
		$query = "SELECT `detail_servis`.*, `barang`.nama_barang, `barang`.harga_jual FROM barang, detail_servis WHERE `barang`.id_barang = `detail_servis`.id_barang AND servis_id = '$id_servis'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewPenilaian($tabel,$tgl)
	{	
		$query = "SELECT $tgl as tgl, `users`.nama, penilaian_pelanggan FROM `users`, $tabel WHERE `$tabel`.id_user = `users`.id_user AND penilaian_pelanggan <> '' ORDER BY $tgl DESC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewDashboard($tabel)
	{
		$query = "SELECT COUNT(*) AS jml FROM `$tabel`";
		return mysqli_query($this->link->conn, $query);	
	}

	public function detail($id)
	{
		$query = "SELECT * FROM barang WHERE id_barang = '$id'";
		$result =  mysqli_query($this->link->conn, $query);	
		return $result->fetch_array();
	}

	// DAO PENGGUNA

	public function insertToken($email,$token)
	{
		$query = "UPDATE `users` SET token = '$token' WHERE email = '$email'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function updatePass($email,$password)
	{
		$query = "UPDATE `users` SET `password` = PASSWORD('$password') WHERE email = '$email'";
		$result =  mysqli_query($this->link->conn, $query);	
		if ($result) {
			return true;
		}
		return false;
	}

	public function validEmail($email)
	{
		$query = "SELECT * FROM `users` WHERE email = '$email'";
		$result =  mysqli_query($this->link->conn, $query);	
		if ($result->num_rows == 1) {
			return true;
		}
		return false;
	}

	public function validToken($email,$token)
	{
		$query = "SELECT * FROM `users` WHERE token = '$token' AND email = '$email'";
		$result = mysqli_query($this->link->conn, $query);	
		if ($result->num_rows == 1) {
			return true;
		}
		return false;
	}

	public function aktivasi($email)
	{
		$query = "UPDATE `users` SET status = '1' WHERE email = '$email'";
		return mysqli_query($this->link->conn, $query);
	}

	public function viewKeranjang($id)
	{	
		$query = "SELECT stok,nama_barang, foto, harga_jual, `temp_keranjang`.* FROM barang, temp_keranjang WHERE `barang`.id_barang = `temp_keranjang`.id_barang AND id_user = '$id' ORDER BY nama_barang ASC";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewPenjualanBarang($id)
	{	
		$query = "SELECT * FROM penjualan WHERE id_user = '$id' AND `status_penjualan` <> 'batal'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function viewDetPenjualan($id)
	{	
		$query = "SELECT `detail_penjualan`.*, `barang`.foto, `barang`.nama_barang, `barang`.harga_jual FROM `detail_penjualan`, `barang` WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND id_jual = '$id'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function gantiStatus($id, $aksi)
	{	
		$query = "UPDATE penjualan SET status_penjualan = '$aksi' WHERE id_penjualan = '$id'";
		return mysqli_query($this->link->conn, $query);	
	}

	public function updateStok($id)
	{	
		$data = $this->viewDetPenjualan($id);
		foreach ($data as $value) {
			$sql = "UPDATE barang SET stok = stok + ".$value['jml_jual']." WHERE id_barang = '".$value['id_barang']."'";
			$this->execute($sql);
		}
		return true;
	}

	public function totalKeranjang($id)
	{	
		$query = "select sum(sub_total) as total from temp_keranjang where id_user = '$id'";
		$result = mysqli_query($this->link->conn, $query);
		$result = $result->fetch_array();
		return $result['total'];
	}

	public function generateKode()
	{
		$cek = true;
		$kode = '';
		while ($cek) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			for ($i = 0; $i < 8; $i++) {
				$kode .= $characters[rand(0, $charactersLength - 1)];
			}
			$result = $this->execute("SELECT * FROM `penjualan` WHERE id_penjualan = '$kode'");
			if ($result->num_rows == 0) {
				$cek = false;
			}
		}
		return $kode;
	}

	public function generateKodeServis()
	{
		$cek = true;
		$kode = '';
		while ($cek) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			for ($i = 0; $i < 8; $i++) {
				$kode .= $characters[rand(0, $charactersLength - 1)];
			}
			$result = $this->execute("SELECT * FROM `servis` WHERE id_servis = '$kode'");
			if ($result->num_rows == 0) {
				$cek = false;
			}
		}
		return $kode;
	}

	public function prosesCheckout($id)
	{
		$kode = $this->generateKode();
		$total = $this->totalKeranjang($id);
		$datacheckout = $this->execute("SELECT * FROM temp_keranjang WHERE id_user = '$id'");
		$time = date("Y-m-d")."T".date("G:i");
		$sql = "INSERT INTO penjualan VALUES ('$kode','$id','$time','$total','order','')";
		$this->execute($sql);
		foreach ($datacheckout as $value) {
			$sql = "INSERT INTO `detail_penjualan` (id_jual,id_barang,jml_jual,subtotal_jual) VALUES ('$kode','".$value['id_barang']."','".$value['jumlah']."','".$value['sub_total']."')";
			$this->execute($sql);
			$sql = "UPDATE barang SET stok = stok - ".$value['jumlah']." WHERE id_barang = '".$value['id_barang']."'";
			$this->execute($sql);
		}
		$sql = "DELETE FROM temp_keranjang WHERE id_user = '$id'";
		return $this->execute($sql);
	}

	public function tambahKeranjang($data)
	{	
		$query = "INSERT INTO `temp_keranjang`(`id_user`, `id_barang`, `jumlah`, `sub_total`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
		return mysqli_query($this->link->conn, $query);
	}

	public function ubahKeranjang($data)
	{	
		$query = "UPDATE `temp_keranjang` SET `jumlah`= '$data[1]',`sub_total`= '$data[2]' WHERE `id_keranjang`= '$data[0]'";
		return mysqli_query($this->link->conn, $query);
	}

	public function hapusKeranjang($id_keranjang)
	{	
		$query = "DELETE FROM `temp_keranjang` WHERE `id_keranjang`= '$id_keranjang'";
		return mysqli_query($this->link->conn, $query);
	}

	public function viewKonsul($id)
	{	
		$query = "SELECT * FROM servis WHERE id_user = '$id' AND status_servis LIKE '%konsul%' ORDER BY tgl_masuk DESC";
		return mysqli_query($this->link->conn, $query);
	}

	public function viewServisHp($id)
	{	
		$query = "SELECT * FROM servis WHERE `status_servis` IN ('aktif','proses','selesai') AND id_user = '$id' ORDER BY tgl_masuk DESC";
		return mysqli_query($this->link->conn, $query);
	}

	public function tambahKonsultasi($data)
	{	
		$kode = $this->generateKodeServis();
		$now = date("Y-m-d");
		$query = "INSERT INTO `servis`(`id_servis`,`id_user`,`tipe_hp`,`gejala`, `id_teknisi`,`tgl_masuk`,`status_servis`) VALUES ('$kode','$data[0]','$data[1]','$data[2]','$data[3]','$now','konsul-baru')";
		return mysqli_query($this->link->conn, $query);
	}

	public function pindahKeServis($data)
	{	
		$query = "UPDATE `servis` SET `tgl_masuk`= '$data[1]',`status_servis`= 'aktif', `status_bayar` = 'Belum Lunas' WHERE `id_servis`= '$data[0]'";
		return mysqli_query($this->link->conn, $query);
	}
	
	public function hapusKonsultasi($id)
	{	
		$query = "DELETE FROM `servis` WHERE `id_servis`= '$id'";
		return mysqli_query($this->link->conn, $query);
	}

	public function notifServis($status)
	{	
		$query = "SELECT count(*) as jml FROM servis WHERE status_servis = '$status'";
		return mysqli_query($this->link->conn, $query);
	}

	public function notifPenjualan()
	{	
		$query = "SELECT count(*) as jml FROM penjualan WHERE status_penjualan = 'aktif'";
		return mysqli_query($this->link->conn, $query);
	}

	public function updateStatusOrder()
	{	
		$query = "UPDATE penjualan SET `status_penjualan` = 'order' WHERE status_penjualan = 'aktif'";
		return mysqli_query($this->link->conn, $query);
	}

	public function updateStatusServis()
	{	
		$query = "UPDATE servis SET `status_servis` = 'antri' WHERE status_servis = 'aktif'";
		return mysqli_query($this->link->conn, $query);
	}

	public function tambahPenilaian($data)
	{	
		$query = "UPDATE `servis` SET `penilaian_pelanggan`= '$data[1]' WHERE `id_servis`= '$data[0]'";
		return mysqli_query($this->link->conn, $query);
	}

	public function tambahPenilaianPenjualan($data)
	{	
		$query = "UPDATE `penjualan` SET `penilaian_pelanggan`= '$data[1]' WHERE `id_penjualan`= '$data[0]'";
		return mysqli_query($this->link->conn, $query);
	}

	public function execute($query)
	{
		$result = mysqli_query($this->link->conn, $query);
		if ($result) {
			return $result;
		}else{
			return mysqli_error($this->link->conn);
		}
	}


}

?>