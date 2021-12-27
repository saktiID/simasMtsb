<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuKerja_model extends CI_Model
{

    public function get_buku_kerja()
    {
        $this->db->order_by('no_buku_kerja', 'ASC');
        return $this->db->get_where('buku_kerja', ['parrent' => 1])->result_array();
    }

    public function get_isi_buku()
    {
        $this->db->order_by('no_buku_kerja', 'ASC');
        return $this->db->get_where('buku_kerja', ['parrent' => 0])->result_array();
    }

    public function get_parrent_buku($id_isi)
    {
        $temp = $this->db->get_where('buku_kerja', ['id' => $id_isi])->row_array();
        return $temp['no_buku_kerja'];
    }

    public function get_nama_buku($id)
    {
        $temp = $this->db->get_where('buku_kerja', ['id' => $id])->row_array();
        return $temp['isi_buku_kerja'];
    }

    public function get_buku_self($user_id)
    {
        $this->db->select('record_buku_kerja.*, record_buku_kerja.id as record_id, mapel.nama_mapel, buku_kerja.isi_buku_kerja, kelas.kelas');
        $this->db->where('user_id', $user_id);
        $this->db->from('mapel', 'kelas', 'buku_kerja');
        $this->db->join('record_buku_kerja', 'mapel.kode = record_buku_kerja.mapel');
        $this->db->join('kelas', 'record_buku_kerja.kelas_id = kelas.id');
        $this->db->join('buku_kerja', 'buku_kerja.id = record_buku_kerja.jenis');

        return  $this->db->get()->result_array();
    }

    /**
     * method model for get buku kerja by id by semester by tahun
     */
    public function get_buku_self_by_smt($user_id, $smt, $tahun)
    {
        $this->db->select('record_buku_kerja.*, record_buku_kerja.id as record_id, mapel.nama_mapel, buku_kerja.isi_buku_kerja, kelas.kelas');
        $this->db->where('user_id', $user_id);
        $this->db->where('smt', $smt);
        $this->db->where('tahun_ajar', $tahun);
        $this->db->from('mapel', 'kelas', 'buku_kerja');
        $this->db->join('record_buku_kerja', 'mapel.kode = record_buku_kerja.mapel');
        $this->db->join('kelas', 'record_buku_kerja.kelas_id = kelas.id');
        $this->db->join('buku_kerja', 'buku_kerja.id = record_buku_kerja.jenis');

        return  $this->db->get()->result_array();
    }


    /**
     * method model for get record buku kerja
     */
    public function get_record_buku()
    {
        $this->db->order_by('users.nama', 'ASC');
        $this->db->select('guru_mapel.*, users.nama, users.id, users.image');
        $this->db->where('username !=', 'kepala');
        $this->db->from('users');
        $this->db->join('guru_mapel', 'users.id = guru_mapel.user_id');
        return $this->db->get()->result_array();
    }

    public function get_pemilik_buku($record_id)
    {
        $this->db->select('record_buku_kerja.user_id');
        return $this->db->get_where('record_buku_kerja', ['id' => $record_id])->row_array();
    }


    public function set_status($id_record, $status)
    {
        $this->db->set('status', $status['status']);
        $this->db->set('class', $status['class']);
        $this->db->where('id', $id_record);
        $query = $this->db->update('record_buku_kerja');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function insert_record_buku($array)
    {
        $insert = $this->db->insert('record_buku_kerja', $array);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_record_buku($record_id)
    {
        $this->db->where('id', $record_id);
        return $this->db->delete('record_buku_kerja');
    }

    /**
     * method model for count isi buku kerja
     */
    public function count_isi_buku($no_buku)
    {
        $this->db->select('*');
        $this->db->where('parrent', 0);
        $this->db->where('no_buku_kerja', $no_buku);
        return $this->db->count_all_results('buku_kerja');
    }

    /**
     * method model for count progress buku kerja by user id
     * $arr = user_id, tahun, smt, no_buku, status
     */
    public function count_progress_buku($arr, $smt, $no_buku)
    {
        $this->db->select('user_id', 'buku_kerja', 'status');
        $this->db->where('user_id', $arr['user_id']);
        $this->db->where('tahun_ajar', $arr['tahun']);
        $this->db->where('smt', $smt);
        $this->db->where('buku_kerja', $no_buku);
        $this->db->where('status', $arr['status']);
        $count = $this->db->count_all_results('record_buku_kerja');
        return $count;
    }
}
