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

    /*
    | -----------------------------------------------
    | END POINT FOR SISWA
    | -----------------------------------------------
    */

    /**
     * method controller for get siswa spesifik by siswa id or all siswa
     * @param string $opt
     * @param string $siswa_id
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
                        ], 400);
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
                case 'biodata_siswa':
                    if ($siswa_id) {
                        $siswa = $this->api_raport->get_biodata_siswa($siswa_id);
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
                        ], 400);
                    }
                    break;
                default:
                    $this->response([
                        'status' => false,
                        'message' => 'value opt tidak valid. opt: specific_siswa|all_siswa|biodata_siswa'
                    ], 400);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'parameter opt dibutuhkan. opt: info_kelas|siswa_kelas|biodata_siswa'
            ], 400);
        }
    }

    /*
    | -----------------------------------------------
    | END POINT FOR KELAS
    | -----------------------------------------------
    */

    /**
     * method controller for get siswa kelas or info kelas by kelas id
     * @param string $opt
     * @param string $kelas_id
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

    /*
    | -----------------------------------------------
    | END POINT FOR GURU
    | -----------------------------------------------
    */

    /**
     * method controller for get specific guru or all guru by guru id
     * @param string $opt
     * @param string $guru_id
     */
    public function guru_get()
    {
        $opt = $this->get('opt');
        $guru_id = $this->get('guru_id');
        if ($opt) {
            switch ($opt) {
                case 'specific_guru':
                    if ($guru_id) {
                        $guru = $this->api_raport->get_guru($guru_id);
                        if ($guru) {
                            $this->response([
                                'status' => true,
                                'message' => $guru
                            ], 200);
                        } else {
                            $this->response([
                                'status' => false,
                                'message' => 'guru dengan guru_id ' . $guru_id . ' tidak ditemukan.'
                            ], 404);
                        }
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'parameter guru_id dibutuhkan.'
                        ], 400);
                    }
                    break;
                case 'all_guru':
                    $guru = $this->api_raport->get_all_guru();
                    if ($guru) {
                        $this->response([
                            'status' => true,
                            'message' => $guru
                        ], 200);
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'tidak ada guru ditemukan'
                        ], 404);
                    }
                    break;
                case 'walas_guru':
                    if ($guru_id) {
                        $guru = $this->api_raport->get_guru($guru_id);
                        if ($guru) {
                            $walas = $this->api_raport->get_walas($guru_id);
                            if ($walas) {
                                $this->response([
                                    'status' => true,
                                    'message' => $walas
                                ], 200);
                            } else {
                                $this->response([
                                    'status' => false,
                                    'message' => 'guru dengan guru_id ' . $guru_id . ' bukan sebagai walas.'
                                ], 404);
                            }
                        } else {
                            $this->response([
                                'status' => false,
                                'message' => 'guru dengan guru_id ' . $guru_id . ' tidak ditemukan.'
                            ], 404);
                        }
                    } else {
                        $this->response([
                            'status' => false,
                            'message' => 'parameter guru_id dibutuhkan.'
                        ], 400);
                    }
                    break;
                default:
                    $this->response([
                        'status' => false,
                        'message' => 'value opt tidak valid. opt: specific_guru|all_guru|walas_guru'
                    ], 400);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'parameter opt dibutuhkan. opt: specific_guru|all_guru|walas_guru'
            ], 400);
        }
    }
}
