<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>


<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>




<style>
.datatables-add-button {    
    display: none;
}

.delete_button  {    
    display: none;
}

.DTTT_button_print  {    
    display: none;
}

table.groceryCrudTable{
	font-size:11px;
	
}
</style>

</head>
<body>

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
	<div class="box-body" id="">
		
		<div>
			<?php echo $output; ?>
		</div>
	
	</div>
	</div>
	</section>
	
	
<script>
$(".groceryCrudTable").on("click","td.actions",function(e){
	
	//alert($(this).find("a").attr("href"));
	alert("Action ini disabled...");
	return false;
})


$(".groceryCrudTable").addClass("table table-bordered table-hover");


</script>
