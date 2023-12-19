<?php
require '../../../config.php';

$no = 1;
$bayar = 0;
$jumlah = 0;
$modal = 0;
$html = "";

$sql = "SELECT tp.*, tu.nm_member as nama_member FROM pembayaran tp
LEFT JOIN login tu ON tp.id_member = tu.id_member
";
$exec = $config->prepare($sql);
$exec->execute();

$datas = $exec->fetchAll(PDO::FETCH_ASSOC);

foreach ($datas as $isi) {
    $bayar += $isi['total'];
    $jumlah += $isi['jumlah'];
    $html .= "
        <tr>
            <td>$no</td>
            <td>".$isi['nama_member']."</td>
            <td>".$isi['id_user']."</td>
            <td>Rp.".number_format($isi['harga_byr'])."</td>
            <td>Rp.".number_format($isi['total'])."</td>
            <td>Rp.".number_format($isi['kembali'])."</td>
            <td>".$isi['tanggal_input']."</td>
            <td> <a href=\"print.php?id_pembayaran=".$isi['id']."\" target=\"_blank\">
                    <button class=\"btn btn-secondary\">
                        <i class=\"fa fa-print\"></i>Print
                    </button></a> </td>
        </tr>
    ";
    $no++;
}

echo json_encode([
    "status" => true,
    "data" => [$html]
]);