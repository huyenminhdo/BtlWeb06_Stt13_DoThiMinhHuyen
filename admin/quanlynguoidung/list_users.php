<?php
    require('../config/config.php'); 
    // Kiểm tra xem đã đăng nhập hay chưa
    // Nếu chưa đăng nhập thành công điều hướng về trang login. Nếu đã đăng nhập được rồi thì hiển thị
    if(!$_SESSION["ad_name"]) {
        header("location:../admin_login.php");
    }
        // Xóa dữ liệu
        if(isset($_GET["list_users"]) && $_GET["list_users"]=="delete") {
            $user_id = $_GET["id"];
            $sql_delete = "delete from tbl_users where user_id = " .$user_id;
            if (mysqli_query($conn, $sql_delete)) {
                echo "<script>alert('Đã xóa người dùng thành công')</script>";
            }
            else {
                echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
            }
        }

?>

<html>
    <head>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="../css/styleadmin.css">        
            <title>Users - Admin Dashboard</title>
    </head>

    <body>
        <div class="container-fluid">
            <h1>Danh sách người dùng đặt hàng</h1>
            <div class="row">
                <div class="col-6">
                    <form class="form-check-inline mb-3" action="./dashboard.php?list_users" method="post">
                            <input class="form-control" style="width: 300px;" type="text" name="txt_search" id="" placeholder="Tìm kiếm theo tên người dùng...">
                            <br>
                            <input class="btn btn-success" type="submit" value="Tìm kiếm" name="btn_search">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped" style="text-align: center;"> 
                        <tr>
                            <th>Mã id</th> 
                            <th>Tên người dùng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Lựa chọn</th>
                        </tr>
                        <!-- Form bao trọn table -->
                        <form action="./dashboard.php?list_users" method="post">
                            <?php
                                $sql = "";
                                if(isset($_POST["btn_search"])) {
                                    $sql = "select * from tbl_users where user_name like '%".$_POST["txt_search"]."%'";
                                }
                                else
                                    $sql = "select * from tbl_users";                             
                                //Khai báo sql, liên kết sql hiển thị bảng
                                $result = mysqli_query($conn,$sql);               
                                if(mysqli_num_rows($result)>0) {
                                    // Hiển thị các cột dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" .$row["user_id"] . "</td>";
                                        echo "<td>" .$row["user_name"] . "</td>";
                                        echo "<td>" .$row["user_mobile"] . "</td>";
                                        echo "<td>" .$row["user_email"] . "</td>";
                                        echo "<td>" .$row["user_address"] . "</td>";
                                        echo "<td>";
                                        echo "<a  href='./dashboard.php?list_users=delete&id=".$row["user_id"]."'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                                </svg>
                                            </a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else {
                                    echo "<script>alert('Không tìm thấy người dùng này')</script>";
                                    echo "<script>window.open('./dashboard.php?list_users','_self')</script>";
                                }
                        
                            ?>
                        </form> 
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
