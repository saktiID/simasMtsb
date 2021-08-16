<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{

    public function get_jadwal_jam($user_id)
    {
        $this->db->order_by('jam_id', 'ASC');
        $this->db->where('user_id', $user_id);
        $this->db->from('jadwal_guru');
        $this->db->join('jadwal_jam', 'jadwal_guru.jam_id = jadwal_jam.id');
        return $this->db->get()->result_array();
    }


    public function get_table_jadwal_jam()
    {
        $this->db->where('kegiatan', 'KBM');
        return $this->db->get('jadwal_jam')->result_array();
    }

    public function get_count_jadwal()
    {
        return $this->db->count_all('jadwal_jam');
    }

    public function insert_new_jadwal_guru($arr)
    {
        $insert = $this->db->insert('jadwal_guru', $arr);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_jadwal_guru($user_id)
    {
        $this->db->where('user_id', $user_id);
        $del = $this->db->delete('jadwal_guru');
        if ($del) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function set_jadwal_senin($user_id, $senin, $idjam)
    {
        $this->db->set('senin', $senin);
        $this->db->where(['user_id' => $user_id, 'jam_id' => $idjam]);
        $this->db->update('jadwal_guru');
    }


    public function set_jadwal_selasa($user_id, $selasa, $idjam)
    {
        $this->db->set('selasa', $selasa);
        $this->db->where(['user_id' => $user_id, 'jam_id' => $idjam]);
        $this->db->update('jadwal_guru');
    }


    public function set_jadwal_rabu($user_id, $rabu, $idjam)
    {
        $this->db->set('rabu', $rabu);
        $this->db->where(['user_id' => $user_id, 'jam_id' => $idjam]);
        $this->db->update('jadwal_guru');
    }


    public function set_jadwal_kamis($user_id, $kamis, $idjam)
    {
        $this->db->set('kamis', $kamis);
        $this->db->where(['user_id' => $user_id, 'jam_id' => $idjam]);
        $this->db->update('jadwal_guru');
    }


    public function set_jadwal_jumat($user_id, $jumat, $idjam)
    {
        $this->db->set('jumat', $jumat);
        $this->db->where(['user_id' => $user_id, 'jam_id' => $idjam]);
        $this->db->update('jadwal_guru');
    }
}
