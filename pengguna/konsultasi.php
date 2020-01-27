<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
	function addKonsultasi() {
		$('#modalAddPertanyaan').modal('show');
	}

	function addServis(id_servis,tipe_hp,gejala, estimasi) {
		$('#id_servis').val(id_servis)
		$('#tipe_hp2').val(tipe_hp)
		$('#gejala1').val(gejala)
		$('#estimasi1').val(estimasi)
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
					<th width="400">Gejala</th>
					<th width="400">Diagnosa</th>
					<th width="100">Estimasi Biaya</th>
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
					$data = explode("-", $value['diagnosa']);
					$diagnosa = $data[0];
					$estimasi = $data[1];
					?>
					<tr>
						<td><?php echo $no;$no++; ?></td>
						<td><?php echo $value['tgl_masuk'] ?></td>
						<td><?php echo $value['tipe_hp'] ?></td>
						<td style="word-break:break-all;"><?php echo $value['gejala'] ?></td>
						<td><?php echo $diagnosa ?></td>
						<td><?php echo "Rp ".$estimasi ?></td>
						<td nowrap="">
							<button class="btn btn-sm btn-warning" type="button" onclick="hapusKonsultasi(<?php echo "'".$value['id_servis']."','".$value['gejala']."','".$value['diagnosa']."','".$value['tipe_hp']."'"?>)">Hapus</button>
							<?php 
							if ($value['status_servis'] == "konsul-terjawab") {
								?>
								<button class="btn btn-sm btn-success" type="button" onclick="addServis(<?php echo "'".$value['id_servis']."','".$value['tipe_hp']."','".$diagnosa."','".$estimasi ?>');">Lanjutkan ke Servis</button>	
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