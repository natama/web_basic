<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tambah Data Jabatan</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id' => 'formadd');
            echo form_open('jabatan/save',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="id_jabatan" />
            <div class="form-group">
              <label for="nama_jabatan">Nama Jabatan</label>
              <input type="text" class="form-control" value="<?php echo set_value('nama_jabatan'); ?>"
                     id="nama_jabatan" name="nama_jabatan" placeholder="Masukkan Nama Jabatan">
            </div>
            
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" value="<?php echo set_value('keterangan'); ?>"
                     id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'jabatan';?>" class="btn btn-default">Batal</a>
          </div>
        <?php echo form_close(); ?>
      </div><!-- /.box -->
    </div>
  </div>   <!-- /.row -->
</section><!-- /.content -->