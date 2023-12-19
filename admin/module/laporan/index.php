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
							<a  style="padding-right:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
										<button class="btn btn-danger">RESET</button>
									</a>
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
						<tbody>
							<?php 
								$no=1; 
								if(!empty($_GET['cari'])){
									$periode = $_POST['bln'].'-'.$_POST['thn'];
									$no=1; 
									$jumlah = 0;
									$bayar = 0;
									$hasil = $lihat -> periode_jual($periode);
								}elseif(!empty($_GET['hari'])){
									$hari = $_POST['hari'];
									$no=1; 
									$jumlah = 0;
									$bayar = 0;
									$hasil = $lihat -> hari_jual($hari);
								}else{
									$hasil = $lihat -> jual();
								}
							?>
							<?php 
								$bayar = 0;
								$jumlah = 0;
								$modal = 0;
								foreach($hasil as $isi){ 
									$bayar += $isi['total'];
									$jumlah += $isi['jumlah'];
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $isi['id_member'];?></td>
								<td><?php echo $isi['id_user'];?></td>
								<td><?php echo $isi['harga_byr'];?> </td>
								<td>Rp.<?php echo number_format($isi['total']);?></td>
								<td><?php echo $isi['kembali'];?></td>
								<td><?php echo $isi['tanggal_input'];?></td>
								<td> <a href="print.php?nm_member=<?php echo $_SESSION['admin']['nm_member'];?>
									&bayar=<?php echo $bayar;?>&kembali=<?php echo $hitung;?>" target="_blank">
									<button class="btn btn-secondary">
										<i class="fa fa-print"></i>Print
									</button></a> </td>
							</tr>
							<?php $no++; }?>				
						</tbody>
					</table>
				</div>
			</div>
		</div>
     </div>
 </div>
	</div>						
</div>
     