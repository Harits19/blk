<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Filename        : Home.php
 * | Instagram       : @susantokun
 * | Blog            : http://www.susantokun.com
 * | Info            : http://info.susantokun.com
 * | Demo            : http://demo.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Thursday, 12th March 2020 10:34:33 am
 * | Last Modified   : Thursday, 12th March 2020 10:57:41 am
 * |==============================================================|
 */

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatihan_model');
        $this->load->model('Pendaftar_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $this->data = konfigurasi('Pelatihan');
        $email = $this->session->userdata('email');
        $data = array(
            'email' => $email,
        );

        $pendaftar_info = $this->Pendaftar_model->get_by_($data)->row();


        $this->data["pendaftar_info"] = $pendaftar_info;
        $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'member/dashboard', $this->data);


        // if (!$this->Pendaftar_model->get_by_($data)->row()) {
        //     $this->data["get_all"] = $this->Pelatihan_model->get_all();
        //     $this->template->load('layouts/template', 'member/dashboard', $this->data);
        // } else {
        //     $this->data["get_all"] = null;
        //     $this->data["terdaftar"] = true;
        //     $this->template->load('layouts/template', 'member/dashboard', $this->data);
        // }
    }

    public function proses_daftar()
    {
        $this->data = konfigurasi('Proses Daftar');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');
        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('alasan_mengikuti', 'Alasan Mengikuti', 'required');
        // $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required');

        $data = array(
            'email' => $this->input->post('email'),
            'id_pelatihan' => $this->input->post('id_pelatihan'),
            'wilayah' => $this->input->post('wilayah'),
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'alasan_mengikuti' => $this->input->post('alasan_mengikuti'),
            // 'foto_ktp' => $this->input->post('nik'),
        );
        // if ($this->form_validation->run() == true) {
        //     if (!empty($_FILES['photo']['name'])) {
        //         $upload = $this->Pendaftar_model->upload();

        //         $email = $data = array(
        //             'email' => $this->input->post('email')
        //         );

        //         //delete file
        //         // $pendaftar = $this->Pendaftar_model->get_by_($email);
        //         // if (file_exists('gambar/' . $pendaftar->foto_ktp) && $pendaftar->foto_ktp) {
        //         //     unlink('gambar/' . $pendaftar->foto_ktp);
        //         // }

        //         $data['foto_ktp'] = $upload;

        //         if ($this->Pendaftar_model->insert($data)) {
        //             $this->session->set_flashdata('msg', show_succ_msg('Berhasil Melakukan Pendaftaran'));
        //             redirect('member/home', $data);
        //         } else {

        //             $this->session->set_flashdata('msg', show_err_msg('Gagal Melakukan Pendaftaran, Ulangi lagi'));
        //             redirect('member/home', $data);
        //         }

        //         redirect('member/home', 'refresh', $data);
        //     }
        // }else{
        //     $this->session->set_flashdata('msg', show_err_msg('Data yang anda masukkan salah'));
        //     redirect('member/home');
        // }


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg', show_err_msg('Data yang anda masukkan salah'));
            redirect('member/home');
        } else {
            $upload = $this->Pendaftar_model->upload();
            $data['foto_ktp'] = $upload;

            if ($this->Pendaftar_model->insert($data)) {
                $this->session->set_flashdata('msg', show_succ_msg('Berhasil Melakukan Pendaftaran'));
                redirect('member/home', $data);
            } else {

                $this->session->set_flashdata('msg', show_err_msg('Gagal Melakukan Pendaftaran, Ulangi lagi'));
                redirect('member/home', $data);
            }

            redirect('member/home', 'refresh', $data);
        }
    }

    // public function daftar($id)
    // {
    //     $this->data = konfigurasi('Pelatihan');
    //     // $this->data["get_all"] = $this->Pelatihan_model->get_all();
    //     $this->data["pelatihan"] = $this->Pelatihan_model->get_by_id($id);
    //     $row = $this->Pelatihan_model->get_by_id($id);

    //     if ($row) {
    //         //merk mobil
    //         $this->data["nama"] = array(
    //             "name"    => "nama",
    //             "class"   => "form-control mb-1",
    //             "id"      => "nama",
    //         );
    //         //No.Plat Kendaraan
    //         $this->data["tgl_buka"] = array(
    //             "name"    => "tgl_buka",
    //             "class"   => "form-control mb-1",
    //             "id"      => "tgl_buka",
    //         );

    //         //warna
    //         $this->data["tgl_tutup"] = array(
    //             "name"     => "tgl_tutup",
    //             "class"    => "form-control mb-1",
    //             "id"       => "tgl_tutup",
    //         );

    //         //status
    //         $this->data["status"] = array(
    //             "name"  => "status",
    //             "class" => "form-control",
    //             "id"    => "status"
    //         );

    //         $this->data["option_status"] = array(
    //             "0" => "Tutup",
    //             "1" => "Buka",
    //         );

    //         $this->data["submit"] = array(
    //             "name" => "submit",
    //             "class" => "btn btn-success",
    //             "type" => "submit",
    //             "value" => "Edit",
    //         );
    //         $this->template->load('layouts/template', 'member/daftar', $this->data);
    //     }

    //     // $this->data = konfigurasi('Dashboard',$get_pelatihan);
    //     $this->data = konfigurasi('Dashboard');
    //     $this->data["get_all"]  = $this->Pelatihan_model->get_all();
    //     $this->template->load('layouts/template', 'member/dashboard', $this->data);
    // }

}
