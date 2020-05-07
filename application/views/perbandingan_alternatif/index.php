<h3>Perbandingan Alternatif</h3>
<hr style="margin-bottom: 40px">

<?php if (getNumKriteria() == 0) { ?>
   <div class="alert alert-danger col-md-5" role="alert">
      <h4 class="alert-heading">Peringatan!</h4>
      <p>Data kriteria masih kosong. Silahkan isi terlebih dahulu atau tekan tombol "Tambah Kriteria" dibawah ini!</p>
      <hr>
      <div class="clearfix">
         <a href="<?php echo base_url('admin/kriteria/add') ?>" class="btn btn-primary float-right">Tambah Kriteria</a>
      </div>
   </div>
<?php } else { ?>
   <div class="card col-md-6">
      <div class="card-body">
         <form action="<?php echo base_url('admin/perbandingan_alternatif/tabel') ?>" method="post">
            <div class="form-group row">
               <label class="col-sm-3 col-form-label" style="font-weight: bold">Kriteria</label>
               <div class="col-sm-9">
                  <select name="id_kriteria" class="form-control">
                     <?php foreach ($data_kriteria as $key => $value) : ?>
                        <option value="<?php echo $value['id_kriteria'] ?>"><?php echo $value['nama_kriteria'] ?></option>
                     <?php endforeach ?>
                  </select>
               </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-right">Lanjut <i class="fas fa-chevron-circle-right"></i></button>
         </form>
      </div>
   </div>
<?php } ?>