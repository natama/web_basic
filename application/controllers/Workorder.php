<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workorder extends CI_Controller{
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
        
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            header("location: ".base_url());
        }
        
        
 
        $res = array(
            'data' => $this->Morders->data_unit_orders()
        );

        $this->load->view('design/header');
        $this->load->view('workorder/index', $res);
        $this->load->view('design/footer');
    }

    public function progres() {
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('workorder/index');
        }
        
        $res['data'] = $this->Morders->select_data($id);
        
        if(empty($res['data'])){
            redirect('workorder/index');
        }
        
        $this->load->view('design/header');
        $this->load->view('workorder/foreman',$res);
        $this->load->view('design/footer');
    }

    public function add() {
        
        $this->load->view('design/header');
        $this->load->view('workorder/add');
        $this->load->view('design/footer');
    }

    public function foreman() {
        $id = $this->uri->segment(3);
        $res['data'] = $this->Morders->select_data($id);
        
        $this->load->view('design/header');
        $this->load->view('workorder/foreman',$res);
        $this->load->view('design/footer');
    }

    public function save() {
        if($this->validate() == TRUE){
            
            $res = $this->Morders->save_data();
            if($res){
                redirect('antrian');
            }
        }else{
            $this->load->view('design/header');
            $this->load->view('workorder/add');
            $this->load->view('design/footer');
        }
    }

    public function validate() {
        $config = array(
                array(
                        'field' => 'nama_customer',
                        'label' => 'nama_customer',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Nama Customer harus diisi', ),
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

    public function update_progres(){


        $data = array(
            'updated_date' => date("Y-m-d h:i:s"),
            'job_on_hold' => $this->input->post("job_on_hold"),
            'status' => $this->input->post('status'),
            'id_pegawai' => $this->session->userdata('userid')

        );
        $this->db->where('id_orders', $this->input->post('id_orders'));
        $this->db->update('tbl_orders', $data);

        if($this->input->post('status') == 5){

            $data_teknisi = array(
                'status' => 0
            );
            $this->db->where('id_teknisi', $this->input->post('id_teknisi'));
            $this->db->update('tbl_teknisi', $data_teknisi);

        }
    }

    

    
}
