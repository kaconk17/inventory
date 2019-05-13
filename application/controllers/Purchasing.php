<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchasing extends CI_Controller {
    public function __construct(){
        parent::__construct();
       $this->load->model('verif');
       $this->load->model('vendor');
       $this->load->model('barang');
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


//============hapus data vendor============
public function hapus_vendor(){
    $id = $this->input->post('id');
    
    $data_user= array(
        'ID_VENDOR'=> $id
    );

    $hasil = $this->vendor->hapus('TB_VENDOR', $data_user);
    if ($hasil) {
      echo "success";
    } else {
        echo "gagal";
    }
}



//============end hapus data vendor============


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

//============menampilkan barang===============
public function tampil_barang(){
    $limit = $this->input->post('length');
    $start = $this->input->post('start');
    
    $record = $this->barang->count_all('TB_BARANG');
    $totalFiltered = $record;
    
    if(empty($this->input->post('search')['value']))
    {            
        $posts = $this->barang->get_alldata('TB_BARANG',$limit,$start);
    }
    else {
        $search = $this->input->post('search')['value']; 

        $posts =  $this->barang->search_alldata('TB_BARANG',$limit,$start,$search);

        $totalFiltered = $this->barang->count_search('TB_BARANG',$search);
    }
    $no = $start;
    $data = array();
    if(!empty($posts))
    {
        
            foreach ($posts as $post)
        {
            $no++;

            
            $nestedData['no'] = "";
            $nestedData['ID_BARANG'] = $post->ID_BARANG;
            $nestedData['KODE_BARANG'] = $post->KODE_BARANG;
            $nestedData['NAMA_BARANG'] = $post->NAMA_BARANG;
            $nestedData['SATUAN'] = $post->SATUAN;
            $nestedData['HARGA_BARANG'] = $post->HARGA_BARANG;
            $nestedData['CURRENCY'] = $post->CURRENCY;
            $nestedData['NAMA_VENDOR'] = $post->NAMA_VENDOR;
            
            
            
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
//===============end menampilkan barang===================

//=============== vendor sugestion==============

public function sugest_vendor(){

    $keyword = $this->input->post('keyword');
    //$keyword = 'CV';
    if(!empty($keyword)) {
       $result = $this->vendor->cari_vendor($keyword);
       $data = array();
        if(!empty($result)) {
           // echo " <ul id='vendor-list'>";
            foreach($result as $vendor) {
            //echo " <li onClick='selectVendor(".$vendor->NAMA_VENDOR.");>".$vendor->NAMA_VENDOR."</li>";
               //$nested_data['NAMA_VENDOR']= $vendor->NAMA_VENDOR;
               //$nested_data['ID_VENDOR']= $vendor->ID_VENDOR;
                echo "<li onClick=\"selectVendor('".$vendor->NAMA_VENDOR."');\" class=\"list-group-item list-group-item-primary\">".$vendor->NAMA_VENDOR."</li>";
               //$data[]=$nested_data;
        }
        //echo json_encode($data);
       // echo "</ul>";
       } 
       } 
}

public function test_vendor(){
    $keyword = $this->input->get('term');
    $result = $this->vendor->cari_vendor($keyword);
    $data= array();
    if (!empty($result)) {
        foreach ($result as $key) {
            $nestedData['label'] = $key->NAMA_VENDOR;
            $nestedData['value'] = $key->ID_VENDOR;

            $data[]= $nestedData;
        }

        echo json_encode($data); 
    }
}

}