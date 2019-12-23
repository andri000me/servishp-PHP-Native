<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;

$dao = new Dao();
$result = $dao->viewPenjualan();
$dompdf = new Dompdf();
$html = '<html>'; 
$html .= '<head>
<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
</head><body>';
$html .= '<center><h3>DATA ORDER</h3></center><h3/><br/>';
$html .= '<table class="table table-bordered">
		<thead style="background-color:#ff4500; color: white;">
		<tr>
		<th><center>No</center></th>
		<th><center>Kode Order</center></th>
		<th><center>Tanggal Order</center></th>
		<th><center>Nama Pembeli</center></th>
		<th><center>Total Order</center></th>
		<th><center>Status</center></th>
		</tr>
		</thead>
		<tbody>';
$no = 1;
foreach ($result as $value) {
	$tgl = explode('T', $value['tgl_jual']);
	$html .= '<tr>';
	$html .= '<td>'.$no; $no++.'</td>';
	$html .= '<td>'.$value['id_penjualan'].'</td>';
	$html .= '<td>'.$tgl[0].' '.$tgl[1].'</td>';
	$html .= '<td>'.$value['nama'].'</td>';
	$html .= '<td>'.$value['total_penjualan'].'</td>';
	$html .= '<td>'.$value['status_penjualan'].'</td>';
$html .= '</tr>';
}
$html .= '</tbody></table></body></html>';
// echo $html;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$tgl = date('dmy');
$nama_file = 'DOC-ORDER-'.$tgl;
$dompdf->stream($nama_file.'.pdf');
?>