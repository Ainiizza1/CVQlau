<?php
include "../koneksi.php";

function detail_pegawai($id)
{
	global $conn;
	$query = "SELECT * FROM t_pegawai JOIN t_users ON t_pegawai.id_user = t_users.id WHERE id_pegawai = '$id'";
	$result = mysqli_query($conn, $query);
	return $result;
}

function ubahpegawai(array $data) {
	global $conn;
	$foto = '';
	$password = '';

	$sql_pegawai = "UPDATE t_pegawai SET id_pegawai = '".$data['id_pegawai']."', nama_lengkap = '".$data['nama_lengkap']."',  telp = '".$data['telp']."' ";


	if($data['foto']!=""){
		$sql_pegawai.= ", foto = '".$data['foto']."' ";
	}

	$sql_pegawai.= " WHERE id_pegawai = '".$data['id_pegawai']."'";

	$sql_user = "UPDATE t_users SET username = '".$data['username']."', level='".$data['level']."', status = '".$data['status']."' ";
	if($data['password']!=""){
		$sql_user.= ", password = '".$data['password']."' ";
	} 
	
	$sql_user.= " WHERE id = '".$data['id_user']."'";

	$result = mysqli_query($conn, $sql_pegawai);
	$result = mysqli_query($conn, $sql_user);
	return $result;
}

function deletepegawai($id_pegawai) {
	global $conn;
	$result_pegawai = mysqli_query($conn, "SELECT * FROM t_pegawai WHERE id_pegawai = $id_pegawai");
	$sales = array();
	while ($row = mysqli_fetch_assoc($result_pegawai)) {
		$pegawai[]=$row;
	}
    // var_dump($sales);die();
	$result = mysqli_query($conn, "DELETE FROM t_pegawai WHERE id_pegawai = $id_pegawai");
	$result = mysqli_query($conn, "DELETE FROM t_users WHERE id = ".$pegawai[0]['id_user']);
	return $result;
}