<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('verif');
        $this->verif->cek_session('manager');
        $this->load->model('vendor');
    }

    public function index(){
       
            $this->load->view('manager/home');
       
    }

}