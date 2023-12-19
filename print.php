<?php 
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$hsl = $lihat -> getPenjualanByIdPembelian($_GET['id_pembayaran']);
	$detail = $lihat->detailPembayaran($_GET['id_pembayaran']);
	echo"<pre>";
	echo"</pre>";
?>
<html>
	<head>
		<title>Print</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p><?php echo $toko['nama_toko'];?></p>
						<p><?php echo $toko['alamat_toko'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Kasir : <?php  echo $detail['nama_member'];?></p>
					</center>
					<center>
					<table class="table table-bordered" border="1" cellspacing="0" cellpadding="5" style="width:50%;">
						<tr>
							<td>No.</td>
							<td>Barang</td>
							<td>Harga Barang</td>
							<td>Jumlah</td>
							<td>Total Barang</td>
						</tr>
						</center>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang']."-".$isi['merk'];?></td>
							<td>Rp. <?php echo number_format($isi['harga_brg']);?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td>Rp. <?php echo number_format($isi['total']);?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
					<br>
						Total Barang : Rp.<?php echo number_format($detail['total']);?>,-
						<br/>
						Bayar : Rp.<?php echo number_format($detail['harga_byr']);?>,-
						<br/>
						Kembali : Rp.<?php echo number_format($detail['kembali']);?>,-
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Terima Kasih Telah berbelanja di toko Rajawali Digital Printing^^</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
