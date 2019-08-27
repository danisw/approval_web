<?php
class M_request extends CI_Model{
  // var $column_order = array(null, 'c.nama','d.nama_kategori','b.kode_request','d.nama_kategori','e.nama_sub','b.alasan','b.status_approval','b.last_update'); //set column field database for datatable orderable
  // var $column_search = array('c.nama','d.nama_kategori','b.kode_request','d.nama_kategori','e.nama_sub','b.alasan','b.status_approval','b.last_update'); //set column field database for datatable searchable 
  //var $order = array('invoiceid' => 'asc'); // default order 
  var $column_order = array(null,'a.kode_request','a.status_approval','a.tanggal_input'); //set column field database for datatable orderable
  var $column_search = array('a.kode_request','a.tanggal_input',);
  var $order = array('a.kode_request' => 'asc'); // default order 

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
 private function _get_datatables_query()
  {
    
   // $this->db->from($this->table);
    $this->db->select('*');
    $this->db->from('tbl_request a');
   // $this->db->join('tbl_request_detail b', 'a.id_request=b.id_request','inner');
  // $this->db->join('tbl_user c', 'b.id_user=c.id_user','inner');
  //  $this->db->join('tbl_kategori_layanan d', 'd.id_kategori=b.id_kategori_layanan','inner');
  //  $this->db->join('tbl_sub_layanan e', 'e.id_sub=b.id_sub_layanan','inner');

    $i = 0;
  
    foreach ($this->column_search as $item) // loop column 
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {
        
        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if(count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }
    
    if(isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }
  

function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

 function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->select('*');
    $this->db->from('tbl_request a');
 //   $this->db->join('tbl_request_detail b', 'a.id_request=b.id_request','inner');
  //  $this->db->join('tbl_user c', 'b.id_user=c.id_user','inner');
  //  $this->db->join('tbl_kategori_layanan d', 'd.id_kategori=b.id_kategori_layanan','inner');
   // $this->db->join('tbl_sub_layanan e', 'e.id_sub=b.id_sub_layanan','inner');
    return $this->db->count_all_results();
  }
}