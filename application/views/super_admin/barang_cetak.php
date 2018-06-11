<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table,tr,td, th{border: 1px solid black; border-collapse: collapse;}
		th{padding: 10px;}
	</style>
</head>
<body style="padding: 5%;">
	<div style="text-align: center; border-bottom: 8px double black;">
		<h2>Laporan Daftar Barang</h2>
	</div>

	<div style="margin-top: 60px;">
		<table style="width: 100%;">
			<tr>
				<th>Nama</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Status</th>
				<th>Deskripsi</th>
			</tr>

			<?php foreach($data as $row): ?>
				<tr>
					<td style="text-align: center;"><?= $row->nama ?></td>
					<td style="text-align: center;"><?= $row->harga ?></td>
					<td style="text-align: center;"><?= $row->stok ?></td>
					<td style="text-align: center;"><?= $row->status ?></td>
					<td style="text-align: justify;"><?= $row->deskripsi ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>