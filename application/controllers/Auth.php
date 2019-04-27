<?php

class Auth extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('login');
    }

    function index(){
        if ($this->session->userdata('login_status')==false) {
           $this->load->view('page-login');
        } else {
           echo "SUCCESS";
        }
        
    }
}