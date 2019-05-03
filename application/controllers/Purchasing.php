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
}