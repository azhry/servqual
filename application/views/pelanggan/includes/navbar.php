<!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="wrap_header">
                <!-- Logo -->
                <a href="index.html" class="logo">
                    <img src="<?= base_url('assets/usertemplate/') ?>images/icons/logo.png" alt="IMG-LOGO">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="<?= base_url() ?>">Home</a>
                            </li>

                            <li>
                                <a href="<?= base_url('pelanggan#featured-products') ?>">Featured Products</a>
                            </li>

                            <li>
                                <a href="<?= base_url('pelanggan/cart') ?>">Cart</a>
                            </li>

                            <li>
                               <a href="<?= base_url('pelanggan/perbandingan-produk') ?>">Perbandingan Produk</a>
                            </li>

                            <?php if (isset($logged_in) && $logged_in): ?>
                            <li>
                                <a href="<?= base_url('pelanggan/kritik-saran') ?>">Kritik & Saran</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <?php if(isset($username)): ?>
                                    <a href="<?= base_url('logout') ?>">Logout</a>
                                <?php else: ?>
                                    <a href="<?= base_url('login') ?>">Login</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">
                    <?php if(isset($id_pengguna)): ?>
                        <a href="<?= base_url('pelanggan/profile') ?>" class="header-wrapicon1 dis-block">
                            <img src="<?= base_url('assets/foto/'.$id_pengguna.'.jpg') ?>" onerror="src='<?= base_url("assets/usertemplate/") ?>images/icons/icon-header-01.png'" class="header-icon1" style="border-radius: 50%;">
                        </a>

                        <span class="linedivide1"></span>
                    <?php endif; ?>

                    <div class="header-wrapicon2">
                        <img src="<?= base_url('assets/usertemplate/') ?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti" id="cart_badge_navbar"><?= count( $this->cart->contents() ) ?></span>

                        <?php $totals = 0; ?>
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem" id="cart_item_navbar">
                                <?php foreach ( $this->cart->contents() as $items ): ?>
                                <?php  
                                    $nama_kategori = $this->kategori_barang_m->get_row(['id_kategori_barang' => $items['options']['id_kategori_barang']])->nama_kategori;
                                ?>
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?= base_url('assets/produk/'.$nama_kategori.'/'.$items['id'].'.jpg') ?>" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="<?= base_url( 'pelanggan/detail-barang/' . $items['id'] ) ?>" class="header-cart-item-name">
                                            <?= $items['name'] ?>
                                        </a>

                                        <span class="header-cart-item-info">
                                            <?= $items['qty'] ?> x <?= 'IDR ' . number_format($items['price'], 2, ',', '.') ?>
                                            <?php $totals += $items['qty'] * $items['price'] ?>
                                        </span>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <input type="hidden" id="cart_subtotal_hidden_navbar" value="<?= $totals ?>">
                            <div class="header-cart-total" id="subtotal">
                                Subtotal: <?= 'IDR ' . number_format($totals, 2, ',', '.') ?>
                            </div>
                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="<?= base_url( 'pelanggan/cart' ) ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <!-- <div class="wrap_header_mobile">
            <a href="index.html" class="logo-mobile">
                <img src="<?= base_url('assets/usertemplate/') ?>images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <div class="btn-show-menu">
                <div class="header-icons-mobile">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="<?= base_url('assets/usertemplate/') ?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    </a>

                    <span class="linedivide2"></span>

                    <div class="header-wrapicon2">
                        <img src="<?= base_url('assets/usertemplate/') ?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">0</span>

                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?= base_url('assets/usertemplate/') ?>images/item-cart-01.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            White Shirt With Pleat Detail Back
                                        </a>

                                        <span class="header-cart-item-info">
                                            1 x $19.00
                                        </span>
                                    </div>
                                </li>

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?= base_url('assets/usertemplate/') ?>images/item-cart-02.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            Converse All Star Hi Black Canvas
                                        </a>

                                        <span class="header-cart-item-info">
                                            1 x $39.00
                                        </span>
                                    </div>
                                </li>

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?= base_url('assets/usertemplate/') ?>images/item-cart-03.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            Nixon Porter Leather Watch In Tan
                                        </a>

                                        <span class="header-cart-item-info">
                                            1 x $17.00
                                        </span>
                                    </div>
                                </li>
                            </ul>

                            <div class="header-cart-total">
                                Total: $75.00
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
        </div> -->

        <!-- Menu Mobile -->
        <!-- <div class="wrap-side-menu" >
            <nav class="side-menu">
                <ul class="main-menu">
                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <span class="topbar-child1">
                            Free shipping for standard order over $100
                        </span>
                    </li>

                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <div class="topbar-child2-mobile">
                            <span class="topbar-email">
                                fashe@example.com
                            </span>

                            <div class="topbar-language rs1-select2">
                                <select class="selection-1" name="time">
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="item-topbar-mobile p-l-10">
                        <div class="topbar-social-mobile">
                            <a href="#" class="topbar-social-item fa fa-facebook"></a>
                            <a href="#" class="topbar-social-item fa fa-instagram"></a>
                            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                        </div>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Homepage V1</a></li>
                            <li><a href="home-02.html">Homepage V2</a></li>
                            <li><a href="home-03.html">Homepage V3</a></li>
                        </ul>
                        <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="product.html">Shop</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="product.html">Sale</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="cart.html">Features</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="blog.html">Blog</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="about.html">About</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </header>

    