<?php if (isset($_GET['success-stok'])) { ?>
    <div class="alert alert-success">
        <p>Tambah Stok Berhasil !</p>
    </div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success">
        <p>Tambah Data Berhasil !</p>
    </div>
<?php } ?>
<?php if (isset($_GET['remove'])) { ?>
    <div class="alert alert-danger">
        <p>Hapus Data Berhasil !</p>
    </div>
<?php } ?>

<?php
$sql = " select * from barang where stok <= 3";
$row = $config->prepare($sql);
$row->execute();
$r = $row->rowCount();
if ($r > 0) {
    echo "
				<div class='alert alert-warning'>
					<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
					<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
				</div>
				";
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Barang</li>
        </ol>
        <div class="row">
            <!-- Trigger the modal with a button -->
            <div class="">
                <button type="button" class="btn btn-primary" style="background-color:#0096FF; color:black;" data-bs-toggle="modal" data-bs-target="#modal">
                    Insert Data
                </button>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- view barang -->

            <div class="card card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped " id="example1">

                        <thead>
                            <tr class="background-color:#FFFFF text-black lurus">
                                <th>No.</th>
                                <th>ID Barang</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Barcode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalBeli = 0;
                            $totalJual = 0;
                            $totalStok = 0;
                            if ($_GET['stok'] == 'yes') {
                                $hasil = $lihat->barang_stok();
                            } else {
                                $hasil = $lihat->barang();
                            }
                            $no = 1;
                            foreach ($hasil as $isi) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['id_barang']; ?></td>
                                    <td><?php echo $isi['nama_kategori']; ?></td>
                                    <td><?php echo $isi['nama_barang']; ?></td>
                                    <td><?php echo $isi['merk']; ?></td>
                                    <td>
                                        <?php if ($isi['stok'] == '0') { ?>     
                                            <button class="btn btn-danger"> Habis</button>
                                        <?php } else { ?>
                                            <?php echo $isi['stok']; ?>
                                        <?php } ?>
                                    </td>
                                    <td>Rp.<?php echo number_format($isi['harga']); ?>,-</td>
                                    <td> <?php echo $isi['satuan_barang']; ?></td>
                                    <td>
                                        <svg class="barcode" jsbarcode-format="CODE128" jsbarcode-value="<?= $isi['id_barang']; ?>" jsbarcode-textmargin="0" jsbarcode-fontoptions="bold"></svg>
                                        <!-- <div class="svg-div">
                                </div> -->
                                    </td>
                                    <td class="td-button">
                                        <?php if ($isi['stok'] <=  '3') { ?>
                                            <form method="POST" action="fungsi/edit/edit.php?stok=edit">
                                                <input type="text" name="restok" class="form-control">
                                                <input type="hidden" name="id" value="<?php echo $isi['id_barang']; ?>" class="form-control">
                                                <button class="btn btn-warning btn-sm">
                                                    Restok
                                                </button>
                                                <a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang']; ?>" onclick="javascript:return confirm('Hapus Data barang ?');">
                                                    <button class="btn btn-danger btn-sm">Hapus</button></a>
                                            </form>
                                        <?php } else { ?>

                                            <a href="index.php?page=barang/edit&barang=<?php echo $isi['id_barang']; ?>"><button class="btn btn-warning btn-xs">Edit</button></a>
                                            <a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang']; ?>" onclick="javascript:return confirm('Hapus Data barang ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                                        <?php } ?>
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
            <!-- end view barang -->
            <!-- tambah barang MODALS-->
            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel">Tambah Barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <table class="table table-striped bordered">
                                        <?php
                                        $format = $lihat->barang_id();
                                        ?>
                                        <tr>
                                            <td>ID Barang</td>
                                            <td><input type="text" readonly="readonly" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>
                                                <select name="kategori" class="form-control" required>
                                                    <option value="#">Pilih Kategori</option>
                                                    <?php $kat = $lihat->kategori();
                                                    foreach ($kat as $isi) {     ?>
                                                        <option value="<?php echo $isi['id_kategori']; ?>">
                                                            <?php echo $isi['nama_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                                        </tr>
                                        <tr>
                                            <td>Merk Barang</td>
                                            <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><input type="number" placeholder="Harga" required class="form-control" name="jual"></td>
                                        </tr>
                                        <tr>
                                            <td>Satuan Barang</td>
                                            <td>
                                                <select name="satuan" class="form-control" required>
                                                    <option value="#">Pilih Satuan</option>
                                                    <option value="PCS">PCS</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Input</td>
                                            <td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" style=" border-radius:0px;">
                        <div class="modal-header" style="background:#2b495f ;color:#fff;">
                            <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
                            <div class="modal-body">
                                <table class="table table-striped bordered">
                                    <?php
                                    $format = $lihat->barang_id();
                                    ?>
                                    <tr>
                                        <td>ID Barang</td>
                                        <td><input type="text" readonly="readonly" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>
                                            <select name="kategori" class="form-control" required>
                                                <option value="#">Pilih Kategori</option>
                                                <?php $kat = $lihat->kategori();
                                                foreach ($kat as $isi) {     ?>
                                                    <option value="<?php echo $isi['id_kategori']; ?>">
                                                        <?php echo $isi['nama_kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                                    </tr>
                                    <tr>
                                        <td>Merk Barang</td>
                                        <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td><input type="number" placeholder="Harga" required class="form-control" name="jual"></td>
                                    </tr>
                                    <tr>
                                        <td>Satuan Barang</td>
                                        <td>
                                            <select name="satuan" class="form-control" required>
                                                <option value="#">Pilih Satuan</option>
                                                <option value="PCS">PCS</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Input</td>
                                        <td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert
                                    Data</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<!-- 
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            
        </div>
    </div>
</main>


 -->