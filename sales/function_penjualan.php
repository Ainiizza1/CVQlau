<?php
include_once "../koneksi.php";


function data_penjualan_sales($id = null)
{
    global $conn;
    $id_sales = $_SESSION['id'];
    $query = "SELECT * FROM t_penjualan WHERE id_sales =  '$id_sales' ORDER BY tgl_penjualan DESC";
    if ($id) {
        $query = "SELECT * FROM t_penjualan WHERE id_sales =  '$id_sales' and id_penjualan = '$id'";
    }
    $result = mysqli_query($conn, $query);
    return $result;
}

