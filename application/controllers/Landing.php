<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Utama';
        $data['nama'] = $this->Users_model->get_user_auth($this->session->userdata('username'))['nama'];
        $this->load->view('landing', $data);
    }
}
