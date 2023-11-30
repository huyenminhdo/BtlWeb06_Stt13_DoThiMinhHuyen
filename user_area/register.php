<?php
    require('../config/config.php');
    include('../functions/common_function.php');

    if(isset($_POST["register"])) {
        $user_name = $_POST["txt_user_name"];
        $email = $_POST["txt_email"];
        $password = $_POST["txt_password"];
        // băm mật khẩu
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST["txt_confirmpassword"];
        $user_ip = getIPAddress();
        $address = $_POST["txt_address"];
        $tel = $_POST["tel"];
        // $status = $_POST["txt_status"];

    if ($password !== $confirm_password) {
      echo "<script>alert('Mật khẩu và xác nhận mật khẩu không khớp')</script>";
    } else {
        $sql = "select * from tbl_users where user_name = '".$user_name."' or user_email = '".$email."' or user_ip = '".$user_ip."'";
        //  or user_ip = '".$user_ip."'
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0) {
            echo "<script>alert('Tên hoặc email đã tồn tại!')</script>";
        }
        else{
            $sql_insert = "INSERT INTO tbl_users (user_name, user_email, user_password, user_ip, user_address, user_mobile)
                            VALUEs('".$user_name."',
                                  '".$email."',
                                  '".$hash_password."',
                                  '".$user_ip."',
                                  '".$address."',
                                  '".$tel."'
                            )";
                            var_dump($sql_insert);            
            if (mysqli_query($conn, $sql_insert)) {
              echo "<script>alert('Đăng kí thành công')</script>";
              echo "<script>window.open('login.php','_self')</script>";
            }
            else {
                echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
            }
        }
    }

      // chọn sản phẩm trng giỏ hàng
    //   $select_cart_items = "SELECT * FROM `tbl_cart_detail` where ip_address = '$user_ip'";
    //   $result_cart = mysqli_query($conn, $select_cart_items);
    //   if(mysqli_num_rows($result_cart)>0) {
    //     $_SESSION['username'] = $user_name;
    //     echo "<script>alert('Bạn đã có những sản phẩm trong giỏ hàng.')</script>";
    //     echo "<script>window.open('checkout.php','_self')</script>";
    //   }
    //   else {
    //     echo "<script>window.open('./page/index.php','_self')</script>";
    //   }

    }
    if(isset($_POST["login"])) {
        header("location:login.php");
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
        <title>Register</title>
    </head>
    <body>
        <div id="register">
            <!-- Header -->
            <?php
                include '../config/header.php';
            ?>
            <!-- End Header -->

            <!-- Begin: Register -->
            <div class="register">
              <div class="wrapper">
                  <form action="register.php" method="post">
                      <h2 class="animate-wave">REGISTER</h2>
                      <div class="form-group">
                          <input type="text" name="txt_user_name" placeholder="User name" required>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg>
                      </div>

                      <div class="form-group">
                          <input type="password" name="txt_password" id="password" placeholder="Password" required>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                          </svg>
                      </div>

                      <div class="form-group">
                        <input type="password" name="txt_confirmpassword" id="confirmPW" placeholder="Confirm password" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                      </div>

                      <div class="form-group">
                        <input type="email" name="txt_email" id="" placeholder="Email" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                      </div>

                      <div class="form-group">
                        <input type="text" name="txt_address" id="" placeholder="Address" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                          <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                          <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                        </svg>
                      </div>

                      <div class="form-group">
                        <input type="tel" name="tel" id="" placeholder="Phone number" required pattern="[0-9]{10,}" title="Please enter a valid phone number with at least 10 digits">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                      </div>

                      <input type="submit" value="Register" name="register" class="btn" id="registerBtn"/>

                      <div class="register-link">
                        <p>Do you have an account? <a href="login.php">Log in!</a></p>
                      </div>
                  </form>
              </div>

              <div class="row return-home">
                  <a href="../page/index.php" class="btn btn-return-home">
                    <button class="btn btn-return-home">QUAY LẠI TRANG CHỦ</button>
                  </a>
              </div>
            </div>
            <!-- End: Register -->

            <!-- Footer -->
            <?php
                include '../config/footer.php';
            ?>
            <!-- End Footer -->
        </div>
    </body>
</html>