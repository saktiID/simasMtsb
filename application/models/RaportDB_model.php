<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RaportDB_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db_raport = $this->load->database('raport', TRUE);
    }

    /**
     * method model for get all siswa from db raport
     */
    public function get_all_siswa()
    {
        $this->db_raport->select('
            siswa_id,
            siswa_nis,
            siswa_nisn,
            siswa_nama,
            tingkat_id,
            kelas_id,
            siswa_gender
        ');
        return $this->db_raport->get('e_siswa')->result_array();
    }

    /**
     * method model for get all tingkat from db raport
     */
    public function get_all_tingkat()
    {
        $this->db_raport->select('tingkat_id, tingkat_nama');
        return $this->db_raport->get('e_tingkat')->result_array();
    }

    /**
     * method model for get all kelas from db raport
     */
    public function get_all_kelas()
    {
        $this->db_raport->select('
            e_kelas.kelas_id,
            e_tingkat.tingkat_nama,
            e_kelas.kelas_nama,
            e_kelas.guru_id,
            e_guru.guru_nama,
            e_guru.guru_gender
        ');
        $this->db_raport->from('e_kelas');
        $this->db_raport->join('e_guru', 'e_guru.guru_id = e_kelas.guru_id');
        $this->db_raport->join('e_tingkat', 'e_tingkat.tingkat_id = e_kelas.tingkat_id');
        return $this->db_raport->get()->result_array();
    }

    /** 
     * method model for get all guru
     * */
    public function get_all_guru()
    {
        $this->db_raport->select('guru_id, guru_nama, guru_gender');
        return $this->db_raport->get('e_guru')->result_array();
    }

    /**
     * method model for get siswa spesifik
     */
    public function get_siswa($siswa_id)
    {
        $this->db_raport->select('
            e_siswa.siswa_id,
            e_siswa.siswa_nis,
            e_siswa.siswa_nisn,
            e_siswa.siswa_nama,
            e_siswa.tingkat_id,
            e_siswa.kelas_id,
            e_siswa.siswa_gender,
            e_tingkat.tingkat_nama,
            e_kelas.kelas_nama,
            e_kelas.guru_id,
            e_guru.guru_nama,
            e_guru.guru_gender
            ');
        $this->db_raport->where('siswa_id', $siswa_id);
        $this->db_raport->from('e_siswa');
        $this->db_raport->join('e_tingkat', 'e_tingkat.tingkat_id = e_siswa.tingkat_id');
        $this->db_raport->join('e_kelas', 'e_kelas.kelas_id = e_siswa.kelas_id');
        $this->db_raport->join('e_guru', 'e_guru.guru_id = e_kelas.guru_id');

        return  $this->db_raport->get()->result_array();
    }

    /**
     * method model get biodata siswa
     */
    public function get_biodata_siswa($siswa_id)
    {
        $this->db_raport->select('
            siswa_id,
            siswa_nama,
            siswa_gender,
            siswa_tempat,
            siswa_tgllahir,
            siswa_alamat,
            siswa_telpon,
            siswa_anakke,
            nama_ayah,
            nama_ibu,
            sekolah_asal
        ');
        return $this->db_raport->get_where('e_siswa', ['siswa_id' => $siswa_id])->result_array();
    }

    /**
     * method model for get guru spesifik
     */
    public function get_guru($guru_id)
    {
        $this->db_raport->select('guru_id, guru_nama, guru_gender');
        return $this->db_raport->get_where('e_guru', ['guru_id' => $guru_id])->result_array();
    }

    /**
     * method model for get kelas milik guru
     */
    public function get_kelas_guru($guru_id)
    {
        $this->db_raport->select('
            e_kelas.kelas_id,
            e_tingkat.tingkat_nama,
            e_kelas.kelas_nama,
        ');
        $this->db_raport->where('e_kelas.guru_id', $guru_id);
        $this->db_raport->from('e_kelas');
        $this->db_raport->join('e_guru', 'e_guru.guru_id = e_kelas.guru_id');
        $this->db_raport->join('e_tingkat', 'e_tingkat.tingkat_id = e_kelas.tingkat_id');
        return $this->db_raport->get()->result_array();
    }

    /**
     * method model for get walas
     */
    public function get_walas($guru_id)
    {
        $this->db_raport->select('
            e_kelas.kelas_id,
            e_kelas.tingkat_id,
            e_kelas.kelas_nama,
            e_kelas.guru_id,
            e_guru.guru_nama,
            e_guru.guru_gender,
            e_tingkat.tingkat_nama
        ');
        $this->db_raport->where('e_kelas.guru_id', $guru_id);
        $this->db_raport->from('e_kelas');
        $this->db_raport->join('e_guru', 'e_guru.guru_id = e_kelas.guru_id');
        $this->db_raport->join('e_tingkat', 'e_tingkat.tingkat_id = e_kelas.tingkat_id');
        return $this->db_raport->get()->result_array();
    }

    /**
     * method model for get siswa kelas
     */
    public function get_siswa_kelas($kelas_id)
    {
        $this->db_raport->select('
            e_siswa.siswa_id,
            e_siswa.siswa_nis,
            e_siswa.siswa_nisn,
            e_siswa.siswa_nama,
        ');
        $this->db_raport->where('kelas_id', $kelas_id);
        $siswa = $this->db_raport->get('e_siswa')->result_array();
        $info_kelas = $this->get_info_kelas($kelas_id);

        return  [
            'info_kelas' => $info_kelas,
            'siswa' => $siswa,
        ];
    }

    /**
     * method model for get info kelas
     */
    public function get_info_kelas($kelas_id)
    {
        $this->db_raport->select('
            e_kelas.kelas_id,
            e_kelas.tingkat_id,
            e_kelas.kelas_nama,
            e_kelas.guru_id,
            e_tingkat.tingkat_nama,
            e_guru.guru_nama,
            e_guru.guru_id,
            e_guru.guru_gender
        ');
        $this->db_raport->where('kelas_id', $kelas_id);
        $this->db_raport->from('e_kelas');
        $this->db_raport->join('e_tingkat', 'e_tingkat.tingkat_id = e_kelas.tingkat_id');
        $this->db_raport->join('e_guru', 'e_guru.guru_id = e_kelas.guru_id');
        $query = $this->db_raport->get()->result_array()[0];
        return $data = [
            'kelas_id' => $query['kelas_id'],
            'tingkat_id' => $query['tingkat_id'],
            'kelas_nama' => $query['kelas_nama'],
            'tingkat_nama' => $query['tingkat_nama'],
            'guru_id' => $query['guru_id'],
            'guru_nama' => $query['guru_nama'],
            'guru_gender' => $query['guru_gender'],
            'total_peserta' => $this->get_count_siswa_in_kelas($kelas_id),
            'total_laki' => $this->get_count_gender_in_kelas($kelas_id, 'L'),
            'total_perempuan' => $this->get_count_gender_in_kelas($kelas_id, 'P'),
        ];
    }

    /**
     * method model for get count siswa in kelas
     */
    public function get_count_siswa_in_kelas($kelas_id)
    {
        $this->db_raport->where('kelas_id', $kelas_id);
        return $this->db_raport->count_all_results('e_siswa');
    }

    /**
     * method model for get count L siswa in kelas
     */
    public function get_count_gender_in_kelas($kelas_id, $gender)
    {
        $this->db_raport->where('kelas_id', $kelas_id);
        $this->db_raport->where('siswa_gender', $gender);
        return $this->db_raport->count_all_results('e_siswa');
    }
}
