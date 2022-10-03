<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    /**
     * method model untuk mengambil identitas siswa
     */
    public function get_siswa($nis)
    {
        $this->db->select('nama, nis, jenis_kelamin, kelas_id');
        return $this->db->get_where('siswa', ['nis' => $nis])->result_array();
    }
}
