<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walas_model extends CI_Model
{
    public function get_walas($user_id)
    {
        return $this->db->get_where('walas', ['user_id' => $user_id])->row_array();
    }

    public function set_walas($walas_of, $user_id)
    {
        $this->db->set('kelas_id', $walas_of);
        $this->db->where('user_id', $user_id);
        $update = $this->db->update('walas');
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insert_walas($arraryWalas)
    {
        $insert = $this->db->insert('walas', $arraryWalas);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteGuruWalas($user_id)
    {
        $this->db->where('user_id', $user_id);
        $del = $this->db->delete('walas');
        if ($del) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
