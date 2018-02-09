<div class="box box-danger">
    <div class="box-header">
        <h4>Antrian</h4>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50" class='text-center'>#</th>
                            <th width="120">Order ID</th>
                            <th>Customer</th>
                            <th>Type</th>
                            <th>Plat</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($data as $key) {
                            echo "<tr>
                            <td class='text-center'>".$i."</td>
                            <td>".$key->id_orders."</td>
                            <td>".$key->nama_customer."</td>
                            <td>".$key->type_kendaraan."</td>
                            <td>".$key->no_polisi."</td>

                            <td class='text-center'><a class=\"btn btn-success btn-xs\" onclick='klik_proses(\"".$key->id_orders."\") '><i class='fa fa-pencil'></i> Proses</a> <a class=\"btn btn-danger btn-xs\" onclick='hapus_antrian(\"".$key->id_orders."\") '><i class='fa fa-trash'></i> Hapus</a>

                            </td>

                        </tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>            
        </div>
    </div>

</div><!-- /.box-body -->

<div class="box-footer">
    Antrian
</div>

</div><!-- /.box -->


<div class="modal fade" id="peringatanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title"><span class="label label-danger"><i class="fa fa-gear"></i> Pilih Teknisi</span></h4></center>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_ordernya" id="id_ordernya">
                    <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="50">#</th>
                        <th>Foreman</th>
                        <th>Teknisi</th>
                        <th>Status Teknisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $i=1;
                        $status;
                        $button;
                        foreach ($teknisi as $key) {

                            if($key->status == 0){

                                $status = '<span class="label label-success">Ready</span>';
                                $button ="<input type='radio' name='pilih_teknisi' id='pilih_teknisi".$i."' value='".$key->id_foreman.",".$key->nama_foreman.",".$key->nama_teknisi.",".$key->id_teknisi."' />";

                            }
                            else{

                                $status = '<span class="label label-danger">On Duty</span>';
                                $button = "";
                            }

                            echo "<tr>
                            <td class='text-center'>".$i."</td>
                            <td>".$key->nama_foreman."</td>
                            <td>".$key->nama_teknisi."</td>
                            <td>".$status."</td>
                            <td class='text-center'>".$button."</td>
                        </tr>";
                        $i++;
                    }
                    ?>
                     
                </tbody>
                </table>  


                </div>

                

          </div>
          <div class="modal-footer">

            <a class="btn btn-primary" data-dismiss="modal" onclick="submit_antrian()"><i class="fa fa-save"></i> Submit</a>


        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable({
            "aaSorting": [[ 0, "asc" ]],
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': ['nosort']
            }]
        });
    } );


    function klik_proses(val){

        $('#id_ordernya').val(val);
        $('#peringatanModal').modal('show');

    }

        

       

    function submit_antrian(){

        
        var input = $('input[name="pilih_teknisi"]:checked').val();
        var fields = input.split(',');
        var id_pegawai = fields[0];
        var nama_foreman = fields[1];
        var nama_teknisi = fields[2];
        var id_teknisi = fields[3];
        var id = $('#id_ordernya').val();
        console.log(fields);

        if(input == null || input == ""){

            alert("Anda Belum Memilih Teknisi");

        }
        else{

            $.ajax({
                url: '<?php echo base_url();?>antrian/proses_antrian', // point to server-side controller method
                data: {'id_pegawai' : id_pegawai,
                       'nama_foreman' : nama_foreman,
                       'nama_teknisi' : nama_teknisi,
                       'id_orders' : id,
                       'id_teknisi' : id_teknisi
                      },
                type: 'post',
                success: function (response) {
                    
                    alert("berhasil simpan");
                    setTimeout(function (){
                        window.location = "<?php echo base_url(); ?>/antrian";
                      }, 1000);
                    
                },
                error: function (response) {
                    alert("berhasil simpan");
                    //console.log(response); // display error response from the server
                    //$('#loadingnya').loading('stop');
                }
            });

        }


        
    }

    function hapus_antrian(id){


            $.ajax({
                url: '<?php echo base_url();?>antrian/hapus_antrian', // point to server-side controller method
                data: {
                       'id_orders' : id
                      },
                type: 'post',
                success: function (response) {
                    
                    alert("berhasil hapus");
                    setTimeout(function (){
                        window.location = "<?php echo base_url(); ?>/antrian";
                      }, 1000);
                    
                },
                error: function (response) {
                    alert("berhasil simpan");
                    //console.log(response); // display error response from the server
                    //$('#loadingnya').loading('stop');
                }
            });

        
    }

</script>