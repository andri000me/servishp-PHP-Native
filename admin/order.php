<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; 
include_once '../config/dao.php';
$dao = new Dao();
$kode = $dao->generateKode();

?>
<script type="text/javascript">
    function tambahOrder(id){
        $('#id_order').val(id);
        $('#aksi_order').val('tambah');
        $('#tgl_order').val('');
        $('#nama_pembeli').val('0');
        document.getElementById('id_order').readOnly = true;
        document.getElementById('total_order').readOnly = true;
        $('#total_order').val('0');
        $('#status_order').val('aktif');
        $('#tombol_order').text('Simpan');
        $('#modalOrder').modal('show');   
    }

    function ubahOrder(id_order,tgl_order,nama_pembeli,total_order,status_order){
        $('#id_order').val(id_order);
        $('#aksi_order').val('ubah');
        $('#tgl_order').val(tgl_order);
        $('#nama_pembeli').val(nama_pembeli);
        document.getElementById('id_order').readOnly = true;
        document.getElementById('total_order').readOnly = true;
        $('#total_order').val(total_order);
        $('#status_order').val(status_order);
        $('#tombol_order').text('Ubah');
        $('#modalOrder').modal('show');   
    }

    function hapusOrder(id,nm) {
        $('#id_del_order').val(id);
        $('#aksi_del_order').val('hapus');
        $('#nama_del_order').text(nm);
        $('#modalDelOrder').modal('show');                
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
                        <i class="material-icons">local_mall</i> Data Order
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
                            <span style="font-size: 25px"><center>DATA ORDER</center></span>
                            <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahOrder('<?php echo $kode ?>');">
                                <i class="material-icons">playlist_add</i>
                            </button>
                            <a href="_cetak_order.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                            <br><br>
                            <form>
                                <div class="row">
                                    <div class="col-md-1">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="status_order" name="status_order" class="form-control col-md-2">
                                            <option value="all">All</option>
                                            <option value="order">Order</option>
                                            <option value="proses">Proses</option>
                                            <option value="antar">Antar</option>
                                            <!-- <option value="selesai">Selesai</option>
                                            <option value="batal">Batal</option> -->
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
                                            <th><center>Kode Order</center></th>
                                            <th><center>Tanggal Order</center></th>
                                            <th><center>Nama Pembeli</center></th>
                                            <th><center>Total Order</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $dao->viewPenjualan();
                                        $no = 1;
                                        foreach ($result as $value){
                                            $tgl = explode('T', $value['tgl_jual']);
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['id_penjualan'] ?></td>
                                                <td><?php echo $tgl[0].' '.$tgl[1]; ?></td>
                                                <td><?php echo $value['nama'] ?></td>
                                                <td><?php echo $value['total_penjualan'] ?></td>
                                                <td><?php echo $value['status_penjualan'] ?></td>
                                                <td nowrap="">
                                                    <center>
                                                        <a href="det_order.php?id=<?php echo $value['id_penjualan']; ?>"><button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float waves-light" title="Detail Order">
                                                            <i class="material-icons">subject</i>
                                                        </button></a>
                                                        <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahOrder('<?php echo $value['id_penjualan']."','".$value['tgl_jual']."','".$value['id_user']."','".$value['total_penjualan']."','".$value['status_penjualan']."'" ?>)">
                                                            <i class="material-icons">mode_edit</i>
                                                        </button>
                                                        <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusOrder('<?php echo $value['id_penjualan']."','".$value['nama']."'"?>)">
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
    <?php include_once '../layout/modal_barang_keluar.php'; ?>
    <?php include_once '../layout/js.php'; ?>
    <script>
        $(document).ready(function() {
            $('#supplier').DataTable();
        } );
    </script>
</body>
</html>
