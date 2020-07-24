<?php
class Pendaftar_model extends CI_Model
{
    var $table = 'tbl_pendaftar';

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
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

        $sql = "SELECT tbl_pendaftar.id, tbl_pendaftar.email, tbl_pendaftar.status, tbl_pelatihan.nama, tbl_pendaftar.id_pelatihan FROM tbl_pendaftar INNER JOIN tbl_pelatihan on tbl_pendaftar.id_pelatihan =" . $id . " GROUP BY tbl_pendaftar.id";
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

    public function get_pendaftar_kuota($kuota, $id)
    {
        $sql = "SELECT * FROM tbl_pendaftar WHERE id_pelatihan =" . $id . " LIMIT 3";
        // $sql = "SELECT * FROM tbl_pendaftar WHERE id_pelatihan =" . $id . " LIMIT " . $kuota;

        return $this->db->query($sql)->result();
    }

    public function kirim_konfirmasi_kehadiran($receiver)
    {

        // $data_email = $this->get_pendaftar_kuota(" ", " ");

        // foreach ($receiver as $pendaftar) {
        // echo $pendaftar->email;
        // }

        // foreach ($receiver as $pendaftar) {



        echo $receiver;

        $from = "bentzie19@gmail.com";    //senders email address
        $subject = 'Ngetes cuk, iki harits';  //email subject

        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'http://www.localhost/blk/Auth/kehadiran/' . md5($receiver) . '\'>http://www.localhost/blk/Auth/kehadiran/' . md5($receiver) . '</a><br><br>Thanks';

        // echo $message;

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

        echo "sent to: " . $receiver . "<br>";
            echo "from: " . $from . "<br>";
            echo "protocol: " . $config['protocol'] . "<br>";
            echo "message: " . $message;

        // if ($this->email->send()) {
        //     // for testing
        //     echo "sent to: " . $receiver . "<br>";
        //     echo "from: " . $from . "<br>";
        //     echo "protocol: " . $config['protocol'] . "<br>";
        //     echo "message: " . $message;
        //     return true;
        // } else {
        //     echo "email send failed";
        //     return false;
        // }
        // }

    }


    function verifikasi_kehadiran($key)
    {

        $data = array('status' => 0);
        $this->db->where('md5(email)', $key);
        $this->db->update('tbl_pendaftar', $data);    //update status as 1 to make active user
        $data2 = array('status' => 3);
        $this->db->where('md5(email)', !$key);
        $this->db->update('tbl_pendaftar', $data);
        // $sql = "UPDATE `tbl_pendaftar` SET `status` = '3' WHERE `tbl_pendaftar`.`md5(email)` = $key";
        // $this->db->query($sql);
    }
}
