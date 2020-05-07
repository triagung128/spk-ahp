<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('KriteriaModel', 'model');
   }

   public function index()
   {
      $data['data'] = $this->model->get();

      $this->load->view('templates/header');
      $this->load->view('kriteria/index', $data);
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $checkCodeId = $this->model->checkcodeid();
      // contoh K01, angka 2 kiri = awal pengambilan angka, angka 2 kanan = jumlah angka yang diambil
      $noUrut = substr($checkCodeId, 1, 2);
      $newCodeId = $noUrut + 1;
      $data['kode'] = $newCodeId;

      $this->load->view('templates/header');
      $this->load->view('kriteria/add', $data);
      $this->load->view('templates/footer');
   }

   public function add_data()
   {
      $kode = $this->input->post('kode');
      $nama_kriteria = $this->input->post('nama_kriteria');

      $data = ['id_kriteria' => $kode, 'nama_kriteria' => $nama_kriteria];
      $this->model->insert($data);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data telah berhasil ditambah!</div>');
      redirect('admin/kriteria');
   }

   public function edit($id)
   {
      $data['data'] = $this->model->get($id);

      $this->load->view('templates/header');
      $this->load->view('kriteria/edit', $data);
      $this->load->view('templates/footer');
   }

   public function update()
   {
      $kode = $this->input->post('kode');
      $nama_kriteria = $this->input->post('nama_kriteria');

      $data = ['nama_kriteria' => $nama_kriteria];
      $this->model->update($kode, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data telah berhasil diubah!</div>');
      redirect('admin/kriteria');
   }

   public function delete($id)
   {
      $this->model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success col-md-8" role="alert">Data telah berhasil dihapus!</div>');
      redirect('admin/kriteria');
   }
}
