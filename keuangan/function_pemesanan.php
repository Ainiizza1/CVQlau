<?php
include "../koneksi.php";
function konfirmasi_pemesanan($id_pemesanan) {
    $id = $_SESSION['id'];
    $ket_status = "keuangan";
    global $conn;
    $result = mysqli_query($conn, "UPDATE t_pemesanan SET  id_pegawai = '$id' , ket_status = '$ket_status' WHERE id_pemesanan = '$id_pemesanan'");
    return $result;
}


?>