      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <hr>
            <div class="row top_tiles">
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super_admin/barang') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="count"><?= count($barang) ?></div>
                    <h3>Barang</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super_admin/kategori') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="count"><?= count($kategori_barang) ?></div>
                    <h3>Kategori Barang</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super_admin/pengguna') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="count"><?= count($pengguna) ?></div>
                    <h3>Pengguna</h3>
                  </div>
                </a>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super_admin/role') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="count"><?= count($role) ?></div>
                    <h3>Role</h3>
                  </div>
                </a>
              </div>
            </div>

            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super_admin/pemesanan') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cart-plus"></i></div>
                    <div class="count"><?= count($pemesanan) ?></div>
                    <h3>Pemesanan</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super-admin/promo') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-dollar"></i></div>
                    <div class="count"><?= count($promo) ?></div>
                    <h3>Promo</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super-admin/pertanyaan') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-edit"></i></div>
                    <div class="count"><?= count($pertanyaan) ?></div>
                    <h3>Pertanyaan</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super-admin/jawaban') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-edit"></i></div>
                    <div class="count"><?= count($jawaban) ?></div>
                    <h3>Jawaban</h3>
                  </div>
                </a>
              </div>
            </div>

            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('super-admin/kritik-saran') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-edit"></i></div>
                    <div class="count"><?= count($kritik_saran) ?></div>
                    <h3>Kritik & Saran</h3>
                  </div>
                </a>
              </div>
            </div>
              
          </div>
        </div>
        <!-- /page content -->