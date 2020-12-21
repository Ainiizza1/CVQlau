<?php
include_once "../koneksi.php";


function data_pemesanan_sales($id = null)
{
    global $conn;
    $id_sales = $_SESSION['id'];
    $query = "SELECT * FROM t_pemesanan ORDER BY tgl_pemesanan DESC";
    if ($id) {
        $query = "SELECT * FROM t_pemesanan WHERE id_pemesanan = '$id'";
    }
    $result = mysqli_query($conn, $query);
    return $result;
}

function detail_pemesanan_sales($id)
{
    global $conn;
    $query = "SELECT * FROM t_detail_pemesanan JOIN t_produk ON t_detail_pemesanan.id_produk = t_produk.id_produk WHERE id_pemesanan = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function detail_sales($id)
{
    global $conn;
    $query = "SELECT * FROM t_sales JOIN t_kendaraan ON t_sales.id_kendaraan = t_kendaraan.id_kendaraan WHERE id_sales = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tampil_jproduk()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM t_jproduk INNER JOIN t_produk USING (id_jproduk)");
    return $result;
}

function hapus_pemesanan($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_detail_pemesanan WHERE id_pemesanan = '$id'");
    if ($result) {
        $result = mysqli_query($conn, "DELETE FROM t_pemesanan WHERE id_pemesanan = '$id'");
    }
    return $result;
}
