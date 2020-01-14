<?php include_once '../layout/head3.php'; ?>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Keranjang Belanja</strong></center></h2>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<td></td>
					<td>Produk</td>
					<td></td>
					<td>Harga Satuan</td>
					<td>Jumlah</td>
					<td>Total Harga</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				session_start();
				include_once '../config/dao.php';
				$dao = new Dao();
				$result = $dao->viewKeranjang($_SESSION['id']);
				foreach ($result as $value) {
					?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $value['id_keranjang'] ?>"></td>
						<td><img src="<?php echo $value['foto'] ?>" style="width: 100px; height: 100px;"></td>
						<td><?php echo $value['nama_barang'] ?></td>
						<td>Rp <?php echo $value['harga_jual'] ?></td>
						<td><?php echo $value['jumlah'] ?></td>
						<td>Rp <?php echo $value['sub_total'] ?></td>
						<td nowrap="">
							<button class="btn btn-sm btn-primary">Edit</button>
							<button class="btn btn-sm btn-warning">Hapus</button>
						</td>
					</tr>
					<?php
				}
				 ?>
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-3">
				<span style="font-size: 20px">Subtotal</span> <strong><span style="color: red; font-size: 24px">Rp 200000 </span></strong>
			</div>
			<div class="col-md-2">
				<button class="btn btn-block" style="background-color: red; color: white;">Checkout</button>
			</div>
		</div>
	</div>
	<br>
	<?php include_once '../layout/footer2.php'; ?>
</body>
</html>