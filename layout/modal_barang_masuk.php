<!-- Modal Pembelian -->
<div class="modal fade" id="modalPembelian" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Pembelian</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_pembelian.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Tanggal Beli</label>
             <input type="hidden" name="id_pembelian" id="id_pembelian">
             <input type="hidden" name="aksi_pembelian" id="aksi_pembelian">
             <input type="date" id="tgl_beli" name="tgl_beli" class="form-control">
           </div>
           <div class="col-md-6">
             <label>Supplier</label>
             <select class="form-control" id="nama_supplier" name="nama_supplier">
               <option value="0">-- pilih --</option>
               <?php 
               $result = $dao->viewCombobox('Supplier','nama_supplier');
               foreach ($result as $value) {
                ?>
                <option value="<?php echo $value['id_supplier'] ?>"><?php echo $value['nama_supplier'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
         <div class="col-md-6">
           <label>Total Beli</label>
           <input type="text" id="total_beli" name="total_beli" class="form-control"> 
         </div>
         <div class="col-md-6">
          <label>Status</label><br>
          <input type="text" id="status" name="status" class="form-control">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn bg-blue waves-effect" id="tombol_pengguna1">
        <span id="tombol_pembelian"></span>
      </button>
      <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Modal Pembelian -->
<!-- Modal Detail Pembelian -->
<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Barang</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_pembelian.php" method="POST" enctype="multipart/form-data">
          <div class="row">
           <div class="col-md-12">
             <label>Nama Barang</label>
             <input type="hidden" name="id_barang" id="id_barang">
             <input type="hidden" name="id_beli" id="id_beli" value="<?php echo $id; ?>">
             <input type="hidden" name="aksi_barang" id="aksi_barang">
             <input type="text" id="nama_barang" name="nama_barang" class="form-control">
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Harga Beli</label>
             <input type="hidden" id="harga_lama" name="harga_lama" class="form-control">
             <input type="number" id="harga_beli" name="harga_beli" class="form-control">
           </div>
           <div class="col-md-6">
             <label>Harga Jual</label>
             <input type="number" id="harga_jual" name="harga_jual" class="form-control"> 
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Jumlah Barang</label>
             <input type="number" id="stok" name="stok" class="form-control"> 
             <input type="hidden" id="stok_lama" name="stok_lama" class="form-control"> 
           </div>
           <div class="col-md-3">
           </div>
           <div class="col-md-6">
             <label>Satuan</label>
             <input type="text" id="satuan" name="satuan" class="form-control"> 
           </div>
         </div>
         <div class="row">
          <div class="col-md-12">
           <label>Foto Barang</label>
           <input type="file" id="foto" name="foto" class="form-control">
         </div>
       </div>
     </div>
     <div class="modal-footer">
      <button type="submit" class="btn bg-blue waves-effect" id="tombol_pengguna1">
        <span id="tombol_barang"></span>
      </button>
      <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Modal Detail Pembelian -->
<!-- Modal Delete Pembelian-->
<div class="modal fade" id="modalDelPembelian" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Pembelian</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_pembelian.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_pembelian" id="id_del_pembelian">
            <input type="hidden" name="aksi_pembelian" id="aksi_del_pembelian">
            <h2 style="color: red"><center>Yakin Hapus data pembelian dari?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_pembelian"></span></center>
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
<!-- end of Modal Delete Pembelian-->
<!-- Modal Delete Barang-->
<div class="modal fade" id="modalDelBarang" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Barang</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_pembelian.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_barang" id="id_del_barang">
            <input type="hidden" name="id_beli" id="id_del_beli">
            <input type="hidden" name="aksi_barang" id="aksi_del_barang">
            <input type="hidden" name="harga_beli" id="harga_beli_del">
            <input type="hidden" id="del_stok_lama" name="stok_lama" class="form-control"> 
            <h2 style="color: red"><center>Yakin Hapus data pembelian barang</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_barang"></span></center>
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
<!-- end of Modal Delete Barang-->