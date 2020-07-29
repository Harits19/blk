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

    public function kirim($id_pendaftar)
    {

        $this->data = konfigurasi('Konfirmasi Kehadiran');
        // $this->data['kuota_tambahan'] = $kuota_tambahan;
        $data_row = $this->Pendaftar_model->get_by_id($id_pendaftar);
        // Kode 4 = Cadangan Proses Konfirmasi
        $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 4);
        // redirect('refresh');

    }

    public function lihat($id)
    {
        $this->data = konfigurasi('Pendaftar');

        $tgl_verifikasi = $this->Pelatihan_model->get_by_id($id)->tgl_verifikasi;
        $tgl_verifikasi_cadangan = $this->Pelatihan_model->get_by_id($id)->tgl_verifikasi_cadangan;

        date_default_timezone_set('Asia/Jakarta');
        $current_date = date('Y-m-d');
        // echo $current_date;
        // echo $tgl_verifikasi;
        // echo $tgl_verifikasi_cadangan;
        if ($current_date > $tgl_verifikasi) {
            $data = array('status' => 2);
            $where = array('status' => 0);
            $this->Pendaftar_model->update_status($where, $data);
        }
        if ($current_date > $tgl_verifikasi_cadangan) {
            $data = array('status' => 6);
            $where = array('status' => 4);
            $this->Pendaftar_model->update_status($where, $data);
        }


        $this->data["get_all_by_id"] = $this->Pendaftar_model->get_all_by_id($id);
        $this->data["get_nama_pelatihan"] = $this->Pendaftar_model->get_nama_pelatihan($id);
        date_default_timezone_set('Asia/Jakarta');

        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/lihat', $this->data);
    }

    public function detail($id)
    {
        $this->data = konfigurasi('Detail Pendaftar');


        $this->data["get_pendaftar_by_id"] = $this->Pendaftar_model->get_pendaftar_by_id($id);
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/detail', $this->data);
    }
}
