
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $admin->nama?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $admin->level?></a>
        </div>
      </div>
	  
	  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       
	   
		<?php 
		if($admin->level=='super')
		{
		?>		
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#pengguna_data" onclick="eksekusi_controller('index.php/home/admin_data')"><i class="fa fa-circle-o"></i> Data</a></li>           
            <li><a href="#pengguna_tambah" onclick="eksekusi_controller('index.php/home/admin_tambah')"><i class="fa fa-circle-o"></i> Tambah</a></li>           
            
            <li><a href="#log_admin" onclick="eksekusi_controller('index.php/log_admin_ss')"><i class="fa fa-circle-o"></i> Log Admin</a></li>           
			
			<!--
			<li><a href="#log_admin" onclick="eksekusi_controller('index.php/log_admin')"><i class="fa fa-circle-o"></i> Log Admin</a></li>           
			<li><a class="fancyboxnya fancybox.iframe" href="http://localhost:8080/admin_inm/log_admin/index/">Iframe</a></li>
			-->
			
          </ul>
        </li>
		<?php } ?>
		
		<li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Jadwal Umum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#jadwal" onclick="eksekusi_controller('index.php/form_jadwal')"><i class="fa fa-circle-o"></i> Buat Jadwal Umum</a></li>           
            
            <li><a href="#jadwal" onclick="eksekusi_controller('index.php/form_jadwal/table_jadwal')"><i class="fa fa-circle-o"></i> Daftar Jadwal Umum</a></li>           			
			
			
          </ul>
        </li>
		<li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Jadwal Internal OPD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
			<li><a href="#jadwal" onclick="eksekusi_controller('index.php/form_jadwal_internal')"><i class="fa fa-circle-o"></i> Buat Jadwal Internal</a></li>           
			<li><a href="#jadwal" onclick="eksekusi_controller('index.php/form_jadwal_internal/table_jadwal')"><i class="fa fa-circle-o"></i> Daftar Jadwal Internal</a></li>           			
          </ul>
        </li>
		
			<li><a class="fancyboxnya fancybox.iframe" href="<?php echo base_url()?>part_e-agenda/front.php"> <i class="fa fa-calendar"></i> Kalender</a></li>
		
		
		
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>