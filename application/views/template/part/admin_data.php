<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Data</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Table data admin</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="t4_tbl_admin">
			 <table id="datatabel_admin" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NIP</th>
                  <th>jabatan</th>                  
                  <th>level</th>
                  <th>SKPD</th>
                  <th>BAGIAN</th>
                  <th width="120px;">action</th>
                </tr>
                </thead>
                <tbody>
					
					<?php
					foreach($all_admin as $data)
					{
						
						$btn_edit 	= '<button style="width:50%" class="btn-xs btn-primary " onclick="edit_admin('.$data->id_admin.')"> <span class="fa fa-edit"></span> Edit</button>';
						$btn_delete	= '<button style="width:50%" class="btn-xs btn-warning " onclick="delete_admin('.$data->id_admin.')"> <span class="fa fa-remove "></span> Del</button>';
						
						echo '
								<tr>
								  <td>'.$data->nip.'</td>
								  <td>'.$data->jabatan.'</td>								  
								  <td>'.$data->level.'</td>
								  <td>'.$data->nama_skpd.'</td>
								  <td>'.$data->bagian.'</td>
								  <td>'.$btn_edit .$btn_delete.'</td>
								 
								</tr>
						
						';
					}
					?>
				<tbody>
			</table>
		</div>
	</div>
	</section>
	
	
<script>
$(document).ready(function(){
	
	$("#datatabel_admin").dataTable();
	
})


function toogle_status_admin(id_admin)
{
	loading_cool('#t4_tbl_admin');
	$.get("<?php echo base_url()?>index.php/home/toogle_status_admin/"+id_admin,function(e){
		eksekusi_controller('index.php/home/admin_data');
		loading_cool_hide('#t4_tbl_admin');
	});
	
	
	
}


function edit_admin(id_admin)
{
	loading_cool('#t4_tbl_admin');
	$.get("<?php echo base_url()?>index.php/home/edit_admin/"+id_admin,function(e){
		$(".content-wrapper").html(e);
		loading_cool_hide('#t4_tbl_admin');
	});
	
	
}


function delete_admin(id_admin)
{
	if(confirm("Anda yakin?"))
	{
		if(confirm("Anda benar-benar yakin?"))
		{
			loading_cool('#t4_tbl_admin');
			$.get("<?php echo base_url()?>index.php/home/delete_admin/"+id_admin,function(e){
				eksekusi_controller('index.php/home/admin_data');
				loading_cool_hide('#t4_tbl_admin');
			});
			
			
		}
	}
}



</script>