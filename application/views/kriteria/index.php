<h3>Data Kriteria</h3>
<hr style="margin-bottom: 40px">

<a href="<?php echo base_url('admin/kriteria/add') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i> Tambah Data</a>
<?php echo $this->session->userdata('message') ?>
<div class="table-responsive">
   <table class="table table-bordered col-md-8" width="100%" cellspacing="0">
      <thead class="thead-light">
         <tr>
            <th class="text-center" width="10%">Kode</th>
            <th width="40%">Nama Kriteria</th>
            <th class="text-center" width="15%">Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php if (getNumKriteria() == 0) { ?>
            <tr>
               <td colspan="3" class="text-center">Tidak ada data!</td>
            </tr>
         <?php } else { ?>
            <?php foreach ($data as $key => $value) : ?>
               <tr>
                  <td class="text-center"><?php echo $value['id_kriteria'] ?></td>
                  <td><?php echo $value['nama_kriteria'] ?></td>
                  <td class="text-center">
                     <a href="<?php echo base_url('admin/kriteria/edit/') . $value['id_kriteria'] ?>" class="btn btn-success btn-sm">Ubah</a>
                     <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                  </td>
               </tr>
            <?php endforeach; ?>
         <?php } ?>
      </tbody>
   </table>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Apakah data tersebut ingin dihapus ?</div>
         <div class="modal-footer">
            <a href="<?php echo base_url('admin/kriteria/delete/') . $value['id_kriteria'] ?>" class="btn btn-danger">Hapus</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
         </div>
      </div>
   </div>
</div>