<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * object untuk query nilai eci tanpa login
 */
class QNilaiEci extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('nilaiEci_model');
        $this->load->model('siswa_model');
    }

    /**
     * method controller index
     */
    public function index()
    {
        $data = [];
        $uniqid = $_GET['q'];
        if (!$uniqid) {
            $p = 'Tidak ada Unique ID';
            $this->_unknown($p);
            return false;
        }
        $data_eci = $this->nilaiEci_model->get_nilai_per_siswa($uniqid);
        if (!$data_eci) {
            $p = 'Tidak ada data nilai';
            $this->_unknown($p);
            return false;
        }
        $data_siswa = $this->siswa_model->get_siswa($data_eci[0]['nis']);
        if (!$data_siswa) {
            $p = 'Tidak ada data siswa';
            $this->_unknown($p);
            return false;
        }

        if (strlen($data_siswa[0]['nama']) > 20) {
            $nama = substr($data_siswa[0]['nama'], 0, 20) . '...';
        } else {
            $nama = $data_siswa[0]['nama'];
        }

        $data = [
            'nama' => $nama,
            'nis' => $data_siswa[0]['nis'],
            'listening' => $data_eci[0]['listening'],
            'speaking' => $data_eci[0]['speaking'],
            'writing' => $data_eci[0]['writing'],
            'reading' => $data_eci[0]['reading'],
            'describe_vocab' => $data_eci[0]['describe_vocab'],
            'link' => $data_eci[0]['link'],
        ];


        $this->load->view('print_pdf/card_nilai', $data);
    }

    /**
     * method controller unknown data
     */
    private function _unknown($p = 'unknown')
    {
        $data = [
            'p' => $p,
            'nama' => 'unknown',
            'nis' => 'uknown',
            'listening' => 'unknown',
            'speaking' => 'unknown',
            'writing' => 'unknown',
            'reading' => 'unknown',
            'describe_vocab' => 'unknown',
            'link' => 'unknown',
        ];
        $this->load->view('print_pdf/card_nilai', $data);
    }

    /**
     * method controller download / print pdf none sign in
     */
    public function download()
    {
        $link = $_GET['uniqid'];
        if (empty($link)) {
            $this->session->set_flashdata('pesan', 'Belum upload nilai atau record database hilang!');
            redirect('nilai_eci');
        }
        $data_eci = $this->nilaiEci_model->get_nilai_per_siswa($link);
        if (!$data_eci) {
            $this->session->set_flashdata('pesan', 'Data tidak ditemukan atau record database hilang!!');
            redirect('nilai_eci');
        }

        $data_siswa = $this->siswa_model->get_siswa($data_eci[0]['nis']);
        if (!$data_siswa) {
            $this->session->set_flashdata('pesan', 'Siswa tidak ditemkan atau record database hilang!');
            redirect('nilai_eci');
        }
        $data_kelas = $this->kelas_model->get_spesific_kelas($data_siswa[0]['kelas_id']);
        if (!$data_siswa) {
            $this->session->set_flashdata('pesan', 'Kelas tidak ditemukan atau record database hilang!');
            redirect('nilai_eci');
        }

        $data = [
            'nama' => $data_siswa[0]['nama'],
            'nis' => $data_siswa[0]['nis'],
            'kelas' => $data_eci[0]['kelas'],
            'bulan' => $data_eci[0]['bulan'],
            'listening' => $data_eci[0]['listening'],
            'speaking' => $data_eci[0]['speaking'],
            'writing' => $data_eci[0]['writing'],
            'reading' => $data_eci[0]['reading'],
            'describe_vocab' => $data_eci[0]['describe_vocab'],
            'timestamp' => $data_eci[0]['timestamp'],
            'link' => $data_eci[0]['link'],
        ];
        $this->load->view('print_pdf/print_nilai_eci2', $data);
    }
}
