<?php
include "../koneksi.php";

function profil_sales()
{
	global $conn;
	if (isset($_SESSION['login'])) {
		$id = $_SESSION['id'];
		$result = mysqli_query($conn, "SELECT * FROM t_users JOIN t_sales ON t_users.id = t_sales.id_user WHERE id='$id'");
		$data = mysqli_fetch_assoc($result);
		return $data;
	}
}

function ubahprofil(array $data) {
	global $conn;
	$foto = '';
	$password = '';

	$sql_sales = "UPDATE t_sales SET nama_sales = '".$data['nama_sales']."' ";

	if($data['foto']!=""){
		$sql_sales.= ", foto = '".$data['foto']."' ";
	}

	$sql_sales.= " WHERE id_sales = '".$data['id_sales']."'";

	$sql_user = "UPDATE t_users SET username = '".$data['username']."' ";
	
	$sql_user.= " WHERE id = '".$data['id_profil']."'";

	// var_dump($sql_sales);die();

	$result = mysqli_query($conn, $sql_sales);
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
