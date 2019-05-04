<?php

class Purchasing extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('vendor');
    }
public function index(){
    if ($this->session->userdata('level_user')=='purchasing') {
        $this->load->view('purchasing/home');
     } else {
       redirect(base_url());
     }
}

public function Items(){
    $this->load->view('purchasing/items');
}

public function vendor(){
    $this->load->view('purchasing/vendor');
}

public function request(){
    $this->load->view('purchasing/request');
}

public function order(){
    $this->load->view('purchasing/order');
}
}