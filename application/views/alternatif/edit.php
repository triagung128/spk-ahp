<div class="clearfix">
   <h3 class="float-left">Ubah Alternatif</h3>
   <a href="<?php echo base_url('admin/alternatif') ?>" class="btn btn-danger float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
</div>

<hr style="margin-bottom: 40px">

<div class="card col-md-10 ml-auto mr-auto" style="margin-bottom: 80px">
   <div class="card-body">
      <form action="<?php echo base_url('alternatif/update') ?>" method="post">
         <input type="hidden" name="id" value="<?php echo $data['id_alternatif'] ?>">
         <div class="form-group row">
            <h6>A. IDENTITAS PELAKU USAHA</h6>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
               <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama" required value="<?php echo $data['nama_pemilik'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
               <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" rows="3" required><?php echo $data['alamat'] ?></textarea>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pendidikan</label>
            <div class="col-sm-10">
               <select name="pendidikan" class="form-control">
                  <option value="SD/Sederajat" <?php if ($data['pendidikan'] == "SD/Sederajat") echo "selected"; ?>>SD/Sederajat</option>
                  <option value="SMP/Sederajat" <?php if ($data['pendidikan'] == "SMP/Sederajat") echo "selected"; ?>>SMP/Sederajat</option>
                  <option value="SMA/Sederajat" <?php if ($data['pendidikan'] == "SMA/Sederajat") echo "selected"; ?>>SMA/Sederajat</option>
                  <option value="D1" <?php if ($data['pendidikan'] == "D1") echo "selected"; ?>>D1</option>
                  <option value="D2" <?php if ($data['pendidikan'] == "D2") echo "selected"; ?>>D2</option>
                  <option value="D3" <?php if ($data['pendidikan'] == "D3") echo "selected"; ?>>D3</option>
                  <option value="S1" <?php if ($data['pendidikan'] == "S1") echo "selected"; ?>>S1</option>
                  <option value="S2" <?php if ($data['pendidikan'] == "S2") echo "selected"; ?>>S2</option>
                  <option value="S3" <?php if ($data['pendidikan'] == "S3") echo "selected"; ?>>S3</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
               <input type="number" name="nomor_hp" class="form-control" placeholder="Nomor HP" required value="<?php echo $data['no_hp'] ?>">
            </div>
         </div>
         <div class="form-group row" style="margin-top: 40px">
            <h6>B. PROFIL USAHA</h6>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Usaha</label>
            <div class="col-sm-10">
               <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" required value="<?php echo $data['nama_usaha'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
            <div class="col-sm-10">
               <input type="number" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri" required value="<?php echo $data['tahun_berdiri'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Usaha</label>
            <div class="col-sm-10">
               <select name="jenis_usaha" class="form-control">
                  <option value="Kerajinan Tangan" <?php if ($data['jenis_usaha'] == "Kerajinan Tangan") echo "selected"; ?>>Kerajinan Tangan</option>
                  <option value="Pakaian" <?php if ($data['jenis_usaha'] == "Pakaian") echo "selected"; ?>>Pakaian</option>
                  <option value="Kuliner" <?php if ($data['jenis_usaha'] == "Kuliner") echo "selected"; ?>>Kuliner</option>
                  <option value="Otomotif" <?php if ($data['jenis_usaha'] == "Otomotif") echo "selected"; ?>>Otomotif</option>
                  <option value="Numpang" <?php if ($data['jenis_usaha'] == "Numpang") echo "selected"; ?>>Elektronik</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Barang Produksi</label>
            <div class="col-sm-10">
               <textarea type="text" name="barang_produksi" class="form-control" placeholder="Barang Produksi" rows="2" required><?php echo $data['barang_produksi'] ?></textarea>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sumber Bahan Baku</label>
            <div class="col-sm-10 align-self-center">
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sangat_mudah" name="sumber_bahan_baku" class="custom-control-input" value="Sangat Mudah" <?php if ($data['sumber_bahan_baku'] == "Sangat Mudah") echo "checked"; ?>>
                  <label class="custom-control-label" for="sangat_mudah">Sangat Mudah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="mudah" name="sumber_bahan_baku" class="custom-control-input" value="Mudah" <?php if ($data['sumber_bahan_baku'] == "Mudah") echo "checked"; ?>>
                  <label class="custom-control-label" for="mudah">Mudah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="cukup_sulit" name="sumber_bahan_baku" class="custom-control-input" value="Cukup Sulit" <?php if ($data['sumber_bahan_baku'] == "Cukup Sulit") echo "checked"; ?>>
                  <label class="custom-control-label" for="cukup_sulit">Cukup Sulit</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sulit" name="sumber_bahan_baku" class="custom-control-input" value="Sulit" <?php if ($data['sumber_bahan_baku'] == "Sulit") echo "checked"; ?>>
                  <label class="custom-control-label" for="sulit">Sulit</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sangat_sulit" name="sumber_bahan_baku" class="custom-control-input" value="Sangat Sulit" <?php if ($data['sumber_bahan_baku'] == "Sangat Sulit") echo "checked"; ?>>
                  <label class="custom-control-label" for="sangat_sulit">Sangat Sulit</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Tenaga Kerja</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="jumlah_tenaga_kerja" class="form-control" placeholder="Jumlah Tenaga Kerja" required value="<?php echo $data['jumlah_tenaga_kerja'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kapasitas Produksi (unit/per hari)</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="kapasitas_produksi" class="form-control" placeholder="Kapasitas Produksi" required value="<?php echo $data['kapasitas_produksi'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kepemilikan Sarana dan Prasarana</label>
            <div class="col-sm-10 align-self-center">
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="milik_sendiri" name="kepemilikan_sarana" class="custom-control-input" value="Milik Sendiri" <?php if ($data['kepemilikan_sarana'] == "Milik Sendiri") echo "checked"; ?>>
                  <label class="custom-control-label" for="milik_sendiri">Milik Sendiri</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sewa" name="kepemilikan_sarana" class="custom-control-input" value="Sewa/Kontrak" <?php if ($data['kepemilikan_sarana'] == "Sewa/Kontrak") echo "checked"; ?>>
                  <label class="custom-control-label" for="sewa">Sewa/Kontrak</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="hibah" name="kepemilikan_sarana" class="custom-control-input" value="Hibah" <?php if ($data['kepemilikan_sarana'] == "Hibah") echo "checked"; ?>>
                  <label class="custom-control-label" for="hibah">Hibah</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="pinjaman" name="kepemilikan_sarana" class="custom-control-input" value="Pinjaman" <?php if ($data['kepemilikan_sarana'] == "Pinjaman") echo "checked"; ?>>
                  <label class="custom-control-label" for="pinjaman">Pinjaman</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="numpang" name="kepemilikan_sarana" class="custom-control-input" value="Numpang" <?php if ($data['kepemilikan_sarana'] == "Numpang") echo "checked"; ?>>
                  <label class="custom-control-label" for="numpang">Numpang</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nilai Investasi (Rp.)</label>
            <div class="col-sm-10 align-self-center">
               <input type="number" name="nilai_investasi" class="form-control" placeholder="Nilai Investasi" required value="<?php echo $data['nilai_investasi'] ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Wilayah Pemasaran</label>
            <div class="col-sm-10 align-self-center">
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="dalam_kota" name="wilayah_pemasaran" class="custom-control-input" value="Dalam Kota" <?php if ($data['wilayah_pemasaran'] == "Dalam Kota") echo "checked"; ?>>
                  <label class="custom-control-label" for="dalam_kota">Dalam Kota</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="antar_kota" name="wilayah_pemasaran" class="custom-control-input" value="Antar Kota" <?php if ($data['wilayah_pemasaran'] == "Antar Kota") echo "checked"; ?>>
                  <label class="custom-control-label" for="antar_kota">Antar Kota</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="antar_provinsi" name="wilayah_pemasaran" class="custom-control-input" value="Antar Provinsi" <?php if ($data['wilayah_pemasaran'] == "Antar Provinsi") echo "checked"; ?>>
                  <label class="custom-control-label" for="antar_provinsi">Antar Provinsi</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="luar_negeri" name="wilayah_pemasaran" class="custom-control-input" value="Luar Negeri" <?php if ($data['wilayah_pemasaran'] == "Luar Negeri") echo "checked"; ?>>
                  <label class="custom-control-label" for="luar_negeri">Luar Negeri</label>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10 mt-3 offset-sm-2">
               <button type="submit" class="btn btn-success">Ubah</button>
               <a href="<?php echo base_url('admin/alternatif') ?>" class="btn btn-danger">Batal</a>
            </div>
         </div>
      </form>
   </div>
</div>