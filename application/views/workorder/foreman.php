<div class="row">
  <div class="col-md-12">
    <div class="box box-inf">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Customer</h3>

        
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" name="id_orders" />
            <input type="hidden" name="id_teknisi" value="<?php echo $data->id_teknisi; ?>" />
            <div class="form-group">
              <label for="kode_transaksi">Kode Transaksi</label>
              <input type="text" class="form-control" value="<?php echo $data->id_orders; ?>"
              id="kode_transaksi" name="kode_transaksi" placeholder="Kode Transaksi (Generate By System)" readonly="true">
            </div>
            <div class="form-group">
              <label for="nama_customer">Nama Customer</label>
              <input type="text" class="form-control" value="<?php echo $data->nama_customer; ?>"
              id="nama_customer" name="nama_customer" placeholder="Nama Customer" readonly="true">
            </div>

            <div class="form-group">
              <label for="type_kendaraan">Type Kendaraan</label>
              <input type="text" class="form-control" value="<?php echo $data->type_kendaraan; ?>"
              id="type_kendaraan" name="type_kendaraan" placeholder="Type Kendaraan" readonly="true">
            </div>

            <div class="form-group">
              <label for="no_polisi">No Polisi</label>
              <input type="text" class="form-control" value="<?php echo $data->no_polisi; ?>"
              id="no_polisi" name="no_polisi" placeholder="No Polisi" readonly="true">
            </div>

            
          </div>
          <!-- /.col -->
          <div class="col-md-6">

            <div class="form-group">
              <label for="telp">No Telp</label>
              <input type="text" class="form-control" value="<?php echo $data->no_telp; ?>"
              id="no_telp" name="no_telp"  placeholder="" readonly="true">
            </div> 

            <div class="form-group">
              <label for="kat_menu">STNK</label>
              <input type="text" class="form-control" value="<?php echo $data->stnk; ?>"
              id="no_telp" name="no_telp"  placeholder="" readonly="true">
            </div>

            <div class="form-group">
              <label for="barang_berharga">Keterangan Barang Berharga</label>
              <input type="text" class="form-control" value="<?php echo $data->barang_berharga; ?>"
              id="barang_berharga" name="barang_berharga" placeholder="" readonly="true">
            </div>

            <div class="form-group">
              <label for="kat_menu">Carwash</label>
              <input type="text" class="form-control" value="<?php echo $data->carwash; ?>"
              id="barang_berharga" name="barang_berharga" placeholder="" readonly="true">
            </div>

            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        E-JPC Ver 1.0
      </div>
    </div>


  </div>



  <div class="col-lg-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Progres Pekerjaan</h3>
      </div><!-- /.box-header -->
      <!-- form start -->

      <div class="box-body">
      <form id="postupdate">
        <input type="hidden" name="id_teknisi" value="<?php echo $data->id_teknisi; ?>" />
        <input type="hidden" name="id_orders" value="<?php echo $data->id_orders; ?>"/>

        <div class="row">
          <div class="col-xs-2">
            Job On Hold : 
          </div>
          <div class="col-xs-4">
            <select class="form-control" name="job_on_hold" id="job_on_hold">
              <option value="">--- Pilih ---</option>
              <option value="Part">Part</option>
              <option value="Approval">Approval</option>
              <option value="Sublet">Sublet</option>  
            </select>
          </div>
          
        </div>

        <div class="row">
          <div class="col-xs-2">
            Car On Progres : 
          </div>
          <div class="col-xs-4">
            <select class="form-control" name="status" id="status">
              <option value="">--- Pilih ---</option>
              <option value="3">Test Drive</option>
              <option value="4">Car Wash</option>
              <option value="5">Complete</option>  
            </select>
          </div>
          <div class="col-xs-5">
            <a href="#" class="btn btn-info" id="btn_progress" onclick="submit_progres()"><span class="fa fa-refresh"></span> Update Progress</a>
            <a href="<?=base_url() . 'workorder';?>" class="btn btn-danger"><span class="fa fa-times"></span> Batal</a>
          </div>
        </div>

        </form>


      </div><!-- /.box-body -->

      
    </div><!-- /.box -->
  </div>

  
  </div>   <!-- /.row -->

  <script type="text/javascript">
    function submit_progres(){

      $.ajax({
         url:'<?php echo base_url(); ?>/workorder/update_progres',
         type: 'POST',
         data: $("#postupdate").serialize(),
         success: function(data){
                    
                    alert('berhasil');
                
                     setTimeout(function (){
                        window.location = "<?php echo base_url(); ?>/workorder";
                      }, 2000);
                 

               },
               error: function(){
                 alert("Fail")
               }
             }); 

    }

  </script>