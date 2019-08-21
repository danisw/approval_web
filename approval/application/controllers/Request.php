<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
	function __cunstruct(){
		parent::construct();
		
		$this->load->model('M_user');
	}
	function index(){
		$this->load->view('page/V_request');
	}
	function add_request(){
		$this->load->model('M_user');
		$jabatan = $this->session->userdata('ses_id_jabatan');
        $dept = $this->session->userdata('ses_id_dept');
		$data['page'] = 'page/V_request';
		$data['user_data'] = $this->M_user->get_user_all($jabatan,$dept);

		$this->load->view('V_dashboard',$data);
	}
	function show_request(){
		$data['page']='page/V_request';
		$this->load->view('V_dashboard',$data);

	}
	function update_request(){

	}
	function delete_request(){
		
	}
	public function cari(){
			$this->load->model('M_user');
        $id_user=$_GET['id_user'];
        $cari =$this->M_user->cari($id_user);
        echo json_encode($cari);
    }

    public function add_data_request(){
    	$request=$this->load->model('M_request');

    	$data['id_user']=$this->input->post('id_user');
    	$company=$this->session->userdata('ses_company');
    	//set data kategori Akses Transfer from cb sub kategori
    	if(!empty($this->input->post('cb'))){
    		$checkbox=$this->input->post('cb');

    		//insert ke tabel hedaer 
    		$result=$this->M_request->save($data);
    		//echo json_encode(array("status" => TRUE));
    		// ambil id request
    		//insert ke tabel detail sesuai kategori dan sub kategori satu2
    		for($i=0;$i<count($checkbox);$i++){
    			$kategori = $this->cek_kategori($checkbox[$i]);
    			$sub_kategori=$this->cek_sub_kategori($checkbox[$i]);
    			$alasan=$this->input->post('alasan_'.$checkbox[$i]);

    			$data2['id_user']=$this->input->post('id_user');
    			$data2['id_request']=$result;
    			$data2['kode_request']=$company."/MIS/".$result;
    			$data2['id_kategori_layanan']=$kategori;
    			$data2['id_sub_layanan']=$sub_kategori;
    			$data2['alasan']=$alasan;
    			
    			$this->M_request->save_detail($data2);
    			//echo json_encode(array("status" => TRUE));
    		}
    		echo json_encode(array("status" => TRUE));

    	}else{
    		//throw error
    	}
    	
    }

    public function cek_kategori($cb){
    	switch($cb){
    	case $cb=="pc" || $cb=="wifi" || $cb="cctv" : 
    		return 1;
    	break;
    	case $cb=="hdd" || $cb=="fd" || $cb="printer" || $cb=="cd" || $cb="modem" || $cb=="smartcard" || $cb="mtp" || $cb=="bluetooth" || $cb="camera" || $cb="lainnya" : 
    		return 3;
    	break;
    	case $cb=="erp" : 
    		return 2;
    	break;
    	case $cb=="internet" : 
    	return 4;
    	break;
    	case $cb=="email" : 
    		return 5;
    	break;
    	default:
    		return 0;
    	break;
    	}
    }
     public function cek_sub_kategori($cb){
    	switch($cb){
    	case $cb=="pc"			: return 1; break;
    	case $cb=="wifi" 		: return 2; break;
    	case $cb=="cctv" 		: return 3; break;
    	case $cb=="erp"			: return 4; break;
    	case $cb=="hdd"			: return 5; break;
    	case $cb=="fd"			: return 6; break;
    	case $cb=="printer"		: return 7; break;
    	case $cb=="cd"			: return 8; break;
    	case $cb=="mtp"			: return 9; break;
    	case $cb=="modem"		: return 10; break;
    	case $cb=="bluetooth"	: return 11; break;
    	case $cb=="camera"		: return 12; break;
    	case $cb=="smartcard"	: return 13; break;
    	case $cb=="lainnya"		: return 14; break;
    	case $cb=="internet" 	: return 15; break;
    	case $cb=="email" 		: return 16; break;	
    	default:
    		return 0;
    	break;
    	}
    }

    function list_request(){
    	$data['page']='page/V_list_request';
		$this->load->view('V_dashboard',$data);
    }

    function get_all_request(){
    	$this->load->model('M_request');
    	// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $request = $this->M_request->get_request();

          $data = array();

          foreach($request->result() as $r) {

               $data[] = array(
               		$r->kode_request,
                    $r->nama,
                    $r->nama_kategori,
                    $r->nama_sub,
                    $r->alasan,
                    $r->status_approval,
                    $r->last_update
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $request->num_rows(),
                 "recordsFiltered" => $request->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

}

?>