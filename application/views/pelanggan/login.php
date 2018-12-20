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

		<title>Login | Pelanggan</title>

		<style type="text/css">
			/*
			/* Created by Filipe Pina
			 * Specific styles of signin, register, component
			 */
			/*
			 * General styles
			 */
			#playground-container {
			    height: 500px;
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
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=535486653563191&autoLogAppEvents=1';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
			window.fbAsyncInit = function() {
		      FB.init({
		        appId      : '535486653563191',
		        xfbml      : true,
		        version    : 'v2.5'
		      });

		      FB.ui({
			   method: 'feed',
			   name: 'This is the content of the "name" field.',
			   link: 'https://servqual.azurewebsites.net',
			   caption: 'insightful thought provoking caption.',
			   description: 'interresting".',
			   message: 'hehehe',
			   to: '197717970696189'
			 });
		    };
		</script>
		<div class="container">
			<div class="row main">

				<div id="login" style="padding: 12%;">
					<div class="main-login main-center">
						<center><h4>Login Pelanggan</h4></center>
							
						<div><?= $this->session->flashdata('msg') ?></div>
						<?= form_open('login') ?>

							<div class="form-group">
								<label for="username" class="cols-sm-2 control-label">Username</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="cols-sm-2 control-label">Password</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
									</div>
								</div>
							</div>
							<div class="form-group ">
								<input type="submit" name="login" class="btn btn-primary btn-lg btn-block login-button" id="button" value="Login">
								<center><h5>Belum ada akun ? klik <a href="<?= base_url('register') ?>" style="color: white;"><strong>registrasi!</strong></a></h5></center>
							</div>
							
						</form>
						<!-- <div class="fb-share-button" data-href="https://www.facebook.com/pudinglab/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/pudinglab/" class="fb-xfbml-parse-ignore">Share</a></div> -->
					</div>
				</div> <!-- End Login -->

			</div>
		</div>
	
	</body>

	<script type="text/javascript">
		
	</script>
</html>