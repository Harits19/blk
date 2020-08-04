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

    public function kirim_manual()
    {
        $data_id = $this->input->post('id');
        $cadangan = $this->input->post('cadangan');

        if($cadangan){
            $data_pendaftar = array(
                'status' => 4
            );
        }else{
            $data_pendaftar = array(
                'status' => 0
            );
        }
        // $data_id = 'test';

        // $gagal_terkirim;

        $verifikasi_peserta = "sudah";

        // if($verifikasi_peserta == "sudah"){
        //     $this
        // }

        if ($data_id) {
            foreach ($data_id as $data) {
                $id = array('id' => $data);
                $pendaftar = $this->Pendaftar_model->get_by_($id)->row();
                $token = $this->Pendaftar_model->insertToken($pendaftar->id);
                $qstring = $this->Pendaftar_model->base64url_encode($token);
                // $this->Pendaftar_model->kirim_email($pendaftar->email, $qstring, "konfirmasi kehadiran");
                // $id = array('id' => $pendaftar->id);
                // $data_pendaftar = array(
                //     'status' => 0
                // );
                $this->Pendaftar_model->update_status($id, $data_pendaftar);
                $this->session->set_flashdata('msg', show_succ_msg('Berhasil mengirim email konfirmasi'));
            };
            $this->session->set_flashdata('msg', show_succ_msg('Berhasil mengirim email konfirmasi'));
            redirect('admin/pendaftar', 'refresh');
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Tidak ada email yang dikirim'));
            redirect('admin/pendaftar', 'refresh');
        }



        // $this->data = konfigurasi('Konfirmasi Kehadiran');
        // // $this->data['kuota_tambahan'] = $kuota_tambahan;
        // $data_row = $this->Pendaftar_model->get_by_id($id_pendaftar);
        // // Kode 4 = Cadangan Proses Konfirmasi
        // $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 4);
        // // redirect('refresh');

    }

    // LIHAT UNTUK KIRIM VERIFIKASI OTOMATIS
    // public function lihat($id)
    // {
    //     $this->data = konfigurasi('Pendaftar');

    //     $data_pelatihan = $this->Pelatihan_model->get_by_id($id);
    //     $tgl_verifikasi = $data_pelatihan->tgl_verifikasi;
    //     $tgl_verifikasi_cadangan = $data_pelatihan->tgl_verifikasi_cadangan;
    //     $this->data["data_pelatihan"] = $data_pelatihan;

    //     date_default_timezone_set('Asia/Jakarta');
    //     $current_date = date('Y-m-d');

    //     if ($current_date > $tgl_verifikasi) {
    //         $data = array('status' => 2);
    //         $where = array('status' => 0);
    //         $this->Pendaftar_model->update_status($where, $data);
    //     }
    //     if ($current_date > $tgl_verifikasi_cadangan) {
    //         $data = array('status' => 6);
    //         $where = array('status' => 4);
    //         $this->Pendaftar_model->update_status($where, $data);

    //     }


    //     $this->data["get_all_by_id"] = $this->Pendaftar_model->get_all_by_id($id);
    //     $data_id = array('id' => $id);
    //     $this->data["get_nama_pelatihan"] = $this->Pendaftar_model->get_by_($data_id);
    //     date_default_timezone_set('Asia/Jakarta');

    //     // $this->data["get_all"] = $this->Pelatihan_model->get_all();
    //     $this->template->load('layouts/template', 'admin/pendaftar/lihat', $this->data);
    // }

    //KIRIM VERIFIKASI MANUAL DISETIAP PENDAFTAR
    public function lihat($id)
    {
        $this->data = konfigurasi('Pendaftar');
        $data_id = array('id' => $id);
        $data_pelatihan = $this->Pelatihan_model->get_by_($data_id)->row();


        if ($data_pelatihan->konfirmasi_pendaftar == "sudah") {
            $where = array('id_pelatihan' => $id, 'status' => 0);
            $status = array('status' => 2);
            $this->Pendaftar_model->update_status($where, $status);
        } 
        
        if ($data_pelatihan->konfirmasi_pendaftar_cadangan == 'sudah') {
            $where = array('id_pelatihan' => $id, 'status' => 4);
            $status = array('status' => 2);
            $this->Pendaftar_model->update_status($where, $status);
        }

        $this->data["data_pelatihan"] = $data_pelatihan;
        $this->data["get_all_by_id"] = $this->Pendaftar_model->get_all_by_id($id);
        $this->template->load('layouts/template', 'admin/pendaftar/lihat_manual', $this->data);
    }
    public function detail($id)
    {
        $this->data = konfigurasi('Detail Pendaftar');


        $this->data["get_pendaftar_by_id"] = $this->Pendaftar_model->get_pendaftar_by_id($id);
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pendaftar/detail', $this->data);
    }
}
