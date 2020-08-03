<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Halaman_awal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
    }

    public function home()
    {
        $this->template->load('authentication/login2');

    }
}
