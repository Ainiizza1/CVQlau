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

function total_produk()
{
    global $conn;
    $query = "SELECT count(*) as produk FROM t_produk";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $produk = $row['produk'];
    return $produk;
    
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

function total_penjualan()
{
    global $conn;
    $query = "SELECT count(*) as penjualan FROM t_penjualan";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $penjualan = $row['penjualan'];
    return $penjualan;
    
}

function konfirmasi_pemesanan($id_pemesanan) {
    $id = $_SESSION['id'];
    $status = "Telah Dikonfirmasi";
    $ket_status = "gudang";
    global $conn;
    $result = mysqli_query($conn, "UPDATE t_pemesanan SET status = '$status' , id_pegawai = '$id' , ket_status = '$ket_status' WHERE id_pemesanan = '$id_pemesanan'");
    return $result;
}