<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mjabatan extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }    
    function all_data() {
        $query = $this->db->get('tbl_jabatan');
        return $query->num_rows();
    }

    function gudang_unit($id){
        $this->db->select("*");
        $this->db->from("tbl_jabatan");
        $this->db->where("id_jabatan", $id);
        $query = $this->db->get();
        return $query->result();
    } 
    
    function data_unit(){
        //$this->db->order_by($ordercol,$orderby);
        //$this->db->limit($limit,$offset);
        $query = $this->db->get('tbl_jabatan');
        return $query->result();
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_jabatan', $id);
        }        
        $query = $this->db->get('tbl_jabatan');
        return $query->result();   
    }
    
    function save_data() {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->insert('tbl_jabatan', $data);
        return true;        
    }
    
    function update_data() {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id_jabatan', $this->input->post('id_jabatan'));
        $this->db->update('tbl_jabatan', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('tbl_jabatan', array('id_jabatan' => $this->input->post('id_jabatan')));
        return true;        
    }
}
