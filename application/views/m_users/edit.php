 <?php 
    echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
    foreach ($res as $val) {}
 ?>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Management User</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id' => 'formadd');
            echo form_open('users/update',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" value="<?php echo $val->id_user; ?>" id="id_user" name="id_user" >
            <div class="form-group">
              <label for="nama">Nama Pengguna</label>
              <input type="text" class="form-control" value="<?php echo $val->nama; ?>"
                     id="nama" name="nama" placeholder="Masukan Nama Pengguna">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" value="<?php echo $val->jabatan; ?>"
                     id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?php echo $val->username; ?>"
                     id="username" name="username" placeholder="Masukan Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" value="<?php echo $val->password; ?>"
                     id="password" name="password" placeholder="Masukkan Password" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Level Hak Akses</label>
                      <select id="level" name="level" class="form-control">
                        <option>-- Pilih Level Hak Akses --</option>
                        <?php if($val->level==1){$selected="selected='selected'";} else{$selected="";}?>
                        <option value="1" <?php echo $selected;?>>Administrator</option>
                        <?php if($val->level==2){$selected="selected='selected'";} else{$selected="";}?>
                        <option value="2" <?php echo $selected;?>>User</option>
                        <?php if($val->level==3){$selected="selected='selected'";} else{$selected="";}?>
                        <option value="3" <?php echo $selected;?>>Manager</option>
              </select>
            </div>

            <div class="form-group">
              <label>Menu List</label>
                <select class="form-control select2" multiple="multiple" name="menu_list[]" data-placeholder="Pilih Menu" style="width: 100%;">
                  <?php 
                    $temp = array();
                    $i = 0;
                    //loop data from db

                    if(count($menu_user) > 0){
                          foreach ($menu_user as $key) {
                          //echo $key->id_menu;
                          array_push($temp, $key->id_menu);
                      }

                      //var_dump($temp);
                      foreach($parent as $row){
                       //echo $temp[$i];
                       if($row->id_menu == $temp[$i]){
                          echo "<option value=" . $row->id_menu . " selected='selected'>" . $row->nama_menu. "</a>";
                          if(count($temp) != $i+1){
                            $i++;
                          }   
                       }
                       else{
                          echo "<option value=" . $row->id_menu . ">" . $row->nama_menu. "</a>";
                       }
                       
                      }
                    }
                    else{
                      foreach($parent as $row){
                        echo "<option value=" . $row->id_menu . ">" . $row->nama_menu. "</a>";
                      }
                    }
                    

                  ?>
                </select>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer clearfix">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?=base_url() . 'users';?>" class="btn btn-default">Batal</a>
          </div><!-- /.box-footer -->
        
      </div><!-- /.box -->
    </div>  <!-- /.col -->


</section><!-- /.content -->

<script type="text/javascript">
  $(function () {
    $(".select2").select2();
  });
</script>