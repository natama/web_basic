<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class mmenu extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }    
    function all_data() {
        $query = $this->db->get('barang');
        return $query->num_rows();
    }
    
    function get_all_data() {

        $sql = "SELECT * FROM `tb_menu` ORDER BY `id_menu` ASC";
       
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_combo() {

        $this->db->select("*");
        $this->db->from("tb_menu");
        $this->db->where("kat_menu", 0);
        $query = $this->db->get();
        return $query->result();
    }

    function get_combo_by_id($id) {
        $this->db->select("*");
        $this->db->from("tb_menu_user");
        $this->db->where("id_user", $id);
        $query = $this->db->get();
        return $query->result();
    }

    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_menu', $id);
        }        
        $query = $this->db->get('tb_menu');
        return $query->result();   
    }
    
    function save_data() {

        
        $is_sub_menu = $this->input->post('is_sub_menu');
        if($is_sub_menu == 1){
            $kat_menu = 0;
        }
        else{
            $kat_menu = $this->input->post('kat_menu');
        }


        $data = array(
            'nama_menu' => $this->input->post('nama_menu', TRUE),
            'icon' => $this->input->post('icon'),
            'link' => $this->input->post('link', TRUE),
            'kat_menu' => $kat_menu
          );  
        $this->db->insert('tb_menu', $data);
        return true;        
    }
    
    function update_data() {
        $is_sub_menu = $this->input->post('is_sub_menu');
        if($is_sub_menu == 1){
            $kat_menu = 0;
        }
        else{
            $kat_menu = $this->input->post('kat_menu');
        }

        $data = array(
            'nama_menu' => $this->input->post('nama_menu', TRUE),
            'icon' => $this->input->post('icon'),
            'link' => $this->input->post('link', TRUE),
            'kat_menu' => $kat_menu
          ); 

        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('tb_menu', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('tb_menu', array('id_menu' => $this->input->post('id_menu')));
        return true;        
    }
}
