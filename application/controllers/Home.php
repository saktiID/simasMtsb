<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),

        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('home');
        $this->load->view('templates/_footer');
    }
}
