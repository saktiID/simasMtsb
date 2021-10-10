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

    /**
     * method controller untuk download file pdf
     */
    public function download($file)
    {
        $base = base_url('upload/dokumen/bukuinduk/');
        redirect($base . $file);
    }

    /**
     * method controller untuk upload all record data induk siswa
     */
    public function upload_data_siswa()
    {
        // prepare data
        $arr = [
            'nisn' =>  $this->input->post('nisn'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        ];

        // query insert data dengan model
        $insert = $this->bukuIndukSiswa_model->insert_data_siswa($arr);
        if ($insert) {
            // query reload ajax data siswa
            $siswa = $this->bukuIndukSiswa_model->get_siswa_by_tahun($arr['tahun_ajaran']);
            echo json_encode($siswa);
        }
    }

    /**
     * method controller untuk upload file
     */
    public function upload_file()
    {
        if (isset($_FILES['file']['name'])) {
            $config['upload_path'] = '.upload/dokumen/bukuinduk/';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            }
        }
    }

    /**
     * method controller untuk menghapus data siswa
     */
    public function hapus_siswa()
    {
        $id = $this->input->post('id');
        $link = $this->input->post('link');
        $del = $this->bukuIndukSiswa_model->delete_siswa_by_id($id);
        if ($del) {
            $siswa = $this->bukuIndukSiswa_model->get_siswa_by_tahun($link);
            echo json_encode($siswa);
        } else {
            echo false;
        }
    }

    /**
     * method controller untuk update data table siswa
     */
    public function ubah_data_siswa()
    {
        $arr = [
            'nisn' => strval($this->input->post('nisn')),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'id' => $this->input->post('id'),
        ];

        $update = $this->bukuIndukSiswa_model->set_siswa_by_id($arr);
        echo json_encode($update);
    }
}
