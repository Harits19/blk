<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Filename        : Auth.php
 * | Instagram       : @susantokun
 * | Blog            : http://www.susantokun.com
 * | Info            : http://info.susantokun.com
 * | Demo            : http://demo.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Thursday, 12th March 2020 10:34:33 am
 * | Last Modified   : Thursday, 12th March 2020 10:57:22 am
 * |==============================================================|
 */

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Pendaftar_model');
        $this->load->model('Pelatihan_model');
    }

    public function profile()
    {
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'authentication/profile', $data);
    }

    public function home()
    {
        $this->load->view('home_page/index');
    }
    
    public function kehadiran()
    {

        $this->data = konfigurasi('Konfirmasi Kehadiran');
        $token = $this->Auth_model->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);
        $user_info = $this->Pendaftar_model->isTokenValid($cleanToken);
        $id_pelatihan = $user_info->id_pelatihan;
        $where = array('id' => $id_pelatihan);
        $pelatihan = $this->Pelatihan_model->get_by_($where)->row();


        if ($pelatihan->konfirmasi_pendaftar == "sudah") {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Konfirmasi Kehadiran sudah kadaluwarsa </div>
        			</div>
        			</p>
            ');
            $this->template->load('authentication/layouts/template', 'authentication/login', $this->data);
        } else {
            $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success">
                <div class="info-box-icon">
                <i class="fa fa-check-circle"></i>
                </div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUKSES</b><br>Konfirmasi berhasil, silakan lakukan login dihalaman yang tersedia.</div>
                </div>
                </p>
                ');

            $where = array("id" => $user_info->id);
            $data = array("status" => 1);
            $this->Pendaftar_model->update($where, $data);
            $this->template->load('authentication/layouts/template', 'authentication/login', $this->data);
        }
    }

    public function kehadiran_cadangan()
    {
        $this->data = konfigurasi('Konfirmasi Kehadiran Cadangan');
        $token = $this->Auth_model->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->Pendaftar_model->isTokenValid($cleanToken);

        $id_pelatihan = $user_info->id_pelatihan;
        $where = array('id' => $id_pelatihan);
        $pelatihan = $this->Pelatihan_model->get_by_($where)->row();



        if ($pelatihan->konfirmasi_pendaftar_cadangan == "sudah") {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Konfirmasi Kehadiran tidak sudah kadaluwarsa </div>
        			</div>
        			</p>
            ');
            $this->template->load('authentication/layouts/template', 'authentication/login', $this->data);
        } else {
            $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success">
                <div class="info-box-icon">
                <i class="fa fa-check-circle"></i>
                </div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUKSES</b><br>Konfirmasi berhasil, silakan lakukan login dihalaman yang tersedia.</div>
                </div>
                </p>
                ');
            $where = array("id" => $user_info->id);
            $data = array("status" => 5);
            $this->Pendaftar_model->update($where, $data);
            $this->template->load('authentication/layouts/template', 'authentication/login', $this->data);
        }
    }

    public function reset_password()
    {

        $data = konfigurasi('Reset Password');
        $token = $this->Auth_model->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->Auth_model->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }

        $data = array(
            'token' => $this->Auth_model->base64url_encode($token)
        );

        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->template->load('authentication/layouts/template', 'authentication/new_password', $data);

        //     // red
        // } 

        if ($this->Auth_model->validation("reset password") == FALSE) {
            
            $this->template->load('authentication/layouts/template', 'authentication/new_password', $data);
        } else {
            $cleanPost['password'] = get_hash($this->input->post('password'));
            $cleanPost['id'] = $user_info->id;
            if (!$this->User_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Update password gagal</div>
        			</div>
        			</p>
            ');
            } else {
                $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success">
                <div class="info-box-icon">
                <i class="fa fa-check-circle"></i>
                </div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUKSES</b><br>Password berhasil diperbarui, silakan lakukan login dihalaman yang tersedia</div>
                </div>
                </p>
                ');
            }
            redirect(site_url('auth/login'), 'refresh', $data);
        }
    }

    public function updateProfile()
    {
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        // $this->form_validation->set_rules('first_name', 'Nama Depan', 'trim|required|min_length[2]|max_length[15]');
        // $this->form_validation->set_rules('last_name', 'Nama Belakang', 'trim|required|min_length[2]|max_length[15]');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');
        // $this->form_validation->set_rules('phone', 'Telp', 'trim|required|min_length[11]|max_length[12]');

        $id = $this->session->userdata('id');
        $data = array(
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        );

        // if ($this->form_validation->run() == true) {
        //     if (!empty($_FILES['photo']['name'])) {
        //         $upload = $this->_do_upload();

        //         //delete file
        //         $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
        //         if (file_exists('assets/uploads/images/foto_profil/' . $user->photo) && $user->photo) {
        //             unlink('assets/uploads/images/foto_profil/' . $user->photo);
        //         }

        //         $data['photo'] = $upload;
        //     }
        //     $result = $this->Auth_model->update($data, $id);
        //     if ($result > 0) {
        //         $this->updateProfil();
        //         $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
        //         redirect('auth/profile');
        //     } else {
        //         $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
        //         redirect('auth/profile');
        //     }
        // } 
        if ($this->Auth_model->validation("update profile") == true) {
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
                if (file_exists('assets/uploads/images/foto_profil/' . $user->photo) && $user->photo) {
                    unlink('assets/uploads/images/foto_profil/' . $user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            if ($result > 0) {
                $this->updateProfil();
                $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    public function updatePassword()
    {
        // $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        // $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        // $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->Auth_model->validation() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }




    public function register()
    {
        $data = konfigurasi('Register');
        $this->template->load('authentication/layouts/template', 'authentication/register', $data);
    }

    public function forgot()
    {
        $data = konfigurasi('Forgot Password');
        $this->template->load('authentication/layouts/template', 'authentication/forgot_password', $data);
    }

    public function send_token()
    {
        $data = konfigurasi('Forgot Password');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('authentication/forgot_password');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->Auth_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                redirect('auth/forgot', 'refresh', $data);
            }

            $token = $this->Auth_model->insertToken($userInfo->id);
            $qstring = $this->Auth_model->base64url_encode($token);

            if ($this->Auth_model->sendEmail($userInfo->email, $qstring, 'forgot_password')) {
                redirect('auth/login');
            } else {
                redirect('auth/login');
            }
        }
    }



    public function check_register()
    {
        $data = konfigurasi('Pendaftaran');
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email|is_unique[tbl_user.email]');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
        // $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->Auth_model->validation("check register") == false) {
            $this->register();
        } else {
            $this->Auth_model->reg();

            // if ($this->Auth_model->sendEmailVerification($this->input->post('email'))) {
            //     redirect('auth/login');

            $email = $this->input->post('email');
            if ($this->Auth_model->sendEmail($email, '', 'register')) {
                redirect('auth/login');
            } else {

                //$error = "Error, Cannot insert new user details!";
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                redirect('auth/login');
            }

            redirect('auth/login', 'refresh', $data);
        }
    }


    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);

        if ($query == false) {
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login'    => true,
                'id'          => $query->id,
                'password'    => $query->password,
                'id_role'     => $query->id_role,
                'username'    => $query->username,
                'first_name'  => $query->first_name,
                'last_name'   => $query->last_name,
                'email'       => $query->email,
                'phone'       => $query->phone,
                'photo'       => $query->photo,
                'last_login'  => $query->last_login,
                'created_at'  => $query->created_at,
                'updated_at'  => $query->updated_at,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function login()
    {
        $data = konfigurasi('Login');
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->Auth_model->validation("login") && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    redirect('member/home');
                }
            } else {
                $this->template->load('authentication/layouts/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }
    }
    public function logout()
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('id');
        $this->Auth_model->logout($date, $id);
        $user_data = $this->session->userdata();
        foreach ($user_data as $key => $value) {
            if ($key != '__ci_last_regenerate' && $key != '__ci_vars')
                $this->session->unset_userdata($key);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-success">
              <div class="info-box-icon">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Log Out Berhasil</div>
              </div>
              </p>
			');
        redirect('auth/login');
    }

    function confirmEmail($hashcode)
    {
        if ($this->Auth_model->verifyEmail($hashcode)) {

            redirect('Auth/login');
        } else {

            redirect('Auth/login');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
