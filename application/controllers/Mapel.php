<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_authority();
        $this->load->model('Users_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('role_model');
        $this->load->model('walas_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'mapel' => $this->mapel_model->get_mapel(),
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/mapel');
        $this->load->view('templates/_footer');
    }

    public function tampil_mapel()
    {
        $mapel = $this->mapel_model->get_mapel();
        echo json_encode($mapel);
    }

    public function simpan_posisi()
    {
        $urutan = $this->input->post('urutan');
        foreach ($urutan as $urut) {
            $id = $urut[0];
            $newUrut = $urut[1];
            $this->mapel_model->set_urut_mapel($id, $newUrut);
        }
    }
}
