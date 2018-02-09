
<div class="box">
    <div class="box-header">
        Master Jabatan
    </div><!-- /.box-header -->
    <div class="box-header">
        <a href="<?=base_url() . 'jabatan/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'jabatan';?>" class="btn btn-default">Refresh</a>
    </div>

    
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="10">ID</th>
                        <th>Nama Jabatan</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $key) {
                        echo "<tr>
                        <td>".$key->id_jabatan."</td>
                        <td>".$key->nama_jabatan."</td>
                        <td>".$key->keterangan."</td>
                        <td><a href=\"".base_url()."jabatan/edit/".$key->id_jabatan."\" class=\"btn btn-success btn-xs\" >Edit / Detail</a>
                            <a href=\"".base_url()."jabatan/delete/".$key->id_jabatan."\" class=\"btn btn-danger btn-xs\" >Hapus</a>
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