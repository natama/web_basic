<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tambah Data Pegawai</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id' => 'formadd');
            echo form_open('pegawai/save',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="id_pegawai" />
            <div class="form-group">
              <label for="nama_pegawai">Nama Pegawai</label>
              <input type="text" class="form-control" value="<?php echo set_value('nama_pegawai'); ?>"
                     id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
            </div>

            <div class="form-group">
              <label for="kat_menu">Jabatan</label>
              <select class="form-control" name="jabatan" id="jabatan">
                <option value="">--- Pilih Jabatan ---</option>
                <?php
                  foreach($jabatan as $row){
                    echo "<option value=" . $row->id_jabatan . ">" . $row->nama_jabatan. "</a>";
                  }
                ?>
                
              </select>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" value="<?php echo set_value('keterangan'); ?>"
                     id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'pegawai';?>" class="btn btn-default">Batal</a>
          </div>
        <?php echo form_close(); ?>
      </div><!-- /.box -->
    </div>
  </div>   <!-- /.row -->
</section><!-- /.content -->