<?php
// proses bayar dan ke nota
require '../../../config.php';
$total = $_POST['total'];
$bayar = $_POST['bayar'];

function getId()
{
    return date("Ymd")."".time();
}

if (!empty($bayar)) {
    $hitung = $bayar - $total;
    if ($bayar >= $total) {
        $id_member = $_POST['id_member'][0];
        $id_user = intval(getId());

        // pembyrn
        $data_pembayaran = [
            "id_member" => $id_member,
            "id_user" => $id_user, 
            "harga_byr" => $bayar,
            "total" => $total,
            "kembali" => $hitung,
            "tanggal_input" => $_POST['tgl_input'][0]
        ];

        $query_pembayaran = "INSERT INTO pembayaran (id_member, id_user, harga_byr, total, kembali, tanggal_input) VALUE (:id_member, :id_user, :harga_byr, :total, :kembali, :tanggal_input)";
        $exec = $config->prepare($query_pembayaran);
        $exec->execute($data_pembayaran);
        $id_pembayaran = $config->lastInsertId();

        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total1'];
        $tgl_input = $_POST['tgl_input'];
        $periode = $_POST['periode'];
        $jumlah_dipilih = count($id_barang);

        for ($x = 0; $x < $jumlah_dipilih; $x++) {

            $d = array($id_pembayaran,$id_barang[$x], $id_member[$x], $jumlah[$x], $total[$x], $tgl_input[$x], $periode[$x]);
            $sql = "INSERT INTO nota (id_pembayaran, id_barang,id_member,jumlah,total,tanggal_input,periode) VALUES(?,?,?,?,?,?,?)";
            $row = $config->prepare($sql);
            $row->execute($d);

            // ubah stok barang
            $sql_barang = "SELECT * FROM barang WHERE id_barang = ?";
            $row_barang = $config->prepare($sql_barang);
            $row_barang->execute(array($id_barang[$x]));
            $hsl = $row_barang->fetch();

            $stok = $hsl['stok'];
            $idb  = $hsl['id_barang'];

            $total_stok = $stok - $jumlah[$x];
            // echo $total_stok;
            $sql_stok = "UPDATE barang SET stok = ? WHERE id_barang = ?";
            $row_stok = $config->prepare($sql_stok);
            $row_stok->execute(array($total_stok, $idb));
        }
        // echo '<script>alert("Belanjaan Berhasil Di Bayar !");</script>';
        echo json_encode([
            "status" => true,
            "id_pembayaran" => $id_pembayaran,
            "data" => $hitung
        ]);
    } else {
        // echo "Uang Kurang ! Rp.$hitung";
        echo json_encode([
            "status" => false,
            "message" => "Uang Kurang ! Rp.$hitung"
        ]);
        // echo '<script>alert("Uang Kurang ! Rp.' . $hitung . '");</script>';
    }
}
