<!DOCTYPE html>
<html>
<?php
include_once '../config/dao.php';
$dao = new Dao();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dao->execute("SELECT servis.*, `teknisi`.nama as nama_teknisi, `users`.nama as nama_user FROM `users`, teknisi, servis WHERE `users`.id_user = `servis`.id_user AND `teknisi`.id_teknisi = `servis`.id_teknisi AND id_servis = '$id'");
    $result = $result->fetch_array();
    $nama = $result['nama_user'];
    $nama_teknisi = $result['nama_teknisi'];
    $total_biaya = $result['total_biaya'];
}
else{
    $nama = '-';
    $total_biaya = '-';
    $id = null;
}

?>
<?php include_once '../layout/head3.php'; ?>
<body>
    <?php include_once '../layout/navbar3.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <br>
        <h2><center><strong>Detail Servis</strong></center></h2>
        <br>
        <center>Kode Servis : <?php echo $id; ?><br>
            Teknisi : <?php echo $nama_teknisi; ?><br>
            Total Biaya : <?php echo "Rp. ".$total_biaya; ?></center></span>
            <br>
            <a href="servis.php"><button class="btn btn-warning"><< Kembali</button></a>
            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>Nama Barang</center></th>
                        <th><center>Harga Satuan</center></th>
                        <th><center>Jumlah</center></th>
                        <th><center>Sub Total</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $result = $dao->viewDetServis($_GET['id']);
                        $no = 1;
                        foreach ($result as $value){
                            ?>
                            <tr>
                                <td><?php echo $no; $no++; ?></td>
                                <td><?php echo $value['nama_barang'] ?></td>
                                <td><?php echo $value['harga_jual'] ?></td>
                                <td><?php echo $value['jml'] ?></td>
                                <td><?php echo $value['subtotal'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <br>
        </div>
        <?php include_once '../layout/modal_pengguna.php'; ?>
        <?php include_once '../layout/footer2.php'; ?>
    </body>
    </html>