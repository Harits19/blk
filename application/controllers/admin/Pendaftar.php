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
        $this->template->load('layouts/template', 'admin/pendaftar/index', $this->data);
    }

    public function kirim_manual()
    {
        $data_id = $this->input->post('id_list');
        $cadangan = $this->input->post('keterangan');

        $keterangan = "";

        if($cadangan){
            $data_pendaftar = array(
                'status' => 4
            );
            $keterangan = "konfirmasi kehadiran cadangan";
        }else{
            $data_pendaftar = array(
                'status' => 0
            );
            $keterangan = "konfirmasi kehadiran";
        }

        if ($data_id) {
            foreach ($data_id as $data) {
                $id = array('id' => $data);
                $pendaftar = $this->Pendaftar_model->get_by_($id)->row();
                $token = $this->Pendaftar_model->insertToken($pendaftar->id);
                $qstring = $this->Pendaftar_model->base64url_encode($token);
                $this->Pendaftar_model->kirim_email($pendaftar->email, $qstring, $keterangan);
                $where = array('id' => $pendaftar->id);
              
                $this->Pendaftar_model->update_status($where, $data_pendaftar);
                $this->session->set_flashdata('msg', show_succ_msg('Berhasil mengirim email konfirmasi'));
            }
            $this->session->set_flashdata('msg', show_succ_msg('Berhasil mengirim email konfirmasi'));
            
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Tidak ada email yang dikirim'));
        }

        $id_pelatihan = $this->input->post('id_pelatihan');

        redirect("admin/pendaftar/", 'refresh');

    }

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
        $this->template->load('layouts/template', 'admin/pendaftar/lihat', $this->data);
    }
    
}
