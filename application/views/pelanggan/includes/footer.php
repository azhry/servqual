<!-- Footer -->
    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
        <div class="flex-w p-b-90">
            <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    Alamat
                </h4>

                <div>
                    <p class="s-text7 w-size27">
                        Jl. Rasyid Siddiq (Seberang Simpang Tugu KB) Kelurahan 7 Ulu, Kecamatan Seberang Ulu 1, Kota Palembang
                    </p>

                </div>
            </div>

            <!-- <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Categories
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Men
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Women
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Dresses
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Sunglasses
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Links
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Search
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            About Us
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Contact Us
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Returns
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Help
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    Newsletter
                </h4>

                <form>
                    <div class="effect1 w-size9">
                        <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                        <span class="effect1-line"></span>
                    </div>

                    <div class="w-size2 p-t-20">
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                            Subscribe
                        </button>
                    </div>

                </form>
            </div> -->
        </div>

        <div class="t-center p-l-15 p-r-15">
            <a href="https://www.facebook.com/Accessories-dan-Perlengkapan-290373584974195/?modal=admin_todo_tour">
                <i style="font-size: 30px;" class="fa fa-facebook"></i>
            </a>
            <!-- 
            <a href="#">
                <img class="h-size2" src="<?= base_url('assets/UserTemplate') ?>/images/icons/visa.png" alt="IMG-VISA">
            </a>

            <a href="#">
                <img class="h-size2" src="<?= base_url('assets/UserTemplate') ?>/images/icons/mastercard.png" alt="IMG-MASTERCARD">
            </a>

            <a href="#">
                <img class="h-size2" src="<?= base_url('assets/UserTemplate') ?>/images/icons/express.png" alt="IMG-EXPRESS">
            </a>

            <a href="#">
                <img class="h-size2" src="<?= base_url('assets/UserTemplate') ?>/images/icons/discover.png" alt="IMG-DISCOVER">
            </a> -->

            <div class="t-center s-text8 p-t-20">
                Copyright @2018 Baan Store Palembang
            </div>
        </div>
    </footer>



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>


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
                        window.open('<?= base_url('pelanggan/detail-barang') ?>/' + json[0].kode_barang, '_blank');
                  };
                  toastr.info(options.body);
                  localStorage.setItem( 'count', json.length );
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

<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        // $('.block2-btn-addcart').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //         swal(nameProduct, "is added to cart !", "success");
        //     });
        // });

        // $('.block2-btn-addwishlist').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //         swal(nameProduct, "is added to wishlist !", "success");
        //     });
        // });
    </script>

    <!-- Produk -->
<!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/daterangepicker/daterangepicker.js"></script>

<!--===============================================================================================-->
    <!-- <script type="text/javascript" src="<?= base_url('assets/usertemplate/') ?>vendor/noui/nouislider.min.js"></script> -->
    <!-- <script type="text/javascript">
        /*[ No ui ]
        ===========================================================*/
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [ 50, 200 ],
            connect: true,
            range: {
                'min': 50,
                'max': 200
            }
        });

        var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = Math.round(values[handle]) ;
        });
    </script> -->

<!--===============================================================================================-->
    <script src="<?= base_url('assets/usertemplate/') ?>js/main.js"></script>

</body>
</html>
