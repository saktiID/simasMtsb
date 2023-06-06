<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    /**
     * method model untuk mengambil identitas siswa
     */
    public function get_siswa($nis)
    {
        $this->db->select('nama, nis, jenis_kelamin, kelas_id, level_eci');
        return $this->db->get_where('siswa', ['nis' => $nis])->result_array();
    }

    /**
     * method model untuk mengambil data siswa kelas
     */
    public function get_siswa_kelas($kelas_id)
    {
        $this->db->select('id, nama, nis');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('siswa', ['kelas_id' => $kelas_id, 'is_active' => 1])->result_array();
    }
}
