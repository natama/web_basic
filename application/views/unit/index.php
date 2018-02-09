
<div class="box">
    <div class="box-header">
        Master Unit
    </div><!-- /.box-header -->
    <div class="box-header">
        <a href="<?=base_url() . 'unit/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'unit';?>" class="btn btn-default">Refresh</a>
    </div>

    
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10">ID</th>
            <th>Nama Unit</th>
            <th>Keterangan</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($data as $key) {
    echo "<tr>
            <td>".$key->id_unit."</td>
            <td>".$key->nama_unit."</td>
            <td>".$key->keterangan."</td>
            <td><a href=\"".base_url()."unit/edit/".$key->id_unit."\" class=\"btn btn-success btn-xs\" >Edit / Detail</a>
                <a href=\"".base_url()."unit/delete/".$key->id_unit."\" class=\"btn btn-danger btn-xs\" >Hapus</a>
            </td>
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