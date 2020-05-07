<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
      $this->load->model('AlternatifModel', 'model');
   }
   public function index()
   {
      $data['data'] = $this->model->get();

      $this->load->view('templates/header');
      $this->load->view('alternatif/index', $data);
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $checkCodeId = $this->model->checkcodeid();
      // Contoh ALT001
      $noUrut = substr($checkCodeId, 3, 3);
      $newCodeId = $noUrut + 1;

      $data['id'] = $newCodeId;

      $this->load->view('templates/header');
      $this->load->view('alternatif/add', $data);
      $this->load->view('templates/footer');
   }

   public function add_data()
   {
      $id = $this->input->post('id');
      $nama_pemilik = $this->input->post('nama_pemilik');
      $alamat = $this->input->post('alamat');
      $pendidikan = $this->input->post('pendidikan');
      $nomor_hp = $this->input->post('nomor_hp');
      $nama_usaha = $this->input->post('nama_usaha');
      $tahun_berdiri = $this->input->post('tahun_berdiri');
      $jenis_usaha = $this->input->post('jenis_usaha');
      $barang_produksi = $this->input->post('barang_produksi');
      $sumber_bahan_baku = $this->input->post('sumber_bahan_baku');
      $jumlah_tenaga_kerja = $this->input->post('jumlah_tenaga_kerja');
      $kapasitas_produksi = $this->input->post('kapasitas_produksi');
      $kepemilikan_sarana = $this->input->post('kepemilikan_sarana');
      $nilai_investasi = $this->input->post('nilai_investasi');
      $wilayah_pemasaran = $this->input->post('wilayah_pemasaran');

      $data = [
         'id_alternatif' => $id,
         'nama_pemilik' => $nama_pemilik,
         'alamat' => $alamat,
         'pendidikan' => $pendidikan,
         'no_hp' => $nomor_hp,
         'nama_usaha' => $nama_usaha,
         'jenis_usaha' => $jenis_usaha,
         'barang_produksi' => $barang_produksi,
         'kapasitas_produksi' => $kapasitas_produksi,
         'jumlah_tenaga_kerja' => $jumlah_tenaga_kerja,
         'nilai_investasi' => $nilai_investasi,
         'tahun_berdiri' => $tahun_berdiri,
         'sumber_bahan_baku' => $sumber_bahan_baku,
         'kepemilikan_sarana' => $kepemilikan_sarana,
         'wilayah_pemasaran' => $wilayah_pemasaran
      ];

      $this->model->insert($data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambah!</div>');
      redirect('admin/alternatif');
   }

   public function edit($id)
   {
      $data['data'] = $this->model->get($id);

      $this->load->view('templates/header');
      $this->load->view('alternatif/edit', $data);
      $this->load->view('templates/footer');
   }

   public function update()
   {
      $id = $this->input->post('id');
      $nama_pemilik = $this->input->post('nama_pemilik');
      $alamat = $this->input->post('alamat');
      $pendidikan = $this->input->post('pendidikan');
      $nomor_hp = $this->input->post('nomor_hp');
      $nama_usaha = $this->input->post('nama_usaha');
      $tahun_berdiri = $this->input->post('tahun_berdiri');
      $jenis_usaha = $this->input->post('jenis_usaha');
      $barang_produksi = $this->input->post('barang_produksi');
      $sumber_bahan_baku = $this->input->post('sumber_bahan_baku');
      $jumlah_tenaga_kerja = $this->input->post('jumlah_tenaga_kerja');
      $kapasitas_produksi = $this->input->post('kapasitas_produksi');
      $kepemilikan_sarana = $this->input->post('kepemilikan_sarana');
      $nilai_investasi = $this->input->post('nilai_investasi');
      $wilayah_pemasaran = $this->input->post('wilayah_pemasaran');

      $data = [
         'nama_pemilik' => $nama_pemilik,
         'alamat' => $alamat,
         'pendidikan' => $pendidikan,
         'no_hp' => $nomor_hp,
         'nama_usaha' => $nama_usaha,
         'jenis_usaha' => $jenis_usaha,
         'barang_produksi' => $barang_produksi,
         'kapasitas_produksi' => $kapasitas_produksi,
         'jumlah_tenaga_kerja' => $jumlah_tenaga_kerja,
         'nilai_investasi' => $nilai_investasi,
         'tahun_berdiri' => $tahun_berdiri,
         'sumber_bahan_baku' => $sumber_bahan_baku,
         'kepemilikan_sarana' => $kepemilikan_sarana,
         'wilayah_pemasaran' => $wilayah_pemasaran
      ];

      $this->model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');
      redirect('admin/alternatif');
   }

   public function delete($id)
   {
      $this->model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil dihapus!</div>');
      redirect('admin/alternatif');
   }
}
