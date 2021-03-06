<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuKerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Users_model');
        $this->load->model('bukuKerja_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
    }

    public function index()
    {
        if (!isset($_GET['tahun'])) {
            $currentTahun = date('Y');
            $currentBulan = date('m');
            if ($currentBulan > 6) {
                $tahunSmt2 = $currentTahun + 1;
                $tahun = $currentTahun . '-' . $tahunSmt2;
            }

            if ($currentBulan <= 6) {
                $tahunSmt1 = $currentTahun - 1;
                $tahun = $tahunSmt1 . '-' . $currentTahun;
            }
        } else {
            $tahun = $_GET['tahun'];
        }
        $user_id = $this->Users_model->get_user_auth($this->session->userdata('username'))['id'];
        $data = [
            'title' => 'Buku Kerja',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'buku_kerja' => $this->bukuKerja_model->get_buku_kerja(),
            'isi_buku' => $this->bukuKerja_model->get_isi_buku(),
            'mapel' => $this->mapel_model->get_mapel(),
            'kelas' => $this->kelas_model->get_kelas(),
            'buku_self1' => $this->bukuKerja_model->get_buku_self_by_smt($user_id, '1', $tahun),
            'buku_self2' => $this->bukuKerja_model->get_buku_self_by_smt($user_id, '2', $tahun),
            'tahun' => $tahun,
        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/buku_kerja');
        $this->load->view('templates/_footer');
    }

    public function upload_buku()
    {
        if ($_FILES['userfile'] == '') {
            redirect('bukukerja');
        } else {
            $this->_doUpload();
        }
    }

    private function _doUpload()
    {

        $id_isi = $this->input->post('buku_kerja');
        $buku_kerja = $this->bukuKerja_model->get_parrent_buku($id_isi);

        // menyiapkan data
        $user_id = $this->Users_model->get_user_auth($this->session->userdata('username'))['id'];
        $mapel = $this->input->post('mapel');
        $jenis = $this->input->post('buku_kerja');
        $tahun_ajar = $this->input->post('tahun_ajar');
        $smt = $this->input->post('smt');
        $kelas_id = $this->input->post('kelas_id');


        // persiapan nama buku
        $nama_buku = $this->bukuKerja_model->get_nama_buku($jenis);
        $nama_mapel = $this->mapel_model->get_nama_mapel($mapel);
        $kelas      = $this->kelas_model->get_main_kelas($kelas_id);

        $config['upload_path']   = './upload/dokumen/bukukerja/';
        $config['allowed_types'] = 'pdf';
        $config['file_type']     = 'application/pdf';
        $config['file_name']     = $nama_buku . '_' . $nama_mapel . '_' . $kelas . '_' . $tahun_ajar . '_' . 'SMT' . $smt . '_' . $user_id . '.pdf';

        // cek file sudah ada atau belum
        $path = './upload/dokumen/bukukerja/' . $config['file_name'];
        if (!file_exists($path)) {
            // ketika file tidak ada upload file ke server
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('upload', '<script>Swal.fire({ title: "Gagal!", text: "Gagal upload file", icon: "warning", }); </script>');
                redirect('bukukerja');
            } else {
                // record uploaded file to database
                $array = [
                    'user_id' => $user_id,
                    'mapel'   => $mapel,
                    'buku_kerja' => $buku_kerja,
                    'jenis'   => $jenis,
                    'tahun_ajar' => $tahun_ajar,
                    'smt'      => $smt,
                    'kelas_id' => $kelas_id,
                    'status'   => 'Pending',
                    'class'    => 'badge-warning',
                    'userfile' => $config['file_name'],

                ];

                // execute insert db
                if (!$this->bukuKerja_model->insert_record_buku($array)) {
                    $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Gagal!", text: "Gagal upload file", icon: "warning", }); </script>');
                    redirect('bukukerja');
                } else {
                    $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil upload file", icon: "success", }); </script>');
                    redirect('bukukerja');
                }
            }
        } else {
            // ketika file sudah ada
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Gagal!", text: "File sudah ada!", icon: "warning", }); </script>');
            redirect('bukukerja');
        }
    }

    public function download($file)
    {
        $path = './upload/dokumen/bukukerja/' . str_replace('%20', '_', $file);
        force_download($path, NULL);
    }

    public function preview($url)
    {
        $pdf_viewer = 'https://smallpdf.com/id/edit-pdf#open=';
        $base = base_url('upload/dokumen/bukukerja/');
        $url = str_replace('%20', '_', $url);
        // redirect($pdf_viewer . $base . $url);
        redirect($base . $url);
    }

    public function delete($record_id, $file)
    {
        $id_pemilik = $this->bukuKerja_model->get_pemilik_buku($record_id);
        $id_session = $this->session->userdata('user_id');

        if ($id_pemilik['user_id'] == $id_session) {
            $path = './upload/dokumen/bukukerja/' . str_replace('%20', '_', $file);
            if (unlink($path)) {
                $this->bukuKerja_model->delete_record_buku($record_id);
                $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil delete file", icon: "success", }); </script>');
                redirect('bukukerja');
            } else {
                $this->bukuKerja_model->delete_record_buku($record_id);
                $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Ups!", text: "File tidak ditemukan namun record berhasil dihapus", icon: "warning", }); </script>');
                redirect('bukukerja');
            }
        } else {
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil delete file", icon: "success", }); </script>');
            redirect('bukukerja');
        }
    }

    /**
     * method controller for uploading buku kerja with ajax
     */
    public function upload()
    {
        // prepare data
        $id_isi = $this->input->post('buku_kerja');
        $buku_kerja = $this->bukuKerja_model->get_parrent_buku($id_isi);
        $user_id = $this->Users_model->get_user_auth($this->session->userdata('username'))['id'];
        $mapel = $this->input->post('mapel');
        $jenis = $this->input->post('buku_kerja');
        $tahun_ajar = $this->input->post('tahun_ajar');
        $smt = $this->input->post('smt');
        $kelas_id = $this->input->post('kelas_id');

        // prepare book name
        $nama_buku = $this->bukuKerja_model->get_nama_buku($jenis);
        $nama_mapel = $this->mapel_model->get_nama_mapel($mapel);
        $kelas      = $this->kelas_model->get_main_kelas($kelas_id);
        $config['upload_path']   = './upload/dokumen/bukukerja/';
        $config['allowed_types'] = 'pdf';
        $config['file_type']     = 'application/pdf';
        $config['file_name']     = $nama_buku . '_' . $nama_mapel . '_' . $kelas . '_' . $tahun_ajar . '_' . 'SMT' . $smt . '_' . $user_id . '.pdf';

        if (isset($_FILES['fileupload']['name'])) {
            // record uploaded file to database
            $array = [
                'user_id' => $user_id,
                'mapel'   => $mapel,
                'buku_kerja' => $buku_kerja,
                'jenis'   => $jenis,
                'tahun_ajar' => $tahun_ajar,
                'smt'      => $smt,
                'kelas_id' => $kelas_id,
                'status'   => 'Pending',
                'class'    => 'badge-warning',
                'userfile' => $config['file_name'],
            ];

            // cek file sudah ada atau belum
            $path = './upload/dokumen/bukukerja/' . str_replace(' ', '_', $config['file_name']);
            if (!file_exists($path)) {
                // jika file belum ada lakukan upload
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('fileupload')) {
                    // execute record uploaded file to database
                    $this->bukuKerja_model->insert_record_buku($array);
                    $res = ['value' => 'uploaded', 'data' => ['filename' => $config['file_name']]];
                    echo json_encode($res);
                } else {
                    $res = ['value' => 'failed', 'data' => $array];
                    echo json_encode($res);
                }
            } else {
                // jika file sudah ada
                $res = ['value' => 'exist', 'data' => $array];
                echo json_encode($res);
            }
        }
    }

    /**
     * method controller for replacing exist file
     */
    public function replace()
    {
        // prepare data
        $filename = $this->input->post('filename');
        $path = './upload/dokumen/bukukerja/' . str_replace(' ', '_', $filename);
        // delete file
        unlink($path);
        // setup config
        $config['upload_path']   = './upload/dokumen/bukukerja/';
        $config['allowed_types'] = 'pdf';
        $config['file_type']     = 'application/pdf';
        $config['file_name'] = $filename;
        // check file
        if (isset($_FILES['fileupload']['name'])) {
            // upload file
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('fileupload')) {
                // respond
                $res = ['value' => 'replaced', 'data' => ['filename' => $config['file_name']]];
                echo json_encode($res);
            } else {
                // respond
                $res = ['value' => 'failed', 'data' => ['filename' => $config['file_name']]];
                echo json_encode($res);
            }
        }
    }
}
