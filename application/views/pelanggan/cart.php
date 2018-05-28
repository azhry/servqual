<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url('assets/usertemplate/') ?>images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<?php  
					$cart_success = $this->session->flashdata( 'cart_success' );
					if ( isset( $cart_success ) ):
				?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="alert-heading">
						Checkout berhasil
					</h4>
					<p><?= $cart_success ?></p>
				</div>
				<?php endif; ?>
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>

						<?php if ( count( $this->cart->contents() ) > 0 ): ?>
							<?php $subtotal = 0; foreach ( $this->cart->contents() as $items ): ?>
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="<?= base_url('assets/barang/' . $items['id'] . '.jpg') ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2"><?= $items['name'] ?></td>
								<td class="column-3"><?= 'IDR ' . number_format($items['price'], 2, ',', '.') ?></td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button onclick="changeQty( '<?= $items['rowid'] ?>', 'down', <?= $items['price'] ?> );" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" id="<?= 'qty-' . $items['rowid'] ?>"  value="<?= $items['qty'] ?>">

										<button onclick="changeQty( '<?= $items['rowid'] ?>', 'up', <?= $items['price'] ?> );" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td class="column-5" id="<?= 'price-' . $items['rowid'] ?>"><?= 'IDR ' . number_format($items['price'] * $items['qty'], 2, ',', '.') ?></td>
							</tr>
							<?php $subtotal += $items['qty'] * $items['price']; endforeach; ?>
						<?php else: ?>
							<tr class="table-row">
								<td colspan="5">
									Anda belum berbelanja. Silahkan klik <a href="<?= base_url( 'pelanggan#featured-products' ) ?>" style="text-decoration: underline;">disini</a> untuk melihat daftar produk
								</td>
							</tr>
						<?php endif; ?>

					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<!-- <div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div> -->
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm" id="subtotal-price">
						<?= 'IDR ' . number_format($subtotal, 2, ',', '.') ?>
					</span>
				</div>

				<?php if ( $logged_in ): ?>
					
					<?= form_open( 'pelanggan/cart' ) ?>

						<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
							<span class="s-text18 w-size19 w-full-sm">
								Customer Information:
							</span>
							<div class="w-size20 w-full-sm">
								<input class="form-control" style="border: 1px solid rgba(0, 0, 0, 0.2) !important;" placeholder="Recipient's name" name="nama_penerima" type="text"><br>
								<textarea class="form-control" placeholder="Recipient's address" name="alamat_penerima" rows="4"></textarea>
							</div>
						</div>

						<div class="flex-w flex-sb bo10 p-t-15 p-b-20">

							<span class="s-text18 w-size19 w-full-sm">
								Shipping:
							</span>

							<div class="w-size20 w-full-sm">

								<select class="form-control" id="provinsi" name="provinsi">
									<option>Choose Province</option>
									<?php foreach ( $provinsi as $row ): ?>
										<option value="<?= $row->province_id ?>"><?= $row->province ?></option>
									<?php endforeach; ?>
								</select>

								<div id="city_container">
									<select class="form-control" id="kota" name="kota">
										<option>Choose City</option>
									</select>
								</div>

								<select class="form-control" id="kurir" name="kurir">
									<option>Choose Shipping Agent</option>
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS</option>
								</select>

								<input type="hidden" name="shipping-cost-hidden" id="shipping-cost-hidden" value="0">
								<span class="m-text21 w-size20 w-full-sm" id="shipping-cost">
									IDR 0
								</span>
							</div>
						</div>

						<div class="flex-w flex-sb-m p-t-26 p-b-30">
							<span class="m-text22 w-size19 w-full-sm">
								Total:
							</span>

							<span class="m-text21 w-size20 w-full-sm" id="total-price">
								<?= 'IDR ' . number_format($subtotal, 2, ',', '.') ?>
							</span>
						</div>

						<div class="size15 trans-0-4">
							<button type="submit" value="Checkout" name="checkout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Proceed to Checkout
							</button>
						</div>
					<?= form_close() ?>
					
				<?php else: ?>
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<p>Untuk melakukan <i>checkout</i>, anda harus <a href="<?= base_url( 'login' ) ?>"><u>login</u></a> terlebih dahulu</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		$( document ).ready(() => {
			updateTotal();
			$( '#provinsi' ).change(function () {

				let province_id = $( this ).val();
				$.ajax({
					url: '<?= base_url( 'pelanggan/cart' ) ?>',
					type: 'POST',
					data: {
						get_city: true,
						province_id: province_id
					},
					success: ( response ) => {

						let json = $.parseJSON( response );
						let html = '<select class="form-control" id="kota" name="kota">' +
							'<option>Choose City</option>';
							
						let cities = json.rajaongkir.results;
						for ( let i = 0; i < cities.length; i++ ) {
							html += '<option value="' + cities[i].city_id + '">' + cities[i].city_name + '</option>';
						}

						html += '</select>';
						$( '#city_container' ).html( html );

						$( '#kota' ).change(function() {
							
							let city_id = $( this ).val();
							$.ajax({
								url: '<?= base_url( 'pelanggan/cart' ) ?>',
								type: 'POST',
								data: {
									get_shipping_cost: true,
									city_id: city_id,
									shipping_agent: $( '#kurir' ).val()
								},
								success: ( res ) => {

									let json = $.parseJSON( res );
									if ( json.rajaongkir.status.code == 200 ) {
										let cost = json.rajaongkir.results[0].costs[0].cost[0].value;
										$( '#shipping-cost' ).text( convertToRupiah( cost ) );
										$( '#shipping-cost-hidden' ).val( cost );
										updateTotal();
									}
								},
								error: ( err ) => { console.log( err.responseText ); }
							});

						});

						$( '#kurir' ).change(function() {

							let shipping_agent = $( this ).val();
							$.ajax({
								url: '<?= base_url( 'pelanggan/cart' ) ?>',
								type: 'POST',
								data: {
									get_shipping_cost: true,
									city_id: $( '#kota' ).val() ,
									shipping_agent: shipping_agent
								},
								success: ( res ) => {
									let json = $.parseJSON( res );
									if ( json.rajaongkir.status.code == 200 ) {
										let cost = json.rajaongkir.results[0].costs[0].cost[0].value;
										$( '#shipping-cost' ).text( convertToRupiah( cost ) );
										$( '#shipping-cost-hidden' ).val( cost );
										updateTotal();
									}
								},
								error: ( err ) => { console.log( err.responseText ); }
							});

						});

					},
					error: ( e ) => { console.log( e.responseText ); }
				});
			});
		});

		function changeQty( rowid, type, price ) {

			var numProduct = Number( $( '#qty-' + rowid ).val() );
			
			if ( type == 'up' ) {
				numProduct++;
			} else if ( type == 'down' ) {
				if ( numProduct > 1 ) numProduct--;
			}

			$( '#qty-' + rowid ).val( numProduct );
			$( '#price-' + rowid ).text( convertToRupiah( price * numProduct ) );

			$.ajax({
				url: '<?= base_url('pelanggan/update-cart') ?>',
				type: 'POST',
				data: {
					update_cart: true,
					rowid: rowid,
					qty: numProduct
				},
				success: ( response ) => {},
				error: ( err ) => { console.log( err.responseText ); }
			});

			updateTotal();

		}

		function updateTotal() {

			var total = 0;
			<?php foreach ( $this->cart->contents() as $items ): ?>
				total += Number( $( '#qty-<?= $items['rowid'] ?>' ).val() ) * <?= $items['price'] ?>;
			<?php endforeach; ?>
			$( '#subtotal-price' ).text( convertToRupiah( total ) );
			$( '#total-price' ).text( convertToRupiah( total + Number($( '#shipping-cost-hidden' ).val()) ) );

		}

		function convertToRupiah(angka) {
			var rupiah = '';		
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return 'IDR '+rupiah.split('',rupiah.length-1).reverse().join('');
		}
	</script>