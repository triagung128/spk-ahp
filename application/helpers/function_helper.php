<?php

// Fungsi untuk mencari id kriteria berdasarkan urutan ke berapa
function getKriteriaId($no_urut)
{
   $ci = get_instance();

   $query = "SELECT id_kriteria FROM tb_kriteria ORDER BY id_kriteria";
   $result = $ci->db->query($query)->result_array();
   foreach ($result as $value) {
      $listId[] = $value['id_kriteria'];
   }
   return $listId[$no_urut];
}

// Fungsi untuk mencari id alternatif berdasarkan urutan ke berapa
function getAlternatifId($no_urut)
{
   $ci = get_instance();

   $query = "SELECT id_alternatif FROM tb_alternatif ORDER BY id_alternatif";
   $result = $ci->db->query($query)->result_array();
   foreach ($result as $value) {
      $listId[] = $value['id_alternatif'];
   }
   return $listId[$no_urut];
}

// Fungsi untuk mengambil nilai perbandingan di database
function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
{
   $ci = get_instance();

   $id_kriteria1 = getKriteriaId($kriteria1);
   $id_kriteria2 = getKriteriaId($kriteria2);

   $query = "SELECT nilai_perbandingan FROM tb_perbandingan_kriteria WHERE id_kriteria1 = '$id_kriteria1' AND id_kriteria2 = '$id_kriteria2'";
   $jumlah = $ci->db->query($query)->num_rows();

   if ($jumlah == 0) {
      $nilai = 1;
   } else {
      $result = $ci->db->query($query)->result_array();
      foreach ($result as $value) {
         $nilai = $value['nilai_perbandingan'];
      }
   }

   return $nilai;
}

// Fungsi untuk mengambil nilai bobot perbandingan alternatif di database
function getNilaiPerbandinganAlternatif($alternatif1, $alternatif2, $id_kriteria)
{
   $ci = get_instance();

   $id_alternatif1 = getAlternatifId($alternatif1);
   $id_alternatif2 = getAlternatifId($alternatif2);

   $query = "SELECT nilai_perbandingan FROM tb_perbandingan_alternatif 
               WHERE id_alternatif1 = '$id_alternatif1' AND id_alternatif2 = '$id_alternatif2' AND id_kriteria = '$id_kriteria'";
   $jumlah = $ci->db->query($query)->num_rows();

   if ($jumlah == 0) {
      $nilai = 1;
   } else {
      $result = $ci->db->query($query)->result_array();
      foreach ($result as $value) {
         $nilai = $value['nilai_perbandingan'];
      }
   }

   return $nilai;
}

// Mendapatkan nama kriteria
function getKriteriaNama($no_urut)
{
   $ci = get_instance();

   $query = "SELECT nama_kriteria FROM tb_kriteria ORDER BY id_kriteria";
   $result = $ci->db->query($query)->result_array();
   foreach ($result as $value) {
      $nama[] = $value['nama_kriteria'];
   }

   return $nama[$no_urut];
}

// Mendapatkan nama alternatif
function getAlternatifNama($no_urut)
{
   $ci = get_instance();

   $query = "SELECT nama_usaha FROM tb_alternatif ORDER BY id_alternatif";
   $result = $ci->db->query($query)->result_array();
   foreach ($result as $value) {
      $nama[] = $value['nama_usaha'];
   }

   return $nama[$no_urut];
}

// Mendapatkan jumlah kriteria
function getNumKriteria()
{
   $ci = get_instance();

   $result = $ci->db->get('tb_kriteria')->num_rows();
   return $result;
}

// Mendapatkan jumlah alternatif
function getNumAlternatif()
{
   $ci = get_instance();

   $result = $ci->db->get('tb_alternatif')->num_rows();
   return $result;
}

// Mencari bobot kriteria dari database
function getKriteriaPV($id_kriteria)
{
   $ci = get_instance();
   $result = $ci->db->get_where('tb_bobot_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
   $pv = $result['nilai'];
   return $pv;
}

// Mencari bobot alternatif dari database
function getAlternatifPV($id_alternatif, $id_kriteria)
{
   $ci = get_instance();
   $result = $ci->db->get_where('tb_bobot_alternatif', ['id_alternatif' => $id_alternatif, 'id_kriteria' => $id_kriteria])->row_array();
   $pv = $result['nilai'];
   return $pv;
}

// Mendapatkan jumlah data bobot kriteria
function getNumKriteriaPV()
{
   $ci = get_instance();
   return $ci->db->get('tb_bobot_kriteria')->num_rows();
}

// Mendapatkan jumlah data bobot alternatif
function getNumAlternatifPV()
{
   $ci = get_instance();
   return $ci->db->get('tb_bobot_alternatif')->num_rows();
}

// Mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a, $matrik_b, $n)
{
   $eigenVektor = 0;
   for ($i = 0; $i <= ($n - 1); $i++) {
      $eigenVektor += ($matrik_a[$i] * ($matrik_b[$i] / $n));
   }
   return $eigenVektor;
}

// Mencari Cons Index
function getConsIndex($matrik_a, $matrik_b, $n)
{
   $eigenVektor = getEigenVector($matrik_a, $matrik_b, $n);
   $consIndex = ($eigenVektor - $n) / ($n - 1);
   return $consIndex;
}

// Mencari nilai Index Random
function getNilaiIR($jumlah)
{
   $ci = get_instance();
   $result = $ci->db->get_where('tb_ir', ['jumlah' => $jumlah])->row_array();
   return $result['nilai'];
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a, $matrik_b, $n)
{
   $consIndex = getConsIndex($matrik_a, $matrik_b, $n);
   $consRatio = $consIndex / getNilaiIR($n);
   return $consRatio;
}

function insertRanking($id_alternatif, $nilai)
{
   $ci = get_instance();
   $query = "INSERT INTO tb_ranking VALUE('$id_alternatif',$nilai) ON DUPLICATE KEY UPDATE nilai = $nilai";
   $ci->db->query($query);
}

function getUri()
{
   $ci = get_instance();
   $uri = $ci->uri->segment(2);
   return $uri;
}

function rupiah_format($number)
{
   $hasil_rupiah = "Rp " . number_format($number, 2, ',', '.');
   return $hasil_rupiah;
}

function is_logged_in()
{
   $ci = get_instance();
   if (!$ci->session->userdata('username')) {
      redirect('login');
   }
}

function is_admin()
{
   $ci = get_instance();
   if ($ci->session->userdata('role') != 1) {
      redirect('user/laporan_hasil');
   }
}

function is_user()
{
   $ci = get_instance();
   if ($ci->session->userdata('role') != 2) {
      redirect('admin/dashboard');
   }
}
