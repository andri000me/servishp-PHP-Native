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
            <input type="hidden" name="id_keranjang" id="id_keranjang" value="">
            <input type="hidden" name="id_barang" id="id_barang" value="">
            <input type="hidden" name="harga" id="hrg" value="">
            <span id="nama" style="font-size: 20px"><strong></strong></span><br>
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
<!-- Modal Delete Keranjang-->
<div class="modal fade" id="modalDelKeranjang" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Keranjang</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_keranjang.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_keranjang" id="id_del_keranjang">
            <input type="hidden" name="aksi" id="aksi_del">
            <h2 style="color: red"><center>Yakin Hapus data ?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_barang"></span></center>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Delete Supplier-->
<!-- Modal Add Pertanyaan-->
<div class="modal fade" id="modalAddPertanyaan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Ajukan Pertanyaan</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_konsultasi.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
            <input type="hidden" name="aksi" value="add">
            <label>Merk/Tipe HP</label>
            <input type="text" name="tipe_hp" id="tipe_hp" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Gejala Kerusakan</label>
            <textarea class="form-control" rows="10" style="resize: none;" name="gejala"></textarea>
            <p align="justify" style="font-size: 12px"><i><sup>*</sup>Note : Balasan diagnosa kerusakan atas pertanyaan yang anda ajukan akan diterima setelah admin/teknisi membaca pertanyaan anda</i></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Add Pertanyaan -->
<!-- Modal Delete Pertanyaan-->
<div class="modal fade" id="modalDelPertanyaan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Pertanyaan</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_konsultasi.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_pertanyaan" id="id_del_pertanyaan">
            <input type="hidden" name="aksi" value="delete">
            <h2 style="color: red"><center>Yakin Hapus pertanyaan ?</center></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Merk/Tipe HP</label>
            <input type="text" name="tipe_hp" id="tipe_hp1" class="form-control" readonly="yes">
            <label>Gejala</label>
            <textarea readonly="yes" style="resize: none" rows="5" class="form-control" id="nama_pertanyaan" ></textarea>
          </div>
          <div class="col-md-12">
            <label>Diagnosa</label>
            <textarea readonly="yes" style="resize: none" rows="5" class="form-control" id="nama_diagnosa" ></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Delete Pertanyaan-->
<!-- Modal Add Servis-->
<div class="modal fade" id="modalAddServis" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Lanjutkan Servis</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_konsultasi.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
            <input type="hidden" name="id_servis" id="id_servis">
            <input type="hidden" name="aksi" value="add_servis">
            <label>Tanggal Ke Konter</label>
            <input type="date" name="tgl_masuk" class="form-control">
            <label>Estimasi Biaya</label>
            <input type="text" readonly="yes" id="estimasi1" class="form-control">
          </div>
        </div>
        <div class="row">
         <div class="col-md-12">
           <label>Merk/Tipe HP</label>
            <input type="text" name="tipe_hp" id="tipe_hp2" class="form-control" readonly="yes">
           <label>Gejala Kerusakan</label>
           <textarea class="form-control" readonly="yes" id="gejala1" rows="5" style="resize: none"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-sm btn-danger">Lanjut Servis</button>
      <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Add Servis -->
<!-- Modal Add Penialaian-->
<div class="modal fade" id="modalAddPenilaian" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Beri Penilaian</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_konsultasi.php" method="POST">
        <div class="row">
         <div class="col-md-12">
            <input type="hidden" name="id_servis" id="id_nilai">
            <input type="hidden" name="aksi" value="add_rating">
           <label>Rating</label>
            <select class="form-control" name="rating" id="rating">
              <option value="0">-- Pilih --</option>
              <option value="1">Tidak Memuaskan</option>
              <option value="2">Kurang Memuaskan</option>
              <option value="3">Cukup Memuaskan</option>
              <option value="4">Memuaskan</option>
              <option value="5">Sangat Memuaskan</option>
            </select>
           <label>Komentar</label>
           <textarea class="form-control" id="komentar" name="komentar" rows="5" style="resize: none"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
      <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Add Penialaian -->

<!-- Modal Add Penialaian Penjualan-->
<div class="modal fade" id="modalAddPenilaianJual" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Beri Penilaian</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_checkout.php" method="POST">
        <div class="row">
         <div class="col-md-12">
            <input type="hidden" name="id" id="id_nilai2">
            <input type="hidden" name="aksi" value="add_rating">
           <label>Rating</label>
            <select class="form-control" name="rating" id="rating2">
              <option value="0">-- Pilih --</option>
              <option value="1">Tidak Memuaskan</option>
              <option value="2">Kurang Memuaskan</option>
              <option value="3">Cukup Memuaskan</option>
              <option value="4">Memuaskan</option>
              <option value="5">Sangat Memuaskan</option>
            </select>
           <label>Komentar</label>
           <textarea class="form-control" id="komentar2" name="komentar" rows="5" style="resize: none"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
      <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Add Penialaian -->