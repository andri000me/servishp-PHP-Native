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
<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahDetServis(){
        $('#id_det_servis').val('0');
        $('#subtotal').val('');
        $('#aksi_det_servis').val('tambah');
        $('#nama_barang').val('0');
        $('#jml_lama').val('0');
        $('#jml').val('');
        $('#tombol_det_servis').text('Simpan');
        $('#modalDetServis').modal('show');   
    }

    function ubahDetServis(id_det,subtotal,nama_barang,jml){
        $('#id_det_servis').val(id_det);
        $('#subtotal').val(subtotal);
        $('#aksi_det_servis').val('ubah');
        $('#nama_barang').val(nama_barang);
        $('#jml_lama').val(jml);
        $('#jml').val(jml);
        $('#tombol_det_servis').text('Ubah');
        $('#modalDetServis').modal('show');   
    }

    function hapusDetServis(id_det,subtotal,id_barang,nama_barang,jml) {
        $('#id_del_det_servis').val(id_det);
        $('#subtotal_del').val(subtotal);
        $('#nama_barang_del').val(id_barang);
        $('#jml_lama_del').val(jml);
        $('#nama_del_det_servis').text(nama_barang);
        $('#aksi_del_det_servis').val('hapus');
        $('#modalDelDetServis').modal('show');                
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
                        <a href="servis.php">
                            <i class="material-icons">phonelink_setup</i> Data Servis
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">devices</i> Data Detail Servis
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
                            <span style="font-size: 25px"><center>DATA DETAIL SERVIS</center></span>
                            <span style="font-size: 15px"><center>
                                Kode Servis : <?php echo $id; ?><br>
                                Pembeli : <?php echo $nama;  ?><br>
                                Teknisi : <?php echo $nama_teknisi;  ?><br>
                                Total : <?php echo "Rp. ".$total_biaya; ?></center></span>
                                <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahDetServis()">
                                    <i class="material-icons">playlist_add</i>
                                </button>
                                <a href="_cetak_det_servis.php?id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                    <i class="material-icons">local_printshop</i>
                                </button></a>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="listdata">
                                        <thead style="background-color:#ff4500; color: white;">
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>Nama Barang</center></th>
                                                <th><center>Harga Satuan</center></th>
                                                <th><center>Jumlah</center></th>
                                                <th><center>Sub Total</center></th>
                                                <th><center>Aksi</center></th>
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
                                                        <td nowrap="">
                                                            <center>
                                                                <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahDetServis('<?php echo $value['id_detservis']."','".$value['subtotal']."','".$value['id_barang']."','".$value['jml']; ?>')">
                                                                    <i class="material-icons">mode_edit</i>
                                                                </button>
                                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusDetServis('<?php echo $value['id_detservis']."','".$value['subtotal']."','".$value['id_barang']."','".$value['nama_barang']."','".$value['jml']; ?>')">
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
        <?php include_once '../layout/modal_servis.php'; ?>
        <?php include_once '../layout/js.php'; ?>
    </body>
    </html>
