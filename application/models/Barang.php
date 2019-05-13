<?php

class Barang extends CI_Model{
//===========count all row on table================
    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }
//===========end count all row on table================



    public function get_alldata($table,$perpage,$offset){
       
        if ($perpage != -1) {
            $this->db->select('*');
            $this->db->from('TB_BARANG');
            $this->db->join('TB_VENDOR','TB_VENDOR.ID_VENDOR = TB_BARANG.ID_VENDOR');

            $this->db->limit(10,$offset);
        $result = $this->db->get()->result();
        return $result;
        }
        
    }

    public function search_alldata($table,$perpage,$offset,$search){
        
        $this->db->select('*');
        $this->db->from('TB_BARANG');
         $this->db->join('TB_VENDOR','TB_VENDOR.ID_VENDOR = TB_BARANG.ID_VENDOR');
        $this->db->like('NAMA_BARANG',$search,'both');
        
        
        $this->db->limit(10,$offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function count_search($table, $cari){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like('NAMA_BARANG',$cari,'both');
        $query = $this->db->get();
        return $query->num_rows();
    }
}