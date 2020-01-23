<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; 
include_once '../config/dao.php';
$dao = new Dao();
$kode = $dao->generateKode();
?>
<script type="text/javascript">
    function tambahServis(id){
        $('#id_servis').val(id);
        $('#aksi_servis').val('tambah');
        $('#tgl_masuk').val('');
        $('#nama_pelanggan').val('0');
        $('#nama_teknisi').val('0');
        $('#gejala').val('');
        $('#diagnosa').val('');
        $('#tipe_hp').val('');
        $('#kelengkapan').val('');
        $('#tgl_selesai').val('');
        $('#total_biaya').val('0');
        $('#status_servis').val('aktif');
        $('#status_pembayaran').val('Belum Lunas');
        document.getElementById('id_servis').readOnly = true;
        document.getElementById('total_biaya').readOnly = true
        $('#tombol_servis').text('Simpan');
        $('#modalServis').modal('show');   
    }

    function ubahServis(id,tgl_masuk,nama_pelanggan,nama_teknisi,gejala,diagnosa,kelengkapan,tgl_selesai,total_biaya,status_servis,status_pembayaran,aksi,tipe_hp){
        $('#id_servis').val(id);
        $('#aksi_servis').val('ubah');
        $('#tgl_masuk').val(tgl_masuk);
        $('#nama_pelanggan').val(nama_pelanggan);
        $('#nama_teknisi').val(nama_teknisi);
        $('#tipe_hp').val(tipe_hp);
        $('#gejala').val(gejala);
        $('#diagnosa').val(diagnosa);
        $('#kelengkapan').val(kelengkapan);
        $('#tgl_selesai').val(tgl_selesai);
        $('#total_biaya').val(total_biaya);
        $('#status_servis').val(status_servis);
        $('#status_pembayaran').val(status_pembayaran);
        document.getElementById('id_servis').readOnly = true;
        document.getElementById('total_biaya').readOnly = true;
        document.getElementById('tombol_servis1').style.visibility = aksi;
        $('#tombol_servis').text('Ubah');
        $('#modalServis').modal('show');   
    }

    function hapusServis(id,nm) {
        $('#id_del_servis').val(id);
        $('#aksi_del_servis').val('hapus');
        $('#nama_del_servis').text(nm);
        $('#modalDelServis').modal('show');                
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
                        <i class="material-icons">phonelink_setup</i> Data Servis
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
                            <span style="font-size: 25px"><center>DATA SERVIS</center></span>
                            <button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahServis('<?php echo $kode ?>');">
                                <i class="material-icons">playlist_add</i>
                            </button>
                            <a href="_cetak_servis.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                            <br><br>
                            <form>
                                <div class="row">
                                    <div class="col-md-1">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="status_servis" name="status_servis" class="form-control col-md-2">
                                            <?php 
                                            if (empty($_GET['status_servis']) || $_GET['status_servis'] == 'aktif') {
                                                ?>
                                                <option value="aktif">Aktif</option>
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                                <?php
                                            }
                                            elseif($_GET['status_servis'] == 'proses'){
                                                ?>
                                                <option value="proses">Proses</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="selesai">Selesai</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="selesai">Selesai</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="proses">Proses</option>
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="listdata">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Kode Servis</center></th>
                                            <th><center>Tanggal Masuk</center></th>
                                            <th><center>Nama Pelanggan</center></th>
                                            <th><center>Teknisi</center></th>
                                            <th><center>Merk/Tipe HP</center></th>
                                            <th><center>Status Servis</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($_GET['status_servis']) || $_GET['status_servis'] == 'aktif') {
                                            $result = $dao->viewServis("'aktif'");
                                        }
                                        elseif($_GET['status_servis'] == 'proses') {
                                            $result = $dao->viewServis("'proses'");
                                        }
                                        else{
                                            $result = $dao->viewServis("'selesai'");
                                        }
                                        $no = 1;
                                        foreach ($result as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['id_servis'] ?></td>
                                                <td><?php echo $value['tgl_masuk'];?></td>
                                                <td><?php echo $value['nama_user'] ?></td>
                                                <td><?php echo $value['nama_teknisi'] ?></td>
                                                <td><?php echo $value['tipe_hp'] ?></td>
                                                <td><?php echo $value['status_servis'] ?></td>
                                                <td nowrap="">
                                                    <center>
                                                        <a href="det_servis.php?id=<?php echo $value['id_servis']; ?>"><button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float waves-light" title="Detail Servis">
                                                            <i class="material-icons">subject</i>
                                                        </button></a>
                                                        <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float waves-light" title="Info Servis" onclick="ubahServis('<?php echo $value['id_servis']."','".$value['tgl_masuk']."','".$value['id_user']."','".$value['id_teknisi']."','".$value['gejala']."','".$value['diagnosa']."','".$value['kelengkapan']."','".$value['tgl_selesai']."','".$value['total_biaya']."','".$value['status_servis']."','".$value['status_bayar']."','hidden'" ?>)">
                                                            <i class="material-icons">help_outline</i>
                                                        </button>
                                                        <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahServis('<?php echo $value['id_servis']."','".$value['tgl_masuk']."','".$value['id_user']."','".$value['id_teknisi']."','".$value['gejala']."','".$value['diagnosa']."','".$value['kelengkapan']."','".$value['tgl_selesai']."','".$value['total_biaya']."','".$value['status_servis']."','".$value['status_bayar']."','visible','".$value['tipe_hp']."'" ?>)">
                                                            <i class="material-icons">mode_edit</i>
                                                        </button>
                                                        <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusServis('<?php echo $value['id_servis']."','".$value['nama_user']; ?>');">
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
    <?php include_once '../layout/modal_servis.php'; ?>
    <?php include_once '../layout/js.php'; ?>
</body>
</html>
