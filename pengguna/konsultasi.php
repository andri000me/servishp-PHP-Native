<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
	function addKonsultasi() {
		$('#modalAddPertanyaan').modal('show');
	}

	function addServis(id_servis,tipe_hp,gejala) {
		$('#id_servis').val(id_servis)
		$('#tipe_hp2').val(tipe_hp)
		$('#gejala1').val(gejala)
		$('#modalAddServis').modal('show');
	}

	function hapusKonsultasi(id,nama,diagnosa,tipe_hp) {
		$('#id_del_pertanyaan').val(id);
		$('#tipe_hp1').val(tipe_hp)
		$('#nama_pertanyaan').val(nama)
		$('#nama_diagnosa').val(diagnosa);
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
		<button class="btn btn-sm btn-primary" type="button" onclick="addKonsultasi();">Ajukan Pertanyaan</button>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th width="120">Tanggal</th>
					<th>Merk/Tipe HP</th>
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
						<td><?php echo $value['tipe_hp'] ?></td>
						<td style="word-break:break-all;"><?php echo $value['gejala'] ?></td>
						<td><?php echo $value['diagnosa'] ?></td>
						<td nowrap="">
							<button class="btn btn-sm btn-warning" type="button" onclick="hapusKonsultasi(<?php echo "'".$value['id_servis']."','".$value['gejala']."','".$value['diagnosa']."','".$value['tipe_hp']."'"?>)">Hapus</button>
							<?php 
							if ($value['status_servis'] == "konsul-terjawab") {
								?>
								<button class="btn btn-sm btn-success" type="button" onclick="addServis(<?php echo "'".$value['id_servis']."','".$value['tipe_hp']."','".$value['gejala']; ?>');">Lanjutkan ke Servis</button>	
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