<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Jadwal Baru
        <small>New</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Permohonan Jadwal Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="t4_form_tambah">
		
			<form id="form_jadwal_go">
				<input type="hidden" readonly name="skpd_pelaksana" value="<?php echo $admin->id_skpd?>">
				
				<div class="row">
					<div class="col-md-6">
						
						<div class="form-group">
							<label>Judul Kegiatan</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <textarea class="form-control " name="kegiatan" id="kegiatan" required></textarea>
							</div>
							<!-- /.input group -->
						  </div>
						
						<div class="form-group">						
							<label>Waktu Mulai</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <input type="text" class="form-control" required name="tanggal_kegiatan_mulai" id="tanggal_kegiatan_mulai">
							</div>
							<!-- /.input group -->
						  </div>
						  
						
						<div class="form-group">						
							<label>Waktu Selesai</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <input type="text" class="form-control" required name="tanggal_kegiatan_selesai" id="tanggal_kegiatan_selesai">
							</div>
							<!-- /.input group -->
						  </div>
						  
						
						<div class="form-group">						
							<label>Tempat Kegiatan</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <input type="text" class="form-control" required name="tempat_kegiatan" id="tempat_kegiatan">
							</div>
							<!-- /.input group -->
						  </div>


						<div class="form-group">						
							<label>Surat Undangan</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <input type="file" class="form-control" name="surat" id="surat">
							</div>
							<!-- /.input group -->
						  </div>

						  
						  
						
					</div>
					
					<div class="col-md-6">
						<div class="form-group">						
							<label>Pejabat Pembuka</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <select name="id_pejabat" class="form-control">
									<option value=""> --- Pilih ---</option>
									<?php
										foreach($tbl_pejabat as $pejabat)
										{
											echo "<option value='".$pejabat->id_pejabat."'>".$pejabat->nama_pejabat."</option>";
										}
									?>									
							  </select>
							</div>
							<!-- /.input group -->
						  </div>
						  
						  <div class="form-group">
							<label>Peserta Kegiatan</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							  </div>
							  <textarea class="form-control " name="peserta" id="peserta" required></textarea>
							</div>
							<!-- /.input group -->
						  </div>
						


						<div class="form-group">						
							<label>Fasilitas Yg Dibutuhkan</label>

							<div class="input-group">
							  
							  <?php 
							  foreach($tbl_fasilitas as $fasilitas)
							  {
								echo '<div class="checkbox"><label><input type="checkbox" name="id_fasilitas[]" value="'.$fasilitas->id_fasilitas.'">'.$fasilitas->nama_fasilitas.'</label> <input name="jumlah[]" class="form-control" type="number"></div>';
								
							  }
							  ?>
							  
							</div>
							<!-- /.input group -->
						  </div>
						
						  
					</div>
					
					<div class="col-md-12">
						<div class="alert alert-success" style="display:none;" id="info_sukses"><b>Sukses!!!</b> Berhasil menyimpan...!!!</div>
						<button type="submit" class="btn btn-block btn-primary">Simpan</button>
					</div>
				</div>
			
			
			
			
			</form>
				
		
        </div> 
		
        <!-- /.box-body -->
        <div class="box-footer">
          Required harus diisi.
        </div>
		
      </div>
      <!-- /.box -->
	  
	  
	  
	</section>
	
	
<script type="text/javascript">
/*
	$(function () {
		$('#tanggal_kegiatan_mulai').datepicker({format: 'yyyy-mm-dd h:i:s'});
	});
*/	
	
	 $(function () {
		$('#tanggal_kegiatan_mulai, #tanggal_kegiatan_selesai').datetimepicker({format: 'YYYY-MM-DD H:m:s'});
	});
	
	
	
	
	$("#form_jadwal_go").on("submit",function(){
		
		
			
			//alert($(this).serialize());
			var datanya = $(this).serialize();

			$.ajax({
	            url: "<?php echo base_url()?>index.php/form_jadwal/go_simpan_jadwal",
	            type: "POST",
	            contentType: false,
	            processData:false,
	            data:  new FormData(this),
	            beforeSend: function(){
	                //alert("sedang uploading...");
	            },
	            success: function(e){
	                
	                $("#info_sukses").fadeOut().fadeIn();
					if(e=='3')
					{
						alert("Tanggal mulai lebih besar dari selesai.");
					}
					
					if(e=='4')
					{
						alert("Tanggal mulai sudah lewat.");
					}
					
					if(e=='1')
					{
						
						eksekusi_controller('index.php/form_jadwal/table_jadwal');
					}
				
	                
	            },
	            error: function(){

	            }           
	       });
		 

			/*
			$.post("<?php echo base_url()?>index.php/form_jadwal/go_simpan_jadwal",datanya,function(e){
				
				//alert(e);
				
				$("#info_sukses").fadeOut().fadeIn();
				if(e=='3')
				{
					alert("Tanggal mulai lebih besar dari selesai.");
				}
				
				if(e=='4')
				{
					alert("Tanggal mulai sudah lewat.");
				}
				
				if(e=='1')
				{
					
					eksekusi_controller('index.php/form_jadwal/table_jadwal');
				}
				
				
				
			});
			*/
			
		
		return false;
	})
</script>