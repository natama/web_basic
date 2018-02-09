<style>
#div_laporan{
	margin:0 auto;
}
table.laporan {
	  border:1px dot #aaa;
	  border-spacing: 0;
	  margin:0 auto;
	   font-size: 0.9em;
	     font-family: arial;
}

tr,th,td {
  border:1px dot #bbb;
  padding:2pt;
}


</style>		

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>


  <div class="box box-info">
    <div class="box-body">
        <button type="submit" value="Print Div" onclick="printContent('div_laporan')" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;Print Laporan / Save PDF
        </button>
    </div><!-- /.box-body -->
  </div><!-- /.box -->



<div id="div_laporan">
	<table class="laporan" width="95%" border="1" align="center">
	  <thead>	
		<tr><td align="center" colspan="6"><b>LAPORAN TRANSAKSI</b></td></tr>
		<tr><td align="center" colspan="6"><b>NISSAN MOBILE</b></td></tr>
		<tr><td align="center" colspan="6"><b>Jl. Soekarno Hatta No.382, Bandung 40266 Telp : (022) 5207777</b></td></tr>
		<tr><td align="CENTER" colspan="6"><b>Posisi : <?php echo " $tanggal_awal S/D $tanggal_akhir"?></b></td></tr>
		<tr><td align="right" colspan="6"><b>Tanggal Cetak <?php echo date("d-M-Y"); ?></b></td></tr>
		<tr><td align="right" colspan="6"><b> </b></td></tr>
	  </thead>
	  <tbody>
		<tr align="center">
			<td align="center" width="15" scope="col"><b>NO</b></td>
			<th width="70" scope="col">ID TRANSAKSI</th>
			<th width="70" scope="col">TGL ORDER</th>
			<th width="70" scope="col">CUSTOMER</th>
			<th width="60" scope="col">KENDARAAN</th>
			<th width="90" scope="col">STATUS</th>
		</tr>
		
		<?php
			$j=1;
			foreach($order as $row)
			{
				

				if($row->status == 1){
                    $status = "<span class='label label-info'>Antrian</span>";
                }
                else if($row->status == 2){
                    $status = "<span class='label label-warning'>On Proses</span>";
                }
                else if($row->status == 3){
                    $status = "<span class='label label-warning'>Test Drive</span>";
                }
                else if($row->status == 4){
                    $status = "<span class='label label-warning'>Car Wash</span>";
                }
                else if($row->status == 5){
                    $status = "<span class='label label-success'>Complete</span>";
                }
                else{
                    $status = "";
                }
		?>
				<tr>
					<td align="center" valign="middle"><?=$j;?></td>
					<td align="center" valign="left"><?=$row->id_orders;?></td>
					<td align="center" valign="left"><?=$row->tgl_order;?></td>
					<td align="left" valign="left"><?=$row->nama_customer;?></td>
					<td align="left" valign="left"><?=$row->type_kendaraan;?></td>
					<td align="center" valign="left"><?=$status;?></td>
				</tr>
		<?php
			$j++;
			}
		?>
				<tr>
					<td colspan="6">JUMLAH Data: <b><?php echo " ",$j," Data"?></b></td>
				</tr>
	  </tbody>
	</table>
</div>