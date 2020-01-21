<!-- Modal Servis -->
<div class="modal fade" id="modalServis" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Servis</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_servis.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Kode Servis</label>
             <input type="hidden" name="aksi_servis" id="aksi_servis">
             <input type="text" name="id_servis" id="id_servis" class="form-control">
           </div>
           <div class="col-md-6">
             <label>Tanggal Masuk</label>
             <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control">
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Nama Pelanggan</label>
             <select class="form-control" id="nama_pelanggan" name="nama_pelanggan">
               <option value="0">-- pilih --</option>
               <?php 
               $result = $dao->viewCombobox('users','nama');
               foreach ($result as $value) {
                ?>
                <option value="<?php echo $value['id_user'] ?>"><?php echo $value['nama'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-6">
           <label>Teknisi</label>
           <select class="form-control" id="nama_teknisi" name="nama_teknisi">
             <option value="0">-- pilih --</option>
             <?php 
             $result = $dao->viewCombobox('teknisi','nama');
             foreach ($result as $value) {
              ?>
              <option value="<?php echo $value['id_teknisi'] ?>"><?php echo $value['nama'] ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
         <label>Gejala</label>
         <textarea id="gejala" name="gejala" class="form-control" rows="4" style="resize: none;"></textarea>
       </div>
       <div class="col-md-6">
         <label>Diagnosa</label>
         <textarea id="diagnosa" name="diagnosa" class="form-control" rows="4" style="resize: none;"></textarea>
       </div>
     </div>
     <div class="row">
      <div class="col-md-12">
        <label>Kelengkapan HP</label>
        <input type="text" name="kelengkapan" id="kelengkapan" class="form-control">
      </div>
    </div>
    <div class="row">
     <div class="col-md-6">
       <label>Tanggal Selesai</label>
       <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
     </div>
     <div class="col-md-6">
       <label>Total Biaya</label>
       <input type="text" name="total_biaya" id="total_biaya" class="form-control">
     </div>
   </div>
   <div class="row">
     <div class="col-md-6">
       <label>Status Servis</label>
       <select class="form-control" id="status_servis" name="status_servis">
        <option value="aktif">Aktif</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
      </select>
    </div>
    <div class="col-md-6">
     <label>Status Pembayaran</label>
     <select class="form-control" id="status_pembayaran" name="status_pembayaran">
      <option value="Belum Lunas">Belum Lunas</option>
      <option value="Lunas">Lunas</option>
    </select>
  </div>
</div>
</div>
<div class="modal-footer">
  <button type="submit" class="btn bg-blue waves-effect" id="tombol_servis1">
    <span id="tombol_servis"></span>
  </button>
  <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
</form>
</div>
</div>
</div>
</div>
<!-- end of Modal Servis -->
<!-- Modal Detail Servis -->
<div class="modal fade" id="modalDetServis" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Detail Servis</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_servis.php" method="POST">
          <div class="row">
           <div class="col-md-8">
             <label>Tanggal Beli</label>
             <input type="hidden" name="id_det_servis" id="id_det_servis">
             <input type="hidden" name="_id_servis_" id="_id_servis" value="<?php echo $id; ?>">
             <input type="hidden" name="subtotal" id="subtotal">
             <input type="hidden" name="aksi_det_servis" id="aksi_det_servis">
             <label>Nama Barang</label>
             <select class="form-control" id="nama_barang" name="nama_barang">
               <option value="0">-- pilih --</option>
               <?php 
               $result = $dao->viewCombobox('barang','nama_barang');
               foreach ($result as $value) {
                ?>
                <option value="<?php echo $value['id_barang'] ?>"><?php echo $value['nama_barang'].' - Rp. '.$value['harga_jual'].' - '.$value['stok'].' '.$value['satuan']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-4">
            <label>Jumlah Barang</label>
            <input type="hidden" id="jml_lama" name="jml_lama" class="form-control">
            <input type="number" id="jml" name="jml" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn bg-blue waves-effect" id="tombol_det_order1">
          <span id="tombol_det_servis"></span>
        </button>
        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Detail Servis-->

<!-- Modal Delete Servis-->
<div class="modal fade" id="modalDelServis" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Servis</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_servis.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_servis" id="id_del_servis">
            <input type="hidden" name="aksi_servis" id="aksi_del_servis">
            <h2 style="color: red"><center>Yakin Hapus data servis </center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_servis"></span></center>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn bg-blue waves-effect">Hapus</button>
        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Delete Servis-->
<!-- Modal Delete Detail Servis-->
<div class="modal fade" id="modalDelDetServis" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Detail Servis</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_servis.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_det_servis" id="id_del_det_servis">
            <input type="hidden" name="_id_servis_" value="<?php echo $id; ?>">
            <input type="hidden" name="subtotal" id="subtotal_del"> 
            <input type="hidden" name="aksi_det_servis" id="aksi_del_det_servis">
            <input type="hidden" name="nama_barang" id="nama_barang_del">
            <input type="hidden" name="jml_lama" id="jml_lama_del">
            <h2 style="color: red"><center>Yakin Hapus data servis </center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_det_servis"></span></center>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn bg-blue waves-effect">Hapus</button>
        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Delete Detail Servis-->

<!-- Modal Servis -->
<div class="modal fade" id="modalKonsultasi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Konsultasi</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_servis.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Kode Konsultasi</label>
             <input type="hidden" name="aksi_servis" id="aksi_servis1">
             <input type="text" name="id_servis" id="id_servis1" class="form-control">
           </div>
           <div class="col-md-6">
             <label>Tanggal Masuk</label>
             <input type="date" name="tgl_masuk" id="tgl_masuk1" class="form-control">
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Nama Pelanggan</label>
             <select class="form-control" id="nama_pelanggan1" name="nama_pelanggan">
               <option value="0">-- pilih --</option>
               <?php 
               $result = $dao->viewCombobox('users','nama');
               foreach ($result as $value) {
                ?>
                <option value="<?php echo $value['id_user'] ?>"><?php echo $value['nama'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-6"><br>
            <input type="radio" name="pindah" id="pindah" value="aktif" class="radio-col-black">
            <label for="pindah">Pindah Ke Servis</label><br>
         </div>
       </div>
       <div class="row">
        <div class="col-md-6">
         <label>Gejala</label>
         <textarea id="gejala1" name="gejala" class="form-control" rows="6" style="resize: none;"></textarea>
       </div>
       <div class="col-md-6">
         <label>Diagnosa</label>
         <textarea id="diagnosa1" name="diagnosa" class="form-control" rows="6" style="resize: none;"></textarea>
       </div>
     </div>
   </div>
   <div class="modal-footer">
    <button type="submit" class="btn bg-blue waves-effect" id="tombol_konsul">
      <span id="tombol_servis"></span>
    </button>
    <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
  </form>
</div>
</div>
</div>
</div>
<!-- end of Modal Servis -->