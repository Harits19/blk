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
 * | Last Modified   : Thursday, 12th March 2020 10:57:32 am
 * |==============================================================|
 */

class Pelatihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatihan_model');
        $this->load->model('Pendaftar_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }


    public function konfirmasi_pendaftar($id_pelatihan)
    {
        $this->data = konfigurasi('Pelatihan');
        $data_pelatihan = array(
            'konfirmasi_pendaftar' => 'sudah'
        );
        if ($this->Pelatihan_model->update($id_pelatihan, $data_pelatihan)) {
            $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Diperbaruii'));
            redirect('admin/pelatihan', 'refresh', $this->data);
        }
    }

    public function konfirmasi_pendaftar_cadangan($id_pelatihan)
    {
        $this->data = konfigurasi('Pelatihan');
        $data_pelatihan = array(
            'konfirmasi_pendaftar_cadangan' => 'sudah'
        );
        if ($this->Pelatihan_model->update($id_pelatihan, $data_pelatihan)) {
            $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Diperbaruii'));
            redirect('admin/pelatihan', 'refresh', $this->data);
        }
    }

    public function index()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'admin/pelatihan/dashboard', $this->data);
    }

    public function hapus($id)
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();
        if ($this->Pelatihan_model->delete($id)) {
            $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Dihapus'));
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Dihapus'));
        }
        redirect('admin/pelatihan', 'refresh', $this->data);
    }

    public function tambah_pelatihan_proses()
    {
        $this->data = konfigurasi('Perlatihan');

        $tgl_buka = date($this->input->post('tgl_buka'));
        $tgl_tutup = date($this->input->post('tgl_tutup'));


        if ($tgl_buka > $tgl_tutup) {
            $this->session->set_flashdata('msg', show_err_msg('Tanggal yang anda masukkan tidak sesuai Tanggal Tutup'));
        } elseif ($this->Pelatihan_model->validation("tambah")) {
            if ($this->Pelatihan_model->insert()) {
                $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Ditambahkan'));
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Ditambahkan'));
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Input yang anda masukkan salah'));
        }

        redirect('admin/pelatihan');
    }

    public function edit_pelatihan_proses()
    {
        $this->data = konfigurasi('Pelatihan');
        $tgl_buka = date($this->input->post('tgl_buka'));
        $tgl_tutup = date($this->input->post('tgl_tutup'));


        if ($tgl_buka > $tgl_tutup) {
            $this->session->set_flashdata('msg', show_err_msg('Tanggal yang anda masukkan tidak sesuai Tanggal Tutup'));
        } elseif ($this->Pelatihan_model->validation("edit")) {
            if ($this->Pelatihan_model->update()) {
                $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Diperbaharui'));
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Diperbaharui'));
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Input yang anda masukkan salah'));
        }
        redirect('admin/pelatihan');
    }
}
