<?php

class Menu extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('menu/mmenu');
    }

    
    
    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        $res = array(
            'data' => $this->mmenu->get_all_data()
            
        );
        
        $this->load->view('design/header');
        $this->load->view('menu/index',$res);
        $this->load->view('design/footer');
    }
    
    public function add() {

        $data['parent'] = $this->mmenu->get_combo();
        $this->load->view('design/header');
        $this->load->view('menu/add', $data);
        $this->load->view('design/footer');
    }
    
    public function edit() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('menu/add');
        }
        $res['data'] = $this->mmenu->select_data($id);
        
        if(empty($res['data'])){
            redirect('menu/add');
        }
        
        $res['parent'] = $this->mmenu->get_combo();
        $this->load->view('design/header');
        $this->load->view('menu/edit',$res);
        $this->load->view('design/footer');
    }
    
    public function validate() {
        $config = array(
                array(
                        'field' => 'nama_menu',
                        'label' => 'nama_menu',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Nama Menu harus diisi', ),
                ),          
                array(
                        'field' => 'link',
                        'label' => 'link',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Url / Link harus diisi', ),
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
            $this->load->model('menu/mmenu');
            $res = $this->mmenu->save_data();
            if($res){
                redirect('menu');
            }
        }else{
            $data['parent'] = $this->mmenu->get_combo();
            $this->load->view('design/header');
            $this->load->view('menu/add',$data);
            $this->load->view('design/footer');
        }
    }
    
    public function update() {
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            $res = $this->mmenu->update_data();
            if($res){
                redirect('menu');
            }
        }else{
            redirect('menu/edit/' . $id);
        }
    }
    
    public function delete() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('menu');
        }
        
        if($this->input->post('id_menu')){
            $res = $this->mmenu->delete_data();
            if($res){
                redirect('menu');
            }
        }
        
        $this->load->model('menu/mmenu');
        $res['data'] = $this->mmenu->select_data($id);
        
        if(empty($res['data'])){
            redirect('menu');
        }
        
        $this->load->view('design/header');
        $this->load->view('menu/delete',$res);
        $this->load->view('design/footer');        
    }
}