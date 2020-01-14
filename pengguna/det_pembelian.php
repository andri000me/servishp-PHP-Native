<!DOCTYPE html>
<html>
<?php 
include_once '../config/dao.php';
$dao = new Dao();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dao->execute("SELECT * FROM penjualan WHERE id_penjualan = '$id'");
    $result = $result->fetch_array();
    $tgl_jual = explode('T', $result['tgl_jual']);
    $total_order = $result['total_penjualan'];
    $kd_transaksi = $result['id_penjualan'];
}
else{
    $tgl_jual = '-';
    $total_order = '-';
    $kd_transaksi = '-';
    $id = null;
}

?>
<?php include_once '../layout/head3.php'; ?>
<body>
    <?php include_once '../layout/navbar3.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <br>
        <h2><center><strong>Detail Pembelian</strong></center></h2>
        <br>
        <center>Kode Transaksi : <?php echo $kd_transaksi; ?><br>
            Tanggal : <?php echo $tgl_jual[0].' '.$tgl_jual['1']; ?><br>
            Total : <?php echo "Rp. ".$total_order; ?></center></span>
            <br>
            <a href="pembelian.php"><button class="btn btn-warning"><< Kembali</button></a>
            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>Nama Barang</center></th>
                        <th></th>
                        <th><center>Harga Satuan</center></th>
                        <th><center>Jumlah</center></th>
                        <th><center>Sub Total</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $result = $dao->viewDetPenjualan($_GET['id']);
                        $no = 1;
                        foreach ($result as $value){
                            ?>
                            <tr>
                                <td>1</td>
                                <td><img src="<?php echo $value['foto'] ?>" style="width: 100px; height: 100px;"></td>
                                <td><?php echo $value['nama_barang'] ?></td>
                                <td>Rp <?php echo $value['harga_jual'] ?></td>
                                <td><?php echo $value['jml_jual'] ?></td>
                                <td>Rp <?php echo $value['subtotal_jual'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <span style="font-size: 20px">Subtotal</span> <strong><span style="color: red; font-size: 24px">Rp 200000 </span></strong>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block" style="background-color: red; color: white;">Batalkan Pesanan</button>
                </div>
            </div>
            <br>
        </div>

        <?php include_once '../layout/footer2.php'; ?>
    </body>
    </html>