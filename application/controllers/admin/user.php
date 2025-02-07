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
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();

        $this->template->load('layouts/template', 'admin/user', $this->data);
    }

    public function hapus($id)
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();

        $this->Pelatihan_model->delete($id);

        redirect('admin/user', 'refresh', $this->data);
    }
    public function tambah()
    {
        $this->data = konfigurasi('Pelatihan');
        $this->data["get_all"] = $this->Pelatihan_model->get_all();

        $this->template->load('layouts/template', 'admin/tambah', $this->data);
    }

    public function tambah_pelatihan_proses()
    {
        $data = konfigurasi('Perlaatihan');
        $this->form_validation->set_rules('nama_pelatihan', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('tgl_buka', 'Tanggal Buka', 'required');
        $this->form_validation->set_rules('tgl_tutup', 'Tanggal Tutup', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');



        if ($this->form_validation->run() == false) {
            $this->tambah();
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
                'nama' => $this->input->post('nama_pelatihan'),
                'tgl_buka' => $tgl_buka,
                'tgl_tutup' => $tgl_tutup,
                'status' => $this->input->post('status'),
            );


            if ($this->Pelatihan_model->insert($data)) {
                //redirect('Login_Controller/index');
                //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                $this->session->set_flashdata('alert', '<div class="alert alert-danger text-center">Pelatihan berhasil ditambahkan</div>');

                redirect('admin/user');
            } else {

                //$error = "Error, Cannot insert new user details!";
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                $this->tambah();
            }

            redirect('admin/user', 'refresh', $data);
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
        );

        $this->Pelatihan_model->update($this->input->post('id'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Mobil berhasil di edit</div>');



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




            $this->template->load('layouts/template', 'admin/edit', $this->data);
        }
    }
}
