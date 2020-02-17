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
                <h2>DASHBOARD</h2>
            </div> 

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">build</i>
                        </div>
                        <div class="content">
                            <div class="text">SERVIS</div>
                            <?php 
                                include_once '../config/dao.php';
                                $dao = new Dao();
                                $result = $dao->viewDashboard('servis');
                                $result = $result->fetch_array();
                                $jml = $result['jml'];
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_basket</i>
                        </div>
                        <div class="content">
                            <?php 
                                $result = $dao->viewDashboard('pembelian');
                                $result = $result->fetch_array();
                                $jml = $result['jml'];
                            ?>
                            <div class="text">PEMBELIAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">euro_symbol</i>
                        </div>
                        <div class="content">
                            <?php 
                                $result = $dao->viewDashboard('penjualan');
                                $result = $result->fetch_array();
                                $jml = $result['jml'];
                            ?>
                            <div class="text">PENJUALAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <?php 
                            $result = $dao->viewDashboard('users');
                            $result = $result->fetch_array();
                            $jml = $result['jml'];
                            ?>
                            <div class="text">PENGGUNA</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150" width="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../layout/js.php'; ?>
</body>
</html>
