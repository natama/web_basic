
<div class="box">
    <div class="box-header">
        Menghapus Data Pegawai
    </div><!-- /.box-header -->
    <div class="box-body">    
    <?php
    $id = $this->uri->segment(3);
    $attributes = array('role' => 'form', 'id' => 'formedit');
    $hidden = array('id_pegawai' => $id);
    echo form_open('pegawai/delete/'.$id,$attributes,$hidden); 
    foreach ($data as $key) {
        echo "<p>Yakin akan menghapus data [" . $key->id_pegawai ." - ".$key->nama_pegawai . "] ?</p>"; 
    }
    echo form_submit('submit', 'Ya!','class="btn btn-primary"');
    ?>
    <a href="<?=base_url() . 'pegawai';?>" class="btn btn-default">Tidak</a>
    <?php echo form_close();  ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->

