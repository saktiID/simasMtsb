<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{

    public function get_mapel()
    {
        $this->db->order_by('urut', 'ASC');
        return $this->db->get('mapel')->result_array();
    }

    public function get_nama_mapel($kode)
    {
        $temp = $this->db->get_where('mapel', ['kode' => $kode])->row_array();
        return $temp['nama_mapel'];
    }

    public function get_guru_mapel($user_id)
    {
        return $this->db->get_where('guru_mapel', ['user_id' => $user_id])->row_array();
    }

    public function get_nama_mapel_by_id($id)
    {
        $temp = $this->db->get_where('mapel', ['id' => $id])->row_array();
        return $temp['nama_mapel'];
    }

    public function get_pengampu_mapel($mapel)
    {
        $this->db->select('guru_mapel.user_id');
        $this->db->like('kode_mapel', $mapel);
        return $this->db->get('guru_mapel')->result_array();
    }

    public function set_guru_mapel($id, $mapel)
    {
        $this->db->set('kode_mapel', $mapel);
        $this->db->where('user_id', $id);
        $query = $this->db->update('guru_mapel');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_urut_mapel($id, $newUrut)
    {
        $this->db->set('urut', $newUrut);
        $this->db->where('id', $id);
        $this->db->update('mapel');
    }

    public function insert_guru_mapel($array)
    {
        $insert = $this->db->insert('guru_mapel', $array);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insert_mapel($array)
    {
        $insert = $this->db->insert('mapel', $array);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteGuruMapel($user_id)
    {
        $this->db->where('user_id', $user_id);
        $del = $this->db->delete('guru_mapel');
        if ($del) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_mapel($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('mapel');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
