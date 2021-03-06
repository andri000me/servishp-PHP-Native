<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahSupplier(){
        $('#id_supplier').val('0');
        $('#aksi_supplier').val('tambah');
        $('#nama_supplier').val('');
        $('#no_tlp_supplier').val('');
        $('#alamat_supplier').val('');
        $('#tombol_supplier').text('Simpan');
        $('#modalSupplier').modal('show');   
    }

    function tambahSupplier(id_supplier,nama_supplier,no_tlp_supplier,alamat_supplier){
        $('#id_supplier').val(id_supplier);
        $('#aksi_supplier').val('ubah');
        $('#nama_supplier').val(nama_supplier);
        $('#no_tlp_supplier').val(no_tlp_supplier);
        $('#alamat_supplier').val(alamat_supplier);
        $('#tombol_supplier').text('Ubah');
        $('#modalSupplier').modal('show');   
    }

    function hapusSupplier(id,nm) {
        $('#id_del_supplier').val(id);
        $('#aksi_del_supplier').val('hapus');
        $('#nama_del_supplier').text(nm);
        $('#modalDelSupplier').modal('show');                
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
                        <i class="material-icons">local_shipping</i> Data Supplier
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
                            <span style="font-size: 25px"><center>DATA SUPPLIER</center></span>
                            <a><button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahSupplier();">
                                <i class="material-icons">playlist_add</i>
                            </button></a>
                            <a href="_cetak_supplier.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="listdata">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Nama Supplier</center></th>
                                            <th><center>Alamat</center></th>
                                            <th><center>No HP/Telp</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../config/dao.php';
                                        $dao = new Dao();
                                        $result = $dao->view('supplier');
                                        $no = 1;
                                        foreach ($result as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['nama_supplier'] ?></td>
                                                <td><?php echo $value['alamat'] ?></td>
                                                <td><?php echo $value['no_tlp'] ?></td>
                                                <td nowrap="">
                                                    <center>
                                                        <a><button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="tambahSupplier('<?php echo $value['id_supplier']."','".$value['nama_supplier']."','".$value['no_tlp']."','".$value['alamat']."'" ?>)">
                                                            <i class="material-icons">mode_edit</i>
                                                        </button></a>
                                                        <a><button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusSupplier('<?php echo $value['id_supplier']."','".$value['nama_supplier']."'" ?>)">
                                                            <i class="material-icons">delete_forever</i>
                                                        </button></a>
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
    <?php include_once '../layout/modal.php'; ?>
    <?php include_once '../layout/js.php'; ?>
</body>
</html>
