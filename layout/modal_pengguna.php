<!-- Modal Pembatalan-->
<div class="modal fade" id="modalBatal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Batalkan Pesanan</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_checkout.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id" id="id_del">
            <input type="hidden" name="aksi" value="batal">
            <h2 style="color: red"><center>Yakin batalkan pesanan ?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del"></span></center>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Oke</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Pembatalan -->
<!-- Modal CheckOut-->
<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Check Out Pesanan</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_checkout.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <input type="hidden" name="aksi" value="checkout">
            <h4 style="color: red"><center>Yakin lakukan proses checkout ?</center></h4>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Oke</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal CheckOut -->
<!-- Modal Keranjang-->
<div class="modal fade" id="modalKeranjang" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4><center>Keranjang</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_keranjang.php" method="POST">
          <div class="row">
           <div class="col-md-5">
            <img id="foto" src="" style="width: 150px; height: 150px">
          </div>
          <div class="col-md-7">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <input type="hidden" name="aksi" id="aksi" value="">
            <span id="nama" style="font-size: 20px"><strong></strong></span>
            <span id="harga" style="color: red; font-size: 18px"><strong></strong></span><br>
            <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</medium>
            <p class="card-text" style="font-size: 12px">Stok Tersedia : <span id="jml"></span> </p>
            <label>Jumlah</label>
            <input id="jumlah" type="number" min="1" max="" name="jumlah" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Tambah Ke Keranjang</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Keranjang -->