<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Warehouse extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('verif');
        $this->verif->cek_session('warehouse');
        $this->load->model('vendor');
    }
    
    public function index(){
        
            $this->load->view('warehouse/home');
        
    }

    public function incoming(){
        $this->load->view('warehouse/incoming');
    }

    public function stock(){
        $this->load->view('warehouse/stock');
    }

    public function request(){
        $this->load->view('warehouse/request');
    }

    public function report(){
        $this->load->view('warehouse/report');
    }
//=============menampilkan daftar barang============
    public function tampil_barang(){
        $this->load->model('barang');
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
//============= end menampilkan daftar barang============

public function tampil_request(){
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
//==============simpan permintaan============
public function simpan_permintaan(){
    $this->load->model('permintaan');
    $data = array(
        'ID_BARANG' => $this->input->post('id_barang'),
        'QTY_BARANG' => $this->input->post('qty'),
        'TANGGAL_KIRIM' => $this->input->post('tgl_kirim'),
        'TANGGAL_PERMINTAAN' => date('Y-m-d')
        
    );

    $hasil = $this->permintaan->simpan('TB_PERMINTAAN', $data);
    if ($hasil) {
        echo "success";
    }else{
        echo "gagal";
    }

}
//================end simpan permintaan=============

//================edit permintaan==================
public function edit_permintaan(){
    $this->load->model('permintaan');
    $id = array('ID_PERMINTAAN' => $this->input->post('id')
        );

        $data = array(
            'QTY_BARANG' => $this->input->post('qty'),
            'TANGGAL_KIRIM' => $this->input->post('tgl_kirim')
            
        );

        $hasil = $this->permintaan->edit('TB_PERMINTAAN',$id, $data);

        if ($hasil) {
           echo "success";
        }else{
            echo "gagal";
        }
    }
//================edit permintaan==================

//================hapus permintaan=================
public function hapus_permintaan(){
    $this->load->model('permintaan');
    $id = array('ID_PERMINTAAN'=> $this->input->post('id'));

    $hasil = $this->permintaan->hapus('TB_PERMINTAAN', $id);
    if ($hasil) {
      echo "success";
    } else {
        echo "gagal";
    }
}
//================end hapus permintaan=============
}