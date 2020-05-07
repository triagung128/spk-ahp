<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerbandinganKriteria extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('PerbandinganKriteriaModel', 'model');
   }

   public function index()
   {

      $data['data'] = $this->model->getKriteria();
      $data['jumlah'] = $this->model->getNumKriteria();
      $data['skala_perbandingan'] = $this->db->get('tb_skala_perbandingan')->result_array();

      $this->load->view('templates/header');
      $this->load->view('perbandingan_kriteria/index', $data);
      $this->load->view('templates/footer');
   }

   public function proses()
   {
      // Jumlah Kriteria
      $n = $this->model->getNumKriteria();

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

            $id_kriteria1 = getKriteriaId($x);
            $id_kriteria2 = getKriteriaId($y);

            $jumlahPerbandingan = $this->model->getNumPerbandinganKriteria($id_kriteria1, $id_kriteria2);
            if ($jumlahPerbandingan == 0) {
               $this->model->insertPerbandinganKriteria($id_kriteria1, $id_kriteria2, $matrik[$x][$y]);
            } else {
               $this->model->updatePerbandinganKriteria($id_kriteria1, $id_kriteria2, $matrik[$x][$y]);
            }
         }
      }

      // Diagonal -> bernilai 1
      for ($i = 0; $i <= ($n - 1); $i++) {
         $matrik[$i][$i] = 1;
      }

      // Inisialisasi jumlah tiap kolom dan baris kriteria
      $jmlmpb = array();
      $jmlmnk = array();
      for ($i = 0; $i <= ($n - 1); $i++) {
         $jmlmpb[$i] = 0;
         $jmlmnk[$i] = 0;
      }

      // Menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
      for ($x = 0; $x <= ($n - 1); $x++) {
         for ($y = 0; $y <= ($n - 1); $y++) {
            $value = $matrik[$x][$y];
            $jmlmpb[$y] += $value;
         }
      }

      // Menghitung jumlah pada baris kriteria tabel nilai kriteria
      // Matrikb merupakan matrik yang telah dinormalisasi
      for ($x = 0; $x <= ($n - 1); $x++) {
         for ($y = 0; $y <= ($n - 1); $y++) {
            $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
            $value = $matrikb[$x][$y];
            $jmlmnk[$x] += $value;
         }

         // Nilai Priority Vektor
         $pv[$x] = $jmlmnk[$x] / $n;

         // Memasukan nilai priority vektor ke dalam tabel tb_pv_kriteria
         $id_kriteria = getKriteriaId($x);
         $jumlahPV = $this->model->getNumWithIdKriteriaPV($id_kriteria);
         if ($jumlahPV == 0) {
            $this->model->insertKriteriaPV($id_kriteria, $pv[$x]);
         } else {
            $this->model->updateKriteriaPV($id_kriteria, $pv[$x]);
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

      $this->load->view('templates/header');
      $this->load->view('perbandingan_kriteria/output', $data);
      $this->load->view('templates/footer');
   }
}
