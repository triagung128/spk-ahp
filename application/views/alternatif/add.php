<div class="clearfix">
   <h3 class="float-left">Tambah Alternatif</h3>
   <a href="<?php echo base_url('admin/alternatif') ?>" class="btn btn-danger float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
</div>

<hr style="margin-bottom: 40px">

<div class="card col-md-10 ml-auto mr-auto" style="margin-bottom: 80px">
   <div class="card-body">
      <form action="<?php echo base_url('alternatif/add_data') ?>" method="post">
         <input type="hidden" name="id" value="ALT<?php echo sprintf("%03s", $id) ?>">
         <div class="form-group row">
            <h6>A. IDENTITAS PELAKU USAHA</h6>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
               <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
               <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pendidikan</label>
            <div class="col-sm-10">
               <select name="pendidikan" class="form-control">
                  <option value="SD/Sederajat">SD/Sederajat</option>
                  <option value="SMP/Sederajat">SMP/Sederajat</option>
                  <option value="SMA/Sederajat">SMA/Sederajat</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
               <input type="number" name="nomor_hp" class="form-control" placeholder="Nomor HP" required>
            </div>
         </div>
         <div class="form-group row" style="margin-top: 40px">
            <h6>B. PROFIL USAHA</h6>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Usaha</label>
            <div class="col-sm-10">
               <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
            <div class="col-sm-10">
               <input type="number" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Usaha</label>
            <div class="col-sm-10">
               <select name="jenis_usaha" class="form-control">
                  <option value="Kerajinan Tangan">Kerajinan Tangan</option>
                  <option value="Pakaian">Pakaian</option>
                  <option value="Kuliner">Kuliner</option>
                  <option value="Otomotif">Otomotif</option>
                  <option value="Numpang">Elektronik</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Barang Produksi</label>
            <div class="col-sm-10">
               <textarea type="text" name="barang_produksi" class="form-control" placeholder="Barang Produksi" rows="2" required></textarea>
            </div>
         </div>
         <div class="form-group row">
            <label for="sumber_bahan_baku" class="col-sm-2 col-form-label">Sumber Bahan Baku</label>
            <div class="col-sm-10 align-self-center">
               <!-- <select name="sumber_bahan_baku" class="form-control" id="sumber_bahan_baku">
                  <option value="Sangat Mudah">Sangat Mudah</option>
                  <option value="Mudah">Mudah</option>
                  <option value="Cukup Sulit">Cukup Sulit</option>
                  <option value="Sulit">Sulit</option>
                  <option value="Sangat Sulit">Sangat Sulit</option>
               </select> -->
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sangat_mudah" name="sumber_bahan_baku" class="custom-control-input" value="Sangat Mudah" checked>
                  <label class="custom-control-label" for="sangat_mudah">Sangat Mudah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="mudah" name="sumber_bahan_baku" class="custom-control-input" value="Mudah">
                  <label class="custom-control-label" for="mudah">Mudah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="cukup_sulit" name="sumber_bahan_baku" class="custom-control-input" value="Cukup Sulit">
                  <label class="custom-control-label" for="cukup_sulit">Cukup Sulit</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sulit" name="sumber_bahan_baku" class="custom-control-input" value="Sulit">
                  <label class="custom-control-label" for="sulit">Sulit</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sangat_sulit" name="sumber_bahan_baku" class="custom-control-input" value="Sangat Sulit">
                  <label class="custom-control-label" for="sangat_sulit">Sangat Sulit</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Tenaga Kerja</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="jumlah_tenaga_kerja" class="form-control" placeholder="Jumlah Tenaga Kerja" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kapasitas Produksi (unit/per hari)</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="kapasitas_produksi" class="form-control" placeholder="Kapasitas Produksi" required>
            </div>
         </div>
         <div class="form-group row">
            <label for="kepemilikan_sarana" class="col-sm-2 col-form-label">Kepemilikan Sarana dan Prasarana</label>
            <div class="col-sm-10 align-self-center">
               <!-- <select name="kepemilikan_sarana" class="form-control" id="kepemilikan_sarana">
                  <option value="Milik Sendiri">Milik Sendiri</option>
                  <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                  <option value="Hibah">Hibah</option>
                  <option value="Pinjaman">Pinjaman</option>
                  <option value="Numpang">Numpang</option>
               </select> -->
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="milik_sendiri" name="kepemilikan_sarana" class="custom-control-input" value="Milik Sendiri" checked>
                  <label class="custom-control-label" for="milik_sendiri">Milik Sendiri</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sewa" name="kepemilikan_sarana" class="custom-control-input" value="Sewa/Kontrak">
                  <label class="custom-control-label" for="sewa">Sewa/Kontrak</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="hibah" name="kepemilikan_sarana" class="custom-control-input" value="Hibah">
                  <label class="custom-control-label" for="hibah">Hibah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="pinjaman" name="kepemilikan_sarana" class="custom-control-input" value="Pinjaman">
                  <label class="custom-control-label" for="pinjaman">Pinjaman</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="numpang" name="kepemilikan_sarana" class="custom-control-input" value="Numpang">
                  <label class="custom-control-label" for="numpang">Numpang</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nilai Investasi (Rp.)</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="nilai_investasi" class="form-control" placeholder="Nilai Investasi" required>
            </div>
         </div>
         <div class="form-group row">
            <label for="wilayah_pemasaran" class="col-sm-2 col-form-label">Wilayah Pemasaran</label>
            <div class="col-sm-10 align-self-center">
               <!-- <select name="wilayah_pemasaran" class="form-control" id="wilayah_pemasaran">
                  <option value="Dalam Kota">Dalam Kota</option>
                  <option value="Antar Kota">Antar Kota</option>
                  <option value="Antar Provinsi">Antar Provinsi</option>
                  <option value="Luar Negeri">Luar Negeri</option>
               </select> -->
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="dalam_kota" name="wilayah_pemasaran" class="custom-control-input" value="Dalam Kota" checked>
                  <label class="custom-control-label" for="dalam_kota">Dalam Kota</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="antar_kota" name="wilayah_pemasaran" class="custom-control-input" value="Antar Kota">
                  <label class="custom-control-label" for="antar_kota">Antar Kota</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="antar_provinsi" name="wilayah_pemasaran" class="custom-control-input" value="Antar Provinsi">
                  <label class="custom-control-label" for="antar_provinsi">Antar Provinsi</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="luar_negeri" name="wilayah_pemasaran" class="custom-control-input" value="Luar Negeri">
                  <label class="custom-control-label" for="luar_negeri">Luar Negeri</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10 mt-3 offset-sm-2">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
</div>