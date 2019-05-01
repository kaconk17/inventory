<?php

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('login');
    }

    public function datatable_user(){
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        
        $record = $this->login->count_all('TB_USER');
        $totalFiltered = $record;
        
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->login->get_alldata('TB_USER',$limit,$start);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->login->search_alldata('TB_USER',$limit,$start,$search);

            $totalFiltered = $this->login->count_search('TB_USER',$search);
        }
        $no = $start;
        $data = array();
        if(!empty($posts))
        {
            
                foreach ($posts as $post)
            {
                $no++;

                
                $nestedData['no'] = $no;
                $nestedData['ID_USER'] = $post->ID_USER;
                $nestedData['NAMA_USER'] = $post->NAMA_USER;
                $nestedData['PASSWORD'] = $post->PASSWORD;
                $nestedData['LEVEL_USER'] = $post->LEVEL_USER;
               
                
                
                
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