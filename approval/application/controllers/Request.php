<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request extends CI_Controller {

    // var $table = 'invoice';
    // var $column_order = array(null, 'invoiceno','tgl','companyid','emailtime','accountid','accountname','email','no_faktur_pajak','filename'); //set column field database for datatable orderable
    // var $column_search = array('invoiceno','tgl','companyid','emailtime','accountid','accountname','email','no_faktur_pajak','filename'); //set column field database for datatable searchable 
    // //var $order = array('invoiceid' => 'asc'); // default order 
    // var $order = array('no_faktur_pajak' => 'asc'); // default order 


    function __cunstruct(){
        parent::construct();
        
        $this->load->model('M_user');
    }
    function index(){
        $this->load->view('page/V_request');
    }
    function add_request(){
        $this->load->model('M_user');
        $this->load->model('M_kategori');

        $jabatan = $this->session->userdata('ses_id_jabatan');
        $dept = $this->session->userdata('ses_id_dept');
        $data['page'] = 'page/V_request';
        $data['user_data'] = $this->M_user->get_user_all($jabatan,$dept);
        $data['kategori']= $this->M_kategori->get_all_kat();
        $data['sub_kategori']=$this->M_kategori->get_all_sub();
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
    public function kategori(){
        $this->load->model('M_kategori');
        $sub =$this->M_kategori->get_num_sub();
        echo json_encode($sub);
    }

    public function add_data_request(){
        $request=$this->load->model('M_request');
       // echo "entering controller";
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
                $sub_=$checkbox[$i];
                $sub_kategori=$checkbox[$i];
                $alasan=$this->input->post('alasan_'.$checkbox[$i]);
                $data2['id_user']=$this->input->post('id_user');
                $data2['id_request']=$result;
                $data2['kode_request']=$company."/MIS/".$result;
                $data2['id_kategori_layanan']=$kategori;
                $data2['id_sub_layanan']=$sub_kategori;
                $data2['alasan']=$alasan;
                
                $this->M_request->save_detail($data2);
            }
            echo json_encode(array("status" => TRUE));

        }else{
            //throw error
            $checkbox=$this->input->post('cb');
            var_dump($checkbox);
           echo "error";

        }
        
    }

    public function cek_kategori($cb){
        switch($cb){
        case $cb==1 || $cb==2 || $cb==3 : 
            return 1;
        break;
        case $cb==5 || $cb==6 || $cb==7 || $cb==8 || $cb==9 || $cb==10 || $cb==11 || $cb==12 || $cb==13 || $cb==14 : 
            return 3;
        break;
        case $cb==4 : 
            return 2;
        break;
        case $cb==15: 
        return 4;
        break;
        case $cb==16 : 
            return 5;
        break;
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
        $list = $this->M_request->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $jabatan=$this->session->userdata('ses_jabatan');
        $dept = $this->session->userdata('ses_id_dept');
        $nama_dept = $this->session->userdata('ses_dept');
      //  $user_dept = $this->M_request->($this->session->userdata('ses_id'));
        foreach ($list as $inv) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "1/MIS/".$inv->id_request;
          //  $row[] = $inv->kode_request;
           // $row[] = $inv->nama;
           // $row[] = $inv->nama_kategori;
           // $row[] = $inv->nama_sub;
           // $row[] = $inv->alasan;
            //$row[] = $inv->status_approval;
            $status=0;
        
            switch($status){
                case 0: 
                    $row[] = "
                        <div class=\"row\">
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager ".$nama_dept."\" data-content=\"Belum Approve\"><i style=\"color:grey\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager MIS\" data-content=\"Belum Approve\"><i style=\"color:grey\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval MD\" data-content=\"Belum Approve\"><i style=\"color:grey\" class=\"fa fa-user\"></i></a>
                        </div>
                        </div>
                        
                        "; break;
                case 1: 
                    $row[] = "
                        <div class=\"row\">
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager ".$nama_dept."\" data-content=\"Sudah Approved\"><i style=\"color:green\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager MIS\" data-content=\"Sudah Approve\"><i style=\"color:green\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager MD\" data-content=\"Sudah Approve\"><i style=\"color:green\" class=\"fa fa-user\"></i></a>
                        </div>
                        </div>
                        
                        "; break;
                case 2: 
                    $row[] = "
                        <div class=\"row\">
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager ".$nama_dept."\" data-content=\"Sudah Approved\"><i style=\"color:red\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager MIS\" data-content=\"Sudah Approve\"><i style=\"color:red\" class=\"fa fa-user\"></i></a>
                        </div>
                        <div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <a href=\"#\" class=\"popover1\" data-toggle=\"popover\" title=\"Approval Manager MD\" data-content=\"Sudah Approve\"><i style=\"color:red\" class=\"fa fa-user\"></i></a>
                        </div>
                        </div>
                        
                        "; break;
                default :
                     $row[] = "<a href=\" \" type=\"button\" class=\"btn btn-info btn-flat\" data-target=\"#modal-default\" data-toggle=\"modal\"> Waiting Approval </a>"; break;
            }
            $tgl=$inv->tanggal_input;
            $date=date_create($tgl);     
            $row[] = date_format($date,"d-M-Y");
            $row[] = "<a href=\" \" type=\"button\" class=\"btn btn-info btn-flat\" data-toggle=\"modal\" data-target=\"#modal-default\" > See details  </a>";
            //cek apakah manager atu departemen dengan user
            //cek apakah punya akses approve berkaitan dgn rule approval
            // if(($jabatan=="Manager" || $jabatan =="manager") && $dept==$req_dept){

            // }else{}
            $data[] = $row; 
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_request->count_all(),
                        "recordsFiltered" => $this->M_request->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

   

}

?>