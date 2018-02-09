<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tambah Data Menu</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id' => 'formadd');
            echo form_open('menu/save',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="id_menu" />
            
            <div class="form-group">
              <label for="nama_menu">Nama Menu</label>
              <input type="text" class="form-control" value="<?php echo set_value('nama_menu'); ?>"
                     id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu">
            </div>
            <div class="form-group">
              <label for="icon">Icon</label>
              <input type="text" class="form-control" value="<?php echo set_value('icon'); ?>"
                     id="icon" name="icon" placeholder="Masukkan Icon">
            </div>
            <div class="form-group">
              <label for="link">Link / Url</label>
              <input type="text" class="form-control" value="<?php echo set_value('link'); ?>"
                     id="link" name="link" placeholder="Masukkan Link / Url">
            </div>
            <div class="form-group">
              <label for="supplier">Apakah Sub Menu ?</label>
              <select class="form-control" name="is_sub_menu" id="is_sub_menu">
                <option value="1">Tidak</option>
                <option value="0">Ya</option>
              </select>
            </div>

            <div class="form-group">
              <label for="kat_menu">Parent Menu</label>
              <select class="form-control" name="kat_menu" id="kat_menu">
                <option value="">--- Pilih ---</option>
                <?php
                  foreach($parent as $row){
                    echo "<option value=" . $row->id_menu . ">" . $row->nama_menu. "</a>";
                  }
                ?>
                
              </select>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'menu';?>" class="btn btn-default">Batal</a>
          </div>
        <?php echo form_close(); ?>
      </div><!-- /.box -->
    </div>
  </div>   <!-- /.row -->
</section><!-- /.content -->

<script type="text/javascript">
  $(function () {
    $(".select2").select2();
  });
  </script>