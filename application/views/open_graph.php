<!DOCTYPE html>
<html>
<head>
	<title>Baan Store</title>
	<meta property="og:title" content="<?= $title ?>" />
	<meta property="og:description" content="<?= $description ?>" />
	<meta property="og:url" content="<?= base_url('open-graph/index') . '/' . str_replace( '_', ' ', $option_id ) ?>">
	<meta property="og:image" content="<?= $img ?>" />
	<meta property="og:image:width" content="350" />
	<meta property="og:image:height" content="350" />
	<meta property="fb:app_id" content="2013042902347728" />
	<script> location.href = '<?= base_url( 'pelanggan/detail_barang/' . $barang->kode_barang ) ?>'; </script>
</head>
<body>

</body>
</html>