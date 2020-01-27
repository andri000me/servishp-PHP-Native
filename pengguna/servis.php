<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
	function addRating(id_servis) {
		$('#id_nilai').val(id_servis)
		$('#rating').val('0')
		$('#komentar').val('')
		$('#modalAddPenilaian').modal('show');
	}
</script>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Riwayat Servis HP</strong></center></h2>
		<br><br>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Kode Servis</td>
					<td>Tanggal</td>
					<td>Merk/Tipe HP</td>
					<td>Gejala</td>
					<td>Diagnosa</td>
					<td>Total Biaya</td>
					<td>Status Servis</td>
					<td>Status Bayar</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				session_start();
				include_once '../config/dao.php';
				$dao = new Dao();
				$result = $dao->viewServisHp($_SESSION['id']);
				$no = 1;
				foreach ($result as $value) {
					?>
					<tr>
						<td><?php echo $no;$no++; ?></td>
						<td><?php echo $value['id_servis'] ?></td>
						<td><?php echo $value['tgl_masuk'] ?></td>
						<td><?php echo $value['tipe_hp'] ?></td>
						<td><?php echo $value['gejala'] ?></td>
						<td><?php echo $value['diagnosa'] ?></td>
						<td><?php echo $value['total_biaya'] ?></td>
						<td><?php echo $value['status_servis'] ?></td>
						<td><?php echo $value['status_bayar'] ?></td>
						<td nowrap="">
							<a href="det_servis.php?id=<?php echo $value['id_servis']; ?>"><button class="btn btn-sm btn-success" type="button">Detail</button></a>
							<?php 
							if ($value['status_servis'] == 'selesai' && $value['penilaian_pelanggan'] == '') {
								?>
								<button class="btn btn-sm btn-warning" type="button" onclick="addRating('<?php echo $value['id_servis'] ?>')">Beri Penilaian</button>
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
		<br>
	</div>
	<br>
	<?php include_once '../layout/modal_pengguna.php'; ?>

	<?php include_once '../layout/footer2.php'; ?>
</body>
</html>