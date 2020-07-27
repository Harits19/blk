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

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('tbl_user', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
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
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('tbl_user', array('id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

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
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->activated == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function check_email($email)
    {
        //cari email lalu lakukan validasi
        $this->db->where('email', $email);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }

        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }

    public function sendEmailVerification($receiver)
    {
        $from = "bentzie19@gmail.com";    //senders email address
        $subject = 'Test Email Verifikasi Akun';  //email subject

        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '\'>http://www.localhost/blk/Auth/confirmEmail/' . md5($receiver) . '</a><br><br>Thanks';



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
            return true;
        } else {
            echo "email send failed";
            return false;
        }
    }

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
        $this->db->where('md5(email)', $key);
        return $this->db->update('tbl_user', $data);    //update status as 1 to make active user
    }

    function verifyPassword($key)
    {
        // $data = array('activated' => 1);
        $this->db->where('md5(email)', $key);
        return true;
        // return $this->db->update('tbl_user', $data);    //update status as 1 to make active user
    }
}
