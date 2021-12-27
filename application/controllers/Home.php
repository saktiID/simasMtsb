<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Users_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('walas_model');
        $this->load->model('jadwal_model');
        $this->load->model('bukuKerja_model');
    }

    public function index()
    {
        // get jenjang
        $jenjang = $this->Users_model->get_user_auth($this->session->userdata('username'))['jenjang'];

        // get count jenjang
        $count_jenjang = 0;
        if ($jenjang == '') {
            $jenjang = ',,';
        }
        $expJenjang = explode(',', $jenjang);
        for ($i = 0; $i < 3; $i++) {
            if ($expJenjang[$i] != '') {
                $count_jenjang += 1;
            }
        }

        // get count all buku
        $count_buku = [];
        for ($i = 1; $i <= 4; $i++) {
            $count_buku[$i] = $this->bukuKerja_model->count_isi_buku($i) * $count_jenjang;
        }

        // get tahun
        if (!isset($_GET['tahun'])) {
            $currentTahun = date('Y');
            $currentBulan = date('m');
            if ($currentBulan > 6) {
                $tahunSmt2 = $currentTahun + 1;
                $tahun = $currentTahun . '-' . $tahunSmt2;
            }

            if ($currentBulan < 6) {
                $tahunSmt1 = $currentTahun - 1;
                $tahun = $tahunSmt1 . '-' . $currentTahun;
            }
        } else {
            $tahun = $_GET['tahun'];
        }

        //  get count uploaded buku
        $count_uploaded = []; # parrent index : smt. chid index : no buku
        $percent_uploaded = [];
        $arr = [
            'user_id' => $this->Users_model->get_user_auth($this->session->userdata('username'))['id'],
            'tahun' => $tahun,
        ];
        for ($i = 1; $i <= 2; $i++) {
            for ($x = 1; $x <= 4; $x++) {
                $count_uploaded[$i][$x] = $this->bukuKerja_model->count_uploaded_buku($arr, $i, $x);
                $percent_uploaded[$i][$x] = round(($count_uploaded[$i][$x] / $count_buku[$x]) * 100) . '%';
            }
        }


        $data = [
            'title' => 'Dashboard',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'count_buku' => $count_buku,
            'count_uploaded' => $count_uploaded,
            'percent_uploaded' => $percent_uploaded,
        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('home');
        $this->load->view('templates/_footer');
    }

    public function personal_setting()
    {

        $user = $this->Users_model->get_user_auth($this->session->userdata('username'));
        $walas = $this->walas_model->get_walas($user['id']);
        $kelas = $this->kelas_model->get_main_kelas($walas['kelas_id']);
        $main_kelas = $this->kelas_model->get_kelas();
        $sub_kelas = $this->kelas_model->get_sub_kelas();
        $mapelCheck = $this->mapel_model->get_guru_mapel($user['id']);

        if (!$kelas) {
            $kelas = '- 0 -';
        }

        $data = [
            'title' => 'Personal Setting',
            'user' => $user,
            'mapel' => $this->mapel_model->get_mapel(),
            'kelas' => $kelas,
            'mapelCheck' => explode(",", $mapelCheck['kode_mapel']),
            'mapelString' => $mapelCheck['kode_mapel'],
            'sub_kelas' => $sub_kelas,
            'main_kelas' => $main_kelas,
        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/personal_setting');
        $this->load->view('templates/_footer');
    }

    public function jadwal_saya()
    {

        $user = $this->Users_model->get_user_auth($this->session->userdata('username'));
        $mapelCheck = $this->mapel_model->get_guru_mapel($user['id']);
        $jadwal_jam = $this->jadwal_model->get_jadwal_jam($user['id']);
        $main_kelas = $this->kelas_model->get_kelas();
        $sub_kelas = $this->kelas_model->get_sub_kelas();

        $data = [
            'title' => 'Jadwal Saya',
            'user' => $user,
            'mapel' => $this->mapel_model->get_mapel(),
            'sub_kelas' => $sub_kelas,
            'mapelCheck' => explode(",", $mapelCheck['kode_mapel']),
            'main_kelas' => $main_kelas,
            'jadwal_jam' => $jadwal_jam,
        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/jadwal_saya');
        $this->load->view('templates/_footer');
    }

    public function simpan_jadwal_saya()
    {
        $user = $this->session->userdata();
        $jadwal = $this->jadwal_model->get_table_jadwal_jam();

        // jumat
        $jumat = explode(',', $this->input->post('jumat_all'));
        for ($x = 0; $x < count($jumat); $x++) {
            $temp[] = explode('_', $jumat[$x]);
            $tempJumat[] = $temp[$x][0] . ',' . $temp[$x][1];
        }

        for ($x = 0; $x < count($jumat); $x++) {
            $temp[] = explode('_', $jumat[$x]);
            $idjam[] = $temp[$x][2];
        }

        for ($x = 0; $x < count($jadwal); $x++) {
            $this->jadwal_model->set_jadwal_jumat($user['user_id'], $tempJumat[$x], $idjam[$x]);
        }

        // senin
        $senin = explode(',', $this->input->post('senin_all'));
        for ($x = 0; $x < count($senin); $x++) {
            $temp1[] = explode('_', $senin[$x]);
            $tempSenin[] = $temp1[$x][0] . ',' . $temp1[$x][1];
        }

        for ($x = 0; $x < count($senin); $x++) {
            $temp1[] = explode('_', $senin[$x]);
            $idjam[] = $temp[$x][2];
        }

        for ($x = 0; $x < count($jadwal); $x++) {
            $this->jadwal_model->set_jadwal_senin($user['user_id'], $tempSenin[$x], $idjam[$x]);
        }

        // selasa
        $selasa = explode(',', $this->input->post('selasa_all'));
        for ($x = 0; $x < count($selasa); $x++) {
            $temp2[] = explode('_', $selasa[$x]);
            $tempSelasa[] = $temp2[$x][0] . ',' . $temp2[$x][1];
        }

        for ($x = 0; $x < count($selasa); $x++) {
            $temp2[] = explode('_', $selasa[$x]);
            $idjam[] = $temp[$x][2];
        }

        for ($x = 0; $x < count($jadwal); $x++) {
            $this->jadwal_model->set_jadwal_selasa($user['user_id'], $tempSelasa[$x], $idjam[$x]);
        }

        // rabu
        $rabu = explode(',', $this->input->post('rabu_all'));
        for ($x = 0; $x < count($rabu); $x++) {
            $temp3[] = explode('_', $rabu[$x]);
            $tempRabu[] = $temp3[$x][0] . ',' . $temp3[$x][1];
        }

        for ($x = 0; $x < count($rabu); $x++) {
            $temp3[] = explode('_', $rabu[$x]);
            $idjam[] = $temp[$x][2];
        }

        for ($x = 0; $x < count($jadwal); $x++) {
            $this->jadwal_model->set_jadwal_rabu($user['user_id'], $tempRabu[$x], $idjam[$x]);
        }

        // kamis
        $kamis = explode(',', $this->input->post('kamis_all'));
        for ($x = 0; $x < count($kamis); $x++) {
            $temp4[] = explode('_', $kamis[$x]);
            $tempKamis[] = $temp4[$x][0] . ',' . $temp4[$x][1];
        }

        for ($x = 0; $x < count($kamis); $x++) {
            $temp4[] = explode('_', $kamis[$x]);
            $idjam[] = $temp[$x][2];
        }

        for ($x = 0; $x < count($jadwal); $x++) {
            $this->jadwal_model->set_jadwal_kamis($user['user_id'], $tempKamis[$x], $idjam[$x]);
        }


        echo json_encode('success');
    }

    public function edit_personal()
    {

        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $currentUsername = $this->Users_model->get_by_id($id)['username'];
        $currentEmail = $this->Users_model->get_by_id($id)['email'];

        if ($username == $currentUsername) {
            if ($email == $currentEmail) {
                $this->_setPersonalPriv();
            } else {
                $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]', [
                    'required' => 'Harap isi email!',
                    'is_unique' => 'Email sudah digunakan!',
                ]);
                $this->_validationForm();
            }
        } else {
            $this->form_validation->set_rules('username', 'UserID', 'required|trim|min_length[5]|is_unique[users.username]', [
                'required' => 'Harap isi username!',
                'min_length' => 'Karakter terlalu sedikit!',
                'is_unique' => 'Username sudah digunakan!',
            ]);
            $this->_validationForm();
        }
    }

    private function _validationForm()
    {
        if ($this->form_validation->run() == false) {
            $this->load->model('mapel_model');
            $this->load->model('kelas_model');
            $this->load->model('walas_model');

            $user = $this->Users_model->get_user_auth($this->session->userdata('username'));
            $walas = $this->walas_model->get_walas($user['id']);
            $kelas = $this->kelas_model->get_main_kelas($walas['kelas_id']);
            $mapelCheck = $this->mapel_model->get_guru_mapel($user['id']);

            if (!$kelas) {
                $kelas = '- 0 -';
            }
            $data = [
                'title' => 'Personal Setting',
                'user' => $user,
                'mapel' => $this->mapel_model->get_mapel(),
                'kelas' => $kelas,
                'mapelCheck' => explode(",", $mapelCheck['kode_mapel']),
                'mapelString' => $mapelCheck['kode_mapel'],
            ];

            $this->load->view('templates/_header', $data);
            $this->load->view('templates/_navbar');
            $this->load->view('templates/_sidebar');
            $this->load->view('pages/personal_setting');
            $this->load->view('templates/_footer');
        } else {
            $this->_setPersonalPriv();
        }
    }

    private function _setPersonalPriv()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $mapel = $this->input->post('mapel');

        $arrData = [
            'nama' => $nama,
            'gender' => $gender,
            'email' => $email,
            'username' => $username,
        ];


        // update user tabel
        $this->Users_model->set_personal_data($arrData, $id);
        // update mapel table
        $this->mapel_model->set_guru_mapel($id, $mapel);

        // renew username session
        if ($id == $this->session->userdata('user_id')) {
            $setup = [
                'username' => $username,
                'role_id' => $this->session->userdata('role_id'),
                'user_id' => $id
            ];
            $this->session->set_userdata($setup);
        }


        $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil edit profile!", icon: "success", }); </script>');
        redirect('personal_setting');
    }

    public function edit_personal_pass()
    {
        $id = $this->input->post('id');
        $currentPass = $this->input->post('currentPass');
        $newPass = $this->input->post('newPass');
        $reNewPass = $this->input->post('reNewPass');
        $currentPassOnDB = $this->Users_model->get_user_pass_by_id($id)['password'];

        if (strlen($newPass) >= 5) {
            if ($newPass === $reNewPass) {
                if (password_verify($currentPass, $currentPassOnDB)) {
                    $this->_editNewPersonalPass($newPass, $id);
                } else {
                    // password input current dan db tidak sama
                    $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Ups", text: "Tidak sesuai dengan password lama!", icon: "warning", }); </script>');
                    redirect('personal_setting');
                }
            } else {
                // password 1 dan 2 tidak sama
                $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Ups", text: "Password tidak sama!", icon: "warning", }); </script>');
                redirect('personal_setting');
            }
        } else {
            // kurang dari 5 karakter
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Ups", text: "Password terlalu sedikit!", icon: "warning", }); </script>');
            redirect('personal_setting');
        }
    }

    private function _editNewPersonalPass($newPass, $id)
    {
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);
        $editPass = $this->Users_model->set_user_pass($newPass, $id);
        if ($editPass) {
            // set session
            $this->session->set_flashdata('msg', '<script>Swal.fire({ title: "Berhasil!", text: "Berhasil ubah password!", icon: "success", }); </script>');
            redirect('personal_setting');
        }
    }
}
