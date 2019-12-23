<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;

$dao = new Dao();
$result = $dao->viewStok();
$dompdf = new Dompdf();
$html = '<html>';
$html .= '<head>
		<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
		</head><body>';
$html .= '<center><h3>DATA STOK BARANG</h3></center><h3/><br/>';
$html .= '<table class="table table-bordered">
	<thead style="background-color:#ff4500; color: white;">
		<tr>
			<th><center>No</center></th>
			<th><center>Tgl Beli</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Supplier</center></th>
			<th><center>Stok</center></th>
		</tr>
	</thead>
	<tbody>';
		$no = 1;
		foreach ($result as $value) {
			$html .= '<tr>';
				$html .= '<td>'.$no; $no++.'</td>';
				$html .= '<td>'.$value['tgl_beli'].'</td>';
				$html .= '<td>'.$value['nama_barang'].'</td>';
				$html .= '<td>'.$value['nama_supplier'].'</td>';
				$html .= '<td>'.$value['stok'].' '.$value['satuan'].'</td>';
			$html .= '</tr>';
		}
$html .= '</tbody></table></body></html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$tgl = date('dmy');
$nama_file = 'DOC-STOK BARANG-'.$tgl;
$dompdf->stream($nama_file.'.pdf');
?>