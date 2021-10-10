<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuIndukSiswa_model extends CI_Model
{

    /**
     * method model untuk mencari buku induk secara pertahun
     */
    public function get_buku_induk_tahun()
    {
        return $this->db->get('buku_induk')->result_array();
    }

    /**
     * method model untuk menambah buku induk baru
     */
    public function insert_buku_induk($tahun)
    {
        $insert = $this->db->insert('buku_induk', $tahun);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * method model untuk  menghapus buku induk
     */
    public function delete_buku_induk($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('buku_induk');
    }

    /**
     * method model untuk mencari siswa sesuai tahun ajaran
     */
    public function get_siswa_by_tahun($tahun)
    {
        $this->db->where('tahun_ajaran', $tahun);
        $this->db->order_by('nama_siswa');
        return  $this->db->get('buku_siswa')->result_array();
    }

    /**
     * method model untuk menambah record data siswa
     */
    public function insert_data_siswa($arr)
    {
        return $this->db->insert('buku_siswa', $arr);
    }

    /**
     * method model untuk menghapus data siswa
     */
    public function delete_siswa_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('buku_siswa');
    }

    /**
     * method model update data siswa by id
     */
    public function set_siswa_by_id($arr)
    {
        $this->db->set('nisn', $arr['nisn']);
        $this->db->set('nama_siswa', $arr['nama_siswa']);
        $this->db->where('id', $arr['id']);
        return $this->db->update('buku_siswa');
    }
}
