<?php
  require('../config/config.php');
  include('../functions/common_function.php');

    session_start();
    if(isset($_POST["login"])) {
        $username = $_POST["txt_username"];
        $password = $_POST["txt_password"];
        $sql = "select * from tbl_users where user_name ='$username'";
        $result = mysqli_query($conn,$sql);
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();
        // cart item
        $sql = "select * from tbl_cart_detail where ip_address ='$user_ip'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0) {    
            if(password_verify($password, $row_data['user_password'])) {
                $_SESSION['username'] = $username;
                $_SESSIION['user_id'] = $row_data['user_id'];
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('../page/product.php','_self')</script>";

            }
            else {
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
            }
            echo "<script>alert('Đăng nhập thành công')</script>";
        }
        else{
            echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div id="login">
            <!-- Header -->
            <?php
                // include '../config/header.php';
            ?>
            <!-- End Header -->

            <!-- Begin: LOG IN -->
            <div class="login">
                <div class="wrapper">
                    <form action="login.php" method="post">
                        <h2 class="animate-wave">LOG IN</h2>
                        <div class="form-group">
                            <input type="text" name= "txt_username" placeholder="Username" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg>
                        </div>

                        <div class="form-group">
                            <input type="password" name="txt_password" id="" placeholder="Password" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox" name="" id="">Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>

                        <input type="submit" value="Login" name="login" class="btn"/>

                        <div class="register-link">
                            <p>Don't have an account? <a href="register.php">Register now!</a></p>
                        </div>
                    </form>
                </div>

                <div class="row return-home">
                    <a href="../page/index.php" class="btn btn-return-home">
                    <button class="btn btn-return-home">QUAY LẠI TRANG CHỦ</button>
                    </a>
                </div>
            </div>
            <!-- End: Login -->

            <!-- Footer -->
            <?php
                include '../config/footer.php';
            ?>
            <!-- End Footer -->
        </div>
    </body>
</html>