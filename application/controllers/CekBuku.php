<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekBuku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_authority();
        $this->load->model('Users_model');
        $this->load->model('bukuKerja_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Cek Buku Kerja',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'buku_kerja' => $this->bukuKerja_model->get_buku_kerja(),
            'isi_buku' => $this->bukuKerja_model->get_isi_buku(),
            'mapel' => $this->mapel_model->get_mapel(),
            'kelas' => $this->kelas_model->get_kelas(),
            'cek_buku' => $this->bukuKerja_model->get_record_buku(),
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/cek_buku');
        $this->load->view('templates/_footer');
    }

    public function detail($id = 0, $tahun = 0)
    {
        if ($id == 0) {
            redirect('staff/cekbuku');
        } else {

            if ($tahun == 0) {
                $currentTahun = date('Y');
                $currentBulan = date('m');
                if ($currentBulan > 6) {
                    $tahunSmt2 = $currentTahun + 1;
                    $tahun = $currentTahun . '-' . $tahunSmt2;
                }
            }

            $data = [
                'title' => 'Buku ' . $this->Users_model->get_by_id($id)['nama'],
                'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
                'cek_buku' => $this->bukuKerja_model->get_buku_self($id),
                'targetAll' => $this->bukuKerja_model->get_record_buku(),
                'target' => $this->Users_model->get_by_id($id),
                'cek_buku1' => $this->bukuKerja_model->get_buku_self_by_smt($id, '1', $tahun),
                'cek_buku2' => $this->bukuKerja_model->get_buku_self_by_smt($id, '2', $tahun),
                'tahun' => $tahun,
            ];


            $this->load->view('templates/_header', $data);
            $this->load->view('templates/_navbar');
            $this->load->view('templates/_sidebar');
            $this->load->view('pages/detail_buku');
            $this->load->view('templates/_footer');
        }
    }

    public function preview($url)
    {
        $pdf_viewer = 'https://smallpdf.com/id/edit-pdf#open=';
        $base = base_url('upload/dokumen/bukukerja/');
        $url = str_replace('%20', '_', $url);
        // redirect($pdf_viewer . $base . $url);
        redirect($base . $url);
    }

    public function setujui($id_record, $target)
    {
        $status = ['status' => 'Disetujui', 'class' => 'badge-success'];
        $setuju = $this->bukuKerja_model->set_status($id_record, $status);
        if ($setuju) {
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil menyetujui file", icon: "success", }); </script>');
            redirect('cekbuku/detail/' . $target);
        }
    }

    public function tolak($id_record, $target)
    {
        $status = ['status' => 'Ditolak', 'class' => 'badge-danger'];
        $tolak = $this->bukuKerja_model->set_status($id_record, $status);
        if ($tolak) {
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil menolak file", icon: "success", }); </script>');
            redirect('cekbuku/detail/' . $target);
        }

        redirect('cekbuku/detail/' . $target);
    }
}
