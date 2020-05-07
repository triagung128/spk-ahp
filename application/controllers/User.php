<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_user();
      $this->load->model('HasilModel', 'model');
   }

   public function dashboard()
   {
      $this->load->view('templates/header');
      $this->load->view('dashboard/index');
      $this->load->view('templates/footer');
   }

   public function laporan_hasil()
   {
      $data['jumlah_kriteria'] = $this->model->getNumKriteria();
      $data['jumlah_alternatif'] = $this->model->getNumAlternatif();
      $data['ranking'] = $this->model->getRanking();

      $this->load->view('templates/header');
      $this->load->view('hasil/index', $data);
      $this->load->view('templates/footer');
   }
}
