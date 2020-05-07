<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('HasilModel', 'model');
   }

   public function index()
   {
      $data['jumlah_kriteria'] = $this->model->getNumKriteria();
      $data['jumlah_alternatif'] = $this->model->getNumAlternatif();
      $data['ranking'] = $this->model->getRanking();

      $this->load->view('templates/header');
      $this->load->view('hasil/index', $data);
      $this->load->view('templates/footer');
   }
}
