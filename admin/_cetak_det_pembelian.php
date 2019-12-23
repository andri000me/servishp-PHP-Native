<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;
if (!empty($_GET['id'])) {
	$dao = new Dao();
	$dompdf = new Dompdf();
	$id = $_GET['id'];
    $result = $dao->execute("SELECT pembelian.*, `supplier`.nama_supplier FROM pembelian, supplier WHERE `supplier`.id_supplier = `pembelian`.id_supplier AND id_pembelian = '$id'");
    $result = $result->fetch_array();
    $tgl_beli = $result['tgl_beli'];
    $supplier = $result['nama_supplier'];
    $total_beli = $result['total_beli'];

	$result = $dao->viewDetPembelian($_GET['id']);

	$html = '<html>';
	$html .= '<head>
			<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
			</head><body>';
	$html .= '<center><h3>DATA PEMBELIAN</h3></center><h3/>';
	$html .= '<span style="font-size: 15px"><center>
               Tgl Masuk : '.$tgl_beli.'<br>
               Supplier : '.$supplier.'<br>
               Total Beli : Rp. '.$total_beli.'</center></span><br>';
	$html .= '<table class="table table-bordered">
			<thead style="background-color:#ff4500; color: white;">
			<tr>
			<th><center>No</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Harga Beli</center></th>
			<th><center>Harga Jual</center></th>
			<th><center>Stok</center></th>
			<th><center>Satuan</center></th>
			</tr>
			</thead>
			<tbody>';
	$no = 1;
	foreach ($result as $value) {
		$html .= '<tr>';
		$html .= '<td>'.$no; $no++.'</td>';
		$html .= '<td>'.$value['nama_barang'].'</td>';
		$html .= '<td>'.$value['harga_beli'].'</td>';
		$html .= '<td>'.$value['harga_jual'].'</td>';
		$html .= '<td>'.$value['stok'].'</td>';
		$html .= '<td>'.$value['satuan'].'</td>';
		$html .= '</tr>';
	}
	$html .= '</tbody></table></body></html>';
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'potrait');
	$dompdf->render();
	$tgl = date('dmy');
	$nama_file = 'DOC-DET-PEMBELIAN-'.$tgl;
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
