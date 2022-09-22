<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiEci_model extends CI_Model
{
    /**
     * method model untuk mengambil data siswa kelas
     */
    public function get_siswa_kelas($kelas_id)
    {
        $this->db->select('id, nama');
        return $this->db->get_where('siswa', ['kelas_id' => $kelas_id, 'is_active' => 1])->result_array();
    }

    /**
     * method model untuk ambil identitas kelas
     */
    public function get_identitas_kelas($kelas_id)
    {
        $this->db->select('kelas');
        return $this->db->get_where('kelas', ['id' => $kelas_id])->result_array();
    }

    /**
     * method model untuk mengambil nilai siswa
     */
    public function get_nilai($arr)
    {
        $this->db->select('id, listening, reading, speaking, writing, describe_vocab, link');
        $where = [
            'siswa_id' => $arr['siswa_id'],
            'tahun_ajaran' => $arr['tahun_ajaran'],
            'semester' => $arr['semester'],
            'bulan' => $arr['bulan']
        ];
        return $this->db->get_where('nilai_eci', $where)->result_array();
    }
}
