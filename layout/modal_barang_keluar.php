<!-- Modal Order -->
<div class="modal fade" id="modalOrder" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Order</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_order.php" method="POST">
          <div class="row">
           <div class="col-md-6">
            <label>Kode Order</label>
            <input type="hidden" name="aksi_order" id="aksi_order">
            <input type="text" id="id_order" name="id_order" class="form-control"> 
          </div>
          <div class="col-md-6">
            <label>Tanggal Order</label><br>
            <input type="datetime-local" id="tgl_order" name="tgl_order" class="form-control">
          </div>
        </div>
        <div class="row">
         <div class="col-md-12">
           <label>Nama Pembeli - Alamat</label>
           <select class="form-control" id="nama_pembeli" name="nama_pembeli">
             <option value="0">-- pilih --</option>
             <?php 
             $result = $dao->viewCombobox('users','nama');
             foreach ($result as $value) {
              ?>
              <option value="<?php echo $value['id_user'] ?>"><?php echo $value['nama'].' - '.$value['alamat'] ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
       <div class="col-md-6">
        <label>Total Order</label>
        <input type="text" id="total_order" name="total_order" class="form-control"> 
      </div>
      <div class="col-md-6">
        <label>Status Order</label><br>
        <select id="status_order" name="status_order" class="form-control">
          <option value="aktif">Aktif</option>
          <option value="order">Order</option>
          <option value="proses">Proses</option>
          <option value="kirim">Kirim</option>
          <option value="selesai">Selesai</option>
          <option value="batal">Batal</option>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn bg-blue waves-effect" id="tombol_order1">
      <span id="tombol_order"></span>
    </button>
    <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
  </form>
</div>
</div>
</div>
</div>
<!-- end of Modal Order -->
<!-- Modal Detail Order -->
<div class="modal fade" id="modalDetOrder" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Pembelian</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_order.php" method="POST">
          <div class="row">
           <div class="col-md-8">
             <label>Tanggal Beli</label>
             <input type="hidden" name="id_pembelian" id="id_pembelian">
             <input type="hidden" name="id_jual" id="id_jual" value="<?php echo $id; ?>">
             <input type="hidden" name="sub_total" id="sub_total">
             <input type="hidden" name="aksi_det_order" id="aksi_pembelian">
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
            <label>Jumlah Order</label>
            <input type="hidden" id="jml_order_lama" name="jml_order_lama" class="form-control">
            <input type="number" id="jml_order" name="jml_order" class="form-control">
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn bg-blue waves-effect" id="tombol_det_order1">
        <span id="tombol_det_order"></span>
      </button>
      <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Modal Detail Order-->
<!-- Modal Delete Order-->
<div class="modal fade" id="modalDelOrder" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Order</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_order.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_order" id="id_del_order">
            <input type="hidden" name="aksi_order" id="aksi_del_order">
            <h2 style="color: red"><center>Yakin Hapus data Order dari?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_order"></span></center>
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
<!-- end of Modal Delete Order-->
<!-- Modal Delete Detail Order-->
<div class="modal fade" id="modalDelDetOrder" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Detail Order</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_det_order.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_pembelian" id="id_del_det_order">
            <input type="hidden" name="id_jual" id="id_del_orders">
            <input type="hidden" name="sub_total" id="sub_total_del"> 
            <input type="hidden" name="aksi_det_order" id="aksi_del_det_order">
            <input type="hidden" name="nama_barang" id="nama_barang_del">
            <input type="hidden" name="jml_order" id="jml_order_del">
            <h2 style="color: red"><center>Yakin Hapus data detail order</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_det_order"></span></center>
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
<!-- end of Modal Delete Detail Order-->