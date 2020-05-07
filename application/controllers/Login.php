<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('LoginModel', 'model');
   }

   public function index()
   {
      $this->load->view('login/index');
   }

   public function verify()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
      if ($user) {
         if ($password == $user['password']) {
            $data = ['username' => $username, 'role' => $user['role']];
            $this->session->set_userdata($data);
            if ($user['role'] == 1) {
               redirect('admin/dashboard');
            } else {
               redirect('user/laporan_hasil');
            }
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
            redirect('login');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
         redirect('login');
      }
   }

   public function logout(){
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role');
      redirect('login');
   }
}
