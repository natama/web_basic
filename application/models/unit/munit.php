<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class munit extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }    
    function all_data() {
        $query = $this->db->get('unit');
        return $query->num_rows();
    }

    function gudang_unit($id){
        $this->db->select("*");
        $this->db->from("barang_unit");
        $this->db->where("id_unit", $id);
        $query = $this->db->get();
        return $query->result();
    } 
    
    function data_unit(){
        //$this->db->order_by($ordercol,$orderby);
        //$this->db->limit($limit,$offset);
        $query = $this->db->get('unit');
        return $query->result();
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_unit', $id);
        }        
        $query = $this->db->get('unit');
        return $query->result();   
    }
    
    function save_data() {
        $data = array(
            'nama_unit' => $this->input->post('nama_unit', TRUE),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->insert('unit', $data);
        return true;        
    }
    
    function update_data() {
        $data = array(
            'nama_unit' => $this->input->post('nama_unit', TRUE),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id_unit', $this->input->post('id_unit'));
        $this->db->update('unit', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('unit', array('id_unit' => $this->input->post('id_unit')));
        return true;        
    }
}
