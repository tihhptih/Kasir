<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $nama= $_POST['kategori'];
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['barang'])) {

        $data = [
            $_POST['id'],
            $_POST['kategori'],
            $_POST['nama'],
            $_POST['merk'],
            $_POST['jual'],
            $_POST['satuan'],
            $_POST['stok'],
            $_POST['tgl']
        ];

        $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }
    
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        if ($hsl['stok'] > 0) {
            $kasir =  $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga'];
            $tgl = date("j F Y, G:i");

            $data1[] = $id;
            $data1[] = $kasir;
            $data1[] = $jumlah;
            $data1[] = $total;
            $data1[] = $tgl;

            $sql = "SELECT * FROM penjualan tp WHERE tp.id_barang = ? AND id_member = ?";
            $find = $config->prepare($sql);
            $find->execute([$id, $kasir]);
            $result = $find->fetch(PDO::FETCH_ASSOC);
            if($result['id_penjualan'])
            {
                echo "update";
                $sql = "UPDATE penjualan tp
                LEFT JOIN barang tb ON tb.id_barang = tp.id_barang
                SET tp.jumlah = tp.jumlah + 1,
                tp.total =  tb.harga * 1 + tp.total
                WHERE tp.id_penjualan = ?" ;
    
                $exec = $config->prepare($sql);
                $exec->execute([$result['id_penjualan']]);
                return;
            }

            $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);
            
            echo "ok";
            
        } else {
            // echo '<script>alert("Stok Barang Anda Telah Habis !");
			// 		window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}
