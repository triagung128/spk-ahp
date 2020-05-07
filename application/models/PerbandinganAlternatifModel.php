<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerbandinganAlternatifModel extends CI_Model
{
   public function getKriteria($id = null)
   {
      if ($id == null) {
         return $this->db->get('tb_kriteria')->result_array();
      } else {
         return $this->db->get_where('tb_kriteria', ['id_kriteria' => $id])->row_array();
      }
   }

   public function getAlternatif($id = null)
   {
      if ($id == null) {
         return $this->db->get('tb_alternatif')->result_array();
      } else {
         return $this->db->get_where('tb_alternatif', ['id_alternatif' => $id])->row_array();
      }
   }

   public function getNumAlternatif()
   {
      return $this->db->get('tb_alternatif')->num_rows();
   }

   public function getNumPerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria)
   {
      return $this->db->get_where('tb_perbandingan_alternatif', ['id_alternatif1' => $id_alternatif1, 'id_alternatif2' => $id_alternatif2, 'id_kriteria' => $id_kriteria])->num_rows();
   }

   public function insertPerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria, $nilai)
   {
      $this->db->insert('tb_perbandingan_alternatif', ['id_alternatif1' => $id_alternatif1, 'id_alternatif2' => $id_alternatif2, 'id_kriteria' => $id_kriteria, 'nilai_perbandingan' => $nilai]);
   }

   public function updatePerbandinganAlternatif($id_alternatif1, $id_alternatif2, $id_kriteria, $nilai)
   {
      $this->db->where(['id_alternatif1' => $id_alternatif1, 'id_alternatif2' => $id_alternatif2, 'id_kriteria' => $id_kriteria]);
      $this->db->update('tb_perbandingan_alternatif', ['nilai_perbandingan' => $nilai]);
   }

   public function getNumWithIdAlternatifPV($id_alternatif, $id_kriteria)
   {
      return $this->db->get_where('tb_bobot_alternatif', ['id_alternatif' => $id_alternatif, 'id_kriteria' => $id_kriteria])->num_rows();
   }

   public function insertAlternatifPV($id_alternatif, $id_kriteria, $pv)
   {
      $this->db->insert('tb_bobot_alternatif', ['id_alternatif' => $id_alternatif, 'id_kriteria' => $id_kriteria, 'nilai' => $pv]);
   }

   public function updateAlternatifPV($id_alternatif, $id_kriteria, $pv)
   {
      $this->db->where(['id_alternatif' => $id_alternatif, 'id_kriteria' => $id_kriteria]);
      $this->db->update('tb_bobot_alternatif', ['nilai' => $pv]);
   }
}
