<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
	function addKonsultas() {
		$('#modalAddPertanyaan').modal('show');
	}

	function hapusKonsultas(id,nama) {
		$('#id_del_pertanyaan').val(id);
		$('#nama_pertanyaan').val(nama)
		$('#modalDelPertanyaan').modal('show');
	}
</script>
<body>
	<?php include_once '../layout/navbar3.php'; ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<h2><center><strong>Konsultasi Kerusakan HP</strong></center></h2>
		<br><br>
		<button class="btn btn-sm btn-primary" type="button" onclick="addKonsultas();">Ajukan Pertanyaan</button>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th width="120">Tanggal</th>
					<th width="450">Gejala</th>
					<th width="450">Diagnosa</th>
					<th>Aksi</th>
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
						<td style="word-break:break-all;"><?php echo $value['gejala'] ?></td>
						<td><?php echo $value['diagnosa'] ?></td>
						<td nowrap="">
							<button class="btn btn-sm btn-warning" type="button" onclick="hapusKonsultas(<?php echo "'".$value['id_servis']."','".$value['gejala']."'"?>)">Hapus</button>
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