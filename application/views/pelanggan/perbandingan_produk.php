	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Perbandingan Produk
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<h5>Pilih dua produk yang ingin dibandingkan</h5>
			
			<select style="width: 30% !important;" class="form-control" name="produk_1" id="produk_1">
				<option>Pilih Produk 1</option>
				<?php foreach ( $semua_barang as $row ): ?>
					<option value="<?= $row->kode_barang ?>"><?= $row->nama ?></option>
				<?php endforeach; ?>
			</select>
			<select style="width: 30% !important;" class="form-control" name="produk_2" id="produk_2">
				<option>Pilih Produk 2</option>
				<?php foreach ( $semua_barang as $row ): ?>
					<option value="<?= $row->kode_barang ?>"><?= $row->nama ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<h4 id="nama-produk-1" class="product-detail-name m-text16 p-b-13">
					Produk 1
				</h4>

				<!-- Spek -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Kategori
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="kategori-produk-1" class="s-text8">
							
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Harga
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="harga-produk-1" class="s-text8">
							
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Deskripsi
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="deskripsi-produk-1" class="s-text8">
							
						</p>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 id="nama-produk-2" class="product-detail-name m-text16 p-b-13">
					Produk 2
				</h4>

				<!-- Spek -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Kategori
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="kategori-produk-2" class="s-text8">
							
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Harga
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="harga-produk-2" class="s-text8">
							
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Deskripsi
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="deskripsi-produk-2" class="s-text8">
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$( document ).ready(function() {

			$( '#produk_1' ).on('change', function() {

				$.ajax({
					url: '<?= base_url( 'pelanggan/perbandingan-produk' ) ?>',
					type: 'POST',
					data: {
						get_barang: true,
						kode_barang: $( this ).val()
					},
					success: function( response ) {

						let json = $.parseJSON( response );
						$( '#nama-produk-1' ).text( json.nama );
						$( '#kategori-produk-1' ).text( json.nama_kategori );
						$( '#harga-produk-1' ).text( convertToRupiah( json.harga ) );
						$( '#deskripsi-produk-1' ).html( json.deskripsi );

					},
					error: function( err ) { console.log( err.responseText ); }
				});

			});

			$( '#produk_2' ).on('change', function() {

				$.ajax({
					url: '<?= base_url( 'pelanggan/perbandingan-produk' ) ?>',
					type: 'POST',
					data: {
						get_barang: true,
						kode_barang: $( this ).val()
					},
					success: function( response ) {

						let json = $.parseJSON( response );
						$( '#nama-produk-2' ).text( json.nama );
						$( '#kategori-produk-2' ).text( json.nama_kategori );
						$( '#harga-produk-2' ).text( convertToRupiah( json.harga ) );
						$( '#deskripsi-produk-2' ).html( json.deskripsi );

					},
					error: function( err ) { console.log( err.responseText ); }
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