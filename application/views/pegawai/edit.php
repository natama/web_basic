<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Edit Data Pegawai</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $id = $this->uri->segment(3);
            $attributes = array('role' => 'form', 'id' => 'formedit');
            echo form_open('pegawai/update/'.$id,$attributes); 
            foreach ($data as $row) {}
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="id_pegawai" value="<?php echo $row->id_pegawai; ?>"/>
            <div class="form-group">
              <label for="nama_pegawai">Nama Pegawai</label>
              <input type="text" class="form-control" value="<?php echo $row->nama_pegawai; ?>"
                     id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
            </div>

            <div class="form-group">
              <label for="kat_menu">Jabatan</label>
              <select class="form-control" name="jabatan" id="jabatan">
                <option value="">--- Pilih Jabatan ---</option>
                <?php
                  $id_jabatan = $row->id_jabatan;
                  //echo $id_jabatan;
                  foreach($jabatan as $key){
                    if($id_jabatan == $key->id_jabatan){
                      echo "<option selected='selected' value=" . $key->id_jabatan . ">" . $key->nama_jabatan. "</option>";

                    }
                    else{

                      echo "<option value=" . $key->id_jabatan . ">" . $key->nama_jabatan. "</option>";
                    }

                    
                  }
                ?>
                
              </select>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" value="<?php echo $row->keterangan; ?>"
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