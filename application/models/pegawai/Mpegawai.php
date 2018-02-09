<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mpegawai extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }    
    function all_data() {
        $query = $this->db->get('tbl_pegawai');
        return $query->num_rows();
    }

    function gudang_unit($id){
        $this->db->select("*");
        $this->db->from("tbl_pegawai");
        $this->db->where("id_pegawai", $id);
        $query = $this->db->get();
        return $query->result();
    } 
    
    function data_unit(){
        $this->db->select('a.*, b.nama_jabatan as nama_jabatan');
        $this->db->from('tbl_pegawai a');
        $this->db->join('tbl_jabatan b', 'b.id_jabatan = a.id_jabatan');
        $query = $this->db->get();
        return $query->result();
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_pegawai', $id);
        }        
        $query = $this->db->get('tbl_pegawai');
        return $query->result();   
    }
    
    function save_data() {
        $data = array(
            'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
            'id_jabatan' => $this->input->post('jabatan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->insert('tbl_pegawai', $data);
        return true;        
    }
    
    function update_data() {
        $data = array(
            'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
            'id_jabatan' => $this->input->post('jabatan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('tbl_pegawai', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('tbl_pegawai', array('id_pegawai' => $this->input->post('id_pegawai')));
        return true;        
    }

    function get_jabatan() {
        $query = $this->db->get('tbl_jabatan');
        return $query->result();
    }
}
