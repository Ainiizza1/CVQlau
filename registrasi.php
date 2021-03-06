<?php 
session_start();
require_once 'url.php'; 
require 'function.php'; 
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
if (isset($_SESSION['login'])) {
    if ($_SESSION['level']=="admin") {
        header("Location: admin/index.php");
    } elseif ($_SESSION['level']=="user") {
        header("Location: user/index.php");
    } elseif ($_SESSION['level']=="keuangan") {
        header("Location: keuangan/index.php");
    } elseif ($_SESSION['level']=="sales") {
        header("Location: sales/index.php");
    } elseif ($_SESSION['level']=="gudang") {
        header("Location: gudang/index.php");
    } elseif ($_SESSION['level']=="pelanggan") {
        header("Location: pelanggan/index.php");
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV Qlau Maju Berkah</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?=$url?>assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/vendor/animate/animate.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?=$url?>assets/images/Logo.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title">
                    REGISTRASI
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username" placeholder="Username" onfocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password2" placeholder="Confirm Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please Selected">
                    <select class="input100" name="level" required>
                        <option selected disabled>Silahkan Dipilih</option>
                        <option value="admin">Admin</option> 
                        <option value="user">User</option> 
                        <option value="sales">Sales</option> 
                        <option value="gudang">Bagian Gudang</option> 
                        <option value="pelanggan">Pelanggan</option> 
                    </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="register">
                        Registrasi
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="index.php">
                        Back To Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>




    <!--===============================================================================================-->  
    <script src="<?=$url?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?=$url?>assets/vendor/bootstrap/js/popper.js"></script>
    <script src="<?=$url?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?=$url?>assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?=$url?>assets/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?=$url?>assets/js/main.js"></script>

</body>
</html>