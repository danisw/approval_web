<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Bootstrap -->
     <!-- jQuery 3 -->

  <!-- Bootstrap 3.3.6 -->
<!-- <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">  -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css"> -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css"> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/skins/skin-green.min.css"> -->
    <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/skin-green.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <style>
  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #00a65a;
    border-radius: 1px;
    height: 33px;
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }
  }
  .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #00a65a;
    color: white;
}

    .example-modal .modal {
      background: transparent !important;
    }
    .content-wrapper{
      background-color: #ffff;
    }
  </style>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
<!--- Load Header --->
<?php $this->load->view('V_header') ?>
<!--- Load Sidebar --->
<?php $this->load->view('V_sidebar') ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Page Header
        <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        $p = @$page;
        if(empty($p)){
              $this->load->view("page/V_landingPage");
            } else {
          $this->load->view($p);
        }
      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      KOKOLA GROUP
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">MIS Departement</a>.</strong> All rights reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
   
Bootstrap 3.3.7
 <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

    <!-- iCheck -->
   <!--  <script src="<?=base_url()?>assets/icheck-1.x/icheck.min.js"></script> -->
    <script>
    
      $(function () {
        var sub=0;
        //default setting
          $.ajax({
                       url:"<?php echo base_url();?>Request/kategori",
                        async:"true",
                       success:function(data){
                          sub = JSON.parse(data);  
                          console.log("ini dalam ajax : "+sub);
                          var i = 1;
                          for(i=1;i<=16;i++){
                            hide(i);
                            my_toggle(i); 
                          }                        
            }
        });
          console.log(sub);
          function hide(i){
            $('.oncheck'+i).hide(); 
          }
          function my_toggle(i){
              $("#checkbox"+i).change(function() {
              $('.oncheck'+i).toggle();
            });
          }
          $('.control-label[for="inputSuccess"], .control-label[for="inputError"]').hide();

        //on change set value
        $( ".select2" ).change(function() {
          $('.form-group.has-success label').css('color','green');
          var id_user =$('.select2 option:selected').val();
          $('.control-label[for="inputSuccess"]').hide();
          $('.control-label[for="inputError"]').hide();
           console.log(id_user);

           if(id_user==0){
                $('.control-label[for="inputError"]').show();
                $('.form-group.has-success label').css('color','red');
            
                document.getElementById('nik inputWarning').value='';
                document.getElementById('posisi inputError').value='';
                document.getElementById('departemen inputError').value=''; 
           }else{
             $.ajax({
                       url:"<?php echo base_url();?>Request/cari",
                       data:'&id_user='+id_user,
                        async:"true",
                       success:function(data){
                           var hasil = JSON.parse(data);  
                            console.log(hasil);
                         $.each(hasil, function(key,val){ 
                            $('label[for="id_url"]').show();
                            document.getElementById('nik inputWarning').value=val.nik;
                            document.getElementById('posisi inputError').value=val.nama_jabatan;
                            document.getElementById('departemen inputError').value=val.nama_dept;
                            document.getElementById('nik inputWarning').setAttribute("readonly",true);
                            document.getElementById('posisi inputError').setAttribute("readonly",true);
                            document.getElementById('departemen inputError').setAttribute("readonly",true);
                });
            }
        });
              $('.form-group.has-success label').css('color','green');
              $('.control-label[for="inputSuccess"]').show();   
           }           
     });

        $('#save').click(function(){
           // alert("simpan ?");
           save_method='add';
          $('#save').text('saving...'); //change button text
          $('#save').attr('disabled',true); //set button disable 
          var url;
       
          if(save_method == 'add') {
              url ="<?php echo base_url();?>Request/add_data_request";
          } else {
             url = "<?php echo base_url();?>Request/add_data_request";
          }
       
          // ajax adding data to database
          $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
             // async:"true",
              success: function(data)
              {
                  alert("Berhasil disimpan");
                  $('#save').text('save'); //change button text
                  $('#save').attr('disabled',false); //set button enable 
                  document.getElementById('nik inputWarning').value='';
                  document.getElementById('posisi inputError').value='';
                  document.getElementById('departemen inputError').value=''; 
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error adding / update data ');
                  console.log(errorThrown);
                  $('#save').text('save'); //change button text
                  $('#save').attr('disabled',false); //set button enable 
              }
              });
        });
          
          //Initialize Select2 Elements
        $('.select2').select2({
          tags:false   
        });
        //initialize 
        $('#req-table').DataTable({
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.

          "ajax": {
               async:"true",
              url : "<?php echo base_url();?>Request/get_all_request",
              type : 'POST',
          },
          "columnDefs": [
        //  { 
        //     "targets": [ 0 ],
        //     "orderData": [ 0, 1 ]
        // }, {
        //     "targets": [ 1 ],
        //     "orderData": [ 1, 0 ]
        // }, {
        //     "targets": [ 4 ],
        //     "orderData": [ 4, 0 ]
        // }
        ],
        fnDrawCallback : function() {
           $('[data-toggle="popover"]').popover(); 
        }
        });

      });
    </script>

  </body>
</html>