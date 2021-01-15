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

function ubahprofil(array $data) {
	global $conn;
	$foto = '';
	$password = '';

	$sql_pegawai = "UPDATE t_pegawai SET nama_lengkap = '".$data['nama_lengkap']."',  telp = '".$data['telp']."' ";

	if($data['foto']!=""){
		$sql_pegawai.= ", foto = '".$data['foto']."' ";
	}

	$sql_pegawai.= " WHERE id_pegawai = '".$data['id_pegawai']."'";

	$sql_user = "UPDATE t_users SET username = '".$data['username']."' ";
	
	$sql_user.= " WHERE id = '".$data['id_profil']."'";

	// var_dump($sql_pegawai);die();

	$result = mysqli_query($conn, $sql_pegawai);
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
