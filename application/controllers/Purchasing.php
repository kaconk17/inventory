<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchasing extends CI_Controller {
    public function __construct(){
        parent::__construct();
       $this->load->model('verif');
       $this->load->model('vendor');
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

//============menambah data vendor============

public function add_vendor(){
    $data = array(
        'NAMA_VENDOR' => $this->input->post('nama'),
        'ALAMAT_VENDOR' => $this->input->post('alamat'),
        'TELP_VENDOR' => $this->input->post('telp'),
        'EMAIL_VENDOR' => $this->input->post('email')
    );

    $hasil = $this->vendor->create('TB_VENDOR', $data);
    if ($hasil) {
        echo "success";
    }else{
        echo "gagal";
    }
}

//============ end menambah data vendor============

//============edit data vendor============

public function edit_vendor(){
    $id = array('ID_VENDOR' => $this->input->post('id')
        );

        $data = array(
            'NAMA_VENDOR' => $this->input->post('nama'),
            'ALAMAT_VENDOR' => $this->input->post('alamat'),
            'TELP_VENDOR' => $this->input->post('telp'),
            'EMAIL_VENDOR' => $this->input->post('email')
        );

        $hasil = $this->vendor->edit('TB_VENDOR',$id, $data);

        if ($hasil) {
           echo "success";
        }else{
            echo "gagal";
        }
    }


//============edit data vendor============


//============menampilkan data vendor============
public function tampil_vendor(){
    $limit = $this->input->post('length');
    $start = $this->input->post('start');
    
    $record = $this->vendor->count_all('TB_VENDOR');
    $totalFiltered = $record;
    
    if(empty($this->input->post('search')['value']))
    {            
        $posts = $this->vendor->get_alldata('TB_VENDOR',$limit,$start);
    }
    else {
        $search = $this->input->post('search')['value']; 

        $posts =  $this->vendor->search_alldata('TB_VENDOR',$limit,$start,$search);

        $totalFiltered = $this->vendor->count_search('TB_VENDOR',$search);
    }
    $no = $start;
    $data = array();
    if(!empty($posts))
    {
        
            foreach ($posts as $post)
        {
            $no++;

            
            $nestedData['no'] = "";
            $nestedData['ID_VENDOR'] = $post->ID_VENDOR;
            $nestedData['NAMA_VENDOR'] = $post->NAMA_VENDOR;
            $nestedData['ALAMAT_VENDOR'] = $post->ALAMAT_VENDOR;
            $nestedData['TELP_VENDOR'] = $post->TELP_VENDOR;
            $nestedData['EMAIL_VENDOR'] = $post->EMAIL_VENDOR;
           
            
            
            
            $data[] = $nestedData;

        } 
        
        
    }

    $json_data = array(
        'draw'            => intval($this->input->post('draw')),  
        'recordsTotal'    => intval($record),  
        'recordsFiltered' => intval($totalFiltered), 
        'data'            => $data   
        );

    echo json_encode($json_data); 
}

//============menampilkan data vendor============
}