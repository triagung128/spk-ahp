<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilModel extends CI_Model
{
   public function getNumKriteria()
   {
      return $this->db->get('tb_kriteria')->num_rows();
   }

   public function getNumAlternatif()
   {
      return $this->db->get('tb_alternatif')->num_rows();
   }

   public function getRanking(){
      $query = "SELECT tb_alternatif.id_alternatif, tb_alternatif.nama_usaha, tb_ranking.id_alternatif, tb_ranking.nilai FROM tb_alternatif, tb_ranking 
                  WHERE tb_alternatif.id_alternatif = tb_ranking.id_alternatif ORDER BY nilai DESC";
      return $this->db->query($query)->result_array();
   }
}
