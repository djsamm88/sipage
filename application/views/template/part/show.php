

<div class="row" >
<div class="col-sm-2" style="padding-right:1px">
<div class="alert alert-danger" style="padding:0px"><center>Acara Berlangsung:</center></div>
</div>
<div class="col-sm-10">
<marquee class="alert alert-danger " style="padding:0px" scrollamount="2">
<?php
    foreach($berlangsung as $coba)
    {
        echo $coba->kegiatan ." | ";
    }
?>
</marquee>
</div>
</div>

<style>
    table thead th{
        text-align: center;
    }
</style>
<div style="background:#dddddd; font-size:20px; margin-top:-20px !important;">
<b><center>JADWAL UMUM</center></b>
</div>
<table class="table table-bordered"  id="tbl_jadwalnya" style="background:rgba(255,255,255,0.5);">
	<thead bgcolor="#bdc3c7" >
		<th>No.</th>
		<th><center>KEGIATAN</center></th>
		<th width="130px">MULAI</th>
		<th width="130px">SELESAI</th>
		<th>TEMPAT</th>
		<th>PELAKSANA</th>
		<th>PEJABAT</th>
		<th>PESERTA</th>
		<th>STATUS</th>
	</thead>
	<tbody>
		
		<?php 
		$no=0;
		
		
		foreach($v_jadwal_approved as $z)
		{
		$no++;
		
		
		if($no % 2==0)
		{
			$cl = "#ecf0f1";
			//\$cl = "";
			
		}else{
			//$cl = "#bdc3c7";
			//$cl = "#dddddd";
			$cl = "";
		}
		
		//$status = $z->status=='booking'?"<font color=green>$z->status</font>":"<font color=blue class='blink'>DISETUJUI</font>";
		
		if($z->status=='booking')
		{
		    $status="<font color=green>$z->status</font>";
		}
		
		if($z->status=='approved')
		{
		    $status="<font color=blue class='blink'>DISETUJUI</font>";
		}
		
		if($z->status=='cancel')
		{
		    $status="<font color=red class='blink'>DIBATALKAN</font>";
		}
		
		
		
		
		
		
		
		//$status = $z->status;
		
		
		
		$class 	= $z->status=='booking'?"class=info":"class=danger";
		
		
		$oriDateM = $z->tanggal_kegiatan_mulai;
        $newDateM = date("d-m-Y H:i", strtotime($oriDateM));
        
        
		$oriDateS = $z->tanggal_kegiatan_selesai;
        $newDateS = date("d-m-Y H:i", strtotime($oriDateS));
        
		
		
		
		$tanggal_h = $oriDateM;
		$day = date('D', strtotime($tanggal_h));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$dayList[$day];
		
		$tanggal_hs = $oriDateS;
		$days = date('D', strtotime($tanggal_hs));
		$dayListS = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$dayListS[$days];
		
		
		
		
		echo "
		<tr bgcolor=$cl>
			<td>$no</td>
			<td><center><b>$z->kegiatan</b></center></td>
			<td>$dayList[$day] $newDateM</td>
			<td>$dayListS[$days] $newDateS</td>
			<td>".substr($z->tempat_kegiatan,0,40)."</td>
			<td><b>$z->nama_skpd</b></td>
			<td><b>$z->nama_pejabat</b></td>
			<td>".substr($z->peserta,0,40)."</td>
			<td style='text-transform: uppercase;'  ><b>$status</b></td>
		</tr>
		";
		}
		?>
	</tbody>
</table>



<div style="background:#dddddd; font-size:20px" >
<b><center>JADWAL INTERNAL OPD</center></b>
</div>
<table class="table " id="tbl_jadwal_internal" style="background:rgba(255,255,255,0.5);">
	<thead bgcolor="#bdc3c7" >
		<th>No.</th>
		<th>KEGIATAN</th>
		<th>MULAI</th>
		<th>SELESAI</th>
		<th>TEMPAT</th>
		<th>PELAKSANA</th>		
		<th>PESERTA</th>
		
	</thead>
	<tbody>
		
		<?php 
		$no=0;
		foreach($internal as $zi)
		{
		$no++;
		
		if($no % 2==0)
		{
			$cl = "#ecf0f1";
			//\$cl = "";
			
		}else{
			//$cl = "#bdc3c7";
			//$cl = "#dddddd";
			$cl = "";
		}
		
		$oriDateSi = $zi->tanggal_kegiatan_selesai;
		$newDateSi = date("d-m-Y H:i", strtotime($oriDateSi));
		
		$oriDateMi = $zi->tanggal_kegiatan_mulai;
		$newDateMi = date("d-m-Y H:i", strtotime($oriDateMi));
		
		
		
		$tanggal_him = $oriDateSi;
		$daysi = date('D', strtotime($tanggal_him));
		$dayListSi = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$dayListSi[$daysi];
		
		
		$tanggal_his = $oriDateMi;
		$daysii = date('D', strtotime($tanggal_his));
		$dayListSii = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$dayListSii[$daysii];
		
		
		
		
		echo "
		<tr bgcolor=$cl>
			<td>$no</td>
			<td><b>$zi->kegiatan</b></td>
			<td>$dayListSii[$daysii] $newDateMi</td>
			<td>$dayListSi[$daysi] $newDateSi</td>
			<td>$zi->tempat_kegiatan</td>
			<td><b>$zi->nama_skpd</b></td>			
			<td>$zi->peserta</td>
			
		</tr>
		";
		}
		?>
	</tbody>
</table>



	



<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>

<!-- PACE -->
<script src="<?php echo base_url()?>assets/plugins/pace/pace.min.js"></script>





<!-- custom script sam-->
<script>
 var url = '<?php echo base_url()?>';
</script>
<script src="<?php echo base_url()?>assets/custom.js"></script>
<script src="<?php echo base_url()?>assets/count_down/countdown.js"></script>
<!-- custom script sam-->
<script>
/*
$('#clock').countdown('<?php echo  isset($terdekat[0])? $terdekat[0]->tanggal_kegiatan_mulai:0;?>', function(event) {
  $(this).html(event.strftime('<font size=6px> %D </font> <font size=2px>Hari </font> <font size=6px>%H : %M : %S </font> <br><u><b><?php echo isset($terdekat[0])?  $terdekat[0]->kegiatan:0?></b></u> <br> oleh : <?php echo  isset($terdekat[0])? $terdekat[0]->nama_skpd:0?>'));
});

$('#clock2').countdown('<?php echo isset($terdekat[1])?$terdekat[1]->tanggal_kegiatan_mulai:0;?>', function(event) {
  $(this).html(event.strftime('<font size=6px> %D </font> <font size=2px>Hari </font> <font size=6px>%H : %M : %S </font> <br><u><b><?php echo isset($terdekat[1])?$terdekat[1]->kegiatan:0?></b></u> <br> oleh : <?php echo isset($terdekat[1])?$terdekat[1]->nama_skpd:0?>'));
});
*/
</script>











