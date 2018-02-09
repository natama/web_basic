<?php

class users extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('musers');
        $this->load->model('menu/mmenu');
        $this->load->model('minformation');
        
    }
    

    public function index() {
        
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        // $hal = number_format($this->uri->segment(3));
        // $per_page = 10;
        
        // $pcfg = array(
        //     'base_url' => $this->links->get_link() . '/index/',
        //     'per_page' => $per_page,
        //     'total_rows' => $this->musers->all_data(),
        //     'attributes' => array('class' => 'btn btn-default'),
        //     'full_tag_open' => '<div class="btn-group">',
        //     'full_tag_close' => '</div>',
        //     'cur_tag_open' => '<button type="button" class="btn btn-danger">',
        //     'cur_tag_close' => '</button>',
        //     'first_link' => 'Awal',
        //     'last_link' => 'Akhir',
        // );
        
        // $this->pagination->initialize($pcfg);

        $res = array(
            'data' => $this->musers->get_all_data()
        );

        $this->load->view('design/header');
        $this->load->view('m_users/index', $res);
        $this->load->view('design/footer');
    }
    
    public function add() {
        $data['parent'] = $this->mmenu->get_combo();  
        $data['pegawai'] = $this->minformation->all_data_pegawai();        
        $this->load->view('design/header');
        $this->load->view('m_users/add', $data);
        $this->load->view('design/footer');
    }
    
    public function edit() {
        $id = $this->uri->segment(3);
        $data['res'] = $this->musers->select_data($id);
        $data['parent'] = $this->mmenu->get_combo();
        $data['menu_user'] = $this->mmenu->get_combo_by_id($id);
        $this->load->view('design/header');
        $this->load->view('m_users/edit', $data);
        $this->load->view('design/footer');
    }
    
    public function validate() {
        $config = array(
                array(
                        'field' => 'username',
                        'label' => 'username',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Username harus diisi', ),
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
            $res = $this->musers->save_data();
            if($res){
                redirect('users');
            }
        }else{
            $data['parent'] = $this->mmenu->get_combo();
            $data['pegawai'] = $this->minformation->all_data_pegawai();
            $this->load->view('design/header');
            $this->load->view('m_users/add', $data);
            $this->load->view('design/footer');
        }
    }
    
    public function update() {
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            $res = $this->musers->update_data();
            if($res){
                redirect('users');
            }
        }else{
            redirect('users/edit/' . $id);
        }
    }
    
    public function delete() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('users');
        }
        
        if($this->input->post('id_user')){
            $res = $this->musers->delete_data();
            if($res){
                redirect('users');
            }
        }
        
        $this->load->model('musers');
        $res['data'] = $this->musers->select_data($id);
        
        if(empty($res['data'])){
            redirect('users');
        }
        
        $this->load->view('design/header');
        $this->load->view('m_users/delete',$res);
        $this->load->view('design/footer');        
    }
}