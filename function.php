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

?> 