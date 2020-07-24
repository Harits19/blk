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
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        
        // $this->data = konfigurasi('Dashboard',$get_pelatihan);
        $this->data = konfigurasi('Dashboard');
        $this->data["get_all"]  = $this->Pelatihan_model->get_all();
        $this->template->load('layouts/template', 'member/dashboard', $this->data);
    }

    public function detail($id){
        $data['detailpelatihan'] = $this->Pelatihan_model->get_by_id($id);
        $this->load->view('member/detail_pelatihan', $data);
      }

    public function pendaftaran($id){
        $data['detailpelatihan'] = $this->Pelatihan_model->get_by_id($id);
        $this->load->view('member/pendaftaran_pelatihan', $data);
      }

}
