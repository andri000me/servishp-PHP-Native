<!DOCTYPE html>
<html>

<?php include_once '../layout/head.php'; ?>
<script type="text/javascript">
    function tambahPengguna(){
        $('#id_pengguna').val('0');
        $('#aksi_pengguna').val('tambah');
        $('#nama_pengguna').val('');
        $('#username_pengguna').val('');
        $('#no_tlp_pengguna').val('');
        $('#alamat_pengguna').val('');
        $('#email').val('');
        document.getElementById('username_pengguna').readOnly = false;
        document.getElementById('aktif').checked = false;
        document.getElementById('tdk_aktif').checked = true;
        document.getElementById('_admin').checked = false;
        document.getElementById('_pengguna').checked = true;
        document.getElementById('tombol_pengguna1').style.visibility = 'visible';
        $('#tombol_pengguna').text('Simpan');
        $('#modalPengguna').modal('show');   
    }

    function ubahPengguna(id,nama,username, no_tlp,alamat,status, level, email, tombol){
        $('#id_pengguna').val(id);
        $('#aksi_pengguna').val('ubah');
        $('#nama_pengguna').val(nama);
        $('#username_pengguna').val(username);
        $('#no_tlp_pengguna').val(no_tlp);
        $('#alamat_pengguna').val(alamat);
        $('#email').val(email);
        document.getElementById('username_pengguna').readOnly = true;
        if (status == 1) {
            $('#aktif').val(status);
            document.getElementById("aktif").checked = true;
            document.getElementById("tdk_aktif").checked = false;
        }
        else{
           $('#tdk_aktif').val(status);
           document.getElementById("aktif").checked = false;
           document.getElementById("tdk_aktif").checked = true;   
        }
        if (level == 'admin') {
            $('#_admin').val(level);
            document.getElementById("_admin").checked = true;
            document.getElementById("_pengguna").checked = false;
        }
        else{
            $('#_pengguna').val(level);
            document.getElementById("_admin").checked = false;
            document.getElementById("_pengguna").checked = true;
        }
        document.getElementById('tombol_pengguna1').style.visibility = tombol;
        $('#tombol_pengguna').text('Ubah');
        $('#modalPengguna').modal('show');   
   }

   function hapusPengguna(id,nm) {
    $('#id_del_pengguna').val(id);
    $('#aksi_del_pengguna').val('hapus');
    $('#nama_del_pengguna').text(nm);
    $('#modalDelPengguna').modal('show');                
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
                        <i class="material-icons">person</i> Data Pengguna
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
                            <span style="font-size: 25px"><center>DATA PENGGUNA</center></span>
                            <a><button type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Tambah Data" onclick="tambahPengguna();">
                                <i class="material-icons">playlist_add</i>
                            </button></a>
                            <a href="_cetak_pengguna.php" target="_blank"><button type="button" class="btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" title="Cetak Data">
                                <i class="material-icons">local_printshop</i>
                            </button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="pengguna">
                                    <thead style="background-color:#ff4500; color: white;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../config/dao.php';
                                        $dao = new Dao();
                                        $result = $dao->view('users');
                                        $no = 1;
                                        foreach ($result as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?php echo $value['nama'] ?></td>
                                                <td><?php echo $value['alamat'] ?></td>
                                                <td><?php echo $value['no_tlp'] ?></td>
                                                <td><?php echo $value['username'] ?></td>
                                                <td><?php echo $value['level'] ?></td>
                                                <td nowrap="">
                                                    <center>
                                                        <a><button type="button" class="btn bg-pink btn-circle waves-effect waves-circle waves-float waves-light" title="Lihat Data" onclick="ubahPengguna('<?php echo $value['id_user']."','".$value['nama']."','".$value['username']."','".$value['no_tlp']."','".$value['alamat']."','".$value['status']."','".$value['email']."','".$value['email']."','hidden'" ?>)">
                                                            <i class="material-icons">list</i>
                                                        </button></a>
                                                        <a><button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float waves-light" title="Edit Data" onclick="ubahPengguna('<?php echo $value['id_user']."','".$value['nama']."','".$value['username']."','".$value['no_tlp']."','".$value['alamat']."','".$value['status']."','".$value['level']."','".$value['email']."','visible'" ?>)">
                                                            <i class="material-icons">mode_edit</i>
                                                        </button></a>
                                                        <a><button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float waves-light" title="Hapus Data" onclick="hapusPengguna('<?php echo $value['id_user']."','".$value['nama']."'" ?>)">
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
    <script>
        $(document).ready(function() {
            $('#pengguna').DataTable();
        } );
    </script>
</body>
</html>
