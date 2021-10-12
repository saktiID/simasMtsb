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
        // cek nisn sudah ada atau belum
        $nisn = $this->input->post('nisn');
        $query = $this->bukuIndukSiswa_model->get_siswa_by_nisn($nisn);
        if (count($query) > 0) {
            $found = [1, $query];
            echo json_encode($found);
            die;
        } else {
            if (isset($_FILES['fileupload']['name'])) {
                // upload file
                $config['upload_path'] = './upload/dokumen/bukuinduk/';
                $config['allowed_types'] = 'pdf';
                $config['file_type']     = 'application/pdf';
                $config['file_name']     = 'data_induk_' . $_POST['nisn'] . '.pdf';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('fileupload')) {
                    echo $this->upload->display_errors();
                    die;
                }

                // prepare data
                $arr = [
                    'nisn' =>  $this->input->post('nisn'),
                    'nama_siswa' => $this->input->post('nama_siswa'),
                    'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                    'link_file' => 'data_induk_' . $this->input->post('nisn'),
                ];

                // query insert data dengan model
                $insert = $this->bukuIndukSiswa_model->insert_data_siswa($arr);
                if ($insert) {
                    // query reload ajax data siswa
                    $siswa = $this->bukuIndukSiswa_model->get_siswa_by_tahun($arr['tahun_ajaran']);
                    echo json_encode($siswa);
                }
            }
        }
    }

    /**
     * method controller untuk menghapus data siswa
     */
    public function hapus_siswa()
    {
        // unlink file
        $id = $this->input->post('id');
        $found = $this->bukuIndukSiswa_model->get_siswa_by_id($id);
        $path = './upload/dokumen/bukuinduk/' . $found[0]['link_file'] . '.pdf';
        if (unlink($path)) {
            $link = $this->input->post('link');
            $del = $this->bukuIndukSiswa_model->delete_siswa_by_id($id);
            if ($del) {
                $siswa = $this->bukuIndukSiswa_model->get_siswa_by_tahun($link);
                echo json_encode($siswa);
            } else {
                echo 2;
            }
        } else {
            echo 1;
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
