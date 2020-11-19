<?php  
//koneksi database
include "koneksi.php";


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
    $level = mysqli_real_escape_string($conn, $data["level"]);

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
    mysqli_query($conn, "INSERT INTO t_users VALUES ('','$username','$password','$level')");

    return mysqli_affected_rows($conn);

}


?> 