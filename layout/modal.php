<!-- Modal Pengguna -->
<div class="modal fade" id="modalPengguna" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Pengguna</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_pengguna.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Nama</label>
             <input type="hidden" name="id_pengguna" id="id_pengguna">
             <input type="hidden" name="aksi_pengguna" id="aksi_pengguna">
             <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control">
           </div>
           <div class="col-md-6">
             <label>No HP/Telp</label>
             <input type="text" id="no_tlp_pengguna" name="no_tlp_pengguna" class="form-control">
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Alamat</label>
             <textarea id="alamat_pengguna" name="alamat_pengguna" class="form-control" rows="3" style="resize: none;"></textarea>
           </div>
           <div class="col-md-6">
             <label>Email</label>
             <input type="email" id="email" name="email" class="form-control"> 
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <label>Username</label>
             <input type="text" id="username_pengguna" name="username_pengguna" class="form-control"> 
           </div>
           <div class="col-md-3">
            <label>Status</label><br>
            <input type="radio" name="status" id="aktif" value="1" class="radio-col-yellow">
            <label for="aktif">Aktif</label><br>
            <input type="radio" name="status" id="tdk_aktif" value="0" class="radio-col-red">
            <label for="tdk_aktif">Tidak Aktif</label>
          </div>
          <div class="col-md-3">
            <label>Hak Akses</label><br>
            <input type="radio" name="level" id="_admin" value="admin" class="radio-col-black">
            <label for="_admin">Administrator</label><br>
            <input type="radio" name="level" id="_pengguna" value="pengguna" class="radio-col-blue">
            <label for="_pengguna">Pengguna</label><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
           <label>Password</label>
           <input type="password" id="password_pengguna" name="password_pengguna" class="form-control">
         </div>
         <div class="col-md-6">
           <label>Confirm Password</label>
           <input type="password" id="password_confirm_pengguna" name="password_confirm_pengguna" class="form-control">
         </div>
       </div>
     </div>
     <div class="modal-footer">
      <button type="submit" class="btn bg-blue waves-effect" id="tombol_pengguna1">
        <span id="tombol_pengguna"></span>
      </button>
      <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- end of Modal Pengguna -->
<!-- Modal Supplier -->
<div class="modal fade" id="modalSupplier" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Supplier</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_supplier.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Nama</label>
             <input type="hidden" name="id_supplier" id="id_supplier">
             <input type="hidden" name="aksi_supplier" id="aksi_supplier">
             <input type="text" id="nama_supplier" name="nama_supplier" class="form-control">
           </div>
           <div class="col-md-6">
             <label>No HP/Telp</label>
             <input type="text" id="no_tlp_supplier" name="no_tlp_supplier" class="form-control">
           </div>
           <div class="col-md-12">
             <label>Alamat</label>
             <textarea id="alamat_supplier" name="alamat_supplier" class="form-control" rows="3" style="resize: none;"></textarea>
           </div>
         </div>
       </div>
       <div class="modal-footer">
        <button type="submit" class="btn bg-blue waves-effect">
          <span id="tombol_supplier"></span>
        </button>  
        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Supplier -->
<!-- Modal Teknisi -->
<div class="modal fade" id="modalTeknisi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Data Teknisi</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_teknisi.php" method="POST">
          <div class="row">
           <div class="col-md-6">
             <label>Nama</label>
             <input type="hidden" name="id_teknisi" id="id_teknisi">
             <input type="hidden" name="aksi_teknisi" id="aksi_teknisi">
             <input type="text" id="nama_teknisi" name="nama_teknisi" class="form-control">
           </div>
           <div class="col-md-6">
             <label>No HP/Telp</label>
             <input type="text" id="no_tlp_teknisi" name="no_tlp_teknisi" class="form-control">
           </div>
           <div class="col-md-12">
             <label>Alamat</label>
             <textarea id="alamat_teknisi" name="alamat_teknisi" class="form-control" rows="3" style="resize: none;"></textarea>
           </div>
         </div>
       </div>
       <div class="modal-footer">
        <button type="submit" class="btn bg-blue waves-effect">
          <span id="tombol_teknisi"></span>
        </button>
        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end of Modal Teknisi -->
<!-- Modal Delete Teknisi-->
<div class="modal fade" id="modalDelTeknisi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Teknisi</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_teknisi.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_teknisi" id="id_del_teknisi">
            <input type="hidden" name="aksi_teknisi" id="aksi_del_teknisi">
            <h2 style="color: red"><center>Yakin Hapus data ?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_teknisi"></span></center>
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
<!-- end of Modal Delete Teknisi -->
<!-- Modal Delete Supplier-->
<div class="modal fade" id="modalDelSupplier" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Supplier</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_supplier.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_supplier" id="id_del_supplier">
            <input type="hidden" name="aksi_supplier" id="aksi_del_supplier">
            <h2 style="color: red"><center>Yakin Hapus data ?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_supplier"></span></center>
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
<!-- end of Modal Delete Supplier-->
<!-- Modal Delete Supplier-->
<div class="modal fade" id="modalDelPengguna" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Hapus Pengguna</center></h4>
      </div>
      <div class="modal-body">
        <form action="_crud_pengguna.php" method="POST">
          <div class="row">
           <div class="col-md-12">
            <input type="hidden" name="id_pengguna" id="id_del_pengguna">
            <input type="hidden" name="aksi_pengguna" id="aksi_del_pengguna">
            <h2 style="color: red"><center>Yakin Hapus data ?</center></h2>
            <center><span style="font-size: 20px; color: blue" id="nama_del_pengguna"></span></center>
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
<!-- end of Modal Delete Supplier