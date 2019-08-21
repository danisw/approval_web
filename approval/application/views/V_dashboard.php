<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Bootstrap -->
  <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/skins/skin-green.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 

  <!-- iCheck for checkboxes and radio inputs -->
  <style>

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
      

    <!-- Bootstrap 3.3.6 -->
    <script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url()?>assets/dist/js/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/dist/js/demo.js"></script>

    <!-- iCheck -->
   <!--  <script src="<?=base_url()?>assets/icheck-1.x/icheck.min.js"></script> -->
    <script>
    
      $(function () {
        //default setting
          $('.control-label[for="inputSuccess"], .control-label[for="inputError"], .oncheck, .oncheckPC, .oncheckWifi, .oncheckCCTV, .oncheckHarddrive, .oncheckRemovable, .oncheckPrinters, .oncheckCD, .oncheckModem, .oncheckSmartcard, .oncheckMTP, .oncheckBluetooth, .oncheckCamera, .oncheckLainnya, .oncheckInternet, .oncheckEmail, .oncheckERP').hide();

          //onchange checkbox PC
          $("#checkboxPC").change(function() {
            $('.oncheckPC').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxWifi").change(function() {
            $('.oncheckWifi').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxCCTV").change(function() {
            $('.oncheckCCTV').toggle();
          });
          //onchange checkbox PC
          $("#checkboxHarddrive").change(function() {
            $('.oncheckHarddrive').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxRemovable").change(function() {
            $('.oncheckRemovable').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxPrinters").change(function() {
            $('.oncheckPrinters').toggle();
          });
          //onchange checkbox PC
          $("#checkboxCD").change(function() {
            $('.oncheckCD').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxModem").change(function() {
            $('.oncheckModem').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxSmartcard").change(function() {
            $('.oncheckSmartcard').toggle();
          });
          $("#checkboxMTP").change(function() {
            $('.oncheckMTP').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxBluetooth").change(function() {
            $('.oncheckBluetooth').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxCamera").change(function() {
            $('.oncheckCamera').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxLainnya").change(function() {
            $('.oncheckLainnya').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxInternet").change(function() {
            $('.oncheckInternet').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxEmail").change(function() {
            $('.oncheckEmail').toggle();
          });
          //onchange checkbox Wifi
          $("#checkboxERP").change(function() {
            $('.oncheckERP').toggle();
          });

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
                       url:"<?php echo base_url();?>index.php/Request/cari",
                       data:'&id_user='+id_user,
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
              url ="<?php echo base_url();?>index.php/Request/add_data_request";
          } else {
             url = "<?php echo base_url();?>index.php/Request/add_data_request";
          }
       
          // ajax adding data to database
          $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
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
                  alert('Error adding / update data');
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
          "pageLength" : 5,
          "serverSide" : true,
          "ajax": {
              url : "<?php echo base_url();?>index.php/Request/get_all_request",
              type : 'GET',

          },
          "columnDefs": [ {
            "targets": 5,
            "data": "status_approval",
            "render": function ( data, type, row, meta ) {
              return '<button type="button" class="btn btn-block btn-primary">Primary<a href="'+data+'">Download</a></button>';
            }
          } ]
        });
      }
      );
    </script>
  </body>
</html>