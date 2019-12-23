<?php 
include_once 'dbconfig.php';

class Dao 
{ 
	var $link;
	public function __construct()
	{
			$this->link = new Dbconfig(); //object
		}
		public function view($tabel)
		{	
			$query = "SELECT * FROM $tabel";
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
			$query = "SELECT `barang`.nama_barang, `penjualan`.tgl_jual, `detail_penjualan`.* FROM barang, detail_penjualan, penjualan WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND `penjualan`.id_penjualan = `detail_penjualan`.id_jual ORDER BY tgl_jual ASC";
			return mysqli_query($this->link->conn, $query);	
		}

		public function viewKeuntungan()
		{	
			$query = "SELECT nama_barang, nama_supplier, jml_jual, (harga_jual - harga_beli) * jml_jual AS keuntungan FROM barang, detail_penjualan, supplier, pembelian WHERE `barang`.id_barang = `detail_penjualan`.id_barang AND `barang`.id_pembelian = `pembelian`.id_pembelian AND `pembelian`.id_supplier = `supplier`.id_supplier ORDER BY nama_barang ASC";
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

		public function cekLogin($username,$password) {
			$query = "SELECT * FROM users WHERE (username ='$username') and password = PASSWORD('$password')";
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