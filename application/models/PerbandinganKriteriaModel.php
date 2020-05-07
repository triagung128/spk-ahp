<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerbandinganKriteriaModel extends CI_Model
{
   // Mengambil data kriteria
   public function getKriteria($id = null)
   {
      if ($id == null) {
         return $this->db->get('tb_kriteria')->result_array();
      } else {
         return $this->db->get_where('tb_kriteria', ['id_kriteria' => $id])->row_array();
      }
   }

   // Mengambil jumlah n data kriteria
   public function getNumKriteria()
   {
      return $this->db->get('tb_kriteria')->num_rows();
   }

   public function getNumPerbandinganKriteria($id_kriteria1, $id_kriteria2)
   {
      return $this->db->get_where('tb_perbandingan_kriteria', ['id_kriteria1' => $id_kriteria1, 'id_kriteria2' => $id_kriteria2])->num_rows();
   }

   public function insertPerbandinganKriteria($id_kriteria1, $id_kriteria2, $nilai)
   {
      $this->db->insert('tb_perbandingan_kriteria', ['id_kriteria1' => $id_kriteria1, 'id_kriteria2' => $id_kriteria2, 'nilai_perbandingan' => $nilai]);
   }

   public function updatePerbandinganKriteria($id_kriteria1, $id_kriteria2, $nilai)
   {
      $this->db->where(['id_kriteria1' => $id_kriteria1, 'id_kriteria2' => $id_kriteria2]);
      $this->db->update('tb_perbandingan_kriteria', ['nilai_perbandingan' => $nilai]);
   }

   public function getNumWithIdKriteriaPV($id_kriteria)
   {
      return $this->db->get_where('tb_bobot_kriteria', ['id_kriteria' => $id_kriteria])->num_rows();
   }

   public function insertKriteriaPV($id_kriteria, $pv)
   {
      $this->db->insert('tb_bobot_kriteria', ['id_kriteria' => $id_kriteria, 'nilai' => $pv]);
   }

   public function updateKriteriaPV($id_kriteria, $pv)
   {
      $this->db->where(['id_kriteria' => $id_kriteria]);
      $this->db->update('tb_bobot_kriteria', ['nilai' => $pv]);
   }
}
