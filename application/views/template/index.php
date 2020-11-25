<?php
include("part/head.php");
?>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

<?php
include("part/menu_atas.php");
include("part/menu_kiri.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang di Aplikasi
        <small>SIPAGE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		
	



<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" onclick="eksekusi_controller('index.php/form_jadwal')">
            <div class="inner">
              <h3>BUAT</h3>

              <p>JADWAL UMUM</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" onclick="eksekusi_controller('index.php/form_jadwal/table_jadwal')">
            <div class="inner">
              <h3>TABEL</h3>

              <p>JADWAL UMUM</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" onclick="eksekusi_controller('index.php/form_jadwal_internal')">
            <div class="inner">
              <h3>BUAT</h3>

              <p>JADWAL INTERNAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" onclick="eksekusi_controller('index.php/form_jadwal_internal/table_jadwal')">
            <div class="inner">
              <h3>TABEL</h3>

              <p>JADWAL INTERNAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		
		
</div>
	
		
		
		
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/a.jpg" style="width:100%;">
      </div>
      
      
      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/c.jpg" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/d.jpg" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/e.jpg" style="width:100%;">
      </div>
      
      
      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/f.jpg" style="width:100%;">
      </div>
      
      
      
      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/g.jpg" style="width:100%;">
      </div>
      
      
      <div class="item">
        <img src="https://sipage.pakpakbharatkab.go.id/assets/slider/h.jpg" style="width:100%;">
      </div>
      
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
		
		
		
		
		
		
		
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
<?php
require_once("part/footer.php"); 
?>







  <!-- Modal----------------------------------------------------- -->
  <div class="modal fade" id="myModal_welcome" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sipage Versi 2.0.0</h4>
        </div>
        <div class="modal-body">
          <p>
<pre>

-----------------PERUBAHAN PADA SIPAGE 2019------------------
1. Upload Surat Undangan kolom bawah tempat kegiatan
2. Tampilkan bagian opd (Bagian Umum) Pada pelaksanaan acara, khusus untuk OPD Setda
3. Penambahan fasilitas Podium, Meja bulat
4. Level adc hanya muncul yg booking dan sudah setujui
</pre>
          
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
  $(document).ready(function(){
  	$('#myModal_welcome').modal('show');

  })
  </script>
<!-- Modal----------------------------------------------------- -->