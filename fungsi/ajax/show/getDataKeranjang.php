<?php

try {
    require '../../../config.php';

    $id = $_GET['id_kasir'] ?? 0;
    
    $sql = "SELECT tp.*, tb.nama_barang as nama_barang, tb.merk as merk, tb.harga as harga_barang, tu.nm_member as nama_member 
    FROM penjualan tp
    LEFT JOIN barang tb ON tp.id_barang = tb.id_barang
    LEFT JOIN login tu ON tp.id_member = tu.id_member
    WHERE tp.id_member = $id
    ";
    
    $exec = $config->prepare($sql);
    $exec->execute();
    
    $datas = $exec->fetchAll(PDO::FETCH_ASSOC);

    $html = "";
    $inputValue = "";

    $total = 0;
    $no = 1;
    foreach ($datas  as $isi) {
        $html .= "
        <tr>
            <input type=\"hidden\" name='id_barang' value='".$isi['id_barang']."'>
            <td>$no</td>
            <td>". $isi['nama_barang'] ."-".$isi['merk']."</td>
            <td>
                <!-- aksi ke table penjualan -->
                <form method=\"POST\" action=\"fungsi/edit/edit.php?jual=jual\">
                    <input type=\"number\" onchange=\"updateKeranjang(this)\" name=\"jumlah\" data-id='".$isi['id_penjualan']."' value='".$isi['jumlah']."' class=\"form-control\">
                    
            </td>
            <td>Rp.".number_format($isi['total']).",-</td>
            <td>".$isi['nama_member'] ."</td>
            <td>
                </form>
                <!-- aksi ke table penjualan -->
                <a href=\"fungsi/hapus/hapus.php?jual=jual&id=".$isi['id_penjualan'] ."&brg=".$isi['id_barang']."
                    &jml=".$isi['jumlah']." \" class=\"btn btn-danger\"><i class=\"fa fa-times\"></i>
                </a>
            </td>
        </tr>
        ";
        

        $inputValue .= "
        <input type=\"hidden\" name=\"id_barang[]\" value='".$isi['id_barang']."'>
        <input type=\"hidden\" name=\"id_member[]\" value='".$isi['id_member']."'>
        <input type=\"hidden\" name=\"jumlah[]\" value='".$isi['jumlah']."'>
        <input type=\"hidden\" name=\"total1[]\" value='".$isi['total']."'>
        <input type=\"hidden\" name=\"tgl_input[]\" value='".$isi['tanggal_input']."'>
        <input type=\"hidden\" name=\"periode[]\" value='".date('m-Y')."'>
        ";

        $no++;
        $total += $isi['total'];
    }

    $data = [$html, $total, $inputValue];

    echo json_encode($data);
} catch (\Throwable $th) {
    echo json_encode([
        "message" => $th->getMessage(),
        "line" => $th->getLine(),
    ]);
}

// <input type=\"hidden\" name=\"id\" value='" . $isi['id_penjualan'] ."' class=\"form-control\">
//                     <input type=\"hidden\" name=\"id_barang\" value='" . $isi['id_barang'] ."' class=\"form-control\">