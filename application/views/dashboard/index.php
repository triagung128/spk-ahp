<h3>Dashboard</h3>
<hr style="margin-bottom: 20px">

<?php if ($this->session->userdata('role') == 1) { ?>
   <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
         <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
               <div class="card-body-icon">
                  <i class="fas fa-fw fa-server"></i>
               </div>
               <div class="mr-5"><?php echo getNumKriteria() ?> Kriteria</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/kriteria') ?>">
               <span class="float-left">Lihat Detail</span>
               <span class="float-right">
                  <i class="fas fa-angle-right"></i>
               </span>
            </a>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
         <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
               <div class="card-body-icon">
                  <i class="fas fa-fw fa-database"></i>
               </div>
               <div class="mr-5"><?php echo getNumAlternatif() ?> Alternatif</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/alternatif') ?>">
               <span class="float-left">Lihat Detail</span>
               <span class="float-right">
                  <i class="fas fa-angle-right"></i>
               </span>
            </a>
         </div>
      </div>
   </div>

   <div class="card">
      <h5 class="card-header">Tata Cara Penggunaan :</h5>
      <div class="card-body">
         <p class="card-text">1. Masukkan kriteria yang akan digunakan di menu "Kriteria".</p>
         <p class="card-text">2. Masukkan alternatif berupa data UMKM yang akan di ranking di menu "Alternatif".</p>
         <p class="card-text">3. Lakukan perbandingan kriteria untuk menentukan bobot pada kriteria.</p>
         <p class="card-text">4. Lakukan perbandingan alternatif dan sesuaikan dengan masing-masing kriteria.</p>
         <p class="card-text">5. Pastikan perbandingan alternatif pada masing-masing kriteria sudah terisi semua.</p>
         <p class="card-text">6. Pilih menu "Hasil" untuk melihat data ranking alternatif.</p>
      </div>
   </div>

   <div class="card mt-3">
      <h5 class="card-header">Anggota Kelompok :</h5>
      <div class="card-body">
         <p class="card-text">- Tri Agung Susilo (161105150965)</p>
         <p class="card-text">- Nuril Huda Ahsina (161105150594)</p>
         <p class="card-text">- Kiki Meidinasari (161105150546)</p>
         <p class="card-text">- Yoga Wahyu Prasetyo (161105150547)</p>
         <p class="card-text">- Rizky Nurdiansyah</p>
      </div>
   </div>
<?php } else { ?>
   <p>Test</p>
<?php } ?>

<div style="margin-bottom: 160px"></div>