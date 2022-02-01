<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class API_Raport extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RaportDB_model', 'api_raport');
    }

    /**
     * method controller for get siswa spesifik by siswa is or all siswa
     */
    public function siswa_get()
    {
        $opt = $this->get('opt');
        $siswa_id = $this->get('siswa_id');
        if ($opt) {
            switch ($opt) {
                case 'specific_siswa':
                    if ($siswa_id) {
                        $siswa = $this->api_raport->get_siswa($siswa_id);
                        if ($siswa) {
                            $this->response([
                                'status' => true,
                                'message' => $siswa
                            ], 200);
                        } else {
                            $this->response([
                                'status' => false,
                                'message' => 'siswa dengan siswa id ' . $siswa_id . ' tidak ditemukan.'
                            ], 404);
                        }
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'parameter siswa_id dibutuhkan.'
                        ], 404);
                    }
                    break;
                case 'all_siswa':
                    $siswa = $this->api_raport->get_all_siswa();
                    if ($siswa) {
                        $this->response([
                            'status' => true,
                            'message' => $siswa
                        ], 200);
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'tidak ada siswa ditemukan.'
                        ], 404);
                    }
                    break;
                default:
                    $this->response([
                        'status' => false,
                        'message' => 'value opt tidak valid. opt: specific_siswa|all_siswa'
                    ], 400);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'parameter opt dibutuhkan. opt: info_kelas|siswa_kelas'
            ], 400);
        }
    }

    /**
     * method controller for get siswa kelas by kelas id
     */
    public function kelas_get()
    {
        $opt = $this->get('opt');
        $kelas_id = $this->get('kelas_id');
        if ($opt) {
            switch ($opt) {
                case 'info_kelas':
                    if ($kelas_id) {
                        $info_kelas = $this->api_raport->get_info_kelas($kelas_id);
                        if ($info_kelas) {
                            $this->response([
                                'status' => true,
                                'message' => $info_kelas
                            ], 200);
                        } else {
                            $this->response([
                                'status' => false,
                                'message' => 'kelas dengan kelas id ' . $kelas_id . ' tidak ditemukan.'
                            ], 404);
                        }
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'parameter kelas_id dibutuhkan.'
                        ], 400);
                    }
                    break;
                case 'siswa_kelas':
                    if ($kelas_id) {
                        $siswa_kelas = $this->api_raport->get_siswa_kelas($kelas_id);
                        if ($siswa_kelas) {
                            $this->response([
                                'status' => true,
                                'message' => $siswa_kelas
                            ], 200);
                        } else {
                            $this->response([
                                'status' => false,
                                'message' => 'kelas dengan kelas id ' . $kelas_id . ' tidak ditemukan.'
                            ], 404);
                        }
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'parameter kelas_id dibituhkan.'
                        ], 400);
                    }
                    break;
                default:
                    $this->response([
                        'status' => false,
                        'message' => 'value opt tidak valid. opt: info_kelas|siswa_kelas'
                    ], 400);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'parameter opt dibutuhkan. opt: info_kelas|siswa_kelas'
            ], 400);
        }
    }
}
