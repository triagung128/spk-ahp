<div class="clearfix">
   <h3 class="float-left">Hasil Perbandingan Alternatif <i class="fas fa-arrow-right"></i> <?php echo $data_kriteria['nama_kriteria'] ?></h3>
   <a href="<?php echo base_url('admin/perbandingan_alternatif') ?>" class="btn btn-danger float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
</div>

<hr style="margin-bottom: 40px">

<h4 class=" mb-3">Matriks Perbandingan Berpasangan</h4>
<div class="table-responsive" style="margin-bottom: 40px">
   <table class="table table-bordered">
      <thead class="thead-light">
         <tr>
            <th class="text-center align-middle">Alternatif</th>
            <?php
            for ($i = 0; $i <= ($n - 1); $i++) {
               echo "<th class='text-center'>" . getAlternatifNama($i) . "</th>";
            }
            ?>
         </tr>
      </thead>
      <tbody>
         <?php
         for ($x = 0; $x <= ($n - 1); $x++) {
            echo "<tr>";
            echo "<td class='font-weight-bold'>" . getAlternatifNama($x) . "</td>";
            for ($y = 0; $y <= ($n - 1); $y++) {
               echo "<td class='text-center'>" . round($matrik[$x][$y], 5) . "</td>";
            }
            echo "</tr>";
         }
         ?>
      </tbody>
      <tfoot class="thead-light">
         <tr>
            <th class="text-center align-middle">Jumlah</th>
            <?php
            for ($i = 0; $i <= ($n - 1); $i++) {
               echo "<th class='text-center'>" . round($jmlmpb[$i], 5) . "</th>";
            }
            ?>
         </tr>
      </tfoot>
   </table>
</div>

<h4 class="mb-3">Matriks Nilai Alternatif</h4>
<div class="table-responsive">
   <table class="table table-bordered">
      <thead class="thead-light">
         <tr>
            <th class="text-center align-middle">Alternatif</th>
            <?php
            for ($i = 0; $i <= ($n - 1); $i++) {
               echo "<th class='text-center'>" . getAlternatifNama($i) . "</th>";
            }
            ?>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Priority Vector</th>
         </tr>
      </thead>
      <tbody>
         <?php
         for ($x = 0; $x <= ($n - 1); $x++) {
            echo "<tr>";
            echo "<td class='font-weight-bold'>" . getAlternatifNama($x) . "</td>";
            for ($y = 0; $y <= ($n - 1); $y++) {
               echo "<td class='text-center'>" . round($matrikb[$x][$y], 5) . "</td>";
            }
            echo "<td class='text-center'>" . round($jmlmnk[$x], 5) . "</td>";
            echo "<td class='text-center'>" . round($pv[$x], 5) . "</td>";
            echo "</tr>";
         }
         ?>
      </tbody>
      <tfoot class="thead-light">
         <tr>
            <th colspan="<?php echo ($n + 2) ?>">Principe Eigen Vector (λ maks)</th>
            <th class="text-center"><?php echo (round($eigenVektor, 5)) ?></th>
         </tr>
         <tr>
            <th colspan="<?php echo ($n + 2) ?>">Consistency Index</th>
            <th class="text-center"><?php echo (round($consIndex, 5)) ?></th>
         </tr>
         <tr>
            <th colspan="<?php echo ($n + 2) ?>">Consistency Ratio</th>
            <th class="text-center"><?php echo (round(($consRatio * 100), 2)) ?> %</th>
         </tr>
      </tfoot>
   </table>
</div>

<?php if ($consRatio > 0.1) { ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <div><strong>Nilai Consistency Ratio melebihi 10% !!!</strong></div>
      <div>Mohon input kembali tabel perbandingan...</div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <a href="javascript:history.back()" class="btn btn-light"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
<?php } ?>

<div style="margin-bottom: 160px"></div>