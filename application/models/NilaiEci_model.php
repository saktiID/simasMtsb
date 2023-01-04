<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiEci_model extends CI_Model
{
    /**
     * method model untuk mengambil data siswa kelas
     */
    public function get_siswa_kelas($kelas_id)
    {
        $this->db->select('id, nama, nis');
        $this->db->order_by('nama', 'ASC');
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
     * method model untuk ambil id kelas dari nama kelas
     */
    public function get_id_kelas_by_name($kelas)
    {
        $this->db->select('id');
        return $this->db->get_where('kelas', ['kelas' => $kelas])->result_array();
    }

    /**
     * method model untuk mencari siswa berdasarkan level eci dalam satu kelas yang sama
     */
    public function get_level_in_kelas($kelas_id)
    {
        $this->db->select('id, nama, nis, level_eci');
        $this->db->order_by('nama', 'ASC');
        $expert = $this->db->get_where('siswa', [
            'kelas_id' => $kelas_id,
            'is_active' => 1,
            'level_eci' => 'expert'
        ])->result_array();

        $this->db->select('id, nama, nis, level_eci');
        $this->db->order_by('nama', 'ASC');
        $advance = $this->db->get_where('siswa', [
            'kelas_id' => $kelas_id,
            'is_active' => 1,
            'level_eci' => 'advance'
        ])->result_array();

        $this->db->select('id, nama, nis, level_eci');
        $this->db->order_by('nama', 'ASC');
        $intermediate = $this->db->get_where('siswa', [
            'kelas_id' => $kelas_id,
            'is_active' => 1,
            'level_eci' => 'intermediate'
        ])->result_array();

        $this->db->select('id, nama, nis, level_eci');
        $this->db->order_by('nama', 'ASC');
        $basic = $this->db->get_where('siswa', [
            'kelas_id' => $kelas_id,
            'is_active' => 1,
            'level_eci' => 'basic'
        ])->result_array();

        $this->db->select('id, nama, nis, level_eci');
        $this->db->order_by('nama', 'ASC');
        $nolevel = $this->db->get_where('siswa', [
            'kelas_id' => $kelas_id,
            'is_active' => 1,
            'level_eci' => ''
        ])->result_array();

        return [
            'expert' => $expert,
            'advance' => $advance,
            'intermediate' => $intermediate,
            'basic' => $basic,
            'nolevel' => $nolevel,
        ];
    }

    /**
     * method model untuk mengambil level ECI per jenjang / grade
     */
    public function get_level_in_grade($level_eci, $kelas_id)           # $kelas_id adalah id dari jenjang / grade
    {
        // cari item sub kelas berdasarkan id parent
        $this->db->select('id, kelas');
        $sub_kelas_id = $this->db->get_where('kelas', ['child' => $kelas_id])->result_array();

        $siswa = [];
        foreach ($sub_kelas_id as $sub) {
            $this->db->select('nama, nis, kelas_id, level_eci');
            $siswa_per_kelas = $this->db->get_where('siswa', [
                'kelas_id' => $sub['id'],
                'level_eci' => $level_eci,
                'is_active' => 1
            ])->result_array();

            foreach ($siswa_per_kelas as $spk) {
                $this->db->select('kelas');
                $spk['kelas_name'] =  $this->db->get_where('kelas', ['id' => $spk['kelas_id']])->result_array()[0]['kelas'];
                $siswa[] = $spk;
            }
        }

        return $siswa;
    }

    /**
     * method model untuk mengambil nilai siswa (nilai ganda)
     */
    public function get_nilai($arr)
    {
        $this->db->select('id, kelas, listening, reading, speaking, writing, describe_vocab, link');
        $where = [
            'nis' => $arr['nis'],
            'tahun_ajaran' => $arr['tahun_ajaran'],
            'semester' => $arr['semester'],
            'bulan' => $arr['bulan']
        ];
        return $this->db->get_where('nilai_eci', $where)->result_array();
    }

    /**
     * method model untuk mengambil nilai per siswa dengan unique id
     */
    public function get_nilai_per_siswa($uniqid)
    {
        $this->db->select('nis, kelas, bulan, listening, reading, speaking, writing, describe_vocab, link, timestamp');
        return $this->db->get_where('nilai_eci', ['link' => $uniqid])->result_array();
    }

    /**
     * method model untuk menambah nilai
     */
    public function insert_nilai($arr)
    {
        $insert = $this->db->insert('nilai_eci', $arr);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk set level ECI siswa
     */
    public function set_level($nis, $level)
    {
        $this->db->set('level_eci', $level);
        $this->db->where('nis', $nis);
        $query = $this->db->update('siswa');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai
     */
    public function set_nilai($arr)
    {
        $this->db->set('listening', $arr['listening']);
        $this->db->set('reading', $arr['reading']);
        $this->db->set('speaking', $arr['speaking']);
        $this->db->set('writing', $arr['writing']);
        $this->db->set('describe_vocab', $arr['describe_vocab']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai listening
     */
    public function set_listening($arr)
    {
        $this->db->set('listening', $arr['listening']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai reading
     */
    public function set_reading($arr)
    {
        $this->db->set('reading', $arr['reading']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai speaking
     */
    public function set_speaking($arr)
    {
        $this->db->set('speaking', $arr['speaking']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai writing
     */
    public function set_writing($arr)
    {
        $this->db->set('writing', $arr['writing']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk merubah nilai describe_vocab
     */
    public function set_describe_vocab($arr)
    {
        $this->db->set('describe_vocab', $arr['describe_vocab']);

        $this->db->where('nis', $arr['nis']);
        $this->db->where('tahun_ajaran', $arr['tahun_ajaran']);
        $this->db->where('semester', $arr['semester']);
        $this->db->where('bulan', $arr['bulan']);
        $query = $this->db->update('nilai_eci');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
