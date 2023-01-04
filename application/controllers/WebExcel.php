<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WebExcel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('nilaiEci_model');
    }
    public function index()
    {

        if (!isset($_GET['key'])) {
            echo ('key not found');
        } else {
            if ($_GET['key'] != 'xxx') {
                echo ('wrong key');
            } else {

                if (!isset($_GET['jenjang']) || !isset($_GET['level'])) {
                    echo ('field empty');
                } else {

                    $level = $_GET['level'];
                    $jenjang = $_GET['jenjang'];

                    // $jenjang = $this->nilaiEci_model->get_id_kelas_by_name($jenjang)[0]['id'];
                    // $siswa = $this->nilaiEci_model->get_level_in_grade($level, $jenjang);

                    $data = [
                        'siswa' => $this->nilaiEci_model->get_id_kelas_by_name('VIII'),
                        'level' => $level,
                    ];
                    $this->load->view('webexcel/fetchExcel', $data);
                }
            }
        }
    }
}
