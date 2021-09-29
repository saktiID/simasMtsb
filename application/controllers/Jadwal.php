<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_authority();
        $this->load->model('Users_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('walas_model');
        $this->load->model('jadwal_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Guru',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),

        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/jadwal_guru');
        $this->load->view('templates/_footer');
    }
}
