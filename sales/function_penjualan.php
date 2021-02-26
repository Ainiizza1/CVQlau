<?php
include_once "../koneksi.php";


function data_penjualan_sales($id = null)
{
    global $conn;
    $id_sales = $_SESSION['id'];
    $query = "SELECT * FROM t_penjualan JOIN t_pemesanan ON t_penjualan.id_pemesanan = t_pemesanan.id_pemesanan WHERE t_penjualan.id_sales =  '$id_sales' ORDER BY tgl_setor DESC";
    if ($id) {
        $query = "SELECT * FROM t_penjualan JOIN t_pemesanan ON t_penjualan.id_pemesanan = t_pemesanan.id_pemesanan WHERE t_penjualan.id_sales =  '$id_sales' and id_penjualan = '$id'";
    }
    // var_dump($query);die();
    $result = mysqli_query($conn, $query);
    return $result;
}


function detail_penjualan_sales($id)
{
    global $conn;
    $query = "SELECT * FROM t_detail_penjualan JOIN t_produk ON t_detail_penjualan.id_produk = t_produk.id_produk WHERE id_penjualan = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function hapus_penjualan($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM t_detail_penjualan WHERE id_penjualan = '$id'");
    if ($result) {
        $result = mysqli_query($conn, "DELETE FROM t_penjualan WHERE id_penjualan = '$id'");
    }
    return $result;
}


