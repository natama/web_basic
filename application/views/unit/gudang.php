
<div class="box">
    <div class="box-header">
        Gudang Unit
    </div><!-- /.box-header -->
    <div class="box-header">
        
    </div>

    
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id Barang</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($unit as $key) {
                            echo "<tr>
                                    <td>".$key->id_barang."</td>
                                    <td>".$key->nama_barang."</td>
                                    <td>".$key->stok."</td>
                                    <td>".$key->harga."</td>                                    
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" align="right">
                
            </div>
        </div>
    </div><!-- /.box-body -->

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