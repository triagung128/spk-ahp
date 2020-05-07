<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlternatifModel extends CI_Model
{
   public function checkcodeid()
   {
      $query = $this->db->query("SELECT MAX(id_alternatif) as idAlternatif from tb_alternatif");
      $hasil = $query->row();
      return $hasil->idAlternatif;
   }

   public function get($id = null)
   {
      if ($id == null) {
         return $this->db->get('tb_alternatif')->result_array();
      } else {
         return $this->db->get_where('tb_alternatif', ['id_alternatif' => $id])->row_array();
      }
   }

   public function insert($data)
   {
      $this->db->insert('tb_alternatif', $data);
   }

   public function update($id, $data)
   {
      $this->db->where(['id_alternatif' => $id]);
      $this->db->update('tb_alternatif', $data);
   }

   public function delete($id){
      $this->db->where(['id_alternatif' => $id]);
      $this->db->delete('tb_alternatif');

      $this->db->where(['id_alternatif' => $id]);
      $this->db->delete('tb_bobot_alternatif');

      $this->db->where(['id_alternatif' => $id]);
      $this->db->delete('tb_ranking');

      $this->db->where(['id_alternatif1' => $id]);
      $this->db->or_where(['id_alternatif2' => $id]);
      $this->db->delete('tb_perbandingan_alternatif');
   }
}
