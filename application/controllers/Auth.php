<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }

        $this->form_validation->set_rules('username', 'UserID', 'required|trim|min_length[5]', [
            'required' => 'Harap isi username!',
            'min_length' => 'Karakter terlalu sedikit!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]', [
            'required' => 'Harap isi password!',
            'min_length' => 'Karakter terlalu sedikit!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Users_model->get_user_auth($username);
        if ($user != NULL) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id'  => $user['role_id'],
                        'user_id'  => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun tidak aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User ID belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_idd');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }
}
