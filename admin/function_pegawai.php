<?php
include "../koneksi.php";

function detail_pegawai($id)
{
	global $conn;
	$query = "SELECT * FROM t_pegawai JOIN t_users ON t_pegawai.id_user = t_users.id WHERE id_pegawai = '$id'";
	$result = mysqli_query($conn, $query);
	return $result;
}