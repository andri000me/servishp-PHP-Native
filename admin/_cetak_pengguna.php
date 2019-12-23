<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;

$dao = new Dao();
$result = $dao->view('users');
$dompdf = new Dompdf();
$html = '<html>';
$html .= '<head>
		<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
		</head><body>';
$html .= '<center><h3>DATA PENGGUNA</h3></center><h3/><br/>';
$html .= '<table class="table table-bordered">
	<thead style="background-color:#ff4500; color: white;">
		<tr>
			<th><center>No</center></th>
			<th><center>Nama</center></th>
			<th><center>Alamat</center></th>
			<th><center>No HP</center></th>
			<th><center>Username</center></th>
			<th><center>Hak Akses</center></th>
		</tr>
	</thead>
	<tbody>';
		$no = 1;
		foreach ($result as $value) {
			$html .= '<tr>';
				$html .= '<td>'.$no; $no++.'</td>';
				$html .= '<td>'.$value['nama'].'</td>';
				$html .= '<td>'.$value['alamat'].'</td>';
				$html .= '<td>'.$value['no_tlp'].'</td>';
				$html .= '<td>'.$value['username'].'</td>';
				$html .= '<td>'.$value['level'].'</td>';
			$html .= '</tr>';
		}
$html .= '</tbody></table></body></html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$tgl = date('dmy');
$nama_file = 'DOC-PENGGUNA-'.$tgl;
$dompdf->stream($nama_file.'.pdf');
?>