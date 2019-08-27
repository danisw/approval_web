<?php
class M_kategori extends CI_Model{

	//cek nip dan password dosen
    function get_all_kat(){
        //$query=$this->db->query("SELECT * FROM tbl_user WHERE nik='$username' AND password='$password' LIMIT 1");
        $query=$this->db->query("SELECT * from tbl_kategori_layanan");
        return $query->result();
    }
    function get_all_sub(){
        $query=$this->db->query("SELECT * from tbl_sub_layanan");
        return $query->result();
    }
    function get_num_sub(){
        $query=$this->db->query("SELECT * from tbl_sub_layanan");
        return $query->num_rows();
        //return $query->result();
    }
    
 
}
?>