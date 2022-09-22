<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

    public function get_kelas()
    {
        return $this->db->get_where('kelas', ['parrent' => 1])->result_array();
    }

    public function get_sub_kelas()
    {
        return $this->db->get_where('kelas', ['parrent' => 0, 'is_active => 1'])->result_array();
    }

    public function get_main_kelas($id)
    {
        $temp = $this->db->get_where('kelas', ['id' => $id])->row_array();
        if (!empty($temp['kelas'])) {
            return $temp['kelas'];
        } else {
            return FALSE;
        }
    }
}
