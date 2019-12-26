<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
	$dao = new Dao();
    $id = $_GET['id'];
    $result = $dao->execute("SELECT servis.*, `teknisi`.nama as nama_teknisi, `users`.nama as nama_user FROM `users`, teknisi, servis WHERE `users`.id_user = `servis`.id_user AND `teknisi`.id_teknisi = `servis`.id_teknisi AND id_servis = '$id'");
    $result = $result->fetch_array();
    $nama = $result['nama_user'];
    $nama_teknisi = $result['nama_teknisi'];
    $total_biaya = $result['total_biaya'];

	$result = $dao->viewDetServis($_GET['id']);

	$html = '<html>';
	$html .= '<head>
			<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
			</head><body>';
	$html .= '<center><h3>DATA DETAIL SERVIS</h3></center><h3/>';
	$html .= '<span style="font-size: 15px"><center>
               Kode Servis : '.$id.'<br>
               Nama Pembeli : '.$nama.'<br>
               Teknisi : '.$nama_teknisi.'<br>
               Total : '.$total_biaya.'<br></center></span><br>';
	$html .= '<table class="table table-bordered">
			<thead style="background-color:#ff4500; color: white;">
			<tr>
			<th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Harga Satuan</center></th>
                <th><center>Jumlah</center></th>
                <th><center>Sub Total</center></th>
			</tr>
			</thead>
			<tbody>';
	$no = 1;
	foreach ($result as $value) {
		$html .= '<tr>';
		$html .= '<td>'.$no; $no++.'</td>';
		$html .= '<td>'.$value['nama_barang'].'</td>';
		$html .= '<td>'.$value['harga_jual'].'</td>';
		$html .= '<td>'.$value['jml'].'</td>';
		$html .= '<td>'.$value['subtotal'].'</td>';
		$html .= '</tr>';
	}
	$html .= '</tbody></table></body></html>';
	// echo $html;
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'potrait');
	$dompdf->render();
	$tgl = date('dmy');
	$nama_file = 'DOC-DET-SERVIS-'.$id.'-'.$tgl;
	$dompdf->stream($nama_file.'.pdf');
}
else{
	?>
		<script type="text/javascript">
			document.location = '../error/';
		</script>
	<?php
}
?>
