<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= base_url('') ?>" class="site_title"><i class="fa fa-paw"></i> <!-- <span>PT. Sumatera Prima Fibreboard</span> --></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= base_url('assets/admintemplate/production/') ?>images/img.jpg" alt="User" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $this->data['super_admin']->username ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                        <li>
                            <a href="<?= base_url('super_admin') ?>"><i class="fa fa-home"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/barang') ?>"><i class="fa fa-book"></i> Barang</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/kategori') ?>"><i class="fa fa-book"></i> Kategori</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/pemesanan') ?>"><i class="fa fa-cart-plus"></i> Pemesanan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/pengguna') ?>"><i class="fa fa-users"></i> Pengguna</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/daftar-admin') ?>"><i class="fa fa-users"></i> Daftar Admin</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/role') ?>"><i class="fa fa-book"></i> Role</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/pertanyaan') ?>"><i class="fa fa-edit"></i> Pertanyaan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('super_admin/jawaban') ?>"><i class="fa fa-edit"></i> Jawaban</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->
        </div>
    </div>