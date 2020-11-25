<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Profil</small>
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
        <div class="box-body">
		
		<form id="form_ganti_profil">
		<input type="hidden" name="id_admin" value="<?php echo $admin->id_admin?>">
          <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                <label>nip:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control " name="nip" value="<?php echo $admin->nip?>" readonly >
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
			</div>
			
			<div class="col-md-6">
              
			  <div class="form-group">
                <label>Nama:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control " name="nama" value="<?php echo $admin->nama?>" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  
			  
			  <div class="form-group">
				
					<label class="control-label " for="id_admin_menu">Level</label>					  
					<div class="input-group">		
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					  </div>
							
						  <select name="level" class="form-control" disabled>
							<?php
							
							$all_menu = array('super', 'protokol', 'skpd', 'adc');
								
								
								foreach($all_menu as $induk)
								{
									
									
							
									$checked = $admin->level==$induk?"selected":"";
							
									
									echo '<option '.$checked.' value="'.$induk.'"> '.$induk.'</option>';
								}
							?>					
						  </select>
						  
					  	  
					</div>
				</div>
				
				<div class="form-group">
				
					<label class="control-label " for="id_admin_menu">SKPD</label>					  
					<div class="input-group">		
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					  </div>
							
						  <select name="level" class="form-control" disabled>
							<?php
							
									
								echo '<option > '.$admin->nama_skpd.'</option>';
								
							?>					
						  </select>
						  
					  	  
					</div>
				</div>
				
			  

			  
			</div>
			
			<div class="col-md-12">
				<div id="info_form"></div>
				<input type="submit" class="btn btn-danger btn-block" value="Ubah data">
			</div>
			</form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Harap Ingat password anda sebelum mengganti!!!
        </div>
      </div>
      <!-- /.box -->
	  
	  
	  
	</section>
	
	
<script>
$("#form_ganti_profil").submit(function(){
	
	
	loading('#info_form');
	if(confirm("Anda yakin mengganti data admin?"))
	{
		
		if($("#confirm_password").val() != $("#password").val())
		{
			var info="<div class='alert alert-warning'><b>Warning!!!</b> Password dan Confirm password tidak sama!</div>";
			$("#info_form").fadeOut().html(info).fadeIn().delay(10000).fadeOut();
			return false;
		}
		
		
		$.post("<?php echo base_url()?>index.php/home/go_profil_admin",$(this).serialize(),function(){
			
			loading_hide('#info_form');			
			window.location.replace("<?php echo base_url()?>index.php/login/logout");
		})
		
		//set_log('<?php echo $this->session->userdata('id_admin')?>', '<?php echo $this->session->userdata('nip')?>', 'Mengubah profilnya', '<?php echo date('Y-m-d H:i:s')?>',function(){});
		
		
	}	
	
	loading_hide('#info_form');
	return false;
})
</script>