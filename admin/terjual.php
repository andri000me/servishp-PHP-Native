<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; ?>
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
                    <li class="active">
                        <i class="material-icons">local_atm</i> Data Barang Terjual
                    </li>
                </ol>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size: 25px"><center>DATA BARANG TERJUAL</center></span>
                            <a href="_cetak_terjual.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="listdata">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Kode Transaksi</center></th>
                                            <th><center>Nama Barang</center></th>
                                            <th><center>Jumlah</center></th>
                                            <th><center>Sub Total</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../config/dao.php';
                                        $dao = new Dao();
                                        $result = $dao->viewTerjual();
                                        $no = 1;
                                        foreach ($result as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['id_jual'] ?></td>
                                                <td><?php echo $value['nama_barang'] ?></td>
                                                <td><?php echo $value['jml_jual'] ?></td>
                                                <td><?php echo $value['subtotal_jual'] ?></td>
                                            </tr>
                                            <?php
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
    <?php include_once '../layout/js.php'; ?>
</body>
</html>
