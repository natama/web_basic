<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian extends CI_Controller{
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

         $res = array(
            'data' => $this->Morders->data_unit_antrian(),
            'teknisi' => $this->minformation->get_teknisi()

        );
        
        $this->load->view('design/header');
        $this->load->view('antrian/index',$res);
        $this->load->view('design/footer');
    }

    function proses_antrian(){


        $data = array(
            'updated_date' => date("Y-m-d h:i:s"),
            'nama_teknisi' => $this->input->post("nama_teknisi"),
            'nama_foreman' => $this->input->post("nama_foreman"),
            'id_pegawai' => $this->input->post("id_pegawai"),
            'id_teknisi' => $this->input->post("id_teknisi"),
            'status' => 2,
            'keterangan_status' => 'On Going'

        );
        $this->db->where('id_orders', $this->input->post('id_orders'));
        $this->db->update('tbl_orders', $data);

        $data_teknisi = array(
            'status' => 1
        );
        $this->db->where('id_teknisi', $this->input->post('id_teknisi'));
        $this->db->update('tbl_teknisi', $data_teknisi);
        

    }

    function hapus_antrian(){

        $this->db->delete('tbl_orders', array('id_orders' => $this->input->post('id_orders')));

    }

    

    
}
