 <!DOCTYPE html>
<html>
<?php 
include_once '../config/dao.php';
$dao = new Dao();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dao->execute("SELECT penjualan.*, `users`.nama FROM penjualan, users WHERE `users`.id_user = `penjualan`.id_user AND id_penjualan = '$id'");
    $result = $result->fetch_array();
    $tgl_jual = explode('T', $result['tgl_jual']);
    $nama = $result['nama'];
    $total_order = $result['total_penjualan'];
    $kd_transaksi = $result['id_penjualan'];
}
else{
    $tgl_jual = '-';
    $nama = '-';
    $total_order = '-';
    $kd_transaksi = '-';
    $id = null;
}

?>
<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahDetOrder(id_jual){
        $('#id_pembelian').val('0');
        $('#id_jual').val(id_jual);
        $('#sub_total').val('');
        $('#aksi_pembelian').val('tambah');
        $('#nama_barang').val('0');
        $('#jml_order').val('');
        $('#jml_order_lama').val('');
        $('#tombol_det_order').text('Simpan');
        $('#modalDetOrder').modal('show');   
    }

    function ubahDetOrder(id_det,id_jual,nama_barang,jml_order,sub_total){
        $('#id_pembelian').val(id_det);
        $('#id_jual').val(id_jual);
        $('#sub_total').val(sub_total);
        $('#aksi_pembelian').val('ubah');
        $('#nama_barang').val(nama_barang);
        $('#jml_order').val(jml_order);
        $('#jml_order_lama').val(jml_order);
        $('#tombol_det_order').text('Ubah');
        $('#modalDetOrder').modal('show');   
    }

    function hapusDetOrder(id_det,id_order,sub_total,nm,nama_barang,jml_order) {
        $('#id_del_det_order').val(id_det);
        $('#id_del_orders').val(id_order);
        $('#sub_total_del').val(sub_total);
        $('#nama_barang_del').val(nama_barang);
        $('#jml_order_del').val(jml_order);
        $('#aksi_del_det_order').val('hapus');
        $('#nama_del_det_order').text(nm);
        $('#modalDelDetOrder').modal('show');                
    }
</script>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <?php include_once '../layout/navbar.php'; ?>
    <?php include_once '../layout/sidebar.php'; ?>
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb">
                    <li>
                        <a href="../admin">
                            <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li>
                        <a href="order.php">
                            <i class="material-icons">local_mall</i> Data Order
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">archive</i> Data Detail Order
                    </li>
                </ol>
                <?php 
                if (isset($_GET['pesan']) && !empty($_GET['pesan'])) {
                    $pesan = explode(',', $_GET['pesan']);
                    ?>
                    <div class="alert <?php echo $pesan[0] ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><?php echo $pesan[1]; ?></strong><?php echo $pesan[2]; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size: 25px"><center>DATA DETAIL ORDER</center></span>
                            <span style="font-size: 15px"><center>
                                Kode Order : <?php echo $kd_transaksi; ?><br>
                                Tgl Order : <?php echo $tgl_jual[0].' '.$tgl_jual['1']; ?><br>
                                Pembeli : <?php echo $nama;  ?><br>
                                Total : <?php echo "Rp. ".$total_order; ?></center></span>
                                <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahDetOrder('<?php echo $id ?>')">
                                    <i class="material-icons">playlist_add</i>
                                </button>
                                <a href="_cetak_det_order.php?id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                    <i class="material-icons">local_printshop</i>
                                </button></a>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="pengguna">
                                        <thead style="background-color:#ff4500; color: white;">
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>Nama Barang</center></th>
                                                <th><center>Jumlah Order</center></th>
                                                <th><center>Harga Barang</center></th>
                                                <th><center>Sub Total</center></th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['id'])) {
                                                $result = $dao->viewDetOrder($_GET['id']);
                                                $no = 1;
                                                foreach ($result as $value){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; $no++; ?></td>
                                                        <td><?php echo $value['nama_barang'] ?></td>
                                                        <td><?php echo $value['jml_jual'] ?></td>
                                                        <td><?php echo $value['harga_jual'] ?></td>
                                                        <td><?php echo $value['subtotal_jual'] ?></td>
                                                        <td nowrap="">
                                                            <center>
                                                                <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahDetOrder('<?php echo $value['id_detpenjualan']."','".$value['id_jual']."','".$value['id_barang']."','".$value['jml_jual']."','".$value['subtotal_jual']."'" ?>)">
                                                                    <i class="material-icons">mode_edit</i>
                                                                </button>
                                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusDetOrder('<?php echo $value['id_detpenjualan']."','".$value['id_jual']."','".$value['subtotal_jual']."','".$value['nama_barang']."','".$value['id_barang']."','".$value['jml_jual']."'" ?>)">
                                                                    <i class="material-icons">delete_forever</i>
                                                                </button>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php include_once '../layout/modal_barang_keluar.php'; ?>
        <?php include_once '../layout/js.php'; ?>
        <script>
            $(document).ready(function() {
                $('#supplier').DataTable();
            } );
        </script>
    </body>
    </html>
