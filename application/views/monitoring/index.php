<div class="box box-info">
    <div class="box-header">
    <h4>Monitoring</h4>
    </div><!-- /.box-header -->
    
    <div class="box-body table-responsive">    
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="50">#</th>
                        <th>Order ID</th>
                        <th>Nama Customer</th>
                        <th>Plat Nomer / Mobil</th>
                        <th>Jam Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th>Nama Teknisi</th>
                        <th class="text-center" width="130">Status Terakhir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;


                        foreach ($monitor as $key) {

                            if($key->status == 1){
                                $status = "<span class='label label-info'>Antrian</span>";
                            }
                            else if($key->status == 2){
                                $status = "<span class='label label-warning'>On Proses</span>";
                            }
                            else if($key->status == 3){
                                $status = "<span class='label label-warning'>Test Drive</span>";
                            }
                            else if($key->status == 4){
                                $status = "<span class='label label-warning'>Car Wash</span>";
                            }
                            else if($key->status == 5){
                                $status = "<span class='label label-success'>Complete</span>";
                            }
                            else{
                                $status = "";
                            }


                            echo "<tr>
                            <td class='text-center'>".$i."</td>
                            <td>".$key->id_orders."</td>
                            <td>".$key->nama_customer."</td>
                            <td>".$key->type_kendaraan." - ".$key->no_polisi."</td>
                            <td>".$key->jam_awal."</td>
                            <td>".$key->jam_akhir."</td>
                            <td>".$key->nama_teknisi."</td>
                            <td align='center'>".$status."</td>
                            
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
Monitoring
</div>

</div><!-- /.box -->

