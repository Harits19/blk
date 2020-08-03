<?php
class Pendaftar_model extends CI_Model
{
    var $table = 'tbl_pendaftar';

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './upload/product/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name']            = $this->product_id;
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 1024; // 1MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('image')) {
    //         return $this->upload->data("file_name");
    //     }

    //     return "default.jpg";
    // }

    // public function upload_image()
    // {
    //     $config['upload_path']          = './gambar/';
    //     $config['file_name']            = $this->input->post('nik');
    //     $config['allowed_types']        = 'jpg|png';
    //     $config['max_size']             = 1024;
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('foto_ktp')) {
    //         // $error = array('error' => $this->upload->display_errors());
    //         // $this->load->view('v_upload', $error);
    //     } else {
    //         $data = array('upload_data' => $this->upload->data());
    //         // $this->load->view('v_upload_sukses', $data);
    //     }
    // }

    public function upload()
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '1000';
        $config['file_name'] = $this->input->post('nik');
        // $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('foto_ktp')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            
            return $this->upload->data('file_name');
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }


    public function kirim_konfirmasi_kehadiran($data_pendaftar, $kode_status)
    {

        $email = $data_pendaftar->email;
        // $clean = $this->security->xss_clean($email);
        $userInfo = $data_pendaftar;

        $this->update_status_pending($data_pendaftar->id, $kode_status);


        $token = $this->insertToken($userInfo->id);

        $qstring = $this->base64url_encode($token);
        $url = "";
        if ($kode_status == 0) {
            $url = site_url() . 'auth/kehadiran/token/' . $qstring;
        } elseif ($kode_status == 4) {
            $url = site_url() . 'auth/kehadiran_cadangan/token/' . $qstring;
        }

        $link = '<a href="' . $url . '">' . $url . '</a>';

        $message = '';
        $message .= '<strong>Hai, anda menerima email ini karena ada permintaan melakukan konfirmasi kehadiran.</strong><br>';
        $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

        // echo $message;


        $from = "bentzie19@gmail.com";    //senders email address
        $subject = 'Konfirmasi Kehadiran Balai Latihan Kerja';  //email subject



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
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        echo "sent to: " . $email . "<br>";
        echo "from: " . $from . "<br>";
        echo "protocol: " . $config['protocol'] . "<br>";
        echo "message: " . $message;

        if ($this->email->send()) {
            // for testing
            // echo "sent to: " . $receiver . "<br>";
            // echo "from: " . $from . "<br>";
            // echo "protocol: " . $config['protocol'] . "<br>";
            // echo "message: " . $message;
            return true;
        } else {
            // echo "email send failed";
            return false;
        }
        //send this through mail  
        exit;
    }



    public function insertToken($pendaftar_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $pendaftar_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $pendaftar_id;
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

            // $created = $row->created;
            // $createdTS = strtotime($created);
            // $today = date('Y-m-d');
            // $todayTS = strtotime($today);

            // if ($createdTS != $todayTS) {
            //     return false;
            // }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('tbl_pendaftar', array('id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    function update_status_kehadiran($id)
    {

        $data = array('status' => 1);
        $this->db->where('id', $id);
        $this->db->update('tbl_pendaftar', $data);    //update status as 1 to make active user
    }



    function update_status_cadangan($id_pelatihan)
    {
        $data = array('status' => 3);
        $this->db->where('id_pelatihan', $id_pelatihan);
        $this->db->update('tbl_pendaftar', $data);
    }

    function update_status_pending($id, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('tbl_pendaftar', $data);
    }

    function update_status($where, $data)
    {

        $this->db->where($where);
        $this->db->update('tbl_pendaftar', $data);
    }



    // public function getUserInfoByEmail($email)
    // {
    //     $q = $this->db->get_where('tbl_pendaftar', array('email' => $email), 1);
    //     if ($this->db->affected_rows() > 0) {
    //         $row = $q->row();
    //         return $row;
    //     }
    // }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }
    public function get_by_($data)
    {
        if ($this->db->where($data)) {
            return $this->db->get($this->table);
        } else {
            return false;
        }
    }


    public function get_data_per_wilayah($wilayah)
    {
        $this->db->where('wilayah', $wilayah);
        return $this->db->get($this->table);
    }

    //update pelatihan
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }



    //delete pelatihan
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    //input data pelatihan baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    //ambil semua data
    public function get_all()
    {

        $sql = "SELECT tbl_pelatihan.id, tbl_pelatihan.nama, COUNT(tbl_pendaftar.email) as total_pendaftar FROM tbl_pendaftar INNER JOIN tbl_pelatihan on tbl_pelatihan.id = tbl_pendaftar.id_pelatihan GROUP BY tbl_pelatihan.nama
        ";

        return $this->db->query($sql)->result();
    }

    public function get_all_by_id($id)
    {

        $sql = "SELECT tbl_pendaftar.id, tbl_pelatihan.tgl_verifikasi_cadangan, tbl_pendaftar.wilayah, tbl_pendaftar.email, tbl_pendaftar.wilayah, tbl_pendaftar.status, tbl_pelatihan.nama, tbl_pelatihan.tgl_verifikasi, tbl_pendaftar.id_pelatihan FROM tbl_pendaftar INNER JOIN tbl_pelatihan on tbl_pendaftar.id_pelatihan =" . $id . " GROUP BY tbl_pendaftar.id ORDER BY tbl_pendaftar.wilayah DESC, tbl_pendaftar.id ASC";
        return $this->db->query($sql)->result();
    }

    public function get_nama_pelatihan($id)
    {

        $sql = "SELECT tbl_pelatihan.nama FROM tbl_pelatihan WHERE tbl_pelatihan.id =" . $id . "
        ";
        return $this->db->query($sql)->row();
    }

    public function get_pendaftar_by_id($id)
    {
        $sql = "SELECT tbl_pelatihan.id, tbl_pelatihan.nama, tbl_pendaftar.email FROM tbl_pendaftar INNER JOIN tbl_pelatihan on tbl_pelatihan.id = tbl_pendaftar.id_pelatihan && tbl_pendaftar.id =" . $id;

        return $this->db->query($sql)->row();
    }

    public function get_pendaftar_kuota($kuota, $id, $jenis_kota)
    {
        // $sql = "SELECT * FROM tbl_pendaftar WHERE id_pelatihan =" . $id . " LIMIT 3";
        $sql = "SELECT * FROM tbl_pendaftar WHERE id_pelatihan =" . $id . " LIMIT " . $kuota;

        return $this->db->query($sql)->result();
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
