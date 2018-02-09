<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class mdashboard extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }  

    function grafik_bulanan(){
        $sql = 
        "
        SELECT
            DAY(tanggal_penjualan) as hari,
            SUM(IF(shift = 1, total_penjualan, 0)) AS Pagi,
            SUM(IF(shift = 2, total_penjualan, 0)) AS Sore,
            SUM(IF(shift = 3, total_penjualan, 0)) AS Malam
        FROM
            penjualan

        WHERE MONTH(tanggal_penjualan) = MONTH(NOW())

        GROUP BY
            DATE(tanggal_penjualan)
            
        ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    

    function stock_alert(){

        $this->db->select("*");
        $this->db->from("barang");
        $this->db->where("stok_barang <=", 15);
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
