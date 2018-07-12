<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Kategori
						</h4>

						<ul class="p-b-54">
								<li class="p-t-4">
									<a href="<?= base_url('pelanggan/produk') ?>" class="s-text13 active1">
										Semua
									</a>
								</li>

							<?php foreach($kategori as $row): ?>
								<li class="p-t-4">
									<a href="<?= base_url('pelanggan/produk/'.$row->id_kategori_barang) ?>" class="s-text13">
										<?= $row->nama_kategori ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						
					<style type="text/css">
						.produk{
							width: 280px !important;
							height: 350px !important;
						}
						.produk img{
							width: 100% !important;
							height: 100% !important;
						}
					</style>

					<!-- Product -->
					<?php if(isset($barang2)): ?>
						<div class="row">
							<?php foreach($barang2 as $row): ?>
								<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative">
											<div class="produk">
												<img src="<?= base_url('assets/produk/'.$nama_kategori.'/'.$row->kode_barang.'.jpg') ?>" alt="IMG-PRODUCT" onerror="this.src = '<?= base_url('assets/UserTemplate/images/banner-01.jpg') ?>';">
											</div>

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" type="button" onclick="addToCart({ kode_barang: '<?= $row->kode_barang ?>', nama: '<?= $row->nama ?>', id_kategori: '<?= $row->id_kategori_barang ?>', deskripsi: '<?= str_replace('"', '', json_encode($row->deskripsi)) ?>', harga: '<?= $row->harga ?>' });">
														Add to Cart
													</button>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="<?= base_url('pelanggan/detail_barang/'.$row->kode_barang) ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $row->nama . ($row->jenis == 'Promo' ? '<i><small>(Promo)</small></i>' : '') ?> 
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= "IDR " . number_format($row->harga,2,',','.') ?>
											</span>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

					<?php else: ?>
						<div class="row">
							<?php foreach($barang as $row): ?>
							<?php $nama_kategori = $this->kategori_barang_m->get_row(['id_kategori_barang' => $row->id_kategori_barang])->nama_kategori; ?>

								<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative">
											<div class="produk">
												<img src="<?= base_url('assets/produk/'.$nama_kategori.'/'.$row->kode_barang.'.jpg') ?>" alt="IMG-PRODUCT" onerror="this.src = '<?= base_url('assets/UserTemplate/images/banner-01.jpg') ?>';">
											</div>

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" type="button" onclick="addToCart({ kode_barang: '<?= $row->kode_barang ?>', nama: '<?= $row->nama ?>', id_kategori: '<?= $row->id_kategori_barang ?>', deskripsi: '<?= str_replace('"', '', json_encode($row->deskripsi)) ?>', harga: '<?= $row->harga ?>' });">
														Add to Cart
													</button>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
												<?= $row->nama . ($row->jenis == 'Promo' ? '<i><small>(Promo)</small></i>' : '') ?> 
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= "IDR " . number_format($row->harga,2,',','.') ?> 
											</span>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

					<?php endif; ?>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		function addToCart(product) {
			console.log(product);
			$.ajax({
				url: '<?= base_url( 'pelanggan/add-to-cart' ) ?>',
	    		type: 'POST',
	    		data: {
	    			add_to_cart: true,
	    			id: product.kode_barang,
	    			qty: 1,
	    			price: product.harga,
	    			name: product.nama,
	    			description: product.deskripsi,
	    			id_kategori: product.id_kategori

	    		},
	    		success: (response) => {
	    			swal(product.nama, "is added to cart !", "success");
	    			var json = $.parseJSON(response);
	    			var total = $('#cart_subtotal_hidden_navbar').val();
	    			var assetUrl = '<?= base_url('assets') ?>';
	    			var badgeValue = $('#cart_badge_navbar').text();
	    			badgeValue = Number(badgeValue) + 1;
	    			$('#cart_badge_navbar').text(badgeValue);
	    			$('#cart_subtotal_hidden_navbar').val(total + (json.qty * json.price));

	    			$('#cart_item_navbar').append('<li class="header-cart-item">' +
                        '<div class="header-cart-item-img">' +
                            '<img src="' + assetUrl + '/produk/' + json.options.nama_kategori + '/' + json.id + '.jpg" alt="IMG">' +
                        '</div>' +
                        '<div class="header-cart-item-txt">' +
                                product.nama +
                            '<span class="header-cart-item-info">' +
                                json.qty + 'x' + convertToRupiah(Number(json.price)) +
                            '</span>' +
                        '</div>' +
                    '</li>');

                    $('#subtotal').text('Subtotal: ' + convertToRupiah(Number(total) + (json.qty * json.price)));
	    		},
	    		error: ( err ) => { console.log( err.responseText ); }
			});

			return false;
		}

		function convertToRupiah(angka) {
			var rupiah = '';		
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return 'IDR. '+rupiah.split('',rupiah.length-1).reverse().join('');
		}
	</script>