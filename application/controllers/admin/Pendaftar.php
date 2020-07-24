<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        $this->load->model('Pelatihan_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $this->data = konfigurasi('Pendaftar');
        $this->data["get_all"] = $this->Pendaftar_model->get_all();
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/index', $this->data);
    }

    public function lihat($id)
    {
        $this->data = konfigurasi('Pendaftar');
        $this->data["get_all_by_id"] = $this->Pendaftar_model->get_all_by_id($id);
        $this->data["get_nama_pelatihan"] = $this->Pendaftar_model->get_nama_pelatihan($id);
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/lihat', $this->data);
    }

    public function detail($id)
    {
        $this->data = konfigurasi('Pendaftar');


        $this->data["get_pendaftar_by_id"] = $this->Pendaftar_model->get_pendaftar_by_id($id);
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/detail', $this->data);
    }

    

}