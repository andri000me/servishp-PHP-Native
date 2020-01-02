<!DOCTYPE html>
<html>
<?php 
include_once '../config/dao.php';
$dao = new Dao();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dao->execute("SELECT pembelian.*, `supplier`.nama_supplier FROM pembelian, supplier WHERE `supplier`.id_supplier = `pembelian`.id_supplier AND id_pembelian = '$id'");
    $result = $result->fetch_array();
    $tgl_beli = $result['tgl_beli'];
    $supplier = $result['nama_supplier'];
    $total_beli = $result['total_beli'];
}
else{
    $tgl_beli = '-';
    $supplier = '-';
    $id = null;
    $total_beli = '-';
}

?>
<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahBarang(id_beli){
        $('#id_barang').val('0');
        $('#id_beli').val(id_beli);
        $('#aksi_barang').val('tambah');
        $('#nama_barang').val('');
        $('#harga_beli').val('');
        $('#harga_jual').val('');
        $('#stok_lama').val('');
        $('#stok').val('');
        $('#satuan').val('');
        $('#deskripsi').val('');
        $('#tombol_barang').text('Simpan');
        $('#modalBarang').modal('show');   
    }

    function ubahBarang(id_barang,id_beli,nama_barang,harga_beli,harga_jual,stok,satuan,deskripsi){
        $('#id_barang').val(id_barang);
        $('#id_beli').val(id_beli);
        $('#aksi_barang').val('ubah');
        $('#nama_barang').val(nama_barang);
        $('#harga_beli').val(harga_beli);
        $('#harga_lama').val(harga_beli);
        $('#harga_jual').val(harga_jual);
        $('#stok_lama').val(stok);
        $('#stok').val(stok);
        $('#satuan').val(satuan);
        $('#deskripsi').val(deskripsi);
        $('#tombol_barang').text('Ubah');
        $('#modalBarang').modal('show');   
    }

    function hapusBarang(id,nm,id_beli,harga_beli,stok) {
        $('#id_del_barang').val(id);
        $('#id_del_beli').val(id_beli);
        $('#harga_beli_del').val(harga_beli);
        $('#del_stok_lama').val(stok);
        $('#aksi_del_barang').val('hapus');
        $('#nama_del_barang').text(nm);
        $('#modalDelBarang').modal('show');                
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
                        <a href="pembelian.php">
                            <i class="material-icons">shopping_cart</i> Data Pembelian
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">archive</i> Data Detail Pembelian
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
                            <span style="font-size: 25px"><center>DATA DETAIL PEMBELIAN</center></span>
                            <span style="font-size: 15px"><center>
                                Tgl Masuk : <?php echo $tgl_beli; ?><br>
                                Supplier : <?php echo $supplier;  ?><br>
                                Total Beli : <?php echo "Rp. ".$total_beli; ?></center></span>
                                <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahBarang('<?php echo $id ?>')">
                                    <i class="material-icons">playlist_add</i>
                                </button>
                                <a href="_cetak_det_pembelian.php?id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
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
                                                <th><center>Foto Barang</center></th>
                                                <th><center>Harga Beli</center></th>
                                                <th><center>Harga Jual</center></th>
                                                <th><center>Stok</center></th>
                                                <th><center>Satuan</center></th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['id'])) {
                                                $result = $dao->viewDetPembelian($_GET['id']);
                                                $no = 1;
                                                foreach ($result as $value){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; $no++; ?></td>
                                                        <td><?php echo $value['nama_barang'] ?></td>
                                                        <td><img style="width: 100px; height: 100px;" src="<?php echo $value['foto'] ?>"></td>
                                                        <td><?php echo $value['harga_beli'] ?></td>
                                                        <td><?php echo $value['harga_jual'] ?></td>
                                                        <td><?php echo $value['stok'] ?></td>
                                                        <td><?php echo $value['satuan'] ?></td>
                                                        <td nowrap="">
                                                            <center>
                                                                <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahBarang('<?php echo $value['id_barang']."','".$id."','".$value['nama_barang']."','".$value['harga_beli']."','".$value['harga_jual']."','".$value['stok']."','".$value['satuan']."','".$value['deskripsi']."'"; ?>)">
                                                                    <i class="material-icons">mode_edit</i>
                                                                </button>
                                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusBarang('<?php echo $value['id_barang']."','".$value['nama_barang']."','".$id."','".$value['harga_beli']."','".$value['stok']."'"; ?>)">
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
        <?php include_once '../layout/modal_barang_masuk.php'; ?>
        <?php include_once '../layout/js.php'; ?>
        <script>
            $(document).ready(function() {
                $('#supplier').DataTable();
            } );
        </script>
    </body>
    </html>
