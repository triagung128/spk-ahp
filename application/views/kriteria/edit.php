<h3>Ubah Kriteria</h3>
<hr style="margin-bottom: 40px">

<div class="card col-md-10">
   <div class="card-body">

      <form action="<?php echo base_url('kriteria/update') ?>" method="POST">
         <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-3">
               <input type="text" readonly name="kode" class="form-control" id="kode" value="<?php echo $data['id_kriteria'] ?>" required>
            </div>
         </div>
         <div class="form-group row">
            <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
            <div class="col-sm-8">
               <input type="text" name="nama_kriteria" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $data['nama_kriteria'] ?>" required>
            </div>
         </div>
         <div class="col offset-md-2" style="margin-top: 40px">
            <div class="row">
               <button type="submit" class="btn btn-success mr-2">Ubah</button>
               <a href="<?php echo base_url('admin/kriteria') ?>" class="btn btn-danger">Batal</a>
            </div>
         </div>
      </form>
   </div>
</div>