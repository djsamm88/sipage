<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-AGENDA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/pace/pace.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
      body{
          background-image:url("<?php echo base_url()?>assets/bg.jpg") !important;
           background-repeat: no-repeat;
            background-attachment: fixed;
    background-position: center; 
     background-size: 100% 100%;
      }
  </style>
</head>
<body class="">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body" >
    <div class="login-logo">
    <a href=""><b>S</b>IPAGE</a>
  </div>

    <form action="" method="post" id="login_admin">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
	  
        <div class="col-xs-12"  id="info_login">
		
		</div>
		
      </div>

	  <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	  
	  <a href="<?php base_url()?>show">Lihat Jadwal Terupdate</a>
	  
	  
    </form>

	
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>

<!-- PACE -->
<script src="<?php echo base_url()?>assets/plugins/pace/pace.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  
</script>




<!-- custom script sam-->
<script>
 var url = '<?php echo base_url()?>';
</script>
<script src="<?php echo base_url()?>assets/custom.js"></script>
<!-- custom script sam-->
<script>
$(document).ajaxStart(function() { Pace.restart(); });


 $("#login_admin").on("submit",function(){
	  
	  
	  var nip = $("#nip").val();
	  //alert(nip);
	  
	  
	  $.post("<?php echo base_url()?>index.php/login/cek_login",$(this).serialize(),function(e){
		 
			//alert(e);
			
			if(e=='0')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-danger alert-dismissible"><b>Warning!!!</b> nip atau Password salah</div>').fadeIn();
				
			}else if(e=='2')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount non active</div>').fadeIn();
				
			}else if(e=='1')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-success alert-dismissible"><b>Success!!!</b> Mohon tunggu...</div>').fadeIn();
							
				
				window.location.replace("<?php echo base_url()?>");
				
				
				
			}else if(e=='3')
			{
				$("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount <b>'+nip+'</b> sedang login.</div>').fadeIn();
			}
			
	  });
	  
	  
	 return false; 
  });
</script>

</body>
</html>
