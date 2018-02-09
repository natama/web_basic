<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('minformation');
        $this->load->model('dashboard/mdashboard');
        

    }    
    
    public function index() {
        

        $this->load->view('design/header');
        $this->load->view('dashboard/admin');
        $this->load->view('design/footer');
    }

    

    
}
