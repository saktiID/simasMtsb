<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataGuru extends CI_Controller
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
            'kelas' => $this->kelas_model->get_kelas(),
            'sub_kelas' => $this->kelas_model->get_sub_kelas(),
            'guru' => $this->Users_model->get_all_users(),
            'role' => $this->role_model->get_role(),
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/data_guru');
        $this->load->view('templates/_footer');
    }

    public function tampilGuru()
    {
        $data = $this->Users_model->get_all_users_public();
        echo json_encode($data);
    }

    public function editProfile($username)
    {
        $edited = $this->Users_model->get_user_auth($username);
        $data = [
            'title' => 'Edit Profile ' . '(' . $username . ')',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'mapel' => $this->mapel_model->get_mapel(),
            'kelas' => $this->kelas_model->get_kelas(),
            'sub_kelas' => $this->kelas_model->get_sub_kelas(),
            'role' => $this->role_model->get_role(),
            'edited' => [
                'user' => $edited,
                'mapel' => $this->mapel_model->get_guru_mapel($edited['id']),
                'mapelArr' => explode(",", $this->mapel_model->get_guru_mapel($edited['id'])['kode_mapel']),
                'walas' => $this->walas_model->get_walas($edited['id']),
            ],
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/edit_profile');
        $this->load->view('templates/_footer');
    }

    public function editProfileSubmited()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $currentUsername = $this->Users_model->get_by_id($id)['username'];
        $currentEmail = $this->Users_model->get_by_id($id)['email'];

        if ($username == $currentUsername) {
            if ($email == $currentEmail) {
                $this->_editProfileSubmitedPriv();
            } else {
                $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]', [
                    'required' => 'Harap isi email!',
                    'is_unique' => 'Email sudah digunakan!',
                ]);
                $this->_validationForm($currentUsername);
            }
        } else {
            $this->form_validation->set_rules('username', 'UserID', 'required|trim|min_length[5]|is_unique[users.username]', [
                'required' => 'Harap isi username!',
                'min_length' => 'Karakter terlalu sedikit!',
                'is_unique' => 'Username sudah digunakan!',
            ]);
            $this->_validationForm($currentUsername);
        }
    }

    private function _validationForm($currentUsername)
    {
        if ($this->form_validation->run() == false) {
            $edited = $this->Users_model->get_user_auth($currentUsername);
            $data = [
                'title' => 'Edit Profile ' . '(' . $currentUsername . ')',
                'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
                'mapel' => $this->mapel_model->get_mapel(),
                'kelas' => $this->kelas_model->get_kelas(),
                'sub_kelas' => $this->kelas_model->get_sub_kelas(),
                'role' => $this->role_model->get_role(),
                'edited' => [
                    'user' => $edited,
                    'mapel' => $this->mapel_model->get_guru_mapel($edited['id']),
                    'mapelArr' => explode(",", $this->mapel_model->get_guru_mapel($edited['id'])['kode_mapel']),
                    'walas' => $this->walas_model->get_walas($edited['id']),
                ],
            ];
            $this->load->view('templates/_header', $data);
            $this->load->view('templates/_navbar');
            $this->load->view('templates/_sidebar');
            $this->load->view('pages/edit_profile');
            $this->load->view('templates/_footer');
        } else {
            $this->_editProfileSubmitedPriv();
        }
    }

    private function _editProfileSubmitedPriv()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $role_id = $this->input->post('role_id');
        $is_pengajar = $this->input->post('is_pengajar');
        $walas = $this->input->post('walas');
        $walas_of = $this->input->post('walas_of');
        $mapel = $this->input->post('mapel');


        $arrData = [
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'role_id' => $role_id,
            'is_pengajar' => $is_pengajar,
            'is_walas'  => $walas,
        ];

        // update users table
        $this->Users_model->set_user_data($arrData, $id);
        // update walas table
        $this->walas_model->set_walas($walas_of, $id);
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
        redirect('edit/' . $username);
    }

    public function tambahGuru()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $role_id = $this->input->post('role_id');
        $mapel = $this->input->post('mapel');
        $password1 = $this->input->post('password1');
        $is_walas = $this->input->post('is_walas');
        $is_pengajar = $this->input->post('is_pengajar');
        $walas_of = $this->input->post('walas_of');

        $msg['psn'] = '';
        if ($nama == '') {
            $msg['psn'] = 'Nama tidak boleh kosong!';
        } elseif ($email == '') {
            $msg['psn'] = 'Email tidak boleh kosong!';
        } elseif ($username == '') {
            $msg['psn'] = 'Username tidak boleh kosong!';
        } elseif ($role_id == '') {
            $msg['psn'] = 'Status tidak boleh kosong!';
        } elseif ($password1 == '') {
            $msg['psn'] = 'Password tidak boleh kosong!';
        } elseif ($is_walas == '') {
            $msg['psn'] = 'Status walas tidak boleh kosong!';
        } elseif ($is_pengajar == '') {
            $msg['psn'] = 'Status pendidik tidak boleh kosong!';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg['psn'] = "Format email tidak valid!";
            } else {
                $userName = $this->Users_model->get_user_auth($username);
                $userEmail = $this->Users_model->get_email($email);
                if ($userName == NULL) {
                    if ($userEmail == NULL) {
                        // boleh daftar
                        // $this->tambahguruPriv();

                        if ($mapel == '') {
                            $mapel = 0;
                        }

                        $arrayUser = [
                            'username' => $username,
                            'password' => password_hash($password1, PASSWORD_DEFAULT),
                            'nama'     => $nama,
                            'role_id'  => $role_id,
                            'is_walas'    => $is_walas,
                            'email'    => $email,
                            'image'    => 'profile.svg',
                            'is_pengajar' => $is_pengajar,
                            'is_active'   => 1,
                        ];

                        if ($this->Users_model->insert_new_user($arrayUser)) {
                            $id = $this->Users_model->get_id_by_email($email);
                            $arrayMapel = [
                                'user_id' => $id['id'],
                                'kode_mapel' => $mapel
                            ];

                            $arrayWalas = [
                                'user_id' => $id['id'],
                                'kelas_id' => $walas_of,
                            ];
                            if ($this->mapel_model->insert_guru_mapel($arrayMapel)) {
                                if ($this->walas_model->insert_walas($arrayWalas)) {
                                    $msg['psn'] = 'Success';
                                } else {
                                    $this->Users_model->deleteUser($id['id']);
                                    $this->mapel_model->deleteGuruMapel($id['id']);
                                    $msg['psn'] = 'Gagal set data walas';
                                }
                            } else {
                                $this->Users_model->deleteUser($id['id']);
                                $msg['psn'] = 'Gagal set data mapel';
                            }
                        } else {
                            $msg['psn'] = 'Gagal tambah data';
                        }
                    } else {
                        $msg['psn'] = 'Email sudah terdaftar!';
                    }
                } else {
                    $msg['psn'] = 'Username sudah terdaftar!';
                }
            }
        }
        echo json_encode($msg);
    }

    public function deleteGuru($id)
    {
        $msg = '';
        // delete user
        if ($this->Users_model->deleteUser($id)) {
            if ($this->mapel_model->deleteGuruMapel($id)) {
                if ($this->walas_model->deleteGuruWalas($id)) {
                    $msg = 'Success';
                } else {
                    $msg = 'Gagal delete user';
                }
            } else {
                $msg = 'Gagal delete user';
            }
        } else {
            $msg = 'Gagal delete user';
        }
        echo json_encode($msg);
    }
}
