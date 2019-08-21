<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}

	function index(){
		$this->load->view('V_login');
	}

	function auth(){
		$username=$this->input->post('username');
        $password=$this->input->post('password');

        $cek_user=$this->M_login->auth($username,$password);
        if($cek_user->num_rows() == 1){
        	$data=$cek_user->row_array();
        	switch($data['jabatan']){
        		case $data['jabatan']== 1 : 
        			$this->session->set_userdata('jabatan','1');
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('ses_id',$data['nik']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_company',$data['company']);
                    $this->session->set_userdata('ses_jabatan',$data['nama_jabatan']);
                    $this->session->set_userdata('ses_dept',$data['nama_dept']);
                    $this->session->set_userdata('ses_id_jabatan',$data['id_jabatan']);
                    $this->session->set_userdata('ses_id_dept',$data['id_dept']);
                    echo "level 1";
                    redirect('Page');
                    //break;
                case $data['jabatan'] == 2 :
                	$this->session->set_userdata('jabatan','2');
                     $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('ses_id',$data['nik']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                     $this->session->set_userdata('ses_company',$data['company']);
                      $this->session->set_userdata('ses_jabatan',$data['nama_jabatan']);
                    $this->session->set_userdata('ses_dept',$data['nama_dept']);
                     $this->session->set_userdata('ses_id_jabatan',$data['id_jabatan']);
                    $this->session->set_userdata('ses_id_dept',$data['id_dept']);
                    echo "level 2";
                    redirect('Page');
                   // break;
                case $data['jabatan'] == 3 :
                	$this->session->set_userdata('jabatan','3');
                     $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('ses_id',$data['nik']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_company',$data['company']);
                     $this->session->set_userdata('ses_jabatan',$data['nama_jabatan']);
                    $this->session->set_userdata('ses_dept',$data['nama_dept']);
                     $this->session->set_userdata('ses_id_jabatan',$data['id_jabatan']);
                    $this->session->set_userdata('ses_id_dept',$data['id_dept']);
                    echo "level 3";
                    redirect('Page');
                    //break;

                    case $data['jabatan'] == 4 :
                    $this->session->set_userdata('jabatan','4');
                     $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('ses_id',$data['nik']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_company',$data['company']);
                     $this->session->set_userdata('ses_jabatan',$data['nama_jabatan']);
                    $this->session->set_userdata('ses_dept',"super user");
                     $this->session->set_userdata('ses_id_jabatan',$data['id_jabatan']);
                    $this->session->set_userdata('ses_id_dept',$data['id_dept']);
                    echo "level 4";
                    redirect('Page');

                default:
                    echo $this->session->set_flashdata('msg','default');
                    echo "level default";
                    //break;
                	redirect('Login');
        	}

        }else{
        	echo $this->session->set_flashdata('msg','No User exists');
            echo "No user";
        	redirect('Login');
        }
	}

	function logout(){
		$this->session->sess_destroy();
        redirect('Login');
	}

}

?>