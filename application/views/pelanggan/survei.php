	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Survei
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<h5><strong>Survei</strong></h5>
			<div class="col-md-12" style="margin-top: 5%;">
				<ol>
					<?php foreach($pertanyaan as $row): ?>
						<li><?= $row->pertanyaan ?></li>
						<?php $jawaban = $this->jawaban_m->get(['id_pertanyaan' => $row->id_pertanyaan]); ?>
						<div class="form-group">
							<?php foreach($jawaban as $col): ?>
								<input type="radio" name="pertanyaan_<?= $row->id_pertanyaan ?>" value="<?= $col->skor ?>"> <?= $col->jawaban ?> <br>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</div>