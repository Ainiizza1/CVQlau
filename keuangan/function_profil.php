<?php
include "../koneksi.php";

function profil_pribadi()
{
	global $conn;
	if (isset($_SESSION['login'])) {
		$id = $_SESSION['id'];
		$result = mysqli_query($conn, "SELECT * FROM t_users JOIN t_pegawai ON t_users.id = t_pegawai.id_user WHERE id='$id'");
		$data = mysqli_fetch_assoc($result);
		return $data;
	}
}
?>
