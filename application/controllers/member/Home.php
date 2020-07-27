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
        $this->data["get_all"] = $this->Pelatihan_model->get_all();
        // $this->data["get_userdata"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'member/dashboard', $this->data);
    }

    public function proses_daftar()
    {
        $this->data = konfigurasi('Proses Daftar');

        // MASIH ERROR/BELUM TERBACA
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        // $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
        // $this->form_validation->set_rules('alasan_mengikuti', 'Alasan Mengikuti', 'required');



        if ($this->form_validation->run() == false) {
            redirect('member/home');
        } else {

            // $date = strtr($this->input->post('tgl_buka'), '/', '-');
            // $tanggal = strtotime($date);
            // $tgl_buka = date('Y-m-d', $tanggal);
            // $date = strtr($this->input->post('tgl_tutup'), '/', '-');
            // $tanggal = strtotime($date);
            // $tgl_tutup = date('Y-m-d', $tanggal);

            // $tanggal = strtotime($this->input->post('tgl_buka'));
            // $tgl_buka = date('Y-m-d', $tanggal);
            // $tanggal = strtotime($this->input->post('tgl_tutup'));
            // $tgl_tutup = date('Y-m-d', $tanggal);


            $data = array(
                'email' => $this->input->post('email'),
                'id_pelatihan' => $this->input->post('id_pelatihan'),
            );


            if ($this->Pendaftar_model->insert($data)) {
                //redirect('Login_Controller/index');
                //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                // $this->session->set_flashdata('alert', '<div class="alert alert-danger text-center">Pelatihan berhasil ditambahkan</div>');
                $this->session->set_flashdata('msg', show_succ_msg('Berhasil Melakukan Pendaftaran'));
                redirect('member/home');
            } else {

                //$error = "Error, Cannot insert new user details!";
                // $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Ditambahkan'));
                // $this->index();
                redirect('member/home');
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

    public function detail($id)
    {
        $data['detailpelatihan'] = $this->Pelatihan_model->get_by_id($id);
        $this->load->view('member/detail_pelatihan', $data);
    }

    public function pendaftaran($id)
    {
        $data['detailpelatihan'] = $this->Pelatihan_model->get_by_id($id);
        $this->load->view('member/pendaftaran_pelatihan', $data);
    }
}
