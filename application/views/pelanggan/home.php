    <?php $msg = $this->session->flashdata('msg');  ?>
    <script type="text/javascript">
      $(document).ready(function() {
        <?php if (isset($msg)): ?>
          $("#msg-modal").modal();
        <?php endif; ?>
      });
    </script>

    <div class="modal fade" id="msg-modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Pesan</h4>
          </div>
          <div class="modal-body">
            <p><?= $msg ?></p>
          </div>
        </div>
      </div>
    </div> 

<!-- Slide1 -->
    <?php if (count($promo) > 0): ?>
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <?php for ($i = 0; $i < count($promo); $i++): ?>
                <div class="item-slick1 item<?= $i + 1 ?>-slick1" style="background-image: url(<?= base_url('assets/produk/' . str_replace(' ', '%20', $promo[$i]->nama_kategori) . '/' . $promo[$i]->kode_barang . '.JPG') ?>); background-size: cover;">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170" style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Promo
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            <?= $promo[$i]->nama ?>
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <a href="<?= base_url('pelanggan/detail-barang/' . $promo[$i]->kode_barang) ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>

<!-- Banner -->
  <section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= base_url('assets/produk/Accessories Gadget/1.jpg') ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="<?= base_url('pelanggan/produk/1') ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="text-align: center !important;">
                Accessories Gadget
              </a>
            </div>
          </div>

          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= base_url('assets/produk/Peralatan Dapur/11.jpg') ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="<?= base_url('pelanggan/produk/4') ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="text-align: center !important;">
                Peralatan Dapur
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= base_url('assets/produk/Mainan Anak/35.jpg') ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="<?= base_url('pelanggan/produk/3') ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="text-align: center !important;">
                Mainan Anak
              </a>
            </div>
          </div>

          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= base_url('assets/produk/Fashion/21.jpg') ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="<?= base_url('pelanggan/produk/2') ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="text-align: center !important;">
                Fashion
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= base_url('assets/produk/Peralatan Kecantikan/45.jpg') ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <a href="<?= base_url('pelanggan/produk/5') ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="text-align: center !important;">
                Peralatan Kecantikan
              </a>
            </div>
          </div>

          <!-- <div class="block2 wrap-pic-w pos-relative m-b-30">
            <img src="<?= base_url('assets/usertemplate/') ?>images/icons/bg-01.jpg" alt="IMG">

            <div class="block2-content sizefull ab-t-l flex-col-c-m">
              <h4 class="m-text4 t-center w-size3 p-b-8">
                Sign up & get 20% off
              </h4>

              <p class="t-center w-size4">
                Be the frist to know about the latest fashion news and get exclu-sive offers
              </p>

              <div class="w-size2 p-t-25">
                <a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                  Sign Up
                </a>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </section>

  <!-- New Product -->
  <section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
      <div class="sec-title p-b-60">
        <h3 class="m-text5 t-center" id="featured-products">
          Featured Products
        </h3>
      </div>

      <!-- Slide2 -->
      <div class="wrap-slick2">
        <div class="slick2">

         
            <?php foreach($barang as $row): ?>
            <a href="<?= base_url('pelanggan/detail-barang/'.$row->kode_barang) ?>" class="block2-name dis-block s-text3 p-b-5">
                <div class="item-slick2 p-l-15 p-r-15">
                <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img style="min-height: 360px;" src="<?= base_url('assets/produk/'. $row->nama_kategori . '/' . $row->kode_barang.'.jpg') ?>" onerror="this.src = '<?= base_url('assets/usertemplate/') ?>images/item-02.jpg'" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a> -->

                                <!-- <div class="block2-btn-addcart w-size1 trans-0-4">
                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                Add to Cart
                                </button>
                                </div> -->
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <p><?= $row->nama ?></p>

                            <span class="block2-price m-text6 p-r-5">
                            <?= "IDR " . number_format($row->harga,2,',','.') ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>

          
        </div>
      </div>

    </div>
  </section>

  <!-- New Product -->
  <!-- <section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
      <div class="sec-title p-b-60">
        <h3 class="m-text5 t-center">
          Products on Instagram
        </h3>
      </div>

      <div class="wrap-slick2">
        <div class="slick2">

         
            <?php foreach($barang as $row): ?>
            <a href="<?= base_url('pelanggan/detail-barang/'.$row->kode_barang) ?>" class="block2-name dis-block s-text3 p-b-5">
                <div class="item-slick2 p-l-15 p-r-15">
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img style="min-height: 360px;" src="<?= base_url('assets/barang/'.$row->kode_barang.'.jpg') ?>" onerror="this.src = '<?= base_url('assets/usertemplate/') ?>images/item-02.jpg'" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <p><?= $row->nama ?></p>

                            <span class="block2-price m-text6 p-r-5">
                            <?= "IDR " . number_format($row->harga,2,',','.') ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>

          
        </div>
      </div>

    </div>
  </section> -->

  