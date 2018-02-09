<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('musers');
    }  
    
    public function index()
    {
         $this->load->view('access/login');
    }

    function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_message('required', '%s kosong');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '%s kosong');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }
        else{
            $a = $this->musers->check_users($username,md5($password));
            if(count($a)>0){
                foreach($a as $key){
                        $nama = $key->nama;
                        $username = $key->username;
                        $level = $key->level;
                        $user_id = $key->id_user;
                        $time = $key->created_time;
                        $unit = $key->id_unit;

                }
                
                    $usersession = array(
                                    'username'=>$username,
                                    'userid'=>$user_id,
                                    'unit'=>$unit,
                                    'nama'=>$nama,
                                    'loginstate'=>1,
                                    'level'=>$level,
                                    'time'=>$time,
                                );
                    $this->session->set_userdata($usersession);
                    //var_dump($this->session->userdata('loginstate'));exit;
                    redirect('dashboard');
            }
            else{
                $this->form_validation->set_message('Maaf Username atau Password Anda Salah');
                $this->load->view('access/login');
            }
        }
    }

    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'access');
    }

    function checkloginstatus(){
        parent::__construct();
        if($this->session->userdata('loginstate') != TRUE){
            $pesan = $this->session->set_flashdata('msg', 'GAGAL');
            redirect(base_url().'main/login/',$pesan);
        }
    }
}
