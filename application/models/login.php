<?php

class Login extends CI_Model{

    function check($username, $password){
        $this->db-select('*');
        $this->db-from('TB_USER');
        $this->db->where('NAMA_USER', $username);
        $this->db->where('PASSWORD', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows()==1) {
           return $query->result();
        } else{
            return false;
        }
    }
}