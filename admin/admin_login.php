<?php
    require('./config/config.php'); 
    session_start();
    if(isset($_POST["login"])) {
        $adname = $_POST["txt_adminname"];
        $adpassword = $_POST["txt_adminpassword"];
        $sql = "select * from tbl_admin where ad_name = '".$adname."' and ad_password = '".$adpassword."' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0) {
            // lưu tên người dùng
            $_SESSION["ad_name"] = $adname; 
            header("location:index.php");
            // echo "Xin chào admin " $adname;
        }
        else{
            echo "Sai tên đăng nhập hoặc mật khẩu";
        }
    }
    // if(isset($_POST["register"])) {
    //     header("location:register.php");
    // }
?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <style>
            h1 {
                text-align: center;
            }
        </style>
        <title>Admin Login</title>
    </head>

    <body style="background-color: ffffcc;">
        <div class="container">
            <h1>Trang Đăng nhập</h1>
            <form action="admin_login.php" method="post">
                Nhập vào tên đăng nhập:
                <input type="text" name="txt_adminname" id="" class="form-control">
                Nhập vào password:
                <input type="password" name="txt_adminpassword" id="" class="form-control">
                <br>
                <input type="submit" value="Đăng nhập" name="login" class="btn btn-primary">
                <!-- <input type="submit" value="Đăng ký" name="register" class="btn btn-danger"> -->
            </form>
        </div>
    </body>
</html>