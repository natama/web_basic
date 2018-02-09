<?php

class Laporan extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('minformation');
    }
    
    public function index() {
        $this->load->view('design/header');
        $this->load->view('laporan/index');
        $this->load->view('design/footer');
    }
    
    public function laporan() {   
       
        
        $this->load->view('design/header');
        $this->load->view('laporan/laporan_form');
        $this->load->view('design/footer');
    }

    public function view_laporan() { 
        $periode_awal = $this->input->get('tanggal_awal');
        $periode_akhir =  $this->input->get('tanggal_akhir');
        $data['tanggal_awal']=$periode_awal;
        $data['tanggal_akhir']=$periode_akhir;
        $data['order'] = $this->minformation->getLaporan($periode_awal,$periode_akhir);          
        
        $this->load->view('design/header');
        $this->load->view('laporan/view_laporan', $data);
        $this->load->view('design/footer');
    }

  
}