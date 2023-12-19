 <?php 
	$bulan_tes =array(
		'01'=>"Januari",
		'02'=>"Februari",
		'03'=>"Maret",
		'04'=>"April",
		'05'=>"Mei",
		'06'=>"Juni",
		'07'=>"Juli",
		'08'=>"Agustus",
		'09'=>"September",
		'10'=>"Oktober",
		'11'=>"November",
		'12'=>"Desember"
	);
?>
<div class="row">
	<div class="col-md-12">
		<h4>
			<?php if(!empty($_GET['cari'])){ ?>
				Data Laporan Penjualan <?= $bulan_tes[$_POST['bln']];?> <?= $_POST['thn'];?>
				<?php }elseif(!empty($_GET['hari'])){?>
					Data Laporan Penjualan <?= $_POST['hari'];?>
					<?php }else{?>
						Data Laporan Penjualan <?= $bulan_tes[date('m')];?> <?= date('Y');?>
						<?php }?>
					</h4>
					<br />
					<div class="card">
						<div class="card-header">
							<!-- view barang -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered w-100 table-sm" id="example1">
											<thead>
												</a>
							<a  style="padding-right:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
							<button class="btn btn-danger">RESET</button>
							<tr style="background:#187bcd;color:#EEEDEA;">
								<th> ID</th>
								<th> ID Member</th>
								<th> ID User</th>
								<th> Harga Bayar</th>
								<th> Total</th>
								<th> Kembali</th>
								<th> Tanggal Input</th>
								<th> Aksi</th>
								<!-- <th style="width:10%`;"> Jumlah</th>
								<th style="width:10%;"> Total</th> -->
							</tr>
						</thead>
						<tbody id="result-laporan">
							<!-- ajax -->
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
     </div>
 </div>
	</div>						
</div>

<script>
	$(document).ready(() => {
		loadLaporan()
	});

	const loadLaporan = () => {
		$.ajax({
			type: "GET",
			url: "/kasir_tih/fungsi/ajax/show/getDataLaporan.php",
			success: (response) => {
				const ress = JSON.parse(response)
				console.log(ress)
				$("#result-laporan").html(ress.data[0])
			}
		});
	}
</script>