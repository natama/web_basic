<div class="row">
  <div class="col-lg-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Customer</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <?php
      $attributes = array('role' => 'form', 'id' => 'formadd');
      echo form_open('workorder/save',$attributes); 
      ?>
      <div class="box-body">
        <?php 
        echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
        ?>
        <input type="hidden" name="id_orders" />
        <div class="form-group">
          <label for="kode_transaksi">Kode Transaksi</label>
          <input type="text" class="form-control" value="<?php echo set_value('kode_transaksi'); ?>"
          id="kode_transaksi" name="kode_transaksi" placeholder="Kode Transaksi (Generate By System)" readonly="true">
        </div>
        <div class="form-group">
          <label for="nama_customer">Nama Customer</label>
          <input type="text" class="form-control" value="<?php echo set_value('nama_customer'); ?>"
          id="nama_customer" name="nama_customer" placeholder="Masukkan Nama Customer">
        </div>

        <div class="form-group">
          <label for="type_kendaraan">Type Kendaraan</label>
          <input type="text" class="form-control" value="<?php echo set_value('type_kendaraan'); ?>"
          id="type_kendaraan" name="type_kendaraan" placeholder="Masukkan Type Kendaraan">
        </div>

        <div class="form-group">
          <label for="no_polisi">No Polisi</label>
          <input type="text" class="form-control" value=""
          id="no_polisi" name="no_polisi" placeholder="No Polisi">
        </div>

        <div class="form-group">
          <label for="telp">No Telp</label>
          <input type="text" class="form-control" value="<?php echo set_value('no_telp'); ?>"
          id="no_telp" name="no_telp"  placeholder="Masukkan No Telp">
        </div>       

      </div><!-- /.box-body -->

      
    </div><!-- /.box -->
  </div>

  <div class="col-lg-6">
    <!-- general form elements -->
    <div class="box box-primary">

      <div class="box-header">
        <h3 class="box-title">Status Awal</h3>
      </div><!-- /.box-header -->

      <div class="box-body">

        <div class="form-group">
          <label for="start">Estimasi Start</label>
              <select class="form-control" name="jam_awal" id="jam_awal">
              <?php 

              $waktu = 8;

              for ($i=0; $i < 10 ; $i++) 
                { 
                    echo '<option value="'.$waktu.':00">'.$waktu.':00</option>';
                    $waktu += 1;
                } 
              ?>

                
              </select>
        </div>

        <div class="form-group">
          <label for="finish">Estimasi Finish</label>
              <select class="form-control" name="jam_akhir" id="jam_akhir">
              <?php 

              $waktu = 8;

              for ($i=0; $i < 10 ; $i++) 
                { 
                    echo '<option value="'.$waktu.':00">'.$waktu.':00</option>';
                    $waktu += 1;
                } 
              ?>

                
              </select>
        </div>

        <div class="form-group">
          <label for="kat_menu">STNK</label>
              <select class="form-control" name="stnk" id="stnk">
                <option value="0">--- Pilih ---</option>
                <option value="DiKonsumen">Di Konsumen</option>
                <option value="DiWorkshop">Di Workshop</option> 
              </select>
        </div>

        <div class="form-group">
          <label for="barang_berharga">Keterangan Barang Berharga</label>
          <input type="text" class="form-control" value=""
          id="barang_berharga" name="barang_berharga" placeholder="Barang Berharga">
        </div>

        <div class="form-group">
          <label for="kat_menu">Carwash</label>
              <select class="form-control" name="carwash" id="carwash">
                <option value="0">--- Pilih ---</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option> 
              </select>
        </div>
             

      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Simpan</button>
        <a href="<?=base_url() . 'workorder';?>" class="btn btn-danger"><span class="fa fa-times"></span> Batal</a>
      </div>
      <?php echo form_close(); ?>
    </div><!-- /.box -->
  </div>
  </div>   <!-- /.row -->