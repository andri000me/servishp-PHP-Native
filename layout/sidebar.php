<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama']; ?></div>
                <div class="email"><?php echo $_SESSION['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="profil.php"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="../admin">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Data Master</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <li>
                                <a href="supplier.php">Supplier</a>
                            </li>
                            <li>
                                <a href="pengguna.php">Pengguna</a>
                            </li>
                            <li>
                                <a href="teknisi.php">Teknisi</a>
                            </li>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">shopping_basket</i>
                        <span>Transaksi Barang Masuk</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <li>
                                <a href="pembelian.php">Data Pembelian</a>
                            </li>
                            <li>
                                <a href="stok_barang.php">Data Stok Barang</a>
                            </li>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">monetization_on</i>
                        <span>Transaksi Barang Keluar</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <li>
                                <a href="order.php">Data Order</a>
                            </li>
                            <li>
                                <a href="terjual.php">Data Barang Terjual</a>
                            </li>
                            <li>
                                <a href="keuntungan.php">Keuntungan</a>
                            </li>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">build</i>
                        <span>Data Konsultasi & Servis</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <li>
                                <a href="konsultasi.php">Data Konsultasi</a>
                            </li>
                            <li>
                                <a href="servis.php">Data Servis</a>
                            </li>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="penilaian.php">
                        <i class="material-icons">stars</i>
                        <span>Penilaian Pembeli</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                <center>&copy; 2019 <a href="javascript:void(0);">Teknisi Tamvan</a></center>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>