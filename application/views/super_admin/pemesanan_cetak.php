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
		<h2>Laporan Daftar Pemesanan</h2>
	</div>

	<div style="margin-top: 60px;">
		<table style="width: 100%;">
			<tr>
				<th>Pengguna</th>
				<th>Nama Penerima</th>
				<th>Alamat Penerima</th>
				<th>Waktu Pemesanan</th>
				<th>Kode Barang</th>
				<th>Jumlah</th>
				<th>Ongkir</th>
				<th>Kurir</th>
				<th>Status</th>
			</tr>

			<?php foreach($data as $row): ?>
				<tr>
					<td style="text-align: center;"><?= $this->pengguna_m->get_row(['id_pengguna' => $row->id_pengguna])->nama ?></td>    
                    <td style="text-align: center;"><?= $row->nama_penerima ?></td>    
                    <td style="text-align: center;"><?= $row->alamat_penerima ?></td>
                    <td style="text-align: center;"><?= $row->waktu_pemesanan ?></td>    
                    <td style="text-align: center;"><?= $row->kode_barang ?></td>    
                    <td style="text-align: center;"><?= $row->qty ?></td>    
                    <td style="text-align: center;"><?= $row->ongkir ?></td>    
                    <td style="text-align: center;"><?= $row->kurir ?></td>    
                    <td style="text-align: center;"><?= $row->status ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>