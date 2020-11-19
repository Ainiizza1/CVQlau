<?php
include "../koneksi.php";


//data jenis produk
$result = mysqli_query($conn, "SELECT * FROM t_jproduk");

$jenisproduk = array();
while ($row = mysqli_fetch_assoc($result)) {
    $jenisproduk[]=$row;
}
return mysqli_affected_rows($conn);

function kode_produk_berikutnya($jenis)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM t_produk WHERE kode_produk like '$jenis%' order by id_produk DESC");
    
    $idproduk = array();
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $idproduk[]=$row;
        }
        $kode_terakhir = substr($idproduk[0]['kode_produk'], 3);
        $kode_terakhir++;
    } else {
        $kode_terakhir = 001;
    }
    
    

    if ($kode_terakhir>=0 and $kode_terakhir<10) {
        $kode_sekarang = $jenis."00".$kode_terakhir;
    }else if ($kode_terakhir>=10 and $kode_terakhir<100) {
        $kode_sekarang = $jenis."0".$kode_terakhir;
    } else if ($kode_terakhir>=100 and $kode_terakhir<1000) {
        $kode_sekarang = $jenis.$kode_terakhir;
    }
    return $kode_sekarang;
    
}

function deleteproduk($id_produk) {
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_produk WHERE id_produk = $id_produk");
    return $result;
}

function ubahproduk(array $data) {
    global $conn;
    // var_dump($data['harga_produk']);die();
    $result = mysqli_query($conn, "UPDATE t_produk SET kode_produk='".$data['kode_produk']."', nama_produk='".$data['nama_produk']."', harga_produk='".$data['harga_produk']."' WHERE id_produk = '".$data['id_produk']."'");
    return $result;
}

function ubahpengguna(array $data) {
    global $conn;
    // var_dump($data['harga_produk']);die();
    $result = mysqli_query($conn, "UPDATE t_users SET username='".$data['username']."', password='".$data['password']."', level='".$data['level']."', nama='".$data['nama']."', status='".$data['status']."' WHERE id = '".$data['id']."'");
    return $result;
}

function ubahjproduk(array $data) {
    global $conn;
    // var_dump($data['harga_produk']);die();
    $result = mysqli_query($conn, "UPDATE t_jproduk SET kode_jproduk='".$data['kode_jproduk']."', namajenis_jproduk='".$data['namajenis_jproduk']."' WHERE id_jproduk = '".$data['id_jproduk']."'");
    return $result;
}

function deletejenisproduk($id_jproduk) {
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_jproduk WHERE id_jproduk = $id_jproduk");
    return $result;
}

function deletepengguna($id) {
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_users WHERE id = $id");
    return $result;
}

function deletepelanggan($id_pelanggan) {
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_pelanggan WHERE id_pelanggan = $id_pelanggan");
    return $result;
}



?>