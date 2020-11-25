<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Master 
        <small>Jadwal Internal OPD</small>
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
						<th>TEMPAT</th>
						<th>OPD PELAKSANA</th>						
						<th>PESERTA </th>
						<th>KET. </th>
						<th>ACTION</th>
						
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
						
						
						
							
						echo "
							<tr>
								<td>$no</td>
								<td>$a->kegiatan</td>
								<td>$a->tanggal_kegiatan_mulai</td>
								<td>$a->tanggal_kegiatan_selesai</td>
								<td>$a->tempat_kegiatan</td>
								<td>$a->nama_skpd</td>												
								<td>$a->peserta</td>
								<td>$a->keterangan</td>
								<td><button onclick='hapus($a->id_jadwal)' class='btn btn-xs btn-block'>Hapus</td>
						
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



	



	
<script>
$("#table_jadwal").dataTable({"scrollX": true});




function hapus(id_jadwal)
{
	if(confirm("Anda yakin menghapus jadwal?"))
	{
		
		
		
		$.get("<?php base_url()?>index.php/form_jadwal_internal/hapus/"+id_jadwal,function(e){
			
			
			eksekusi_controller('index.php/form_jadwal_internal/table_jadwal');
			
		})
	}
}

</script>