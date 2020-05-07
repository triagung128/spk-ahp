<h3>Data Alternatif</h3>
<hr style="margin-bottom: 40px">

<a href="<?php echo base_url('admin/alternatif/add') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i> Tambah Data</a>
<?php echo $this->session->userdata('message') ?>

<!-- DataTables Example -->
<div class="card mb-3">
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th class="text-center align-middle">No</th>
                  <th class="align-middle">Nama Pemilik</th>
                  <th class="align-middle">Nama Usaha</th>
                  <th class="align-middle">Jenis Usaha</th>
                  <th width="10%">Tahun Berdiri</th>
                  <th class="align-middle">Nilai Investasi</th>
                  <th class="text-center align-middle">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1 ?>
               <?php foreach ($data as $key => $value) : ?>
                  <tr>
                     <td class="text-center"><?php echo $no++ ?></td>
                     <td><?php echo $value['nama_pemilik'] ?></td>
                     <td><?php echo $value['nama_usaha'] ?></td>
                     <td><?php echo $value['jenis_usaha'] ?></td>
                     <td><?php echo $value['tahun_berdiri'] ?></td>
                     <td><?php echo rupiah_format($value['nilai_investasi']) ?></td>
                     <td class="text-center">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $value['id_alternatif'] ?>">Detail</a>
                        <a href="<?php echo base_url('admin/alternatif/edit/') . $value['id_alternatif'] ?>" class="btn btn-success btn-sm">Ubah</a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                     </td>
                  </tr>
               <?php endforeach ?>
            </tbody>
         </table>
      </div>
   </div>
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
            <a href="<?php echo base_url('admin/alternatif/delete/') . $value['id_alternatif'] ?>" class="btn btn-danger">Hapus</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
         </div>
      </div>
   </div>
</div>

<?php foreach ($data as $key => $value) : ?>
   <div class="modal fade" id="detailModal<?php echo $value['id_alternatif'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Detail Alternatif</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="col">
                  <div class="col">
                     <div class="row">
                        <h6 class="mb-3">A. IDENTITAS PELAKU USAHA</h6>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Nama Pemilik</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['nama_pemilik'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Alamat</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['alamat'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Pendidikan</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['pendidikan'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Nomor HP</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['no_hp'] ?></p>
                     </div>
                  </div>

                  <div class="col">
                     <div class="row">
                        <h6 class="mb-3 mt-4">B. PROFIL USAHA</h6>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Nama Usaha</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['nama_usaha'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Tahun Berdiri</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['tahun_berdiri'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Jenis Usaha</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['jenis_usaha'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Barang Produksi</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['barang_produksi'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Sumber Bahan Baku</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['sumber_bahan_baku'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Jumlah Tenaga Kerja</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['jumlah_tenaga_kerja'] ?> Orang</p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Kapasitas Produksi</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['kapasitas_produksi'] ?> Unit/Perhari</p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Kepemilikan Sarana dan Prasarana</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['kepemilikan_sarana'] ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Nilai Investasi</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo rupiah_format($value['nilai_investasi']) ?></p>
                     </div>
                     <div class="row">
                        <p class="col-md-3">Wilayah Pemasaran</p>
                        <p>:</p>
                        <p class="col-md-8"><?php echo $value['wilayah_pemasaran'] ?></p>
                     </div>
                  </div>
               </div>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
         </div>
      </div>
   </div>
<?php endforeach ?>