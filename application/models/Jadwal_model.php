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

    public function get_jadwal_guru($user_id)
    {
        return $this->db->get_where('jadwal_guru', ['user_id' => $user_id])->result_array();
    }
}
