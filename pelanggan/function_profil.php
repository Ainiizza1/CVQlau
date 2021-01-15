<?php
include "../koneksi.php";

function profil_pelanggan()
{
	global $conn;
	if (isset($_SESSION['login'])) {
		$id = $_SESSION['id'];
		$result = mysqli_query($conn, "SELECT * FROM t_users JOIN t_pelanggan ON t_users.id = t_pelanggan.id_user WHERE id='$id'");
		$data = mysqli_fetch_assoc($result);
		return $data;
	}
}

function ubahprofil(array $data) {
	global $conn;
	$foto = '';
	$password = '';

	$sql_pelanggan = "UPDATE t_pelanggan SET nama_pelanggan = '".$data['nama_pelanggan']."',  telepon_pelanggan = '".$data['telepon_pelanggan']."' ";

	$sql_pelanggan.= " WHERE id_pelanggan = '".$data['id_pelanggan']."'";

	$sql_user = "UPDATE t_users SET username = '".$data['username']."' ";
	
	$sql_user.= " WHERE id = '".$data['id_profil']."'";

	// var_dump($sql_pegawai);die();

	$result = mysqli_query($conn, $sql_pelanggan);
	$result = mysqli_query($conn, $sql_user);
	return $result;
}

function ubahpassprofil(array $data) {
	global $conn;
	$password = '';


	$sql_user = "UPDATE t_users SET password = '".$data['password']."'";

	$sql_user.= " WHERE id = '".$data['id_profil']."'";
	
    // var_dump($sql_sales, $sql_user);die();
	$result = mysqli_query($conn, $sql_user);
	return $result;
}

?>
