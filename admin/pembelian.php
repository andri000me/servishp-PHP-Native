<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahPembelian(){
        $('#id_pembelian').val('0');
        $('#aksi_pembelian').val('tambah');
        $('#tgl_beli').val('');
        $('#nama_supplier').val('0');
        $('#total_beli').val('0');
        document.getElementById('total_beli').readOnly = true;
        $('#status').val('');
        $('#tombol_pembelian').text('Simpan');
        $('#modalPembelian').modal('show');   
    }

    function ubahPembelian(id_pembelian,tgl_beli,id_supplier,total_beli,status){
        $('#id_pembelian').val(id_pembelian);
        $('#aksi_pembelian').val('ubah');
        $('#tgl_beli').val(tgl_beli);
        $('#nama_supplier').val(id_supplier);
        $('#total_beli').val(total_beli);
        document.getElementById('total_beli').readOnly = true;
        $('#status').val(status);
        $('#tombol_pembelian').text('Ubah');
        $('#modalPembelian').modal('show');   
    }

    function hapusPembelian(id,nm) {
        $('#id_del_pembelian').val(id);
        $('#aksi_del_pembelian').val('hapus');
        $('#nama_del_pembelian').text(nm);
        $('#modalDelPembelian').modal('show');                
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
                    <li class="active">
                        <i class="material-icons">shopping_cart</i> Data Pembelian
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
                            <span style="font-size: 25px"><center>DATA PEMBELIAN</center></span>
                            <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahPembelian();">
                                <i class="material-icons">playlist_add</i>
                            </button>
                            <a href="_cetak_pembelian.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="listdata">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Tanggal Beli</center></th>
                                            <th><center>Supplier</center></th>
                                            <th><center>Total Beli</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../config/dao.php';
                                        $dao = new Dao();
                                        $result = $dao->viewPembelian();
                                        $no = 1;
                                        foreach ($result as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['tgl_beli'] ?></td>
                                                <td><?php echo $value['nama_supplier'] ?></td>
                                                <td><?php echo $value['total_beli'] ?></td>
                                                <td><?php echo $value['status_beli'] ?></td>
                                                <td nowrap="">
                                                    <center>
                                                        <a href="det_pembelian.php?id=<?php echo $value['id_pembelian']; ?>"><button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float waves-light" title="Detail Pembelian">
                                                            <i class="material-icons">subject</i>
                                                        </button></a>
                                                        <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahPembelian('<?php echo $value['id_pembelian']."','".$value['tgl_beli']."','".$value['id_supplier']."','".$value['total_beli']."','".$value['status_beli']."'" ?>)">
                                                            <i class="material-icons">mode_edit</i>
                                                        </button>
                                                        <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusPembelian('<?php echo $value['id_pembelian']."','".$value['nama_supplier']."'"?>)">
                                                            <i class="material-icons">delete_forever</i>
                                                        </button>
                                                    </center>
                                                </td>
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
    <?php include_once '../layout/modal_barang_masuk.php'; ?>
    <?php include_once '../layout/js.php'; ?>
</body>
</html>
