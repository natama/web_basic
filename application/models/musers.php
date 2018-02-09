<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class musers extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
        $this->load->model('menu/mmenu');
    }    
    function all_data() {
        $query = $this->db->get('user_login');
        return $query->num_rows();
    }

    function get_all_data() {

        $sql = "SELECT * FROM `user_login` ORDER BY `id_user` DESC";
       
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_menu_user($id_user){
        $this->db->select("*");
        $this->db->from("tb_menu_user");
        $this->db->where("id_user", $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    function users($limit,$offset,$ordercol = 'id_user',$orderby = 'ASC'){
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('user_login');
        return $query->result();
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('id_user', $id);
        }        
        $query = $this->db->get('user_login');
        return $query->result();   
    }
    
    function select_max_id(){
        $sql = "SELECT MAX(id_user) as max_id FROM user_login";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function save_data() {

        $max = $this->select_max_id();
        $max_id = $max->max_id + 1;
        $menu_list = $this->input->post('menu_list');

        $data = array(
            'id_user' => $max_id,
            'username' => $this->input->post('username', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
            'level' => $this->input->post('level', TRUE),
            'nama' => $this->input->post('pegawai', TRUE),
            'created_time' => date("Y-m-d H:i:s"),
            'updated_time' => date("Y-m-d H:i:s"),

        );
        $this->db->insert('user_login', $data);

         foreach ($menu_list as $key) {
            $menu_user = array(
                'id_menu' => $key,
                'id_user' => $max_id
            );

            $this->db->insert('tb_menu_user', $menu_user);
         }

        return true;        
    }
    
    function update_data() {
        $id = $this->input->post('id_user');
        $menu_list = $this->input->post('menu_list');

       

        $menu_user_lama = $this->mmenu->get_combo_by_id($id);

        foreach ($menu_user_lama as $key) {
            $this->db->delete('tb_menu_user', array('id_menu_user' => $key->id_menu_user));
        }

        foreach ($menu_list as $key) {
            $menu_user = array(
                'id_menu' => $key,
                'id_user' => $id
            );

            $this->db->insert('tb_menu_user', $menu_user);
         }

          $data = array(
            'nama' => $this->input->post('nama', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'username' => $this->input->post('username', TRUE),
            'level' => $this->input->post('level', TRUE),
            'updated_time' => date("Y-m-d H:i:s"),
        );
        $this->db->where('id_user', $id);
        $this->db->update('user_login', $data);

        return true;        
    }
    
    function delete_data() {
        // $menu_user_lama = $this->mmenu->get_combo_by_id($id);

        // foreach ($menu_user_lama as $key) {
        //     $this->db->delete('tb_menu_user', array('id_menu_user' => $key->id_menu_user));
        // }
        $this->db->delete('user_login', array('id_user' => $this->input->post('id_user')));
        return true;        
    }

    function check_users($username,$password){
        $sql = "SELECT * FROM user_login WHERE username = '$username' and password = '$password'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
