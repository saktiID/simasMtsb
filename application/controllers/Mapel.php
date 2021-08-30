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

    public function get_kode_unik()
    {
        $generate_kode = rand(100, 999);
        $result = $this->db->get_where('mapel', ['kode' => $generate_kode])->row_array();
        if ($result) {
            $generate_kode = rand(100, 999);
            return $generate_kode;
        } else {
            return $generate_kode;
        }
    }

    public function insert_mapel()
    {
        $namaMapel = $this->input->post('namaMapel');
        $penada = [];
        $sanitize = str_split($namaMapel);
        for ($i = 0; $i < count($sanitize); $i++) {
            if ($sanitize[$i] === "'" || $sanitize[$i] === "`" || $sanitize[$i] === "-" || $sanitize[$i] === '"' || $sanitize[$i] === "_") {
                continue;
            } else {
                $penada[] = $sanitize[$i];
            }
        }
        $namaMapel = implode("", $penada);
        $lenghtMapel = count($this->mapel_model->get_mapel());

        $array = [
            'kode' => $this->get_kode_unik(),
            'nama_mapel' => strtoupper($namaMapel),
            'urut' => $lenghtMapel + 1,
        ];

        $query = $this->mapel_model->insert_mapel($array);
        if ($query) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    public function hapus_mapel()
    {
        $mapelId = $this->input->post('id');
        $namaMapel = $this->mapel_model->get_nama_mapel_by_id($mapelId);
        $pengampuId = $this->mapel_model->get_pengampu_mapel($namaMapel);
        $pengampu = [];
        foreach ($pengampuId as $pId) {
            $pengampu[] = $this->Users_model->get_by_id($pId['user_id'])['nama'];
        }
        if (count($pengampu) > 0) {
            echo json_encode($pengampu);
        } else {
            echo $mapelId;
        }
    }

    public function hapus_mapel_attemp()
    {
        $idMapel = $this->input->post('id');
        $query = $this->mapel_model->delete_mapel($idMapel);
        echo $query;
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
