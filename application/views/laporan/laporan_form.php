<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Transaksi</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id' => 'formadd', 'method'=>'get');
            echo form_open('laporan/view_laporan',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            
            <div class="form-group">
              <label for="tanggal_awal">Tanggal Awal</label>
              <input type="date" class="form-control" value="<?php echo set_value('tanggal_awal'); ?>"
                     id="tanggal_awal" name="tanggal_awal">
            </div>
            <div class="form-group">
              <label for="tanggal_akhir">Tanggal Akhir</label>
              <input type="date" class="form-control" value="<?php echo set_value('tanggal_akhir'); ?>"
                     id="tanggal_akhir" name="tanggal_akhir">
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer clearfix">
              <button type="submit" class="btn btn-primary">Lihat Laporan</button>
          </div><!-- /.box-footer -->
        
      </div><!-- /.box -->
    </div>  <!-- /.col -->


</section><!-- /.content -->
