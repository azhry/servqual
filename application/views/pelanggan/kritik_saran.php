	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Kritik dan Saran
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<h5><strong>Kritik dan Saran</strong></h5>
			<div class="col-md-12">
				<?= $this->session->flashdata('msg') ?>
			</div>

			<?= form_open('pelanggan/kritik-saran') ?>
			
			<div class="col-md-12" style="margin-top: 5%;">
				<div class="form-group">
					<label for="kritik">Kritik</label>
					<textarea class="form-control" name="kritik"></textarea>
				</div>
				<div class="form-group">
					<label for="saran">Saran</label>
					<textarea class="form-control" name="saran"></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-success">
			</div>

			<?= form_close(); ?>
		</div>
	</div>