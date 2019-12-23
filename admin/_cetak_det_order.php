<?php
require_once("../plugins/dompdf/autoload.inc.php");
include_once '../config/dao.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
	$dao = new Dao();
    $id = $_GET['id'];
    $result = $dao->execute("SELECT penjualan.*, `users`.nama FROM penjualan, users WHERE `users`.id_user = `penjualan`.id_user AND id_penjualan = '$id'");
    $result = $result->fetch_array();
    $tgl_jual = explode('T', $result['tgl_jual']);
    $nama = $result['nama'];
    $total_order = $result['total_penjualan'];
    $kd_transaksi = $result['id_penjualan'];

	$result = $dao->viewDetOrder($_GET['id']);

	$html = '<html>';
	$html .= '<head>
			<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
			</head><body>';
	$html .= '<center><h3>DATA DETAIL ORDER</h3></center><h3/>';
	$html .= '<span style="font-size: 15px"><center>
               Kode Order : '.$kd_transaksi.'<br>
               Tgl Order : '.$tgl_jual[0].' '.$tgl_jual[1].'<br>
               Nama Pembeli : '.$nama.'<br>
               Total Order : Rp. '.$total_order.'</center></span><br>';
	$html .= '<table class="table table-bordered">
			<thead style="background-color:#ff4500; color: white;">
			<tr>
			<th><center>No</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Jumlah Order</center></th>
			<th><center>Harga Barang</center></th>
			<th><center>Sub Total</center></th>
			</tr>
			</thead>
			<tbody>';
	$no = 1;
	foreach ($result as $value) {
		$html .= '<tr>';
		$html .= '<td>'.$no; $no++.'</td>';
		$html .= '<td>'.$value['nama_barang'].'</td>';
		$html .= '<td>'.$value['jml_jual'].'</td>';
		$html .= '<td>'.$value['harga_jual'].'</td>';
		$html .= '<td>'.$value['subtotal_jual'].'</td>';
		$html .= '</tr>';
	}
	$html .= '</tbody></table></body></html>';
	// echo $html;
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'potrait');
	$dompdf->render();
	$tgl = date('dmy');
	$nama_file = 'DOC-DET-ORDER-'.$kd_transaksi.'-'.$tgl;
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
