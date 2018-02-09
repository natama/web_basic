<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Morders extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }    
    function all_data() {
        $query = $this->db->get('tbl_orders');
        return $query->num_rows();
    }

    function data_monitoring(){
        $query = $this->db->get('tbl_orders');
        return $query->result();
    }
    
    function data_unit_antrian(){
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    } 

    function data_unit_orders(){
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->where('status <>', 5);
        $this->db->where('id_pegawai', $this->session->userdata('userid'));

        $query = $this->db->get();
        return $query->result();
    }


    function submit_foreman(){
        $data = array(
            'created_update' => date("Y-m-d h:i:s"),
            'job_on_hold' => $this->input->post("job_on_hold"),
            'status' => 2,
            'keterangan_status' => 'On Going',
            'id_pegawai' => $this->session->userdata('userid')

        );
        $this->db->where('id_orders', $this->input->post('id_orders'));
        $this->db->update('tbl_orders', $data);
        return true;     
    }

    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_orders', $id);
        }        
        $query = $this->db->get('tbl_orders');
        return $query->row();   
    }
    
    function save_data() {
        $data = array(
            'id_orders' => $this->input->post('id_orders'),
            'tgl_order' => date("Y-m-d h:i:s"),
            'jam_awal' => $this->input->post('jam_awal'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'nama_customer' => $this->input->post('nama_customer'),
            'type_kendaraan' => $this->input->post('type_kendaraan'),
            'no_polisi' => $this->input->post('no_polisi'),
            'no_telp' => $this->input->post('no_telp'),
            'stnk' => $this->input->post('stnk'),
            'barang_berharga' => $this->input->post('barang_berharga'),
            'keterangan_bb' => $this->input->post('keterangan_bb'),
            'carwash' => $this->input->post('carwash'),
            'status' => 1
            
        );
        $this->db->insert('tbl_orders', $data);
        return true;        
    }
    
    function update_data() {
        $data = array(
            'tgl_order' => date("Y-m-d h:i:s"),
            'nama_customer' => $this->input->post('nama_customer'),
            'type_kendaraan' => $this->input->post('type_kendaraan'),
            'no_polisi' => $this->input->post('no_polisi'),
            'no_telp' => $this->input->post('no_telp'),
            'stnk' => $this->input->post('stnk'),
            'barang_berharga' => $this->input->post('barang_berharga'),
            'keterangan_bb' => $this->input->post('keterangan_bb'),
            'carwash' => $this->input->post('carwash'),
            'status' => 1
        );
        $this->db->where('id_orders', $this->input->post('id_orders'));
        $this->db->update('tbl_orders', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('tbl_orders', array('id_orders' => $this->input->post('id_orders')));
        return true;        
    }

    
}
