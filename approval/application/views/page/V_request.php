<form id="form" method="post">
<div class="tab-pane active" id="tab_1"> 
<h1>Request</h1>       
  <div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Form Request</h3>
   </div>
  	<div class="box-body">
		<div class="box box-warning">
			<div class="box-header with-border">
              <h3 class="box-title">Identitas Pengguna</h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          		</div>
            </div>
            <div class="box-body 1">
              <form role="form">
              	<div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check" class="id_verified"></i> Verified</label>
                  <select class="form-control select2" id="inputSuccess Nama" name="id_user" style="width: 100%;">
                     <option value="0">- PILIH NAMA -</option>
                   <?php                                
                        foreach ($user_data as $row) {  
                      echo "<option value='".$row->id_user."'>". $row->id_user." . ".$row->nama."</option>";
                      }
                      echo"
                    </select>"
                    ?>
                 
                </div>
                <div class="form-group has-success">
                   <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="nik inputWarning" placeholder="NIK" name="nik" value=""> 
                 
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check" ></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="posisi inputError" name="posisi" placeholder="Posisi" value="">
                 
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check" ></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="departemen inputError" name="departemen" placeholder="Departement" value="">
                </div>
              </form>
          </div>
        </div>
        <!-- next Form cat --->
        <div class="box box-warning collapsed-box">
			<div class="box-header with-border">
              <h3 class="box-title">Permintaan Akses Media Informasi </h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          		</div>
            </div>
            <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxPC" name="cb[]" value="pc">
                    PC
                  <div class="oncheckPC has-success"><input type="text" class="form-control" id="PC" name="alasan_pc" placeholder="Masukkan Nama Komputer" value="alasan_pc"></div>     
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                 <input type="checkbox" id="checkboxWifi" name="cb[]" value="wifi">
                    Wifi
                   <div class="oncheckWifi has-success"><input type="text" class="form-control" id="wifi" name="alasan_wifi" placeholder="Masukkan Alasan" value=""></div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                   <input type="checkbox" id="checkboxCCTV" name="cb[]" value="cctv">
                    CCTV
                    <div class="oncheckCCTV has-success"><input type="text" class="form-control" id="cctv" name="alasan_cctv" placeholder="Masukkan Alasan" value=""></div>
              </div>
            </div>
          </div>
        </div>
        <!-- next Form cat --->
        <div class="box box-warning collapsed-box">
			<div class="box-header with-border">
              <h3 class="box-title">Permintaan Akses ERP Sunfish</h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          		</div>
            </div>
            <div class="box-body">
              <form role="form">
              	 <div class="col-md-12 col-sm-6 col-xs-12">
                    <input type="checkbox" id="checkboxERP" name="cb[]" value="erp">
                      Pilih Modul
                   <div class="oncheckERP has-success"><textarea type="text" class="form-control" id="erp" name="alasan_erp" placeholder="Masukkan Nama modul" value="">  </textarea></div>
                </div>
              </form>
          </div>
        </div>
        <!-- next Form cat --->
        <div class="box box-warning collapsed-box">
			<div class="box-header with-border">
              <h3 class="box-title">Permintaan Akses Media Transfer</h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          		</div>
            </div>
            <div class="box-body">
              <form role="form">
              	<div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxHarddrive" name="cb[]" value="hdd">
                   Harddrive external
                  <div class="oncheckHarddrive has-success"><input type="text" class="form-control" id="Harddrive" name="alasan_hdd" placeholder="Masukkan Alasan" value=""></div>     
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                 <input type="checkbox" id="checkboxRemovable" name="cb[]" value="fd">
                    Removable 
                   <div class="oncheckRemovable has-success"><input type="text" class="form-control" id="Removable" name="alasan_removable" placeholder="Masukkan Alasan" value=""></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                   <input type="checkbox" id="checkboxPrinters" name="cb[]" value="printer">
                   Printers
                    <div class="oncheckPrinters has-success"><input type="text" class="form-control" id="Printers" name="alasan_printers" placeholder="Masukkan Alasan" value=""></div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxCD" name="cb[]" value="cd">
                    CD/DVD Drives
                  <div class="oncheckCD"><input type="text" class="form-control" id="CD" name="alasan_cd" placeholder="Masukkan Alasan" value=""></div>     
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                 <input type="checkbox" id="checkboxModem" name="cb[]" value="modem">
                    Modem
                   <div class="oncheckModem has-success"><input type="text" class="form-control" id="Modem" name="alasan_modem" placeholder="Masukkan Alasan" value=""></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                   <input type="checkbox" id="checkboxSmartcard" name="cb[]" value="smartcard">
                    Smartcard Readers
                    <div class="oncheckSmartcard has-success"><input type="text" class="form-control" id="Smartcard" name="alasan_smartcard" placeholder="Masukkan Alasan" value=""></div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxMTP" name="cb[]" value="mtp">
                    Portable Devices (MTP)
                  <div class="oncheckMTP has-success"><input type="text" class="form-control" id="MTP" name="alasan_mtp" placeholder="Masukkan Alasan" value=""></div>     
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                 <input type="checkbox" id="checkboxBluetooth" name="cb[]" value="bluetooth">
                    Bluetooth
                   <div class="oncheckBluetooth has-success"><input type="text" class="form-control" id="Bluetooth" name="alasan_bluetooth" placeholder="Masukkan Alasan" value=""></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                   <input type="checkbox" id="checkboxCamera" name="cb[]" value="camera">
                    Camera & scanners
                    <div class="oncheckCamera has-success"><input type="text" class="form-control" id="Camera" name="alasan_camera" placeholder="Masukkan Alasan" value=""></div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxLainnya" name="cb[]" value="lainnya">
                    Lainnya
                  <div class="oncheckLainnya has-success"><input type="text" class="form-control" id="Lainnya" name="alasan_lainnya" placeholder="Masukkan Alasan" value=""></div>     
                </div>       
                </div>
              </form>
          </div>
        </div>
        <!-- next Form cat --->
        <div class="box box-warning collapsed-box">
			<div class="box-header with-border">
              <h3 class="box-title">Permintaan Akses Internet</h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          		</div>
            </div>
            <div class="box-body">
              <form role="form">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxInternet" name="cb[]" value="internet">
                    Registrasi Akses Internet
                 <div class="oncheckInternet has-success">
                  <TEXTAREA type="text" class="form-control" id="inputSuccess" name="alamat_internet" placeholder="Masukkan Alamat yang ingin diakses"></TEXTAREA>
                   <TEXTAREA type="text" class="form-control" id="inputSuccess" name="alasan_internet" placeholder="Masukkan Alasan"></TEXTAREA>
                </div>   
                </div>  
                
              </form>
          </div>
        </div>
        <!-- next Form cat --->
        <div class="box box-warning collapsed-box">
			<div class="box-header with-border">
              <h3 class="box-title">Permintaan Akses Email</h3>
              <div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          		</div>
            </div>
            <div class="box-body">
              <form role="form">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="checkbox" id="checkboxEmail" name="cb[]" value="email">
                    Registrasi Email
                 <div class="has-success oncheckEmail">
                  <input type="text" class="form-control" id="inputSuccess" name="alasan_email" placeholder="Keterangan / saran alamat email">
                </div>
                </div> 
              	
              </form>
          </div>
        </div>
        <!-- next Form cat --->
        <div>Dengan menandatangani form ini, saya bersedia menjaga kerahasian baik selama bekerja/bertugas maupun setelah purna
            masa kerja/tugas di lingkungan KOKOLA GROUP, dan tidak akan memberitahukan/menyampaikan atau membocorkan kepada
            siapapun segala sesuatu yang besifat terbatas atau rahasia, yang telah saya ketahui dan saya kerjakan dalam melaksanakan tugas
            tersebut diatas, dengan cara apapun, baik langsung maupun tidak langsung
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block btn-flat" id="save" value="Save" onclick="">SUBMIT
        </button>

    </div>
</div>
</form>
<!---- onclick="<?=base_url()?>index.php/User" ---->