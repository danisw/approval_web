<form id="form" method="post" >
<h1>Form Request</h1>       
  <div class="box ">
  <div class="box-header">
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
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
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
              </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group has-success">
                   <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="nik inputWarning" placeholder="NIK" name="nik" value=""> 
                 
                </div>
              </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check" ></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="posisi inputError" name="posisi" placeholder="Posisi" value="">
                 
                </div>
              </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check" ></i> Verified</label>
                   <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Not Verified</label>
                  <input type="text" class="form-control" id="departemen inputError" name="departemen" placeholder="Departement" value="">
                </div>
              </div>
              </div>
              </form>
          </div>
        </div>

         <?php
         $counter=1;
            foreach ($kategori as $key) {
              echo "<div class=\"box box-warning collapsed-box\">
                    <div class=\"box-header with-border\">
                    <h3 class=\"box-title\">".$key->nama_kategori."</h3>
                    <div class=\"box-tools pull-right\">
                    <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                    </div>
                    </div>
                    <div class=\"box-body\">
                    <div class=\"row\">
                    "; ?><?php foreach ($sub_kategori as $sub) {
                        if($sub->id_kategori==$counter){
                            echo"<div class=\"col-md-4 col-sm-6 col-xs-12\">
                           <input type=\"checkbox\" id=\"checkbox".$sub->id_sub."\" name=\"cb[]\" value=\"".$sub->id_sub."\">
                            ".$sub->nama_sub."
                            <div class=\"oncheck".$sub->id_sub." has-success\"><input type=\"text\" class=\"form-control\" id=\"".$sub->id_sub."\" name=\"alasan_".$sub->id_sub."\" placeholder=\"Masukkan Alasan permintaan akses ".$sub->nama_sub."\" value=\"\"></div>     
                            </div>";
                        }else{continue;}
                    }?><?php 
                      echo"
                      </div>
                  </div>
                </div>";
                $counter++;
            }
        ?>

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