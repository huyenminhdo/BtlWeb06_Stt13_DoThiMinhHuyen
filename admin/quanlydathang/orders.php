<?php
    require('../config/config.php'); 
    // Kiểm tra xem đã đăng nhập hay chưa
    // Nếu chưa đăng nhập thành công điều hướng về trang login. Nếu đã đăng nhập được rồi thì hiển thị
    if(!$_SESSION["ad_name"]) {
        header("location:../admin_login.php");
    }

?>

<html>
    <head>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="../css/styleadmin.css">        
            <title>Orders - Admin Dashboard</title>
    </head>

    <body>
        <div class="container-fluid" style="margin: 0px 20px;">
            <h1>CÁC ĐƠN ĐẶT HÀNG</h1>
            <div class="row">
                <div class="col-6">
                    <form class="form-check-inline mb-3" action="./dashboard.php?orders" method="post">
                            <input class="form-control" style="width: 300px;" type="text" name="txt_search" id="" placeholder="Tìm kiếm theo mã đơn hàng...">
                            <br>
                            <input class="btn btn-success" type="submit" value="Tìm kiếm" name="btn_search">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>ID người đặt</th> 
                            <th>Giá trị đơn hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                        </tr>
                        <!-- Form bao trọn table -->
                        <form action="./dashboard.php?orders" method="post">
                            <?php
                                $sql = "";
                                if(isset($_POST["btn_search"])) {
                                    $sql = "select * from tbl_order where order_code like '%".$_POST["txt_search"]."%'";
                                }
                                else
                                    $sql = "select * from tbl_order order by order_id ASC";                             
                                //Khai báo sql, liên kết sql hiển thị bảng
                                $result = mysqli_query($conn,$sql);               
                                if(mysqli_num_rows($result)>0) {
                                    // Hiển thị các cột dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" .$row["order_code"] . "</td>";
                                        echo "<td>" .$row["user_id"] . "</td>";
                                        echo "<td>" .number_format($row["total_price"] , 0, ',', '.')." VND</td>";
                                        echo "<td>" .$row["order_payment_method"] . "</td>";
                                        echo "<td>" .$row["order_date"] . "</td>";
                                        echo "<td>" .$row["order_status"] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else {
                                    echo "<script>alert('Không tìm thấy mã đơn hàng này')</script>";
                                    echo "<script>window.open('./dashboard.php?orders','_self')</script>";
                                }
                        
                            ?>
                        </form> 
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
