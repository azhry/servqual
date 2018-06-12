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
		<h2>Laporan Daftar Pengguna</h2>
	</div>

	<div style="margin-top: 60px;">
		<table style="width: 100%;">
			<tr>
				<th>Username</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Email</th>
				<th>Nomor</th>
				<th>Alamat</th>
			</tr>

			<?php foreach($data as $row): ?>
				<tr>
					<td style="text-align: center;"><?= $row->username ?></td>
					<td style="text-align: center;"><?= $row->nama ?></td>
					<td style="text-align: center;"><?= $row->jenis_kelamin ?></td>
					<td style="text-align: center;"><?= $row->email ?></td>
					<td style="text-align: center;"><?= $row->no_hp ?></td>
					<td style="text-align: justify;"><?= $row->alamat ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>