<?php
    require('../config/config.php'); 
    // Kiểm tra xem đã đăng nhập hay chưa
    // Nếu chưa đăng nhập thành công điều hướng về trang login. Nếu đã đăng nhập được rồi thì hiển thị
    if(!$_SESSION["ad_name"]) {
        header("location:../admin_login.php");
    }

    // Kiểm tra đăng xuất
    // if(isset($_POST["logout"])) {
    //     session_destroy();
    //     header("location:../admin_login.php");
    // }

    //Kiểm tra xem người dùng đã click vào nút insert
    if(isset($_POST["btn_insert"])) {
        // Lấy ra giá trị được nhập vào text
        $cate_name = $_POST["txt_cate_name"];
        $status = $_POST["txt_status"];
        // Kiểm tra xem catetogy đã có trong bảng csdl chưa
        $select_query = "SELECT * FROM tbl_category WHERE cate_name='$cate_name'";
        $result_select=mysqli_query($conn,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0) {
            echo "<script>alert('This catetogy is present inside the database')</script>";
        }
        else {
            $sql_insert = "insert into tbl_category(cate_name,status) values(N'".$cate_name."',".$status.")";
            if (mysqli_query($conn, $sql_insert)) {
                echo "<script>alert('Thêm danh mục thành công')</script>";
                // echo "<script>window.open('./index.php?categories','_self')</script>";
            }
            else {
                echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
            }
        }
    }
    // Xóa dữ liệu
    // task có thể thay đổi, tự đặt có thể là tên khác
    // Xóa dữ liệu
    // task có thể thay đổi, tự đặt có thể là tên khác
    if(isset($_GET["categories"]) && $_GET["categories"]=="delete") {
        $cate_id = $_GET["id"];
        $sql_delete = "delete from tbl_category where cate_id = " .$cate_id;
        if (mysqli_query($conn, $sql_delete)) {
            // echo "New record created successfully";
            echo "<script>alert('Xóa danh mục thành công)</script>";
            // echo "<script>window.open('./index.php?categories','_self')</script>";
        }
        else {
            echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
        }
    }

    // Xóa theo lựa chọn
    if(isset($_POST["delete_check"])) {
        // Mảng cate_id với giá trị lấy từ cate[]
        $cate_id = $_POST["cate"];
        // $cate_id as $c 
        foreach($cate_id as $c) {
            $sql_delete = "delete from tbl_category where cate_id = " .$c;
            if (mysqli_query($conn, $sql_delete)) {
                echo "<script>alert('Xóa các danh mục đã chọn thành công)</script>";
                echo "<script>window.open('./index.php?categories','_self')</script>";
            }
            else {
                echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
            }
        }
    }
?>

<html>
    <head>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="../css/styleadmin.css">        
            <title>Category</title>
    </head>

    <body>
        <div class="container">
            <h1>DANH MỤC</h1>
            <div class="row">
                <div class="col-6">
                    <!-- gửi dữ liệu qua form thông thường dùng qua post -->
                    <form action="./index.php?categories" method="post">
                        Nhập vào tên danh mục:
                        <input class="form-control" type="text" name="txt_cate_name" required id="">
                        Nhập vào trạng thái danh mục:
                        <input class="form-control" type="text" name="txt_status"  id="">
                        <br>
                        <input class="btn btn-primary" name="btn_insert" type="submit" value="Thêm mới">
                    </form>
                </div>
                <div class="col-6">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <form class="form-check-inline mb-3" action="./index.php?categories" method="post">
                            <input class="form-control" style="width: 300px;" type="text" name="txt_search" id="" placeholder="Tìm kiếm theo tên danh mục....">
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
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th> 
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th>Chọn</th>
                        </tr>
                        <!-- Form bao trọn table -->
                        <form action="./index.php?categories" method="post">
                            <input type="submit" value="Xóa theo lựa chọn" name = "delete_check" class="btn btn-info"> 
                            <input type="submit" value="Xóa tất cả" name="delete_all" class="btn btn-primary">
                            <?php
                                $sql = "";
                                if(isset($_POST["btn_search"])) {
                                    $sql = "select * from tbl_category where cate_name like '%".$_POST["txt_search"]."%'";
                                }
                                else
                                    $sql = "select * from tbl_category order by cate_id ASC";                             
                                //Khai báo sql, liên kết sql hiển thị bảng
                                $result = mysqli_query($conn,$sql);               
                                if(mysqli_num_rows($result)>0) {
                                    // Hiển thị các cột dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $s = "";
                                        // Khi status = 0 là ẩn, 1 là hiện
                                        if($row["status"] == 0) {
                                            $s = "<p style='color:red'>An</p>";
                                        }
                                        else {
                                            $s = "<p style='color:green'>Hien</p>";
                                        }

                                        echo "<tr>";
                                        echo "<td>" .$row["cate_id"] . "</td>";
                                        echo "<td>" .$row["cate_name"] . "</td>";
                                        echo "<td>".$s."</td>";
                                        echo "<td>";
                                            echo "<a class='btn btn-warning' href='./quanlydanhmuc/update_cate.php?task=update&id=".$row["cate_id"]."'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                    </svg> 
                                                </a>";
                                            echo "<a class='btn btn-danger' href='./index.php?categories=delete&id=".$row["cate_id"]."'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                                    </svg>
                                                </a>";
                                        echo "</td>";
                                        // Tạo checkbox để lựa chọn xóa. Mảng cate[] với các giá trị là các cate_id
                                        echo "<td>";
                                            echo "<input class='form-check-input' type='checkbox' name ='cate[]' value='".$row["cate_id"]."'>";
                                        echo "</td>";
                                        echo "</tr>";
                                        // echo $row["cate_id"] . " , " . $row["cate_name"] . "<br>";
                                    }
                                }
                                else {
                                    echo "<script>alert('Không tìm thấy tên danh mục')</script>";
                                    echo "<script>window.open('./index.php?categories','_self')</script>";
                                }
                        
                            ?>
                        </form> 
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
