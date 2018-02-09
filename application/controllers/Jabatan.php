<?php

class Jabatan extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('jabatan/Mjabatan');
    }
    
    


    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        
 
        $res = array(
            'data' => $this->Mjabatan->data_unit()
        );
        
        $this->load->view('design/header');
        $this->load->view('jabatan/index',$res);
        $this->load->view('design/footer');
    }
    
    public function add() {
        $this->load->view('design/header');
        $this->load->view('jabatan/add');
        $this->load->view('design/footer');
    }

    
    
    public function edit() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('jabatan/add');
        }
        
        $res['data'] = $this->Mjabatan->select_data($id);
        
        if(empty($res['data'])){
            redirect('jabatan/add');
        }
        
        $this->load->view('design/header');
        $this->load->view('jabatan/edit',$res);
        $this->load->view('design/footer');
    }
    
    public function validate() {
        $config = array(
                array(
                        'field' => 'nama_jabatan',
                        'label' => 'nama_jabatan',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Nama Jabatan harus diisi', ),
                )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
        {
            return false;
        }else{
            return true;
        }
    }
    
    public function save() {
        if($this->validate() == TRUE){
            
            $res = $this->Mjabatan->save_data();
            if($res){
                redirect('jabatan');
            }
        }else{
            $this->load->view('design/header');
            $this->load->view('jabatan/add');
            $this->load->view('design/footer');
        }
    }
    
    public function update() {
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            
            $res = $this->Mjabatan->update_data();
            if($res){
                redirect('jabatan');
            }
        }else{
            redirect('jabatan/edit/' . $id);
        }
    }
    
    public function delete() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('jabatan');
        }
        
        if($this->input->post('id_jabatan')){
            
            $res = $this->Mjabatan->delete_data();
            if($res){
                redirect('jabatan');
            }
        }
        
        
        $res['data'] = $this->Mjabatan->select_data($id);
        
        if(empty($res['data'])){
            redirect('jabatan');
        }
        
        $this->load->view('design/header');
        $this->load->view('jabatan/delete',$res);
        $this->load->view('design/footer');        
    }
}