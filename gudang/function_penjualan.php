<?php
include_once "../koneksi.php";


function data_penjualan_sales($id = null)
{
    global $conn;
    $id_sales = $_SESSION['id'];
    $query = "SELECT * FROM t_penjualan ORDER BY tgl_setor DESC";
    if ($id) {
        $query = "SELECT * FROM t_penjualan WHERE id_penjualan = '$id'";
    }
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
