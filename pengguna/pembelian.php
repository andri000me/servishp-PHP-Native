<?php include_once '../layout/head3.php'; ?>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Pembelian</strong></center></h2>
		<br><br>
		<table class="table table-striped">
			<?php 
			session_start();
			include_once '../config/dao.php';
			$dao = new Dao();
			$result = $dao->viewPenjualanBarang($_SESSION['id']);
			foreach ($result as $value) {
				?>
				<thead>
					<tr>
						<td>Kode Transaksi</td>
						<td>Waktu Pembelian</td>
						<td>Total Harga</td>
						<td>Status</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $value['id_penjualan'] ?></td>
						<td><?php echo $value['tgl_jual'] ?></td>
						<td>Rp <?php echo $value['total_penjualan'] ?></td>
						<td><?php echo $value['status'] ?></td>
						<td nowrap="">
							<a href="det_pembelian.php?id=<?php echo $value['id_penjualan'] ?>"><button class="btn btn-sm btn-primary">Detail</button></a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>

	<?php include_once '../layout/footer2.php'; ?>
</body>
</html>