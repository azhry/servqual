<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/toastr.css') ?>">
  <script type="text/javascript" src="<?= base_url('assets/toastr.js') ?>"></script>
  <script type="text/javascript">
    Notification.requestPermission().then(function(result) {
      if ( result == 'granted' ) {
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        
        if ( 'serviceWorker' in navigator ) {
          window.addEventListener('load', function() {
            navigator.serviceWorker.register( '<?= base_url( 'assets/service-worker.js' ) ?>' );
          });

          setInterval(function() {

            $.ajax({
              url: '<?= base_url('pelanggan/cek-barang') ?>',
              type: 'POST',
              data: {},
              success: function( response ) {

                let count = localStorage.getItem( 'count', 0 );
                let json = $.parseJSON( response );
                if ( count != json.length ) {
                  let options = {
                    body: 'Ada barang baru nih. Yuk cek web kita..',
                    icon: '<?= base_url('assets/UserTemplate/images/icons/favicon.png') ?>'
                  };
                  toastr.options.onclick = function(e) {  
                        window.open('<?= base_url('pelanggan/detail-barang') ?>/' + json[json.length - 1].kode_barang, '_blank');
                  };
                  toastr.info(options.body);
                  // var notification = new Notification( 'E-Commerce', options );
                  // localStorage.setItem( 'count', json.length );
                  // notification.onclick = function(event) {
                  //   event.preventDefault(); // prevent the browser from focusing the Notification's tab
                  //   window.open('<?= base_url('pelanggan/detail-barang') ?>/' + json[json.length - 1].kode_barang, '_blank');
                  // }
                  // setTimeout(notification.close.bind(notification), 5000); 
                }

              },
              error: function( err ) {
                console.log( err.responseText );
              }
            });

          }, 20000);
        }
      }
    });
  </script>

    <!-- DataTables -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Chart.js/dist/Chart.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/admintemplate') ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/admintemplate') ?>/build/js/custom.min.js"></script>
  </body>
</html>