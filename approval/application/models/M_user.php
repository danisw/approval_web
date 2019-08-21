<?php
class M_user extends CI_Model{
 function __construct(){
      parent::__construct();
      //$this->tbl = "tb_pengguna";
      $this->tbl = "tbl_user";

  }
     function get_user($booksClue, $column){
      $this->db->select($column);
      $this->db->from('tbl_user');
      $this->db->like('nama', $booksClue);
      return $this->db->get()->result_array();
  }

  function get_user_all($jabatan,$dept){
    $query=$this->db->query("SELECT * from tbl_user a left join tbl_jabatan b on a.jabatan=b.id_jabatan
        left join tbl_dept c on a.departemen=c.id_dept where (b.id_jabatan >= '$jabatan') and c.id_dept='$dept' ");
    return $query->result();
  }
  function cari($id_user){
    $query=$this->db->query("SELECT * from tbl_user a left join tbl_jabatan b on a.jabatan=b.id_jabatan
        left join tbl_dept c on a.departemen=c.id_dept where a.id_user='$id_user' ");
    return $query->result();
  }
} 
?>