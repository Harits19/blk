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



    public function tutup($id_pelatihan)
    {
        $this->data = konfigurasi('Pelatihan');


        //UPDATE STATUS PELATIHAN MENJADI TUTUP
        $this->Pelatihan_model->update_status_pelatihan($id_pelatihan);

        $this->Pendaftar_model->update_status_cadangan($id_pelatihan);
        $kuota_luar_kota = $this->Pelatihan_model->get_by_id($id_pelatihan)->kuota_luar_kota;
        $kuota_kota = $this->Pelatihan_model->get_by_id($id_pelatihan)->kuota_kota;
        $kuota_utama = $kuota_luar_kota + $kuota_kota;



        $data = array(
            'id_pelatihan' => $id_pelatihan
        );
        $data_pendaftar = $this->Pendaftar_model->get_by_($data);
        $total_pendaftar = $data_pendaftar->num_rows();

        $data = array(
            'wilayah' => 'kota'
        );
        $data_pendaftar_kota = $this->Pendaftar_model->get_by_($data);
        $total_pendaftar_kota = $data_pendaftar_kota->num_rows();

        $data = array(
            'wilayah' => 'luar kota'
        );
        $data_pendaftar_luar_kota = $this->Pendaftar_model->get_by_($data);
        // $total_pendaftar_luar_kota = $data_pendaftar_luar_kota->num_rows();

        $counter = 0;


        // BELUM ADA ERROR HANDLING
        if ($total_pendaftar <= ($kuota_luar_kota + $kuota_kota)) {
            // Mengirim email verifikasi dan update peserta menjadi pending
            foreach ($data_pendaftar->result() as $data_row) {
                $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 0);
            };
        } else {
            foreach ($data_pendaftar_kota->result() as $data_row) {
                $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 0);
                $counter++;
                if ($counter == $kuota_kota) {
                    break;
                }
            };

            $kuota_luar_kota = $kuota_utama - $counter;
            foreach ($data_pendaftar_luar_kota->result() as $data_row) {
                $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 0);
                $kuota_luar_kota--;
                if ($kuota_luar_kota == 0) {
                    break;
                }
            };
        }
        // redirect('admin/pelatihan', 'refresh', $this->data);
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

    // TAMBAH MENGGUNAKAN FORM BARU (TIDAK DIGUNAKAN)
    // public function tambah()
    // {
    //     $this->data = konfigurasi('Pelatihan');
    //     $this->data["get_all"] = $this->Pelatihan_model->get_all();
    //     $this->template->load('layouts/template', 'admin/pelatihan/tambah', $this->data);
    // }

    // UNTUK MEMPERSIMPLE CODE/MERAPIKAN FOKUSKAN CONTROLLER UNTUK HUBUNGAN VIEW DAN MODEL REF https://www.mynotescode.com/crud-dengan-codeigniter-dan-mysql/

    public function tambah_pelatihan_proses()
    {
        $data = konfigurasi('Perlatihan');
        $this->form_validation->set_rules('nama', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('tgl_buka', 'Tanggal Buka', 'required');
        $this->form_validation->set_rules('tgl_tutup', 'Tanggal Tutup', 'required');
        $this->form_validation->set_rules('tgl_verifikasi', 'Tanggal Verifikasi ', 'required');
        $this->form_validation->set_rules('tgl_verifikasi_cadangan', 'Tanggal Verifikasi Cadangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kuota_kota', 'Kuota Kota', 'required');
        $this->form_validation->set_rules('kuota_luar_kota', 'Kuota Luar Kota', 'required');



        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg', show_err_msg('Input yang anda masukkan salah'));
            redirect('admin/pelatihan');
        } else {


            $data = array(
                'nama' => $this->input->post('nama'),
                'tgl_buka' => $this->input->post('tgl_buka'),
                'tgl_tutup' => $this->input->post('tgl_tutup'),
                'tgl_verifikasi' => $this->input->post('tgl_verifikasi'),
                'tgl_verifikasi_cadangan' => $this->input->post('tgl_verifikasi_cadangan'),
                'status' => $this->input->post('status'),
                'kuota_kota' => $this->input->post('kuota_kota'),
                'kuota_luar_kota' => $this->input->post('kuota_luar_kota'),
            );


            if ($this->Pelatihan_model->insert($data)) {
                $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Ditambahkan'));
                redirect('admin/pelatihan');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Ditambahkan'));
                redirect('admin/pelatihan');
            }

            redirect('admin/pelatihan', 'refresh', $data);
        }
    }

    public function edit_pelatihan_proses()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->form_validation->set_rules('nama', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('tgl_buka', 'Tanggal Buka', 'required');
        $this->form_validation->set_rules('tgl_tutup', 'Tanggal Tutup', 'required');
        $this->form_validation->set_rules('tgl_verifikasi', 'Tanggal Verifikasi ', 'required');
        $this->form_validation->set_rules('tgl_verifikasi_cadangan', 'Tanggal Verifikasi Cadangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kuota_kota', 'Kuota Kota', 'required');
        $this->form_validation->set_rules('kuota_luar_kota', 'Kuota Luar Kota', 'required');

        $tgl_buka = strtotime($this->input->post('tgl_buka'));
        $tgl_tutup = strtotime($this->input->post('tgl_tutup'));
        $tgl_verifikasi = strtotime($this->input->post('tgl_verifikasi'));
        $tgl_verifikasi_cadangan= strtotime($this->input->post('tgl_verifikasi_cadangan'));

        // echo "$tgl_buka";

        // Cek tanggal yang dimasukkan 
        // $status_tgl = false;
        // if($tgl_buka<$tgl_tutup && $tgl_tutup<$tgl_verifikasi && $tgl_verifikasi<$tgl_verifikasi_cadangan){
        //     $status_tgl = true; 
        //     echo "Tanggal Benar";
        // }



        if ($this->form_validation->run() == false && !$status_tgl ) {
            $this->session->set_flashdata('msg', show_err_msg('Input yang anda masukkan salah'));
            redirect('admin/pelatihan');
        } else {


            $data = array(
                'nama' => $this->input->post('nama'),
                'tgl_buka' => $this->input->post('tgl_buka'),
                'tgl_tutup' => $this->input->post('tgl_tutup'),
                'tgl_verifikasi' => $this->input->post('tgl_verifikasi'),
                'tgl_verifikasi_cadangan' => $this->input->post('tgl_verifikasi_cadangan'),
                'status' => $this->input->post('status'),
                'kuota_kota' => $this->input->post('kuota_kota'),
                'kuota_luar_kota' => $this->input->post('kuota_luar_kota'),
            );

            // $data = array(
            //     'nama' => $this->input->post('nama'),
            // );

            if ($this->Pelatihan_model->update($this->input->post('id'), $data)) {
                $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Diperbaharui'));
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Pelatihan Gagal Diperbaharui'));
            }
            redirect('admin/pelatihan', 'refresh', $this->data);
        }
    }

    // EDIT MENGGUNAKAN FORM BARU (TIDAK DIGUNAKAN)
    // public function edit($id)
    // {
    //     $this->data = konfigurasi('Pelatihan');


    //     $this->data["pelatihan"] = $this->Pelatihan_model->get_by_id($id);


    //     $row = $this->Pelatihan_model->get_by_id($id);

    //     if ($row) {
    //         $this->data["nama"] = array(
    //             "name"    => "nama",
    //             "class"   => "form-control mb-1",
    //             "id"      => "nama",
    //         );
    //         $this->data["tgl_buka"] = array(
    //             "name"    => "tgl_buka",
    //             "class"   => "form-control mb-1",
    //             "id"      => "tgl_buka",
    //         );

    //         $this->data["tgl_tutup"] = array(
    //             "name"     => "tgl_tutup",
    //             "class"    => "form-control mb-1",
    //             "id"       => "tgl_tutup",
    //         );

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




    //         $this->template->load('layouts/template', 'admin/pelatihan/edit', $this->data);
    //     }
    // }
}
