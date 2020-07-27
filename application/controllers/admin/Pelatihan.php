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
        //Ganti Status ke Tutup/ nilai 0
        $this->data = konfigurasi('Pelatihan');
        // $this->data["get_all"] = $this->Pelatihan_model->get_all();

        // $this->Pelatihan_model->update_status($id);

        //Kirim verifikasi email
        // $kuota_luar_kota = $this->Pelatihan_model->get_by_id($id_pelatihan)->kuota_luar_kota;
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
        $total_pendaftar_luar_kota = $data_pendaftar_luar_kota->num_rows();

        $counter = 0;

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


        // $kuota = $this->Pelatihan_model->get_by_id($id_pelatihan)->kuota;

        // $data_penerima = $this->Pendaftar_model->get_pendaftar_kuota($kuota, $id_pelatihan);

         //Update status seluruh peserta menjadi cadangan



        //Mengirim email verifikasi dan update peserta menjadi pending
        // foreach($data_penerima as $data_row){
        //     $this->Pendaftar_model->kirim_konfirmasi_kehadiran($data_row, 0);

        // };



        // $this->Pendaftar_model->pendaftar_cadangan();
        redirect('admin/pelatihan', 'refresh', $this->data);

    }

    public function index()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();
        $this->data["kuota_luar_kota"] = $this->Pelatihan_model->get_by_id(40)->kuota_luar_kota;
        $this->data["kuota_kota"] = $this->Pelatihan_model->get_by_id(40)->kuota_kota;

        $data = array(
            'id_pelatihan' => 40
        );
        $this->data["total_pendaftar"] = $this->Pendaftar_model->get_by_($data)->num_rows();

        $data = array(
            'wilayah' => 'kota'
        );
        $this->data["total_pendaftar_kota"] = $this->Pendaftar_model->get_by_($data)->num_rows();

        $data = array(
            'wilayah' => 'luar kota'
        );
        $this->data["total_pendaftar_luar_kota"] = $this->Pendaftar_model->get_by_($data)->num_rows();




        $this->template->load('layouts/template', 'admin/pelatihan/dashboard', $this->data);
    }

    public function hapus($id)
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();

        $this->Pelatihan_model->delete($id);

        redirect('admin/pelatihan', 'refresh', $this->data);
    }
    public function tambah()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();

        $this->template->load('layouts/template', 'admin/pelatihan/tambah', $this->data);
    }

    public function tambah_pelatihan_proses()
    {
        $data = konfigurasi('Perlatihan');
        $this->form_validation->set_rules('nama', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('tgl_buka', 'Tanggal Buka', 'required');
        $this->form_validation->set_rules('tgl_tutup', 'Tanggal Tutup', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kuota_kota', 'Kuota Kota', 'required');
        $this->form_validation->set_rules('kuota_luar_kota', 'Kuota Luar Kota', 'required');



        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg', show_err_msg('Input yang anda masukkan salah'));
            redirect('admin/pelatihan');
        } else {

            // $date = strtr($this->input->post('tgl_buka'), '/', '-');
            // $tanggal = strtotime($date);
            // $tgl_buka = date('Y-m-d', $tanggal);
            // $date = strtr($this->input->post('tgl_tutup'), '/', '-');
            // $tanggal = strtotime($date);
            // $tgl_tutup = date('Y-m-d', $tanggal);

            $tanggal = strtotime($this->input->post('tgl_buka'));
            $tgl_buka = date('Y-m-d', $tanggal);
            $tanggal = strtotime($this->input->post('tgl_tutup'));
            $tgl_tutup = date('Y-m-d', $tanggal);


            $data = array(
                'nama' => $this->input->post('nama'),
                'tgl_buka' => $tgl_buka,
                'tgl_tutup' => $tgl_tutup,
                'status' => $this->input->post('status'),
                'kuota_kota' => $this->input->post('kuota_kota'),
                'kuota_luar_kota' => $this->input->post('kuota_luar_kota'),
            );


            if ($this->Pelatihan_model->insert($data)) {
                //redirect('Login_Controller/index');
                //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                // $this->session->set_flashdata('alert', '<div class="alert alert-danger text-center">Pelatihan berhasil ditambahkan</div>');
                $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Ditambahkan'));
                redirect('admin/pelatihan');
            } else {

                //$error = "Error, Cannot insert new user details!";
                // $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                $this->session->set_flashdata('msg', show_err_msg('2 Pelatihan Gagal Ditambahkan'));
                redirect('admin/pelatihan');
            }

            redirect('admin/pelatihan', 'refresh', $data);
        }
    }




    public function edit_pelatihan_proses()
    {
        $this->data = konfigurasi('Pelatihan');



        // $tanggal = strtotime($this->input->post('tgl_buka'));
        // $tgl_buka = date('Y-m-d', $tanggal);
        // $tanggal = strtotime($this->input->post('tgl_tutup'));
        // $tgl_tutup = date('Y-m-d', $tanggal);
        $data = array(
            "nama" => $this->input->post('nama'),
            "tgl_buka" => $this->input->post('tgl_buka'),
            "tgl_tutup" => $this->input->post('tgl_tutup'),
            "status" => $this->input->post('status'),
            "kuota_kota" => $this->input->post('kuota_kota'),
            "kuota_luar_kota" => $this->input->post('kuota_luar_kota'),
        );

        $this->Pelatihan_model->update($this->input->post('id'), $data);
        $this->session->set_flashdata('msg', show_succ_msg('Pelatihan Berhasil Diperbaharui'));



        redirect('admin/pelatihan', 'refresh', $this->data);
    }

    public function edit($id)
    {
        $this->data = konfigurasi('Pelatihan');


        $this->data["pelatihan"] = $this->Pelatihan_model->get_by_id($id);


        $row = $this->Pelatihan_model->get_by_id($id);

        if ($row) {
            //merk mobil
            $this->data["nama"] = array(
                "name"    => "nama",
                "class"   => "form-control mb-1",
                "id"      => "nama",
            );
            //No.Plat Kendaraan
            $this->data["tgl_buka"] = array(
                "name"    => "tgl_buka",
                "class"   => "form-control mb-1",
                "id"      => "tgl_buka",
            );

            //warna
            $this->data["tgl_tutup"] = array(
                "name"     => "tgl_tutup",
                "class"    => "form-control mb-1",
                "id"       => "tgl_tutup",
            );

            //status
            $this->data["status"] = array(
                "name"  => "status",
                "class" => "form-control",
                "id"    => "status"
            );

            $this->data["option_status"] = array(
                "0" => "Tutup",
                "1" => "Buka",
            );

            $this->data["submit"] = array(
                "name" => "submit",
                "class" => "btn btn-success",
                "type" => "submit",
                "value" => "Edit",
            );




            $this->template->load('layouts/template', 'admin/pelatihan/edit', $this->data);
        }
    }
}
