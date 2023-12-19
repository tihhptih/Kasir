 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php
	$id = $_SESSION['admin']['id_member'];
	$hasil = $lihat->member_edit($id);
	?>
 <h4>Keranjang Penjualan</h4>
 <br>

 <div class="row">
 	<div class="col-sm-6">
 		<div class="card card-primary mb-3">
 			<div class="card-header bg-primary text-white">
 				<h5><i class="fa fa-list"></i> Menu Produk</h5>
 			</div>
 			<div class="card-footer">
 				<div class="table-responsive">
 					<table class="table table-bordered table-striped " id="example1">
 						<thead>
 							<tr class="bg-primary text-white">
 								<th>ID Barang</th>
 								<th>Nama Barang</th>
 								<th>Merk</th>
 								<th>Harga</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php

								if ($_GET['stok'] == 'yes') {
									$hasil = $lihat->barang_stok();
								} else {
									$hasil = $lihat->barang();
								}
								$no = 1;
								foreach ($hasil as $isi) {
								?>
 								<tr>
 									<td><?php echo $isi['id_barang']; ?></td>
 									<td><?php echo $isi['nama_barang']; ?></td>
 									<td><?php echo $isi['merk']; ?></td>
 									<td>Rp.<?php echo number_format($isi['harga']); ?>,-</td>
 									<td>
 										<a data-id="<?php echo $isi['id_barang']; ?>" class="btn btn-success btn-add-keranjang">
 											<i class="fa fa-shopping-cart"></i></a>
 									</td>
 								</tr>
 							<?php
									$no++;
									$totalJual += $isi['harga'] * $isi['stok'];
									$totalStok += $isi['stok'];
								}
								?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="col-sm-6">
 		<div class="card card-primary mb-3">
 			<div class="card-header bg-primary text-white">
 				<h5><i class="fa fa-shopping-cart"></i> Keranjang</h5>
 				<div class="float-right">
 					<!-- Button trigger modal -->
 					<button class="btn btn-warning" id="open-cam" class="btn btn-primary">Open Camera</button>
 					<a class="btn btn-danger" onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" href="fungsi/hapus/hapus.php?penjualan=jual">
 						<b>RESET KERANJANG</b></a>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
				 <table class="table table-bordered table-striped " id="example1">
 						<thead>
 							<tr class="bg-primary text-white" id="example1">
 								<td> No</td>
 								<td> Nama Barang</td>
 								<td style="width:12%;"> Jumlah</td>
 								<td style="width:20%;"> Total</td>
 								<td> Kasir</td>
 								<td> Aksi</td>
 							</tr>
 						</thead>
 						<tbody id="tbl-result-keranjang">
							<!-- ajax -->						
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="col-sm-12">
 		<div class="card card-primary">
 			<div class="card-header bg-primary text-white">
 				<h5><i class="fa fa-fw fa-users"></i> KASIR

 				</h5>
 			</div>
 			<div class="card-body">
 				<div id="keranjang" class="table-responsive">
 					<table class="table table-bordered">
 						<tr>
 							<td><b>Tanggal</b></td>
 							<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i"); ?>" name="tgl"></td>
 						</tr>
 					</table>
 					<br />
 					<?php $hasil = $lihat->jumlah(); ?>
 					<div id="kasirnya">
 						<table class="table table-stripped">
 							<!-- transaction -->
 							<!-- aksi ke table nota -->
 							<form method="POST" id="form-bayar" action="/kasir_tih/fungsi/ajax/bayar/index.php">
								<div id="wrap-input">

								</div>
 								<tr>
 									<td>Total Semua </td>
 									<td><input type="text" id="total-harga" readonly="readonly" class="form-control" name="total" value="<?php echo $total_bayar; ?>"></td>

 									<td>Bayar </td>
 									<td><input type="text" class="form-control" name="bayar" value="<?php echo $bayar; ?>"></td>
 									<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
										<div id="wrap-reset">

										</div>
 									</td></td>
 								</tr>
 							</form>
 							<!-- aksi ke table nota -->
 							<tr>
 								<td>Kembali</td>
 								<td><input type="text" id="kembalian" name="kembalian" class="form-control" value="<?php echo $hitung; ?>"></td>
 								<td></td>
 								<td>
								 <a target="_blank" id="link-print">
									<button class="btn btn-secondary">
										<i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
									</button></a>
 								</td>
 							</tr>
 						</table>
 						<br />
 						<br />
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
<!-- modal(scanner) -->
<dialog id="modal">
	<div style="width: 500px" id="reader"></div>
	<button onclick="document.getElementById('modal').close()" id="closeModalBtn">Close</button>
</dialog>

 <script defer>
	const btnOpen = document.getElementById("open-cam")
	const modal = document.getElementById('modal');
	const form = $("#form-bayar")

	form.on("submit", (e) => {
		e.preventDefault()
		$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: new FormData(form[0]),
			processData: false,
			contentType: false,
			success: (response) => {
				console.log("json", response)
				const res = JSON.parse(response)
				if(res.status){
					$("#wrap-reset").html(`
					<a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
 												<b>RESET</b></a>
					`)
					$("input[name='bayar']").attr("disabled", true);
					$("#kembalian").val(res.data);
					$("#link-print").attr("href", "print.php?id_pembayaran="+res.id_pembayaran);
				}else {
					$("#kembalian").val('');
					$("#link-print").removeAttr("href");
				}
			}
		});
	})
	$(".btn-add-keranjang").on("click", (e) => {
		e.preventDefault()
		const idBarang = $(e.currentTarget).data("id")
		console.log(idBarang)
		$.ajax({
			type: "GET",
			url: `fungsi/tambah/tambah.php?jual=jual&id=${idBarang}&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>`,
			success: (response) => {
				if(response)
				{
					loadKeranjang()
				}
			}
		});
	})
	const loadKeranjang = () => {
		$.ajax({
			type: "GET",
			url: "fungsi/ajax/show/getDataKeranjang.php?id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>",
			success: (response) => {
				const ress = JSON.parse(response)
				console.log(ress)
				$("#tbl-result-keranjang").html(ress[0])
				$("#total-harga").val(ress[1]);
				$("#form-bayar").html(ress[2])
			}
		});
	}
	const updateKeranjang = (input) => {
		const idPenjualan = $(input).data("id")
		const jumlah = $(input).val()

		if(jumlah < 1) $(input).val(1)
		$.ajax({
			type: "GET",
			url: `fungsi/ajax/update/updateDataKeranjang.php?id=${idPenjualan}&jumlah=${jumlah}`,
			success: (response) => {
			}
		});
	}
	const onScanSuccess = (decodedText, decodedResult) => {
		console.log(`Scan result: ${decodedText}`, decodedResult);
		$.ajax({
			type: "GET",
			url: `fungsi/tambah/tambah.php?jual=jual&id=${decodedResult.decodedText}&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>`,
			success: (response) => {
				if(response)
				{
					loadKeranjang()
				}
			}
		});
	}
	btnOpen.addEventListener("click", () => {
		modal.showModal()
		var html5QrcodeScanner = new Html5QrcodeScanner(
		"reader", { fps: 10, qrbox: 250 });
		html5QrcodeScanner.render(onScanSuccess);
	})
	loadKeranjang()
 </script>