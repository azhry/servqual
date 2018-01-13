<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendaftaran Pelamar</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('assets') ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets') ?>/build/css/custom.min.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets') ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Datepicker CSS -->
    <link href="<?= base_url('assets/datepicker') ?>/css/bootstrap-datepicker3.min.css" rel="stylesheet">
  
  	<style type="text/css">
		body {
		    padding-top: 90px;
		}
		.panel-login {
			border-color: #ccc;
			-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		}
		.panel-login>.panel-heading {
			color: #00415d;
			background-color: #fff;
			border-color: #fff;
			text-align:center;
		}
		.panel-login>.panel-heading a{
			text-decoration: none;
			color: #666;
			font-weight: bold;
			font-size: 15px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login>.panel-heading a.active{
			color: #029f5b;
			font-size: 18px;
		}
		.panel-login>.panel-heading hr{
			margin-top: 10px;
			margin-bottom: 0px;
			clear: both;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
		}
		.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
			height: 45px;
			border: 1px solid #ddd;
			font-size: 16px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login input:hover,
		.panel-login input:focus {
			outline:none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-color: #ccc;
		}
		.btn-login {
			background-color: #59B2E0;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #59B2E6;
		}
		.btn-login:hover,
		.btn-login:focus {
			color: #fff;
			background-color: #53A3CD;
			border-color: #53A3CD;
		}
		.forgot-password {
			text-decoration: underline;
			color: #888;
		}
		.forgot-password:hover,
		.forgot-password:focus {
			text-decoration: underline;
			color: #666;
		}

		.btn-register {
			background-color: #1CB94E;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #1CB94A;
		}
		.btn-register:hover,
		.btn-register:focus {
			color: #fff;
			background-color: #1CA347;
			border-color: #1CA347;
		}

	</style>


  </head>

  <body class="nav-md" style="background: white;">


	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
						<div class="col-md-6 col-md-offset-3" style="margin-top: 2%;">
							<?= $this->session->flashdata('msg') ?>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<!-- <form id="login-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: block;"> -->
								<?= form_open('login/pelamar', ['style' => 'display:block;', 'id' => 'login-form']) ?>
                                	<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
											</div>
										</div>
									</div>

                                <?= form_close() ?>


								<!-- <form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;"> -->
								<?= form_open('registrasi', ['style' => 'display:none;', 'id' => 'register-form']) ?>
									<div class="form-group">
                                        <label for="Username">Username * <span class="text-danger">ingat username dan password untuk login</span></label>
                                        <input type="text" class="form-control" name="username" id="username" tabindex="1" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Password">Password *</label>
                                        <input type="password" class="form-control" name="password"  id="password" tabindex="2" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Nama">Nama *</label>
                                        <input type="text" class="form-control" name="nama" id="Nama" tabindex="3" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Email">Email *</label>
                                        <input type="text" class="form-control" name="email" id="Email" tabindex="4" required>
                                    </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="daftar" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Sign In">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	$(function() {

	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

	});

</script>

 <!-- Bootstrap Datepicker JavaScript -->
    <script src="<?= base_url('assets/datepicker') ?>/js/bootstrap-datepicker.min.js"></script>

    <!-- FastClick -->
    <script src="<?= base_url('assets') ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets') ?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets') ?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url('assets') ?>/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets') ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets') ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets') ?>/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets') ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets') ?>/build/js/custom.min.js"></script>
  </body>
</html>