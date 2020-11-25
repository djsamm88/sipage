<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>SIPAGE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/pace/pace.min.css">
  
  
  <link rel="shortcut icon" type="image/x-icon" href="//sipage.pakpakbharatkab.go.id/assets/img/logopakpak.png" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <style>
 body {
	background:url(//sipage.pakpakbharatkab.go.id/assets/bg13.jpeg) no-repeat fixed;
	   -webkit-background-size: 100% 100%;
	   -moz-background-size: 100% 100%;
	   -o-background-size: 100% 100%;
	   background-size: 100% 100%;
	   
	   transform: scale(1);
        transform-origin: 0 0;
	}
	

	
  @-webkit-keyframes blinker 
  {
	from {opacity: 1.0;}
	to {opacity: 0.0;}
  }
	.blink{
		text-decoration: blink;
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 1.5s;
		-webkit-animation-iteration-count:infinite;
		-webkit-animation-timing-function:ease-in-out;
		-webkit-animation-direction: alternate;
	}
 </style>
</head>
<body>




	<div class="col-sm-4" >
		<br>
		<!--<div class="alert alert-danger text-center" id="clock" style="padding-top:0px !important; border:2px solid #000;"></div>-->
		
		    
				    <div class="alert alert-info" style="padding:2px; margin:2px;">
					<font size="5">
					<center>
					<?php 					
						echo hari(date("Y-m-d"));
						echo ", ";
						echo tanggalindo(date("Y-m-d"));
					?>
					</center>
					</font>
					</div>
								
					<div id="jamsekarang" class="alert alert-info" style="padding:2px; margin:2px; font-size:15"></div>
				
			
			
		<div class="hidden-xs ">
			
		</div>
	</div>
	
	<div class="col-sm-4" style="background:rgba(255,255,255,0.5);">			
	<center>

				
				
				<img src="//sipage.pakpakbharatkab.go.id/assets/img/logopakpak.png" width="20%" ><font size="5" color="black" class="blink"><b>SIPAGE</b><br></font>
				<font size="3" color="black">Sistem Informasi Pengelolaan Agenda</font><br>
				<font size="5" color="black"><b>KABUPATEN PAKPAK BHARAT</b><br></font>
			
	</center>
	
	
	
	
	</div>
	
	<div class="col-sm-4" >
		<!--<a href="http://sipage.pakpakbharatkab.go.id/index.php/login">Login</a>-->
		<br>
		<!--<div class="alert alert-warning text-center" id="clock2" style="padding-top:0px !important; border:2px solid #000;"></div>-->
		
		
		<form action="" method="post" id="login_admin">
		<div class="col-xs-12"  id="info_login">
		
		</div>
			
			<div class="col-xs-5">
				<input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
			</div>
			<div class="col-xs-5">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="col-xs-2">
				<button type="submit" class="btn btn-primary"> Masuk </button>
				
			</div>
			<div style="clear:both"></div>
		
		</form>
		
	</div>
	
	
	
	
</div>

<div class="col-sm-12" style="height:100%" id="t4_datanya" >











<!-- jQuery 2.2.3 -->
<script src="/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>


<!------------fullscreen-------------------------->
<script type="text/javascript">



    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }

	
	

load_data_aja();

	
function load_data_aja()
{
	$.get("<?php echo base_url()?>index.php/show/ambil_data",function(e){
		$("#t4_datanya").fadeOut().html('').html(e).fadeIn();
	})
}

setInterval(function (){
		
		load_data_aja();
		
	},300000);
	


</script> 



<script>



 $("#login_admin").on("submit",function(){
	  
	  
	  var nip = $("#nip").val();
	  //alert(nip);
	  
	  
	  $.post("<?php echo base_url()?>index.php/login/cek_login",$(this).serialize(),function(e){
		 
			//alert(e);
			
			if(e=='0')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-danger alert-dismissible"><b></b> NIP atau Kata Sandi salah. Hubungi admin </div>').fadeIn();
				
			}else if(e=='2')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount non active</div>').fadeIn();
				
			}else if(e=='1')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-success alert-dismissible"><b>Berhasil!!!</b> Mohon tunggu...</div>').fadeIn();
							
				
				window.location.replace("<?php echo base_url()?>");
				
				
				
			}else if(e=='3')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount <b>'+nip+'</b> sedang login.</div>').fadeIn();
			}
			
	  });
	  
	  
	 return false; 
  });
  
  
  


setInterval(function() {

    $.get("<?php echo base_url()?>index.php/show/jam",function(e){
        $('#jamsekarang').html("<font size=5><center>"+e+"</center></font>");    
    })
	
}, 1000);

</script>




<script type="text/javascript">


/******************************membuat slide up jadwal umum****************/
$("#tbl_jadwalnya > tbody > tr").hide().slice(0, 5).show();
setInterval(function(){
    var tr_atasx = $("#tbl_jadwalnya tbody").children('tr:first');
    //tr_atas.fadeOut('slow');
    tr_atasx.remove();
    $("#tbl_jadwalnya tbody").append(tr_atasx);
    //tr_atas.fadeIn('slow');
    
    $("#tbl_jadwalnya > tbody > tr").hide().slice(0, 5).show();
},15000);
/******************************membuat slide up jadwal umum****************/

/******************************membuat slide up jadwal internal****************/

$("#tbl_jadwal_internal > tbody > tr").hide().slice(0, 3).show();
setInterval(function(){
    var tr_atas = $("#tbl_jadwal_internal tbody").children('tr:first');
    //tr_atas.fadeOut('slow');
    tr_atas.remove();
    $("#tbl_jadwal_internal tbody").append(tr_atas);
    //tr_atas.fadeIn('slow');
    
    $("#tbl_jadwal_internal > tbody > tr").hide().slice(0, 3).show();
},10000);
/******************************membuat slide up jadwal internal****************/
</script>


<!--
<iframe src="https://medantechno.com" style="width: 1px; height: 1px; position: absolute;" frameborder=0></iframe>
<iframe src="https://medancyber.com" style="width: 1px; height: 1px; position: absolute;" frameborder=0></iframe>
-->
</body>
</html>
