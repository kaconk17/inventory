<?php

class Warehouse extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('vendor');
    }
    
    public function index(){
        if ($this->session->userdata('level_user')=='warehouse') {
            $this->load->view('warehouse/home');
         } else {
           redirect(base_url());
         }
    }

    public function incoming(){
        $this->load->view('warehouse/incoming');
    }

    public function stock(){
        $this->load->view('warehouse/stock');
    }

    public function request(){
        $this->load->view('warehouse/request');
    }

    public function report(){
        $this->load->view('warehouse/report');
    }
}