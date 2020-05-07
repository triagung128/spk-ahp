<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerbandinganAlternatif extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('PerbandinganAlternatifModel', 'model');
   }

   public function index()
   {
      $data['data_kriteria'] = $this->model->getKriteria();

      $this->load->view('templates/header');
      $this->load->view('perbandingan_alternatif/index', $data);
      $this->load->view('templates/footer');
   }

   public function tabel()
   {
      $id_kriteria = $this->input->post('id_kriteria');
      $data['data_kriteria'] = $this->model->getKriteria($id_kriteria);
      $data['data_alternatif'] = $this->model->getAlternatif();
      $data['jumlah_alternatif'] = $this->model->getNumAlternatif();
      $data['skala_perbandingan'] = $this->db->get('tb_skala_perbandingan')->result_array();

      $this->load->view('templates/header');
      $this->load->view('perbandingan_alternatif/tabel_perbandingan', $data);
      $this->load->view('templates/footer');
   }

   public function proses($id_kriteria)
   {
      // Jumlah Alternatif
      $n = $this->model->getNumAlternatif();

      $matrik = array();
      $urut = 0;

      // Memetakan nilai dalam bentuk matrik
      // x = baris
      // y = kolom
      for ($x = 0; $x <= ($n - 2); $x++) {
         for ($y = ($x + 1); $y <= ($n - 1); $y++) {
            $urut++;
            $pilih = "pilih" . $urut;
            $bobot = "bobot" . $urut;
            if ($this->input->post($pilih) == 1) {
               $matrik[$x][$y] = $this->input->post($bobot);
               $matrik[$y][$x] = 1 / $this->input->post($bobot);
            } else {
               $matrik[$x][$y] = 1 / $this->input->post($bobot);
               $matrik[$y][$x] = $this->input->post($bobot);
            }

            $id_alternatif1 = getAlternatifId($x);
            $id_alternatif2 = getAlternatifId($y);

            $jumlahPerbandingan = $this->model->getNumPerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria);
            if ($jumlahPerbandingan == 0) {
               $this->model->insertPerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria, $matrik[$x][$y]);
            } else {
               $this->model->updatePerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria, $matrik[$x][$y]);
            }
         }
      }

      // Diagonal -> bernilai 1
      for ($i = 0; $i <= ($n - 1); $i++) {
         $matrik[$i][$i] = 1;
      }

      // Inisialisasi jumlah tiap kolom dan baris alternatif
      $jmlmpb = array();
      $jmlmnk = array();
      for ($i = 0; $i <= ($n - 1); $i++) {
         $jmlmpb[$i] = 0;
         $jmlmnk[$i] = 0;
      }

      // Menghitung jumlah pada kolom alternatif tabel perbandingan berpasangan
      for ($x = 0; $x <= ($n - 1); $x++) {
         for ($y = 0; $y <= ($n - 1); $y++) {
            $value = $matrik[$x][$y];
            $jmlmpb[$y] += $value;
         }
      }

      // Menghitung jumlah pada baris alternatif tabel nilai alternatif
      // Matrikb merupakan matrik yang telah dinormalisasi
      for ($x = 0; $x <= ($n - 1); $x++) {
         for ($y = 0; $y <= ($n - 1); $y++) {
            $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
            $value = $matrikb[$x][$y];
            $jmlmnk[$x] += $value;
         }

         // Nilai Priority Vektor
         $pv[$x] = $jmlmnk[$x] / $n;

         // Memasukan nilai priority vektor ke dalam tabel tb_pv_alternatif
         $id_alternatif = getAlternatifId($x);
         $jumlahPV = $this->model->getNumWithIdAlternatifPV($id_alternatif, $id_kriteria);
         if ($jumlahPV == 0) {
            $this->model->insertAlternatifPV($id_alternatif, $id_kriteria, $pv[$x]);
         } else {
            $this->model->updateAlternatifPV($id_alternatif, $id_kriteria, $pv[$x]);
         }
      }

      $eigenVektor = getEigenVector($jmlmpb, $jmlmnk, $n);
      $consIndex = getConsIndex($jmlmpb, $jmlmnk, $n);
      $consRatio = getConsRatio($jmlmpb, $jmlmnk, $n);

      $data['n'] = $n;
      $data['matrik'] = $matrik;
      $data['jmlmpb'] = $jmlmpb;
      $data['jmlmnk'] = $jmlmnk;
      $data['matrikb'] = $matrikb;
      $data['pv'] = $pv;
      $data['eigenVektor'] = $eigenVektor;
      $data['consIndex'] = $consIndex;
      $data['consRatio'] = $consRatio;
      $data['data_kriteria'] = $this->model->getKriteria($id_kriteria);

      $this->load->view('templates/header');
      $this->load->view('perbandingan_alternatif/output', $data);
      $this->load->view('templates/footer');
   }
}
