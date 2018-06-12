	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Profile
		</span>
	</div>

	<div class="container">
		<?= form_open_multipart('Pelanggan/profile', ['class' => 'leave-comment']) ?>
			<div class="row">
				<div class="col-md-8">
					<h4 class="m-text26 p-b-36 p-t-15">
						Profile
					</h4>

					<div>
						<?= $this->session->flashdata('msg') ?>	
					</div>

					<label>Nama</label>
					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="<?= $profile->nama ?>" name="nama" required>
					</div>

					<label>Jenis Kelamin</label><br>
					<?php if($profile->jenis_kelamin == "Laki-Laki"): ?>
						<input type="radio" name="jenis_kelamin" value="Laki-Laki" checked> Laki-Laki <br>
						<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br> 
					<?php elseif($profile->jenis_kelamin == "Perempuan"): ?>
						<input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki <br>
						<input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan <br>
					<?php else: ?>
						<input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki <br>
						<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
					<?php endif; ?>
					<br>

					<label>Alamat</label>
					<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="alamat" required> <?= $profile->alamat ?></textarea>

					<label>Email</label>
					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" value="<?= $profile->email ?>" required>
					</div>

					<label>Nomor HP</label>
					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="no_hp" value="<?= $profile->no_hp ?>" required>
					</div>

					<div class="form-group">
						<label>Upload Foto</label> <br>
						<img src="<?= base_url('assets/foto/'.$profile->id_pengguna.'.jpg') ?>" width="200" height="250" onerror="src='<?= base_url("assets/pic.png") ?>'">
						<input type="file" name="foto" required>
					</div>

					<div class="w-size25" style="margin-top: 5%; margin-bottom: 5%;">
						<input type="submit" name="simpan" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Simpan">
					</div>
				</div>
			</div>
		</form>
	</div>
