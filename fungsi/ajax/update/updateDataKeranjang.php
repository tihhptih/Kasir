<?php

try {
    require '../../../config.php';
    $id = $_GET['id'];
    $jml = $_GET['jumlah'];
    $sql = "UPDATE penjualan tp
    LEFT JOIN barang tb ON tb.id_barang = tp.id_barang
    SET tp.jumlah = tp.jumlah + $jml,
    tp.total =  tb.harga * $jml + tp.total
    WHERE tp.id_penjualan = $id
    ";
    
    $exec = $config->prepare($sql);
    $exec->execute();
    
    echo "ok";
} catch (\Throwable $th) {
    echo json_encode([
        "message" => $th->getMessage(),
        "line" => $th->getLine(),
    ]);
}