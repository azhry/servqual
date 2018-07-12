	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Histori Pemesanan
		</span>
	</div>

	<div class="container">
		<?= $this->session->flashdata('msg') ?>
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Penerima</th>
					<th>Alamat Penerima</th>
					<th>Status Pembayaran</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; foreach ($pemesanan as $row): ?>
					<tr>
						<td><?= ++$i ?></td>
						<td><?= $row->nama_penerima ?></td>
						<td><?= $row->alamat_penerima ?></td>
						<td><?= $row->status ?></td>
						<td>
							<?= form_open_multipart('pelanggan/histori-pemesanan') ?>
								<input type="file" style="display: none;" id="bukti-<?= $row->id_pemesanan ?>" name="bukti_pembayaran" accept="image/*">
								<input type="hidden" name="upload" value="<?= $row->id_pemesanan ?>">
								<button type="button" class="btn btn-primary" id="upload-btn-<?= $row->id_pemesanan ?>">Upload Bukti Pembayaran</button>
								<script type="text/javascript">
									$(document).ready(function() {
										$('#upload-btn-<?= $row->id_pemesanan ?>').on('click', function() {
											$('#bukti-<?= $row->id_pemesanan ?>').click();
										});
										$('#bukti-<?= $row->id_pemesanan ?>').on('change', function() {
											$(this).parent().submit();
										});
									});
								</script>
							<?= form_close() ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
