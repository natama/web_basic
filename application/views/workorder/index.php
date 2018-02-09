<div class="box box-success">
    <div class="box-header">
        <h4>List Work Order</h4>
    </div><!-- /.box-header -->
    
    <div class="box-body table-responsive">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="50">#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Plat</th>
                        <th>Nama Teknisi</th>
                        <th width="100" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $i=1;
                   foreach ($data as $key) {
                    

                    echo "<tr>
                    <td>".$i."</td>
                    <td>".$key->id_orders."</td>
                    <td>".$key->nama_customer."</td>
                    <td>".$key->type_kendaraan."</td>
                    <td>".$key->no_polisi."</td>
                    <td>".$key->nama_teknisi."</td>
                    <td align='center'><a href=\"".base_url()."workorder/foreman/".$key->id_orders."\" class=\"btn btn-success btn-xs\" >Proses</a>
                        
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
    List Work Order
</div>

</div><!-- /.box -->

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

</script>