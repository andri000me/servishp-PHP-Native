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
                        <i class="material-icons">add_a_photo</i> Profil
                    </li>
                </ol>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                    <div class="card">
                        <div class="header">
                            <span style="font-size: 25px"><center>PROFIL</center></span>
                        </div>
                        <?php 
                        include_once '../config/dao.php';
                        $dao = new Dao();
                        $id = $_SESSION['id'];
                        $profil = $dao->view('users');
                        $profil = $profil->fetch_array();
                        // var_dump($profil);
                        ?>
                        <div class="body">
                            <form action="_crud_profil.php" method="POST">
                                <div class="row">
                                 <div class="col-md-6">
                                   <label>Nama</label>
                                   <input type="hidden" name="aksi" value="edit">
                                   <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?php echo $profil['id_user'] ?>">
                                   <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" value="<?php echo $profil['nama'] ?>">
                               </div>
                               <div class="col-md-6">
                                   <label>No HP/Telp</label>
                                   <input type="text" id="no_tlp_pengguna" name="no_tlp_pengguna" class="form-control" value="<?php echo $profil['no_tlp'] ?>">
                               </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <label>Alamat</label>
                               <textarea id="alamat_pengguna" name="alamat_pengguna" class="form-control" rows="3" style="resize: none;"><?php echo $profil['alamat'] ?></textarea>
                           </div>
                           <div class="col-md-6">
                               <label>Email</label>
                               <input type="email" id="email" name="email" class="form-control" value="<?php echo $profil['email'] ?>"> 
                           </div>
                       </div>
                       <div class="row">
                         <div class="col-md-6">
                           <label>Username</label>
                           <input type="text" id="username_pengguna" name="username_pengguna" class="form-control" value="<?php echo $profil['username'] ?>" readOnly="yes"> 
                       </div>
                       <div class="col-md-6">
                        <label>Hak Akses</label>
                        <input type="email" id="level" name="level" class="form-control" value="<?php echo $profil['level'] ?>" readOnly="yes"> 
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                     <label>Password</label>
                     <input type="password" id="password_pengguna" name="password_pengguna" class="form-control">
                 </div>
                 <div class="col-md-6">
                     <label>Confirm Password</label>
                     <input type="password" id="password_confirm_pengguna" name="password_confirm_pengguna" class="form-control">
                 </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary" type="Submit">Update</button>
                    <button class="btn btn-success" type="button">Revert</button>
                </div>
            </div>
        </div>
    </form>
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
