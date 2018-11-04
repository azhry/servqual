	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			<?= $kategori->nama_kategori ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?= $barang->nama ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?= base_url('assets/produk/'.$kategori->nama_kategori.'/'.$barang->kode_barang.'.jpg') ?>">
							<div class="wrap-pic-w">
								<img style="min-height: 400px;" src="<?= base_url('assets/produk/'.$kategori->nama_kategori.'/'.$barang->kode_barang.'.jpg') ?>" onerror = "this.src = '<?= base_url('assets/usertemplate/') ?>images/product-detail-01.jpg' " alt="IMG-PRODUCT">
							</div>
						</div>

						<!-- <div class="item-slick3" data-thumb="<?= base_url('assets/usertemplate/') ?>images/thumb-item-02.jpg">
							<div class="wrap-pic-w">
								<img style="min-height: 400px;" src="" onerror = "this.src = '<?= base_url('assets/usertemplate/') ?>images/product-detail-02.jpg' " alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="<?= base_url('assets/usertemplate/') ?>images/thumb-item-03.jpg">
							<div class="wrap-pic-w">
								<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $barang->nama ?>
				</h4>

				<span class="m-text17" id="price">
					<?= "IDR " . number_format($barang->harga,2,',','.') ?>
				</span>

				<!--  -->
				<div class="p-t-13 p-b-60">
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1" id="qty" onchange="updatePriceQty( this );">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button id="add-to-cart-button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?= base_url('open-graph/index/' . $kode_barang) ?>'),'facebook-share-dialog','width=626,height=436');">
								Share
							</button>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Kode Produk: <?= $barang->kode_barang ?></span>
					<span class="s-text8">Kategori: <?php 
						$kategori = $this->kategori_barang_m->get_row([ 'id_kategori_barang' => $barang->id_kategori_barang ]);
						echo isset( $kategori ) ? $kategori->nama_kategori : '';
					?></span>
				</div>

				<!--  -->

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Stock
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= $barang->stok ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= nl2br($barang->deskripsi) ?>
						</p>
					</div>
				</div>

				<!-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div> -->
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php foreach($semua_barang as $row): ?>
				<a href="<?= base_url('pelanggan/detail-barang/'.$row->kode_barang) ?>" class="block2-name dis-block s-text3 p-b-5">
		          <div class="item-slick2 p-l-15 p-r-15">
		            <div class="block2">
		              <div class="block2-img wrap-pic-w of-hidden pos-relative">
		                <img style="min-height: 360px;" src="<?= base_url('assets/produk/'.$row->nama_kategori . '/' . $row->kode_barang . '.JPG') ?>" onerror="this.src = '<?= base_url('assets/usertemplate/') ?>images/item-02.jpg'" alt="IMG-PRODUCT">

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
	</section>

	<script type="text/javascript">
		$( document ).ready(() => {
			/*[ +/- num product ]
		    ===========================================================*/
		    $('.btn-num-product-down').on('click', function(e){
		        e.preventDefault();
		        var numProduct = Number($(this).next().val());
		        if(numProduct > 1) $(this).next().val(numProduct - 1);
		        $( '#price' ).text( convertToRupiah($(this).next().val() * <?= $barang->harga ?> ) );
		    });

		    $('.btn-num-product-up').on('click', function(e){
		        e.preventDefault();
		        var numProduct = Number($(this).prev().val());
		        $(this).prev().val(numProduct + 1);
		        $( '#price' ).text( convertToRupiah($(this).prev().val() * <?= $barang->harga ?> ) );
		    });

		    $( '#add-to-cart-button' ).on('click', () => {
		    	$.ajax({
		    		url: '<?= base_url( 'pelanggan/add-to-cart' ) ?>',
		    		type: 'POST',
		    		data: {
		    			add_to_cart: true,
		    			id: '<?= $barang->kode_barang ?>',
		    			qty: $( '#qty' ).val(),
		    			price: '<?= $barang->harga ?>',
		    			name: '<?= $barang->nama ?>',
		    			description: '<?= json_encode($barang->deskripsi) ?>',
		    			id_kategori: '<?= $barang->id_kategori_barang ?>'

		    		},
		    		success: ( response ) => {
		    			swal('<?= $barang->nama ?>', "is added to cart !", "success");
		    		},
		    		error: ( err ) => { console.log( err.responseText ); }
		    	});
		    });

		});

		function convertToRupiah(angka) {
			var rupiah = '';		
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return 'IDR '+rupiah.split('',rupiah.length-1).reverse().join('');
		}
	</script>