<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
        $this->load->model('orders/Morders');
        $this->load->model('minformation');
    }    
    
    public function index() {
        
        $data['monitor'] = $this->Morders->data_monitoring();

        $this->load->view('design/header');
        $this->load->view('monitoring/index',$data);
        $this->load->view('design/footer');
    }

    

    
}
