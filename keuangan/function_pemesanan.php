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

function detail_pelanggan($id)
{
    global $conn;
    $query = "SELECT * FROM t_pelanggan WHERE id_pelanggan = '$id'";
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

function jumlah_pemesanan()
{
    global $conn;
    $query = "SELECT count(*) as total FROM t_pemesanan";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    return $total;

}

function total_sales()
{
    global $conn;
    $query = "SELECT count(*) as sales FROM t_sales";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $sales = $row['sales'];
    return $sales;
    
}

function total_pelanggan()
{
    global $conn;
    $query = "SELECT count(*) as pelanggan FROM t_pelanggan";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $pelanggan = $row['pelanggan'];
    return $pelanggan;
    
}
