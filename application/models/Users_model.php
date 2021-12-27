<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function get_user_auth($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function get_user_pass_by_id($id)
    {
        $this->db->select(['password']);
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
    public function get_id_by_email($email)
    {
        $this->db->select(['id']);
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function get_by_id($id)
    {
        $this->db->select(['id', 'nama', 'username', 'email']);
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_all_users()
    {
        $this->db->order_by('nama', 'ASC');
        $this->db->select(['id', 'username', 'email', 'nama', 'image', 'is_pengajar', 'is_walas']);
        return $this->db->get('users')->result_array();
    }

    public function get_all_users_public()
    {
        $this->db->select(['id', 'nama', 'username']);
        return $this->db->get('users')->result_array();
    }

    public function insert_new_user($arrayUser)
    {
        $insert = $this->db->insert('users', $arrayUser);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_user_data($data, $user_id)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('gender', $data['gender']);
        $this->db->set('email', $data['email']);
        $this->db->set('username', $data['username']);
        $this->db->set('role_id', $data['role_id']);
        $this->db->set('is_pengajar', $data['is_pengajar']);
        $this->db->set('is_walas', $data['is_walas']);
        $this->db->set('jenjang', $data['jenjang']);
        $this->db->where('id', $user_id);
        $update = $this->db->update('users');
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_user_pass($pass, $user_id)
    {
        $this->db->set('password', $pass);
        $this->db->where('id', $user_id);
        $update = $this->db->update('users');
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_personal_data($data, $user_id)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('gender', $data['gender']);
        $this->db->set('email', $data['email']);
        $this->db->set('username', $data['username']);
        $this->db->where('id', $user_id);
        $update = $this->db->update('users');
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('users');
        if ($del) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
