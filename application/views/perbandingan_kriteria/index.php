<h3>Perbandingan Kriteria</h3>
<hr style="margin-bottom: 40px">

<?php if ($jumlah == 0) { ?>
   <div class="alert alert-danger col-md-5" role="alert">
      <h4 class="alert-heading">Peringatan!</h4>
      <p>Data kriteria masih kosong. Silahkan isi terlebih dahulu atau tekan tombol "Tambah Kriteria" dibawah ini!</p>
      <hr>
      <div class="clearfix">
         <a href="<?php echo base_url('admin/kriteria/add') ?>" class="btn btn-primary float-right">Tambah Kriteria</a>
      </div>
   </div>
<?php } else { ?>
   <?php
   foreach ($data as $key => $value) {
      $pilihan_kriteria[] = $value['nama_kriteria'];
   }

   $n = $jumlah;
   ?>

   <div class="clearfix" style="margin-bottom: 160px">
      <div class="col float-left col-md-7">
         <form action="<?php echo base_url('admin/perbandingan_kriteria/proses') ?>" method="post">
            <table class="table table-bordered">
               <thead class="thead-light">
                  <tr>
                     <th colspan="2" class="align-middle text-center">Pilih yang lebih penting</th>
                     <th>Nilai Perbandingan</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $urut = 0;

                  for ($x = 0; $x <= ($n - 2); $x++) {
                     for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                        $urut++;
                  ?>
                        <tr>
                           <td>
                              <div class="custom-control custom-radio">
                                 <input type="radio" class="custom-control-input" name="pilih<?php echo $urut ?>" id="pilih1<?php echo $urut ?>" value="1" checked="">
                                 <label class="custom-control-label" for="pilih1<?php echo $urut ?>"><?php echo $pilihan_kriteria[$x] ?></label>
                              </div>
                           </td>
                           <td>
                              <div class="custom-control custom-radio">
                                 <input type="radio" class="custom-control-input" name="pilih<?php echo $urut ?>" id="pilih2<?php echo $urut ?>" value="2">
                                 <label class="custom-control-label" for="pilih2<?php echo $urut ?>"><?php echo $pilihan_kriteria[$y] ?></label>
                              </div>
                           </td>
                           <td width="20%">
                              <?php
                              $nilai = getNilaiPerbandinganKriteria($x, $y);
                              ?>
                              <input type="text" class="form-control" name="bobot<?php echo $urut ?>" value="<?php echo $nilai ?>" required>
                           </td>
                        </tr>
                  <?php
                     }
                  }
                  ?>
               </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3">Proses</button>
         </form>
      </div>
      <div class="float-right col-md-5">
         <div class="card">
            <h5 class="card-header">Cara Pengisian :</h5>
            <div class="card-body">
               <p class="card-text">Pilih elemen yang lebih penting dan isi nilai perbandingan sesuai tabel dibawah ini.</p>
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Nilai Kepentingan</th>
                        <th class="align-middle">Tingkat Kepentingan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($skala_perbandingan as $key => $value) : ?>
                        <tr>
                           <td class="text-center"><?php echo $value['nilai'] ?></td>
                           <td><?php echo $value['keterangan'] ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

<?php } ?>