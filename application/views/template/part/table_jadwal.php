<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Master 
        <small>Jadwal</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Master Jadwal</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="t4_form_tambah">
		
			<table id="table_jadwal" class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>KEGIATAN</th>
						<th>TGL/WAKTU MULAI</th>
						<th>TGL/WAKTU SELESAI</th>
						<th>TEMPAT/FASILITAS</th>
						<th>OPD PELAKSANA</th>
						<th>YG MEMBUKA</th>
						<th>PESERTA </th>
						<th>STATUS </th>
						<th>ACTION </th>
					</tr>
				</thead>
				
				<tbody>
					
					<?php 
					$no=0;
					
					
					foreach($tbl_jadwal as $a)
					{
						$no++;
						
						
						
						$mulai 		= $a->tanggal_kegiatan_mulai;
						$selesai 	= $a->tanggal_kegiatan_selesai;
						
						
						
						//'request','booking','approved','cancel','reject'
						
						if($a->status =='request')
						{
							
							if($admin->level=='skpd')
							{
								$btn = "";
								
							}else{
								
								$btn = "<button class='btn btn-xs btn-success' onclick='setujui($a->id_jadwal)'>Setujui</button>";
							}
							
							
							$c_btn = "<button class='btn btn-xs btn-warning' onclick='cancel($a->id_jadwal)'>Cancel</button>";
							
							$status = "<font color=black>$a->status</font>";
							
							$btn_del = "";
							
						}else if($a->status =='booking')
						{
							
							
							if($admin->level=='skpd')
							{
								$btn = "";
							}else{
								
								$btn = "<button class='btn btn-xs btn-primary' onclick='approved($a->id_jadwal)'>Setujui</button>";
							}
							
							$btn_del = "";
							
							
							$c_btn = "<button class='btn btn-xs btn-danger' onclick='reject($a->id_jadwal)'>Cancel</button>";
							$status = "<font color=blue>$a->status</font>";
							
						}else if($a->status =='cancel' || $a->status =='reject')
						{
							$btn = "<span class='glyphicon glyphicon-remove'></span>";
							$c_btn = "<button class='btn btn-xs' onclick='lihat_ket_reject(".$a->id_jadwal.")'>Lihat Ket.</button>";
							//$status = "<font color=red>$a->status</font>";
							$status = "<font color=red>Cancel</font>";
							
							
							$btn_del = "";
							
						}else if($a->status =='approved')
						{
							$btn = "<font color=green><span class='glyphicon glyphicon-ok'></span></font>";
							$c_btn = "";
							$status = "<font color=green>Disetujui</font>";
							
							if($admin->level=='skpd')
							{
								$btn_del = "";
							}else{
								
								$btn_del = "<button class='btn btn-xs btn-primary' onclick='reject($a->id_jadwal)'>Hapus</button>";
							}
							
							
							
							
							
							
						}
						
						
						if (time() > strtotime($selesai) && $a->status =='request' || time() > strtotime($selesai) && $a->status =='booking')  
						//if (time() > strtotime($selesai) && $a->status =='request' )  
						{
							$btn = "<font color=red>TimeOut</font>";
							$c_btn = "";
							$status = "<font color=black>$a->status</font>";
							
							$btn_del = "";
						}
						
						
						if (time() > strtotime($mulai) && $a->status =='request' || time() > strtotime($mulai) && $a->status =='booking')  
						//if (time() > strtotime($selesai) && $a->status =='request' )  
						{
							$btn = "<font color=red>TimeOut</font>";
							$c_btn = "";
							$status = "<font color=black>$a->status</font>";
							
							
							$btn_del = "";
						}
						
						
						
						
                						
                						
                		$oriDateM = $mulai;
                        $newDateM = date("d-m-Y H:i", strtotime($oriDateM));
                        
                        
                		$oriDateS = $selesai;
                        $newDateS = date("d-m-Y H:i", strtotime($oriDateS));
                        
                		
						if($admin->level=='adc')
						{							    

						 if($a->status=='request' || $a->status=='cancel' || $a->status=='reject')
						 {
						 	continue;
						 } 

						}
						
						$surat = $a->surat==""?"":"<a href='".base_url()."uploads/$a->surat' target='blank' class='btn btn-xs btn-primary'>Surat</a>";

						echo "
							<tr>
								<td>$no</td>
								<td>$a->kegiatan <br>$surat</td>
								<td>$newDateM</td>
								<td>$newDateS</td>
								<td>$a->tempat_kegiatan <br><button class='btn btn-xs' onclick='lihat_fasilitas(".$a->id_jadwal.")'>Lihat fasilitas.</button></td>
								<td>$a->nama_skpd</td>
								<td>$a->nama_pejabat</td>						
								<td>$a->peserta</td>
								<td>$status</td>
								<td><center>$btn $c_btn $btn_del</center></td>
							</tr>
							";
					}
					?>
				</tbody>
			
			</table>
		
        </div>
		
        <!-- /.box-body -->
        <div class="box-footer">
          ------
        </div>
		
      </div>
      <!-- /.box -->
	  
	  
	  
	</section>



<!-- Modal fasilitas ------------------------------------------------------------------------------------>
<div id="modal_fasilitas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fasilitas</h4>
      </div>
      <div class="modal-body" id="content_modal_fasilitas">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal fasilitas ------------------------------------------------------------------------------------>


	
	
<!-- Modal penolakan-------------------------------------------------------------------->
<div id="modal_cancel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        
		<?php 
		
		if($admin->level=='skpd')
		{
			echo '<h4 class="modal-title">Alasan Pembatalan</h4>';
		}else{
			echo '<h4 class="modal-title">Alasan Penolakan</h4>';
		}
			
		?>
		
		
		
      </div>
      <div class="modal-body" id="t4_form_penolakan">
        
      </div>
      
    </div>

  </div>
</div>
<!-- Modal penolakan-------------------------------------------------------------------->






	
<script>
$("#table_jadwal").dataTable({"scrollX": true});


function setujui(id_jadwal)
{
	if(confirm("Anda yakin menyetujui? Sudah lihat tanggal?"))
	{
		
		//$.get("http://192.168.30.34/e-agenda/assets/sms/sms.php?no_hp=085276966850&text=ayo_ada_request");
		
		$.get("<?php base_url()?>index.php/form_jadwal/setujui/"+id_jadwal,function(e){
			eksekusi_controller("index.php/form_jadwal/table_jadwal");
		})
	}
}


function approved(id_jadwal)
{
	if(confirm("Anda yakin menyetujui?"))
	{
		
		//$.get("http://192.168.30.34/e-agenda/assets/sms/sms.php?no_hp=085276966850&text=ayo_ada_approved");
		
		$.get("<?php base_url()?>index.php/form_jadwal/approved/"+id_jadwal,function(e){
			eksekusi_controller("index.php/form_jadwal/table_jadwal");
			//alert(e);
			//$("body").html(e);
		})
	}
}


function cancel(id_jadwal)
{
	if(confirm("Anda yakin? Sudah lihat tanggal?"))
	{
		//$.get("http://192.168.30.34/e-agenda/assets/sms/sms.php?no_hp=085276966850&text=jadwal_dicancel");
		
		$.get("<?php base_url()?>index.php/form_jadwal/cancel/"+id_jadwal,function(e){
			
			
			
			var textarea = "<form id='form_penolakan' ><input type='hidden' value='"+id_jadwal+"' id='id_jadwal' class='form-control' readonly>Keterangan Penolakan<textarea id='keterangan_penolakan' required class='form-control'></textarea><br><input type='submit' value='Kirim' class='btn btn-primary'></form>";
			
			$('#modal_cancel').modal({backdrop: false});
			
			$("#t4_form_penolakan").html(textarea);
			
		})
	}
}


function reject(id_jadwal)
{
	if(confirm("Anda yakin? Sudah lihat tanggal?"))
	{
		
		//$.get("http://192.168.30.34/e-agenda/assets/sms/sms.php?no_hp=085276966850&text=jadwal_direject");
		
		$.get("<?php base_url()?>index.php/form_jadwal/reject/"+id_jadwal,function(e){
			
			
			
			var textarea = "<form id='form_penolakan' ><input type='hidden' value='"+id_jadwal+"' id='id_jadwal' class='form-control' readonly>Keterangan Penolakan<textarea id='keterangan_penolakan' required class='form-control'></textarea><br><input type='submit' value='Kirim' class='btn btn-primary'></form>";
			
			$('#modal_cancel').modal({backdrop: false});
			
			$("#t4_form_penolakan").html(textarea);
			
		})
	}
}


function lihat_ket_reject(id_jadwal)
{

	$.get("<?php base_url()?>index.php/form_jadwal/lihat_ket_reject/"+id_jadwal,function(e){
		
		
		$("#t4_form_penolakan").html(e);
		$('#modal_cancel').modal({backdrop: true});
		
	})

}


//http://localhost/e-agenda/assets/sms/sms.php?


function lihat_fasilitas(id_jadwal)
{

	$.get("<?php base_url()?>index.php/form_jadwal/lihat_fasilitas/"+id_jadwal,function(e){
		
		
		$("#content_modal_fasilitas").html(e);
		$('#modal_fasilitas').modal({backdrop: true});
		
	})

}




$(document).on("submit","form#form_penolakan", function(e){
	
	var id_jadwal 				= $(this).find("#id_jadwal").val();
	var keterangan_penolakan 	= $(this).find("#keterangan_penolakan").val();
	
	//alert(keterangan_penolakan);
	
	$.post("<?php echo base_url()?>index.php/form_jadwal/go_simpan_penolakan",{id_jadwal:id_jadwal,keterangan_penolakan:keterangan_penolakan},function(){
			
		//$('#modal_cancel').modal('toggle');
		$('#modal_cancel').modal('hide');
		
		$('#modal_cancel').on('hidden.bs.modal', function (e) {
			eksekusi_controller("index.php/form_jadwal/table_jadwal");
		});
		
			
	})
	
	return false;
})

</script>