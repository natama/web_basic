<div class="box">
    <div class="box-header">
        Management User
    </div><!-- /.box-header -->
    <div class="box-header">
        <a href="<?=base_url() . 'users/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'users';?>" class="btn btn-default">Refresh</a>
    </div>

    
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="75">ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $level="";
                $status="";
                foreach ($data as $key) {
                
                if($key->level==1){$level="<span class=\"btn btn-danger btn-xs\" >Administrator</span>";}
                else{$level="<span class=\"btn btn-primary btn-xs\" >User</span>";}

                echo "<tr>            
                <td>".$key->id_user."</td>
                <td>".$key->nama."</td>
                <td>".$key->username."</td>
                <td>".$level."</td>
                <td>
                    <a href=\"".base_url()."users/delete/".$key->id_user."\" class=\"btn btn-danger btn-xs\" >Hapus</a>
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
                <?php echo $this->pagination->create_links(); ?>
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