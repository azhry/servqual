      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/daftar-pelamar') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count"><?= count($pelamar) ?></div>
                    <h3>Pelamar</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/ranking-penilaian') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-graph"></i></div>
                    <div class="count"><?= count($hasil) ?></div>
                    <h3>Ranking</h3>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->