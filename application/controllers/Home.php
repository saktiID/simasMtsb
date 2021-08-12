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
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),

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
        $jadwal_jam = $this->jadwal_model->get_jadwal_jam();
        $jadwal_guru = $this->jadwal_model->get_jadwal_guru($user['id']);

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
            'jadwal_jam' => $jadwal_jam,
            'jadwal_guru' => $jadwal_guru,
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
        $jadwal_guru = $this->jadwal_model->get_jadwal_guru($user['id']);
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
            'jadwal_guru' => $jadwal_guru,
        ];
        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/jadwal_saya');
        $this->load->view('templates/_footer');
    }

    public function edit_personal()
    {
        $this->load->model('mapel_model');

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
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $mapel = $this->input->post('mapel');

        $arrData = [
            'nama' => $nama,
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
