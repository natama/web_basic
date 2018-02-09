<?php

class Unit extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('unit/munit');
    }
    
    


    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        
 
        $res = array(
            'data' => $this->munit->data_unit()
        );
        
        $this->load->view('design/header');
        $this->load->view('unit/index',$res);
        $this->load->view('design/footer');
    }
    
    public function add() {
        $this->load->view('design/header');
        $this->load->view('unit/add');
        $this->load->view('design/footer');
    }

    public function gudang() {

        $id = $this->session->userdata('unit');
        $data['unit'] = $this->munit->gudang_unit($id);

        $this->load->view('design/header');
        $this->load->view('unit/gudang',$data);
        $this->load->view('design/footer');
    }
    
    public function edit() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('unit/add');
        }
        
        $this->load->model('unit/munit');
        $res['data'] = $this->munit->select_data($id);
        
        if(empty($res['data'])){
            redirect('unit/add');
        }
        
        $this->load->view('design/header');
        $this->load->view('unit/edit',$res);
        $this->load->view('design/footer');
    }
    
    public function validate() {
        $config = array(
                array(
                        'field' => 'nama_unit',
                        'label' => 'nama_unit',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Nama unit harus diisi', ),
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
            $this->load->model('unit/munit');
            $res = $this->munit->save_data();
            if($res){
                redirect('unit');
            }
        }else{
            $this->load->view('design/header');
            $this->load->view('unit/add');
            $this->load->view('design/footer');
        }
    }
    
    public function update() {
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            $this->load->model('unit/munit');
            $res = $this->munit->update_data();
            if($res){
                redirect('unit');
            }
        }else{
            redirect('unit/edit/' . $id);
        }
    }
    
    public function delete() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('unit');
        }
        
        if($this->input->post('id_unit')){
            $this->load->model('unit/munit');
            $res = $this->munit->delete_data();
            if($res){
                redirect('unit');
            }
        }
        
        $this->load->model('unit/munit');
        $res['data'] = $this->munit->select_data($id);
        
        if(empty($res['data'])){
            redirect('unit');
        }
        
        $this->load->view('design/header');
        $this->load->view('unit/delete',$res);
        $this->load->view('design/footer');        
    }
}