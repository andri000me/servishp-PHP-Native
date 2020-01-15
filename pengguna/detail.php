<?php 
if (empty($_GET['id'])){
  ?>
  <script type="text/javascript">
    document.location = 'error/';
  </script>
  <?php
} 

include_once '../config/dao.php';
$dao = new Dao();
$result = $dao->detail($_GET['id']);
if (empty($result)){
  ?>
  <script type="text/javascript">
    document.location = 'error/';
  </script>
  <?php
} 
// echo '<pre>',var_dump($result),'</pre>'
?>
<?php include_once '../layout/head3.php'; ?>
<script type="text/javascript">
  function addKeranjang(jml,harga,nama,foto,id_barang) {
    $('#aksi').val('add');
    $('#jumlah').val('1');
    $('#jml').text(jml);
    $('#id_barang').val(id_barang);
    $('#hrg').val(harga);
    $('#harga').text('Rp '+harga);
    $('#nama').text(nama);
    $("#foto").attr("src", foto);
    document.getElementById("jumlah").max = jml;
    $('#modalKeranjang').modal('show');    
  }
</script>
<body>
  <?php include_once '../layout/navbar3.php'; ?>
  <!-- Page Content -->
  <div class="container">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <img style="height: 450px; width: 450px;" src="<?php echo $result['foto'] ?>" class="d-block img-fluid">
        </div>
        <div class="col-md-6">
          <h4><strong><?php echo $result['nama_barang'] ?></strong></h4>
          <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734; | 2 Penilaian | 2 Terjual</medium><br><br><br>
          <div class="card-body" style="background-color: #FAEBD7; color: red;"><h3><strong>Rp 30000</strong></h3></div><br>
          <span>Pengiriman : Only COD</span><br><br>
          <div class="row">
            <div class="col-md-5">
              <label> Tersisa : <?php echo $result['stok']; ?></label>
            </div>
          </div><br><br>
          <div class="card-footer">
            <button class="btn btn-outline-danger" type="button" onclick="addKeranjang(<?php echo "'".$result['stok']."','".$result['harga_jual']."','".$result['nama_barang']."','".$result['foto']."','".$result['id_barang']."'" ?>);">Masukkan Keranjang</button>
            <!-- <button class="btn btn-secondary">Beli Sekarang</button> -->
            <a href="../pengguna"><button class="btn btn-warning"><< Kembali</button></a>
          </div>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"><h5><strong>Deskripsi Produk</strong></h5></div>
            <div class="card-body">
              <p><?php echo $result['deskripsi']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <br>
          <div class="card">
            <div class="card-header"><h5><strong>Penilaian Pembeli</strong></h5></div>
            <div class="card-body">
              <table>
                <tr>
                  <td>
                    Foto
                  </td>
                  <td>
                    <p>Oke Banget</p>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once '../layout/modal_pengguna.php'; ?>
  <?php include_once '../layout/footer2.php'; ?>
</body>
</html>
