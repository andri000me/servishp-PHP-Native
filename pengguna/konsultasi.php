<?php include_once '../layout/head3.php'; ?>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Konsultasi Kerusakan HP</strong></center></h2>
		<br><br>
		<button class="btn btn-sm btn-primary" type="button">Ajukan Pertanyaan</button>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Tanggal</td>
					<td>Gejala</td>
					<td>Diagnosa</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				session_start();
				include_once '../config/dao.php';
				$dao = new Dao();
				$result = $dao->viewKonsul($_SESSION['id']);
				$no = 1;
				foreach ($result as $value) {
					?>
					<tr>
						<td><?php echo $no;$no++; ?></td>
						<td><?php echo $value['tgl_masuk'] ?></td>
						<td>Rp <?php echo $value['gejala'] ?></td>
						<td><?php echo $value['diagnosa'] ?></td>
						<td nowrap="">
							<button class="btn btn-sm btn-warning" type="button" onclick="hapusKeranjang(<?php echo "'".$value['nama_barang']."','".$value['id_keranjang']."'"?>)">Hapus</button>
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