<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchasing extends CI_Controller {
    public function __construct(){
        parent::__construct();
       $this->load->model('verif');
       $this->verif->cek_session('purchasing');
    }
public function index(){
  
        $this->load->view('purchasing/home');
   
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