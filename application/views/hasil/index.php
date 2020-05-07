<h3>Hasil Perhitungan</h3>
<hr style="margin-bottom: 40px">

<?php if (getNumKriteriaPV() == 0) {
   if ($this->session->userdata('role') == 1) { ?>
      <div class="alert alert-danger col-md-5" role="alert">
         <h4 class="alert-heading">Peringatan!</h4>
         <p>Data bobot kriteria masih kosong. Silahkan perbandingan kriteria terlebih dahulu atau tekan tombol "Perbandingan Kriteria" dibawah ini!</p>
         <hr>
         <div class="clearfix">
            <a href="<?php echo base_url('admin/perbandingan_kriteria') ?>" class="btn btn-primary float-right">Perbandingan Kriteria</a>
         </div>
      </div>
   <?php } else if ($this->session->userdata('role') == 2) { ?>
      <div class="alert alert-danger col-md-5" role="alert">
         <h4 class="alert-heading">Peringatan!</h4>
         <p>Tim Penilai belum melakukan penilaian!</p>
      </div>
   <?php } ?>
<?php } else if (getNumAlternatifPV() == 0) { ?>
   <div class="alert alert-danger col-md-5" role="alert">
      <h4 class="alert-heading">Peringatan!</h4>
      <p>Data bobot alternatif masih kosong. Silahkan perbandingan alternatif terlebih dahulu atau tekan tombol "Perbandingan Alternatif" dibawah ini!</p>
      <hr>
      <div class="clearfix">
         <a href="<?php echo base_url('admin/perbandingan_alternatif') ?>" class="btn btn-primary float-right">Perbandingan Alternatif</a>
      </div>
   </div>
<?php } else { ?>
   <?php
   $nilai = array();

   // Mendapatkan Nilai Alternatif
   for ($x = 0; $x <= ($jumlah_alternatif - 1); $x++) {
      // Inisialisasi
      $nilai[$x] = 0;

      for ($y = 0; $y <= ($jumlah_kriteria - 1); $y++) {
         $id_alternatif = getAlternatifId($x);
         $id_kriteria = getKriteriaId($y);

         $pv_alternatif = getAlternatifPV($id_alternatif, $id_kriteria);
         $pv_kriteria = getKriteriaPV($id_kriteria);

         $nilai[$x] += ($pv_alternatif * $pv_kriteria);
      }
   }

   // Update Nilai Ranking
   for ($i = 0; $i <= ($jumlah_alternatif - 1); $i++) {
      $id_alternatif = getAlternatifId($i);
      insertRanking($id_alternatif, $nilai[$i]);
   }
   ?>

   <h4 class="mb-3">Matriks Perbandingan Berpasangan</h4>
   <div class="table-responsive">
      <table class="table table-bordered">
         <thead class="thead-light">
            <tr>
               <th class="text-center">Overakll Composite Height</th>
               <th class="text-center">Priority Vector (rata-rata)</th>
               <?php
               for ($i = 0; $i <= ($jumlah_alternatif - 1); $i++) {
                  echo "<th class='text-center'>" . getAlternatifNama($i) . "</th>";
               }
               ?>
            </tr>
         </thead>
         <tbody>
            <?php
            for ($x = 0; $x <= ($jumlah_kriteria - 1); $x++) {
               echo "<tr>";
               echo "<td class='font-weight-bold'>" . getKriteriaNama($x) . "</td>";
               echo "<td class='text-center font-weight-bold'>" . round(getKriteriaPV(getKriteriaId($x)), 5) . "</td>";
               for ($y = 0; $y <= ($jumlah_alternatif - 1); $y++) {
                  echo "<td class='text-center'>" . round(getAlternatifPV(getAlternatifId($y), getKriteriaId($x)), 5) . "</td>";
               }
               echo "</tr>";
            }
            ?>
         </tbody>
         <tfoot class="thead-light">
            <tr>
               <th colspan="2" class="text-center">Total</th>
               <?php
               for ($i = 0; $i <= ($jumlah_alternatif - 1); $i++) {
                  echo "<th class='text-center'>" . round($nilai[$i], 5) . "</th>";
               }
               ?>
            </tr>
         </tfoot>
      </table>
   </div>

   <h4 class="mt-5">Perangkingan</h4>
   <div class="table-responsive">
      <table class="table table-bordered col-md-6">
         <thead class="thead-light">
            <tr>
               <th class="text-center" width="10%">Peringkat</th>
               <th class="text-center">Alternatif</th>
               <th class="text-center" width="20%">Nilai</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $no = 1;
            foreach ($ranking as $key => $value) : ?>
               <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $value['nama_usaha'] ?></td>
                  <td class="text-center font-weight-bold"><?php echo $value['nilai'] ?></td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>
   </div>

   <div style="margin-bottom: 160px"></div>
<?php } ?>