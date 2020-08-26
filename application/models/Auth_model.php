<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Filename        : Auth_model.php
 * | Instagram       : @susantokun
 * | Blog            : http://www.susantokun.com
 * | Info            : http://info.susantokun.com
 * | Demo            : http://demo.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Thursday, 12th March 2020 10:34:33 am
 * | Last Modified   : Thursday, 12th March 2020 10:58:39 am
 * |==============================================================|
 */

class Auth_model extends CI_Model
{
    public $table       = 'tbl_user';
    public $id          = 'tbl_user.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function validation($mode)
    {
        if ($mode == "reset password") {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        } elseif ($mode == "update profile") {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
            $this->form_validation->set_rules('first_name', 'Nama Depan', 'trim|required|min_length[2]|max_length[15]');
            $this->form_validation->set_rules('last_name', 'Nama Belakang', 'trim|required|min_length[2]|max_length[15]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');
            $this->form_validation->set_rules('phone', 'Telp', 'trim|required|min_length[11]|max_length[12]');
        } elseif ($mode == "update password") {
            $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
            $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
            $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');
        } elseif ($mode == "check register") {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email|is_unique[tbl_user.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        } elseif ($mode == "login") {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
        }
        if ($this->form_validation->run()) // Jika validasi benar
            return TRUE; // Maka kembalikan hasilnya dengan TRUE
        else // Jika ada data yang tidak sesuai validasi
            return FALSE; // Maka kembalikan hasilnya dengan FALSE
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('tbl_user', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        }
    }

    // public function create_message($qstring, $info)
    // {

    //     if ($info == 'forgot_password') {
    //         $url = site_url() . 'auth/reset_password/token/' . $qstring;
    //         $link = '<a href="' . $url . '">' . $url . '</a>';
    //         $message = '';
    //         $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
    //                  password anda.</strong><br>';
    //         $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

    //         return $message;
    //     } elseif ($info == 'register') {
    //     } else {
    //         return false;
    //     }
    // }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    public function sendEmail($receiver, $qstring, $info)
    {
        $from = "bentzie19@gmail.com";
        $subject = '';
        if ($info == 'forgot_password') {
            $url = site_url() . 'auth/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';
            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                     password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;
            $subject = 'Lupa Password Akun Balai Latihan Kerja';  //email subject
        } elseif ($info == 'register') {
            $subject = 'Aktivasi Akun Balai Latihan Kerja';  //email subject
            $message = 'Dear User,<br><br> Klik link dibawah untuk mengaktifkan akun anda<br><br>
                        <a href=\'http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '\'>http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '</a><br><br>Thanks';
        }

        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'harits963741852';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";

        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            //for testing
            // echo "sent to: ".$receiver."<br>";
            // echo "from: ".$from. "<br>";
            // echo "protocol: ". $config['protocol']."<br>";
            // echo "message: ".$message;
            $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success">
                <div class="info-box-icon">
                <i class="fa fa-check-circle"></i>
                </div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUKSES</b><br>Berhasil, silakan cek email anda untuk melakukan tahapan selanjutnya</div>
                </div>
                </p>
                ');
            return true;
        } else {
            // echo "email send failed";
            return false;
        }
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);



        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Token tidak valid atau kadaluwarsa, ulangi proses lupa kata sandi</div>
        			</div>
        			</p>
            ');
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Token tidak valid atau kadaluwarsa, ulangi proses lupa kata sandi</div>
        			</div>
        			</p>
            ');
            return false;
        }
    }

    // public function getUserInfo($id)
    // {
    //     $q = $this->db->get_where('tbl_user', array('id' => $id), 1);
    //     if ($this->db->affected_rows() > 0) {
    //         $row = $q->row();
    //         return $row;
    //     } else {
    //         error_log('no user found getUserInfo(' . $id . ')');
    //         return false;
    //     }
    // }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function get_by_id()
    {
        $id = $this->session->userdata('id');
        $this->db->select('
            tbl_user.*, tbl_role.id AS id_role, tbl_role.name, tbl_role.description,
        ');
        $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    // public function forgot()
    // {

    //     $this->db->where($this->id, $id);
    //     $this->db->update($this->table, $data);
    //     return $this->db->affected_rows();
    // }

    public function reg()
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'id_role' => '2',
            'photo' => '1583991814826.png',
            'created_at' => date('Y-m-d H:i:s'),
            'password' => get_hash($this->input->post('password'))
        );
        return $this->db->insert($this->table, $data);
    }

    public function login($email, $password)
    {
        $query = $this->db->get_where($this->table, array('email' => $email, 'password' => $password));
        return $query->row_array();
    }

    public function check_account($email)
    {
        //cari email lalu lakukan validasi
        $this->db->where('email', $email);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
            // return 1;
            return false;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->activated == 0) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan lakukan konfirmasi email atau hubungi Administrator.</div>
              </div>
              </p>');
            // return 2;
            return false;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger">
            <div class="info-box-icon">
            <i class="fa fa-warning"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
            </div>
            </p>');
            // return 3;
            return false;
        }

        return $query;
    }

    // public function check_email($email)
    // {
    //     //cari email lalu lakukan validasi
    //     $this->db->where('email', $email);
    //     $query = $this->db->get($this->table)->row();

    //     //jika bernilai 1 maka user tidak ditemukan
    //     if (!$query) {
    //         return 1;
    //     }

    //     return $query;
    // }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }

    // public function sendEmailVerification($receiver)
    // {
    //     $from = "bentzie19@gmail.com";    //senders email address
    //     $subject = 'Test Email Verifikasi Akun';  //email subject

    //     //sending confirmEmail($receiver) function calling link to the user, inside message body
    //     $message = 'Dear User,<br><br> Klik link dibawah untuk mengaktifkan akun anda<br><br>
    //     <a href=\'http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '\'>http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '</a><br><br>Thanks';



    //     //config email settings
    //     $config['protocol'] = 'smtp';
    //     $config['smtp_host'] = 'ssl://smtp.gmail.com';
    //     $config['smtp_port'] = '465';
    //     $config['smtp_user'] = $from;
    //     $config['smtp_pass'] = 'harits963741852';  //sender's password
    //     $config['mailtype'] = 'html';
    //     $config['charset'] = 'iso-8859-1';
    //     $config['wordwrap'] = 'TRUE';
    //     $config['newline'] = "\r\n";

    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);
    //     //send email
    //     $this->email->from($from);
    //     $this->email->to($receiver);
    //     $this->email->subject($subject);
    //     $this->email->message($message);

    //     if ($this->email->send()) {
    //         //for testing
    //         // echo "sent to: ".$receiver."<br>";
    //         // echo "from: ".$from. "<br>";
    //         // echo "protocol: ". $config['protocol']."<br>";
    //         // echo "message: ".$message;
    //         $this->session->set_flashdata('alert', '<p class="box-msg">
    //             <div class="info-box alert-success">
    //             <div class="info-box-icon">
    //             <i class="fa fa-check-circle"></i>
    //             </div>
    //             <div class="info-box-content" style="font-size:14">
    //             <b style="font-size: 20px">SUKSES</b><br>Pendaftaran berhasil, silakan cek email anda untuk melakukan aktivasi akun.</div>
    //             </div>
    //             </p>
    //             ');
    //         return true;
    //     } else {
    //         // echo "email send failed";
    //         return false;
    //     }
    // }

    // public function sendEmailForgot($receiver)
    // {
    //     $from = "bentzie19@gmail.com";    //senders email address
    //     $subject = 'Ngetes cuk, iki harits';  //email subject
    //     $key = md5($receiver);

    //     //sending confirmEmail($receiver) function calling link to the user, inside message body
    //     $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
    //     <a href=\'http://www.localhost/blk/Auth/forgotPassword/' . $key . '\'>http://www.localhost/blk/Auth/forgetPassword/' . md5($receiver) . '</a><br><br>Thanks';



    //     //config email settings
    //     $config['protocol'] = 'smtp';
    //     $config['smtp_host'] = 'ssl://smtp.gmail.com';
    //     $config['smtp_port'] = '465';
    //     $config['smtp_user'] = $from;
    //     $config['smtp_pass'] = 'harits963741852';  //sender's password
    //     $config['mailtype'] = 'html';
    //     $config['charset'] = 'iso-8859-1';
    //     $config['wordwrap'] = 'TRUE';
    //     $config['newline'] = "\r\n";

    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);
    //     //send email
    //     $this->email->from($from);
    //     $this->email->to($receiver);
    //     $this->email->subject($subject);
    //     $this->email->message($message);

    //     if ($this->email->send()) {
    //         //for testing
    //         // echo "sent to: ".$receiver."<br>";
    //         // echo "from: ".$from. "<br>";
    //         // echo "protocol: ". $config['protocol']."<br>";
    //         // echo "message: ".$message;
    //         return true;
    //     } else {
    //         echo "email send failed";
    //         return false;
    //     }
    // }

    function verifyEmail($key)
    {
        $data = array('activated' => 1);
        if ($this->db->where('md5(email)', $key)) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
                <div class="info-box alert-success">
                <div class="info-box-icon">
                <i class="fa fa-check-circle"></i>
                </div>
                <div class="info-box-content" style="font-size:14">
                <b style="font-size: 20px">SUKSES</b><br>Aktivasi berhasil, silakan lakukan login dihalaman yang tersedia.</div>
                </div>
                </p>
                ');
            return $this->db->update('tbl_user', $data);
        } else {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Aktivasi gagal</div>
        			</div>
        			</p>
              ');
            return false;
        }

        return $this->db->update('tbl_user', $data);    //update status as 1 to make active user
    }

    // function verifyPassword($key)
    // {
    //     // $data = array('activated' => 1);
    //     $this->db->where('md5(email)', $key);
    //     return true;
    //     // return $this->db->update('tbl_user', $data);    //update status as 1 to make active user
    // }
}
