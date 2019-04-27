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
            $this->load->view('admin/home');
        }
        
    }

    function login(){
        $user = trim($this->input->post('user'));
        $pass = sha1($this->input->post('password'));

        $check = $this->login->check($user, $pass);

        if ($check) {
            $sess_array = array();
            foreach ($check as $row) {
                $sess_array = array('nama'=>$row->NAMA_USER,'id_user'=>$row->ID_USER,'level_user'=>$row->LEVEL_USER, 'login_status'=>TRUE,);
                $this->session->set_userdata($sess_array);}

                echo "success";

            }else {
                echo "gagal";
        }
        
    }

    function logout(){
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('level_user');
        $this->session->unset_userdata('login_status');

        redirect('');
    }
}