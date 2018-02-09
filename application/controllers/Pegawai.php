<?php

class Pegawai extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('pegawai/Mpegawai');
    }
    
    


    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        
 
        $res = array(
            'data' => $this->Mpegawai->data_unit()
        );
        
        $this->load->view('design/header');
        $this->load->view('pegawai/index',$res);
        $this->load->view('design/footer');
    }
    
    public function add() {

        $res['jabatan'] = $this->Mpegawai->get_jabatan();

        $this->load->view('design/header');
        $this->load->view('pegawai/add',$res);
        $this->load->view('design/footer');
    }

    
    
    public function edit() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('pegawai/add');
        }
        
        $res['data'] = $this->Mpegawai->select_data($id);
        $res['jabatan'] = $this->Mpegawai->get_jabatan();
        
        if(empty($res['data'])){
            redirect('pegawai/add');
        }
        
        $this->load->view('design/header');
        $this->load->view('pegawai/edit',$res);
        $this->load->view('design/footer');
    }
    
    public function validate() {
        $config = array(
                array(
                        'field' => 'nama_pegawai',
                        'label' => 'nama_pegawai',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Nama pegawai harus diisi', ),
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
            
            $res = $this->Mpegawai->save_data();
            if($res){
                redirect('pegawai');
            }
        }else{
            $this->load->view('design/header');
            $this->load->view('pegawai/add');
            $this->load->view('design/footer');
        }
    }
    
    public function update() {
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            
            $res = $this->Mpegawai->update_data();
            if($res){
                redirect('pegawai');
            }
        }else{
            redirect('pegawai/edit/' . $id);
        }
    }
    
    public function delete() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('pegawai');
        }
        
        if($this->input->post('id_pegawai')){
            
            $res = $this->Mpegawai->delete_data();
            if($res){
                redirect('pegawai');
            }
        }
        
        
        $res['data'] = $this->Mpegawai->select_data($id);
        
        if(empty($res['data'])){
            redirect('pegawai');
        }
        
        $this->load->view('design/header');
        $this->load->view('pegawai/delete',$res);
        $this->load->view('design/footer');        
    }
}