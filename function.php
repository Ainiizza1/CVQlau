<?php  
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "qlauroti");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



function login()
{
    global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM t_users WHERE username ='$username'");

    //cek username
    if ( mysqli_num_rows($result) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            
            if ($_SESSION['level']=="admin") {
                header("Location: admin/index.php");
            } elseif ($_SESSION['level']=="user") {
                header("Location: user/index.php");
            }
            // //cek remember me
            // if (isset($_POST["remember"])) {
            //     //buat cookie

            //     setcookie('login', 'true', time() + 60);
            // }
            exit(); 
        }
    }

    $error =  true;
}

function registrasi ($data) {
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
        alert('Konfirmasi Password tidak sesuai');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
        
    }

    //enkripsi passwordnya
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO t_users VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);

}

//data jenis produk
$result = mysqli_query($conn, "SELECT * FROM t_jproduk");

$jenisproduk = array();
while ($row = mysqli_fetch_assoc($result)) {
    $jenisproduk[]=$row;
}
return mysqli_affected_rows($conn);


function kode_produk_berikutnya()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM t_produk order by id_produk DESC");

    $idproduk = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $idproduk[]=$row;
    }
    $kode_terakhir = substr($idproduk[0]['kode_produk'], 3);

    $kode_terakhir++;

    if ($kode_terakhir>=0 and $kode_terakhir<10) {
        $kode_sekarang = "00".$kode_terakhir;
    }else if ($kode_terakhir>=10 and $kode_terakhir<100) {
        $kode_sekarang = "0".$kode_terakhir;
    } else if ($kode_terakhir>=100 and $kode_terakhir<1000) {
        $kode_sekarang = $kode_terakhir;
    }
    return $kode_sekarang;
    
}

function deleteproduk($id_produk) {
    global $conn;

    mysqli_query($conn, "DELETE * FROM t_produk WHERE id_produk = $id_produk");

    return mysqli_affected_rows($conn);
}


?> 