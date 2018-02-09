<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class minformation extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
        
    }    
    function all_data_pegawai() {
        $query = $this->db->get('tbl_pegawai');
        return $query->result();
    }

    function all_data_user() {
        
        $this->db->where("level", 2);
        $query = $this->db->get('user_login');
        return $query->result();
    }
    
    function lookup($keyword){
        $this->db->select('*')->from('barang');
        $this->db->like('nama_barang',$keyword,'after');
        $query = $this->db->get();        
        return $query->result();
    }

    function getLaporan($periode_awal,$periode_akhir)
    {
        $this->db->select("*");
        $this->db->from("tbl_orders");
        $this->db->where("DATE(tgl_order) >=", $periode_awal);
        $this->db->where("DATE(tgl_order) <=", $periode_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    function get_teknisi()
    {
        $this->db->select("*");
        $this->db->from("tbl_teknisi");
        
        $query = $this->db->get();
        return $query->result();
    }

    
}
