<div class="box">
    <div class="box-header">
        Menghapus Data Menu
    </div><!-- /.box-header -->
    <div class="box-body">    
    <?php
    $id = $this->uri->segment(3);
    $attributes = array('role' => 'form', 'id' => 'formedit');
    $hidden = array('id_menu' => $id);
    echo form_open('menu/delete/'.$id,$attributes,$hidden); 
    foreach ($data as $key) {
        echo "<p>Yakin akan menghapus data [" . $key->id_menu ." - ".$key->nama_menu . "] ?</p>"; 
    }
    echo form_submit('submit', 'Ya!','class="btn btn-primary"');
    ?>
    <a href="<?=base_url() . 'menu';?>" class="btn btn-default">Tidak</a>
    <?php echo form_close();  ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->

