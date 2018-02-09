<div class="box">
    <div class="box-header">
        Menghapus Data User
    </div><!-- /.box-header -->
    <div class="box-body">    
    <?php
    $id = $this->uri->segment(3);
    $attributes = array('role' => 'form', 'id' => 'formedit');
    $hidden = array('id_user' => $id);
    echo form_open('users/delete/'.$id,$attributes,$hidden); 
    foreach ($data as $key) {
        echo "<p>Yakin akan menghapus data [" . $key->id_user ." - ".$key->username. "] ?</p>"; 
    }
    echo form_submit('submit', 'Ya!','class="btn btn-primary"');
    ?>
    <a href="<?=base_url() . 'users';?>" class="btn btn-default">Tidak</a>
    <?php echo form_close();  ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->

