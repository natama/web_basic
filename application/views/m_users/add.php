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
            echo form_open('users/save',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            
           <div class="form-group">
              <label>Pegawai</label>
                <select id="pegawai" name="pegawai" class="form-control">
                  <option>-- Pilih Pegawai --</option>
                  <?php
                    foreach($pegawai as $row){
                      echo "<option value='$row->id_pegawai - $row->nama_pegawai'>". $row->id_pegawai." - " . $row->nama_pegawai. "</a>";
                    }
                  ?>
                </select>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?php echo set_value('username'); ?>"
                     id="username" name="username" placeholder="Masukan Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" value="<?php echo set_value('password'); ?>"
                     id="password" name="password" placeholder="Masukkan Password">
            </div>
             
            <div class="form-group">
              <label>Level Hak Akses</label>
                <select id="level" name="level" class="form-control">
                  <option>-- Pilih Level Hak Akses --</option>
                  <option value="1">Administrator</option>
                  <option value="2">User</option>
                </select>
            </div>

            <div class="form-group">
              <label>Menu List</label>
                <select class="form-control select2" multiple="multiple" name="menu_list[]" data-placeholder="Pilih Menu" style="width: 100%;">
                  <?php
                    foreach($parent as $row){
                      echo "<option value=" . $row->id_menu . ">" . $row->nama_menu. "</a>";
                    }
                  ?>
                </select>
            </div>

           

            
            

          </div><!-- /.box-body -->

          <div class="box-footer clearfix">
              <button type="submit" class="btn btn-primary">Simpan</button>
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
