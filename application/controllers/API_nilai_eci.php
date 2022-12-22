<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class API_nilai_eci extends RestController
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('nilaiEci_model');
        $this->load->model('Users_model');
    }

    /**
     * method controller API untuk mengambil data nilai eci per kelas
     */
    public function nilai_eci_get()
    {
        // params
        $kelas_id = $this->get('kelas_id');
        $arr = [
            'tahun_ajaran' => $this->get('tahun_ajaran'),
            'semester' => $this->get('semester'),
            'bulan' => $this->get('bulan')
        ];

        $siswa = $this->nilaiEci_model->get_siswa_kelas($kelas_id);
        $result = [];

        if ($siswa) {
            foreach ($siswa as $s) {
                $arr['nis'] = $s['nis'];
                $nilai = $this->nilaiEci_model->get_nilai($arr);

                $result[] = [
                    'id' => $s['id'],
                    'nama' => $s['nama'],
                    'listening' => $nilai ? $nilai[0]['listening'] : '',
                    'reading' => $nilai ? $nilai[0]['reading'] : '',
                    'speaking' => $nilai ? $nilai[0]['speaking'] : '',
                    'writing' => $nilai ? $nilai[0]['writing'] : '',
                    'describe_vocab' => $nilai ? $nilai[0]['describe_vocab'] : '',
                    'id_nilai' => $nilai ? $nilai[0]['id'] : '',
                    'link' => $nilai ? $nilai[0]['link'] : '',
                ];
            }
        }

        if ($result) {
            $this->response([
                'status' => true,
                'data' => $result,
                'identity' => $this->nilaiEci_model->get_identitas_kelas($kelas_id)
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data tidak ada!'
            ], 404);
        }
    }

    /**
     *  method controller API untuk mengambil data list level
     */
    public function list_level_get()
    {
        $level = $this->get('level');
        $jenjang = $this->get('jenjang');

        $this->response([
            'status' => true,
            'data' => [
                'level' => $level,
                'jenjang' => $jenjang
            ]
        ], 200);
    }

    /**
     *  method controller API untuk mengambil data level per kelas
     */
    public function level_in_kelas_get()
    {
        $kelas_id = $this->get('kelas_id');

        $identitas_kelas = $this->nilaiEci_model->get_identitas_kelas($kelas_id);
        $siswa = $this->nilaiEci_model->get_level_in_kelas($kelas_id);
        $this->response([
            'status' => true,
            'data' => [
                'kelas' => $identitas_kelas[0]['kelas'],
                'expert' => $siswa['expert'],
                'advance' => $siswa['advance'],
                'intermediate' => $siswa['intermediate'],
                'basic' => $siswa['basic'],
                'nolevel' => $siswa['nolevel']
            ]
        ], 200);
    }
}
