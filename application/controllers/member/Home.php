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
    }

    public function proses_daftar()
    {
        $this->data = konfigurasi('Proses Daftar');

        if (!$this->Pendaftar_model->validation("daftar")) {
            $this->session->set_flashdata('msg', show_err_msg('Data yang anda masukkan salah'));
        } else {
            $upload = $this->Pendaftar_model->upload();
            $data['foto_ktp'] = $upload;
            if ($this->Pendaftar_model->insert()) {
                $this->session->set_flashdata('msg', show_succ_msg('Berhasil Melakukan Pendaftaran'));
            } else {

                $this->session->set_flashdata('msg', show_err_msg('Gagal Melakukan Pendaftaran, Ulangi lagi'));
            }
        }
        redirect('member/home');
    }


}
