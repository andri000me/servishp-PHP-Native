<?php include_once 'layout/head2.php'; ?>
<body>
<?php include_once 'layout/navbar2.php'; ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" style="height: 350px; width: 1200px;" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style="height: 350px; width: 1200px;" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style="height: 350px; width: 1200px;" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row">
          <?php 
          include_once 'config/dao.php';
          $dao = new Dao();
          $result = $dao->view('barang');
          // $result = $result->fetch_array();
          // echo '<pre>',print_r($result),'</pre>';
          foreach ($result as $value) {
            ?>
            <div class="col-lg-3">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" style="height: 150px;" src="<?php echo $value['foto'] ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a style="font-size: 23px; color: black" href="detail.php?id=<?php echo $value['id_barang'];?>"><?php echo $value['nama_barang'] ?></a>
                  </h4>
                  <h5 style="color: red;"><strong>Rp. <?php echo $value['harga_jual'] ?></strong></h5>
                  <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</medium>
                  <p class="card-text" style="font-size: 12px">Stok Tersedia : <?php echo $value['stok']?></p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?php echo $value['id_barang'];?>"><button class="btn btn-outline-primary btn-sm">Detail</button></a>
                  <a href="login.php"><button class="btn btn-outline-success btn-sm">Masukkan Keranjang</button></a>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

<?php include_once 'layout/footer.php'; ?>
</body>
</html>
