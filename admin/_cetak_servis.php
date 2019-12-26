<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;

$dao = new Dao();
$result = $dao->viewServis();
$dompdf = new Dompdf();
$html = '<html>'; 
$html .= '<head>
<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
</head><body>';
$html .= '<center><h3>DATA SERVIS</h3></center><h3/><br/>';
$html .= '<table class="table table-bordered">
		<thead style="background-color:#ff4500; color: white;">
			<tr>
				<th><center>No</center></th>
				<th><center>Kode Servis</center></th>
				<th><center>Tanggal Masuk</center></th>
				<th><center>Nama Pelanggan</center></th>
				<th><center>Teknisi</center></th>
				<th><center>Gejala</center></th>
				<th><center>Diagnosa</center></th>
				<th><center>Total Biaya</center></th>
				<th><center>Status Servis</center></th>
				<th><center>Status Bayar</center></th>
			</tr>
		</thead>
		<tbody>';
$no = 1;
foreach ($result as $value) {
	$html .= '<tr>';
	$html .= '<td>'.$no; $no++.'</td>';
	$html .= '<td>'.$value['id_servis'].'</td>';
	$html .= '<td>'.$value['tgl_masuk'].'</td>';
	$html .= '<td>'.$value['nama_user'].'</td>';
	$html .= '<td>'.$value['nama_teknisi'].'</td>';
	$html .= '<td>'.$value['gejala'].'</td>';
	$html .= '<td>'.$value['diagnosa'].'</td>';
	$html .= '<td>'.$value['total_biaya'].'</td>';
	$html .= '<td>'.$value['status_servis'].'</td>';
	$html .= '<td>'.$value['status_bayar'].'</td>';
	$html .= '</tr>';
}
$html .= '</tbody></table></body></html>';
// echo $html;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$tgl = date('dmy');
$nama_file = 'DOC-SERVIS-'.$tgl;
$dompdf->stream($nama_file.'.pdf');
?>