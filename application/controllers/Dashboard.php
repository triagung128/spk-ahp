<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      is_admin();
   }

   public function index()
   {
      $this->load->view('templates/header');
      $this->load->view('dashboard/index');
      $this->load->view('templates/footer');
   }
}
