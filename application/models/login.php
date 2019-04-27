<?php

class Login extends CI_Model{

    function check($username, $password){
        $query = $this->db->get_where('TB_USER', array('NAMA_USER' => $username, 'PASSWORD' => $password), 1);
        if ($query->num_rows()==1) {
           return $query->result();
        } else{
            return false;
        }
    }
}