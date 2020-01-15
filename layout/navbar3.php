<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #FF6347">
  <div class="container">
    <a class="navbar-brand" style="color: white;" href="#">Teknisi Tamvan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../../servishp/pengguna/" style="color: white;">Home
          </a>
        </li>
        <li class="nav-item dropdown">
          <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pembelian </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="keranjang.php">Keranjang</a>
            <a class="dropdown-item" href="pembelian.php">Riwayat Pembelian</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servis </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="konsultasi.php">Konsultasi</a>
            <a class="dropdown-item" href="servis.php">Riwayat Servis</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../logout.php">logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>