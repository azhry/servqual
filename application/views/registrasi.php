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
  </head>

  <body class="nav-md" style="background: white;">
        <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:5%;">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Selamat Datang di Website Pendaftaran Pelamar</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding: 3%;">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 style="color: blue; padding: 3%; text-align: center;">Daftar</h3>

                                <div style="padding: 3%;">
                                    <?= $this->session->flashdata('msg') ?>
                                </div>

                                <?= form_open('Registrasi') ?>
                                    <div class="form-group">
                                        <label for="Username">Username * <span class="text-danger">ingat username dan password untuk login</span></label>
                                        <input type="text" class="form-control" name="username" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Password">Password *</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Nama">Nama *</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="Email">Email *</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                    <input type="submit" name="daftar" value="Daftar" class="btn btn-lg btn-primary btn-block" style="margin-top: 5%;">
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>


<!-- footer content -->
        <footer>
          <div class="row" style="text-align: center;">
            <div class="col-md-8 col-md-offset-1">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
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