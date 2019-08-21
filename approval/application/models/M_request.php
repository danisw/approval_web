<?php
class M_request extends CI_Model{
 function __construct(){
      parent::__construct();
      //$this->tbl = "tb_pengguna";
      $this->tbl = "tbl_request";
      $this->tbl2 = "tbl_request_detail";
  }

 public function save($data){
 	$this->db->insert($this->tbl, $data);
 	return $this->db->insert_id();
 }

 public function save_detail($data){
 	$this->db->insert($this->tbl2, $data);
 	return $this->db->insert_id();
 }
 public function get_request(){
 	$query=$this->db->query("SELECT c.nama, d.nama_kategori,  b.kode_request, d.nama_kategori, e.nama_sub, b.alasan, b.status_approval, b.last_update
		from tbl_request a 
		inner join tbl_request_detail b on a.id_request=b.id_request
		inner join tbl_user c on b.id_user=c.id_user
		inner join tbl_kategori_layanan d on d.id_kategori=b.id_kategori_layanan
		inner join tbl_sub_layanan e on e.id_sub=b.id_sub_layanan");
    return $query;
 	//return $this->db->get("books");
 }
}