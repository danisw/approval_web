<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('form_helper');
    }

	// function index(){
	// 	$data['page']='page/V_user';
	// 	$this->load->view('V_dashboard',$data);
	// }
	function get_all_nama(){

        $data['user_data'] = $this->M_user->get_user_all();
    	$this->load->view('V_request', $data);
   	}

	function get_nama(){
         $userClue = $this->input->get('q');
         $data_user = $this->M_user->get_user($userClue, 'nama');
         echo json_encode($data_user);
		// $data_user = $this->M_user->get_user_all();
         //echo json_encode($data_user);
    }
}
?>