<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Warehouse extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('verif');
        $this->verif->cek_session('warehouse');
        $this->load->model('vendor');
    }
    
    public function index(){
        
            $this->load->view('warehouse/home');
        
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