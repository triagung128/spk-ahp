<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaModel extends CI_Model
{
   public function checkcodeid(){
      $query = $this->db->query("SELECT MAX(id_kriteria) as idKriteria from tb_kriteria");
      $hasil = $query->row();
      return $hasil->idKriteria;
   }

   public function get($id = null)
   {
      if ($id == null) {
         return $this->db->get('tb_kriteria')->result_array();
      } else {
         return $this->db->get_where('tb_kriteria', ['id_kriteria' => $id])->row_array();
      }
   }

   public function insert($data)
   {
      $this->db->insert('tb_kriteria', $data);
   }

   public function update($id, $data)
   {
      $this->db->where(['id_kriteria' => $id]);
      $this->db->update('tb_kriteria', $data);
   }

   public function delete($id)
   {
      $this->db->where(['id_kriteria' => $id]);
      $this->db->delete('tb_kriteria');

      $this->db->where(['id_kriteria' => $id]);
      $this->db->delete('tb_bobot_kriteria');

      $this->db->where(['id_kriteria' => $id]);
      $this->db->delete('tb_bobot_alternatif');

      $this->db->where(['id_kriteria1' => $id]);
      $this->db->or_where(['id_kriteria2' => $id]);
      $this->db->delete('tb_perbandingan_kriteria');

      $this->db->where(['id_kriteria' => $id]);
      $this->db->delete('tb_perbandingan_alternatif');
   }
}
