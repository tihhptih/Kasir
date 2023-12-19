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

    foreach ($datas  as $isi) {
    }

    echo $html;
} catch (\Throwable $th) {
    echo json_encode([
        "message" => $th->getMessage(),
        "line" => $th->getLine(),
    ]);
}