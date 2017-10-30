<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Fuzzy</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('assets/') ?>images/img.jpg" alt="User" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Home </a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a href="#" onclick="pelamar()"><i class="fa fa-user fa-fw"></i> Daftar Pelamar</a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a href="?" onclick="ranking()"><i class="fa fa-bar-chart-o"></i> Ranking </a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <script type="text/javascript">
          function pelamar(){
            window.location = '<?= base_url('admin/daftar_pelamar') ?>';
          }
          function ranking(){
            window.location = '<?= base_url('admin/ranking') ?>';
          }
        </script>