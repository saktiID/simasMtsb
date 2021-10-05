<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuIndukSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_authority();
        $this->load->model('Users_model');
        $this->load->model('bukuIndukSiswa_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Buku Induk Siswa',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/buku_induk_siswa', $data);
        $this->load->view('templates/_footer');
    }

    /**
     * method controller untuk menampilkan dafatar buku induk
     */
    public function tampil_buku_induk()
    {
        $bk_induk = $this->bukuIndukSiswa_model->get_buku_induk_tahun();
        echo json_encode($bk_induk);
    }

    /**
     * method controller untuk menambah buku induk baru
     */
    public function tambah_buku_induk()
    {
        $array = [
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        ];
        $query = $this->bukuIndukSiswa_model->insert_buku_induk($array);
        if ($query) {
            echo json_encode($array);
        }
    }

    /**
     * method controller untuk menghapus buku induk
     */
    public function hapus_buku_induk()
    {
        $id = $this->input->post('id');
        $query = $this->bukuIndukSiswa_model->delete_buku_induk($id);
        if ($query) {
            echo json_encode($id);
        }
    }

    /**
     * method controller untuk menampilkan siswa sesuai tahun ajaran
     */
    public function tampil_siswa_by_tahun()
    {
        $th_ajaran = $this->input->post('th_ajaran');
        $query = $this->bukuIndukSiswa_model->get_siswa_by_tahun($th_ajaran);
        echo json_encode($query);
    }

    public function lihat_data($file)
    {
        $pdf_viewer = 'https://smallpdf.com/id/edit-pdf#open=';
        $base = base_url('upload/dokumen/bukuinduk/');
        redirect($pdf_viewer . $base . $file);
    }
}
