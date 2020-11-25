<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>tambah</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit data admin</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="t4_form_tambah">
		
		<form id="form_tambah_admin">		
          <div class="row">
            <div class="col-md-6">
			
			
			
               <div class="form-group">
                <label>nip:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control " name="nip" id="nip" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  
			  <div class="form-group">
                <label>Password:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" class="form-control" name="password" id="password" value="" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  
			  <div class="form-group">
                <label>Confirm Password:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			<div class="form-group">
				
					<label class="control-label " for="id_admin_menu">Pilih Level</label>					  
					<div class="input-group">		
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					  </div>
							
						  <select name="level" class="form-control">
							<?php
							
							$all_menu = array('super', 'protokol', 'skpd', 'adc');
								
								echo '<option  value=""> --- Pilih --- </option>';
								
								foreach($all_menu as $induk)
								{
																
									echo '<option value="'.$induk.'"> '.$induk.'</option>';
								}
							?>					
						  </select>
						  
					  	  
					</div>
				</div>
				
				
				
				
			  
			  
			</div>
			
			<div class="col-md-6">
              
			  <div class="form-group">
                <label>Nama:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control " name="nama" required>
                </div>
                <!-- /.input group -->
              </div>
			
			
			
			
			<div class="form-group">
				
					<label class="control-label " for="id_skpd">Pilih SKPD</label>					  
					<div class="input-group">		
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					  </div>
							
						  <select name="id_skpd" class="form-control">
							<?php
							
								echo '<option  value=""> --- Pilih --- </option>';
								
								foreach($all_skpd as $a)
								{
																
									echo '<option value="'.$a->id_skpd.'"> '.$a->nama_skpd.'</option>';
								}
							?>					
						  </select>
						  
					  	  
					</div>
				</div>
			
			


			  <div class="form-group">
                <label>Bagian:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-thumbs-up"></i>
                  </div>
                  <input type="text" class="form-control " name="bagian" required>
                </div>
                <!-- /.input group -->
              </div>
			
			
			
			  <div class="form-group">
                <label>jabatan:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-thumbs-up"></i>
                  </div>
                  <input type="text" class="form-control " name="jabatan" required>
                </div>
                <!-- /.input group -->
              </div>
			
			  <div class="form-group">
                <label>No HP:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-thumbs-up"></i>
                  </div>
                  <input type="text" class="form-control " name="no_hp" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  
			  <div class="form-group">
                <label>Email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-thumbs-up"></i>
                  </div>
                  <input type="email" class="form-control " name="email" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  
			  
			</div>
			
			<div class="col-md-12">
				<div id="info_form"></div>
				<input type="submit" class="btn btn-danger btn-block" value="Tambah data">
			</div>
			</form>
          </div>
          <!-- /.row -->
		  
        </div>
		
        <!-- /.box-body -->
        <div class="box-footer">
          Form penambahan admin, Jangan lupa pilih Privileges!!!
        </div>
		
      </div>
      <!-- /.box -->
	  
	  
	  
	</section>
	
	
<script>
// hanya alphanumeric
hanya_alphanumeric('#nip');

$("#form_tambah_admin").submit(function(){
	
	var serialize_form = $(this).serialize();
	loading_cool('#t4_form_tambah');
	
		
		if($("#confirm_password").val() != $("#password").val())
		{
			var info="<div class='alert alert-warning'><b>Warning!!!</b> Password dan Confirm password tidak sama!</div>";
			$("#info_form").fadeOut().html(info).fadeIn().delay(5000).fadeOut();
			loading_cool_hide('#t4_form_tambah');
			return false;
		}
		
		$.get("<?php echo base_url()?>index.php/home/periksa_nip/"+$("#nip").val(),function(z){
			
			if(z=='1')
			{
			
						
				$.post("<?php echo base_url()?>index.php/home/go_tambah_admin",serialize_form,function(abc){
					
					//alert(abc);
					
					loading_cool_hide('#t4_form_tambah');
					//window.location.replace("<?php echo base_url()?>login/logout");
					var info="<div class='alert alert-success'><b>Success!!!</b> Pengguna berhasil ditambahkan...</div>";
					$("#info_form").fadeOut().html(info).fadeIn().delay(5000).fadeOut();
					
					eksekusi_controller('index.php/home/admin_data');
				})
				
				
			}else{
				
				loading_cool_hide('#t4_form_tambah');
				$("#info_form").fadeOut().html("<div class='alert alert-warning'><b>Warning!!!</b> nip sudah dipakai</div>").fadeIn().delay(10000).fadeOut();
				
				
			}
			
		});
			
			
	
	return false;
})
</script>