<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; 
include_once '../config/dao.php';
$dao = new Dao();
?>
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
                        <i class="material-icons">stars</i> Data Penilaian
                    </li>
                </ol>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size: 25px"><center>DATA PENILAIAN</center></span>
                            <br><br>
                            <form>
                                <div class="row">
                                    <div class="col-md-1">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="tabel" name="tabel" class="form-control col-md-2">
                                            <?php 
                                            if (empty($_GET['tabel']) || $_GET['tabel'] == 'penjualan') {
                                                ?>
                                                <option value="penjualan">Penjualan</option>
                                                <option value="servis">Servis</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="servis">Servis</option>
                                                <option value="penjualan">Penjualan</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="sumbit" class="btn btn-primary">Show</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="pengguna">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Tanggal</center></th>
                                            <th><center>Nama Pengguna</center></th>
                                            <th><center>Bintang</center></th>
                                            <th><center>Penilaian</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($_GET['tabel']) || $_GET['tabel'] == 'penjualan') {
                                            $result = $dao->viewPenilaian('penjualan','tgl_jual');
                                        }
                                        else{
                                            $result = $dao->viewPenilaian('servis','tgl_selesai');
                                        }
                                        $no = 1;
                                        foreach ($result as $value){
                                            $nilai = explode('-', $value['penilaian_pelanggan']);
                                            if ($nilai[0] == null) {
                                                $bintang = '-';
                                            }
                                            else{
                                                for ($i=0; $i < $nilai[0]; $i++) { 
                                                    $bintang .= '<i style="color: gold" class="material-icons">stars</i>';
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['tgl'] ?></td>
                                                <td><?php echo $value['nama']; ?></td>
                                                <td><?php echo $bintang; ?></td>
                                                <td><?php echo $nilai[1]; ?></td>
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
    <script>
        $(document).ready(function() {
            $('#supplier').DataTable();
        } );
    </script>
</body>
</html>
