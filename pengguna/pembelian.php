<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
	function addRatingPembelian(id_penjualan) {
		$('#id_nilai2').val(id_penjualan)
		$('#rating2').val('0')
		$('#komentar1').val('')
		$('#modalAddPenilaianJual').modal('show');
	}
</script>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Pembelian</strong></center></h2>
		<br><br>
		<table class="table table-striped">
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
					<?php 
					session_start();
					include_once '../config/dao.php';
					$dao = new Dao();
					$result = $dao->viewPenjualanBarang($_SESSION['id']);
					foreach ($result as $value) {
						?>
					<tr>
						<td><?php echo $value['id_penjualan'] ?></td>
						<td><?php echo $value['tgl_jual'] ?></td>
						<td>Rp <?php echo $value['total_penjualan'] ?></td>
						<td><?php echo $value['status_penjualan'] ?></td>
						<td nowrap="">
							<a href="det_pembelian.php?id=<?php echo $value['id_penjualan'] ?>"><button class="btn btn-sm btn-primary">Detail</button></a>
							<?php 
							if ($value['penilaian_pelanggan'] == '' && $value['status_penjualan'] == 'selesai') {
								?>
								<button class="btn btn-sm btn-warning" onclick="addRatingPembelian('<?php echo $value['id_penjualan'] ?>');">Beri Penialain</button>
								<?php
							}
							 ?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>

	<?php include_once '../layout/modal_pengguna.php'; ?>
	<?php include_once '../layout/footer2.php'; ?>
</body>
</html>