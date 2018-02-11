<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Bootstrap -->
    	<link href="<?= base_url('assets/admintemplate') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	    <!-- Font Awesome -->
	    <link href="<?= base_url('assets/admintemplate') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	    <!-- Bootstrap -->
    	<script src="<?= base_url('assets/admintemplate') ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>	    

		<title>Registrasi | Pelanggan</title>

		<style type="text/css">
			/*
			/* Created by Filipe Pina
			 * Specific styles of signin, register, component
			 */
			/*
			 * General styles
			 */
			#playground-container {
			    height: 600px;
			    overflow: hidden !important;
			    -webkit-overflow-scrolling: touch;
			}
			body, html{
			     height: 100%;
			 	background-repeat: no-repeat;
			 	background:url(https://i.ytimg.com/vi/4kfXjatgeEU/maxresdefault.jpg);
			 	font-family: 'Oxygen', sans-serif;
				    background-size: cover;
			}

			.main{
			 	margin:50px 15px;
			}

			h1.title { 
				font-size: 50px;
				font-family: 'Passion One', cursive; 
				font-weight: 400; 
			}

			hr{
				width: 10%;
				color: #fff;
			}

			.form-group{
				margin-bottom: 15px;
			}

			label{
				margin-bottom: 15px;
			}

			input,
			input::-webkit-input-placeholder {
			    font-size: 11px;
			    padding-top: 3px;
			}

			.main-login{
			 	background-color: #fff;
			    /* shadows and rounded borders */
			    -moz-border-radius: 2px;
			    -webkit-border-radius: 2px;
			    border-radius: 2px;
			    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

			}
			.form-control {
			    height: auto!important;
			padding: 8px 12px !important;
			}
			.input-group {
			    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
			    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
			    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
			}
			#button {
			    border: 1px solid #ccc;
			    margin-top: 28px;
			    padding: 6px 12px;
			    color: #666;
			    text-shadow: 0 1px #fff;
			    cursor: pointer;
			    -moz-border-radius: 3px 3px;
			    -webkit-border-radius: 3px 3px;
			    border-radius: 3px 3px;
			    -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
			    -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
			    box-shadow: 0 1px #fff inset, 0 1px #ddd;
			    background: #f5f5f5;
			    background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
			    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
			    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
			    background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
			    background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
			    background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
			    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
			}
			.main-center{
			 	margin-top: 30px;
			 	margin: 0 auto;
			 	max-width: 400px;
			    padding: 10px 40px;
				background:#009edf;
				    color: #FFF;
			    text-shadow: none;
				-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
			-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
			box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

			}
			span.input-group-addon i {
			    color: #009edf;
			    font-size: 17px;
			}

			.login-button{
				margin-top: 5px;
			}

			.login-register{
				font-size: 11px;
				text-align: center;
			}

		</style>

	</head>
	<body>
		<div class="container" style="max-height: 800px !important;">
			<div class="row main" >

				<div id="register">
					<div class="main-login main-center">
						<center><h4>Register</h4></center>
						<div><?= $this->session->flashdata('msg') ?></div>
						<?= form_open('register') ?>
							
							<div class="form-group">
								<label for="username" class="cols-sm-2 control-label">Username</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="username" id="username"  placeholder="Masukkan Username"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="cols-sm-2 control-label">Password</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control" name="password1" id="password"  placeholder="Masukkan Password"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="confirm" class="cols-sm-2 control-label">Konfirmasi Password</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control" name="password2" id="confirm"  placeholder="Konfirmasi Password"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="Nama" class="cols-sm-2 control-label">Nama</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="nama" id="Nama"  placeholder="Masukkan Nama"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="Jenis Kelamin" class="cols-sm-2 control-label">Jenis Kelamin</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki <br>
										<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="cols-sm-2 control-label">Email</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="email" id="email"  placeholder="Masukkan Email"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="Nomor HP" class="cols-sm-2 control-label">Nomor HP</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="no_hp" id="no_hp"  placeholder="Masukkan Nomor HP"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="Alamat" class="cols-sm-2 control-label">Alamat</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
										<textarea class="form-control" name="alamat"></textarea>
									</div>
								</div>
							</div>

							<div class="form-group ">
								<input type="submit" name="register" class="btn btn-primary btn-lg btn-block login-button" id="button" value="Register">
								<center><h5>Sudah ada akun ? klik <a href="<?= base_url('login') ?>" style="color: white;"><strong>login!</strong></a></h5></center>
							</div>
							
						</form>
					</div>
				</div> <!-- End Regsiter -->

			</div>
		</div>
	
	</body>
</html>