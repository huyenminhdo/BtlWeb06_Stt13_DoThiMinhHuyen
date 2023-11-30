<?php
    require('../config/config.php'); 
    session_start();

    if(!$_SESSION["ad_name"]) {
        header("location:../admin_login.php");
    }

    if(isset($_POST["btn_update"])) {
        $product_price = $_POST["txt_product_price"];
        $product_id = $_POST["txt_product_id"];
        // nếu không chạy được thì xóa dòng quantity đi
        $product_quantity = $_POST["txt_product_quantity"];
        $status = $_POST["txt_status"];
        $sql_update = "update `tbl_product` set product_price = N'".$product_price."', product_quantity = ".$product_quantity.", status = ".$status." where product_id =" .$product_id;
        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('Đã cập nhật thành công')</script>";
            header("location:../index.php?products");
            // echo "New record created successfully";
        }
        else {
            echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
        }
    }

    if(isset($_POST["btn_cancel"])) {
        header("location:../index.php?products");
    }

?>

<html>
    <head>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../assets/bootstrap.bundle.min.js">    
            <link rel="stylesheet" href="../css/styleadmin.css"> 
            <title>Update Product</title>
           
    </head>

    <body>
        <div class="container">
            <h1>Cập nhật sản phẩm</h1>
            <div class="row">
                <div class="col-6">
                    <!-- gửi dữ liệu qua form thông thường dùng qua post -->
                    <form action="update_product.php" method="post">
                        <?php
                            if(isset($_GET["task"]) && $_GET["task"]=="update") {
                                $id = $_GET["id"];
                                $sql_select = "select * from `tbl_product` where product_id = " .$id;                             
                                //Khai báo sql, liên kết sql hiển thị bảng
                                $result = mysqli_query($conn,$sql_select);
                                if(mysqli_num_rows($result)>0) {
                                    // Hiển thị các cột dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<input type='hidden' name='txt_product_id' value ='".$row["product_id"]."'>";
                                        echo "Nhập vào giá sản phẩm:";
                                        echo "<input class='form-control' value ='".$row["product_price"]."' type='text' name='txt_product_price' required id=''>";
                                        // nếu không chạy được thì xóa dòng quantity đi
                                        echo "Nhập vào số lượng sản phẩm:";
                                        echo "<input class='form-control' value ='".$row["product_quantity"]."' type='text' name='txt_product_quantity' required id=''>";
                                        echo "Nhập vào trạng thái sản phẩm:";
                                        echo "<input class='form-control' value ='".$row["status"]."' type='text' name='txt_status' required id=''>";
                                    }
                                }
                            }
                        ?>
                        <br>
                        <input class="btn btn-primary" name="btn_update" type="submit" value="Cập nhật">
                        <input type="submit" value="Cancel" name="btn_cancel" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>