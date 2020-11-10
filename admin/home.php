<?php 
require_once('../url.php'); 
require_once('../function.php'); 


if (!isset($_SESSION['login'])) {
	header('Location: ../index.php');
	exit();

}


include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$result = mysqli_query($conn, "SELECT * FROM t_users WHERE username ='$username'");

$id = $_SESSION["login"]["id"];
$ambil = $conn->query("SELECT * from t_users where id ='$id'");
$pecah = $ambil->fetch_assoc();
?>

<h1>Selamat Datang  <font color="red" align="center"><?php echo $pecah['username'];  ?></font> Dihalaman Admin</h1>