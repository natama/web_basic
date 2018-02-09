<div class="box">
    <div class="box-header">
        Management Master Menu
    </div><!-- /.box-header -->
    <div class="box-header">
        <a href="<?=base_url() . 'menu/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'menu';?>" class="btn btn-default">Refresh</a>
    </div>

    
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nama Menu</th>
            <th>Icon</th>
            <th>Url / Link</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>
        <tbody>
<?php

foreach ($data as $key) {
    
    echo "<tr>            
            <td>".$key->nama_menu."</td>
            <td>".$key->icon."</td>
            <td>".$key->link."</td>
            <td><a href=\"".base_url()."menu/edit/".$key->id_menu."\" class=\"btn btn-success btn-xs\" >Edit / Detail</a>
                <a href=\"".base_url()."menu/delete/".$key->id_menu."\" class=\"btn btn-danger btn-xs\" >Hapus</a>
            </td>
          </tr>";
}

?>
        </tbody>
      </table>            
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