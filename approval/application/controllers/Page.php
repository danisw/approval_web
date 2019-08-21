<?php
class Page extends CI_controller{
	function __construct(){
		 parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
	}

	function index(){
		$this->load->view('V_dashboard');
	}
	function add_pic_module(){
		//this function only granted for admin
		if($this->session->userdata('jabatan')==1){
			$this->load->view('V_add_pic');
		}else{
			echo "NO Access";
		}	
	}
	function show_user(){
		//all user can acces this page
		$this->load->view('V_show');
	}
	function add_request(){
		//all user can access this page
		$this->load->view('V_request');
	}
	function approve_request(){
		//only manager can access this page
		if($this->session->userdata('jabatan')==1){
			$this->load->view('V_approve');
		}else{
			echo "No Access";
		}
	}
	
}
?>