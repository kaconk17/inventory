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

    //$keyword = $this->input->post('keyword');
    //$keyword = 'CV';
    //if(!empty($keyword)) {
       $result = $this->vendor->select_all('TB_VENDOR');
       $data = array();
        if(!empty($result)) {
           // echo " <ul id='vendor-list'>";
            foreach($result as $vendor) {
            //echo " <li onClick='selectVendor(".$vendor->NAMA_VENDOR.");>".$vendor->NAMA_VENDOR."</li>";
               //$nested_data['NAMA_VENDOR']= $vendor->NAMA_VENDOR;
               //$nested_data['ID_VENDOR']= $vendor->ID_VENDOR;
                //echo "<li onClick=\"selectVendor('".$vendor->ID_VENDOR."','".$vendor->NAMA_VENDOR."');\" class=\"list-group-item list-group-item-primary\">".$vendor->NAMA_VENDOR."</li>";
               //$data[]=$nested_data;
               echo "<option value= ".$vendor->ID_VENDOR.">".$vendor->NAMA_VENDOR."</option>";
        }
        //echo json_encode($data);
       // echo "</ul>";
      // } 
       } 
}

public function simpan_barang(){
    $this->load->model('barang');
    $data = array(
        'KODE_BARANG' => $this->input->post('kode_barang'),
        'NAMA_BARANG' => $this->input->post('nama_barang'),
        'SATUAN' => $this->input->post('satuan'),
        'HARGA_BARANG' => $this->input->post('harga'),
        'CURRENCY' => $this->input->post('currency'),
        'ID_VENDOR' => $this->input->post('id_sup')
    );

    $hasil = $this->barang->simpan('TB_BARANG', $data);
    if ($hasil) {
        echo "success";
    }else{
        echo "gagal";
    }

}

public function update_barang(){
    $this->load->model('barang');
    $id = array( 'ID_BARANG' => $this->input->post('id'));
    $data = array(
       
        'NAMA_BARANG' => $this->input->post('nama_barang'),
        'SATUAN'=> $this->input->post('satuan'),
        'HARGA_BARANG'=> $this->input->post('harga_barang')
    );

    $hasil = $this->barang->edit('TB_BARANG',$id, $data);
    if ($hasil) {
        echo "success";
    }else{
        echo "gagal";
    }

}

public function hapus_barang(){
    $this->load->model('barang');
    $id = array('ID_BARANG'=> $this->input->post('id'));

    $hasil = $this->barang->hapus('TB_BARANG', $id);
    if ($hasil) {
      echo "success";
    } else {
        echo "gagal";
    }
}

public function tampil_permintaan(){
    $this->load->model('permintaan');
    $limit = $this->input->post('length');
    $start = $this->input->post('start');
    
    $record = $this->permintaan->count_all('TB_PERMINTAAN');
    $totalFiltered = $record;
    
    if(empty($this->input->post('search')['value']))
    {            
        $posts = $this->permintaan->get_alldata('TB_PERMINTAAN',$limit,$start);
    }
    else {
        $search = $this->input->post('search')['value']; 

        $posts =  $this->permintaan->search_alldata('TB_PERMINTAAN',$limit,$start,$search);

        $totalFiltered = $this->permintaan->count_search('TB_PERMINTAAN',$search);
    }
    $no = $start;
    $data = array();
    if(!empty($posts))
    {
        
            foreach ($posts as $post)
        {
            $no++;

            
            $nestedData['no'] = "";
            $nestedData['ID_PERMINTAAN'] = $post->ID_PERMINTAAN;
            $nestedData['TANGGAL_PERMINTAAN'] = $post->TANGGAL_PERMINTAAN;
            $nestedData['NAMA_VENDOR'] = $post->NAMA_VENDOR;
            $nestedData['NAMA_BARANG'] = $post->NAMA_BARANG;
            $nestedData['QTY_BARANG'] = $post->QTY_BARANG;
            $nestedData['SATUAN'] = $post->SATUAN;
            $nestedData['TANGGAL_KIRIM'] = $post->TANGGAL_KIRIM;
            $nestedData['STATUS_PERMINTAAN'] = $post->STATUS_PERMINTAAN;
            
            
            
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

}