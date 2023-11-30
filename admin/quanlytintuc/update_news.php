<?php
    require('../config/config.php'); 

    session_start();
    if(!$_SESSION["ad_name"]) {
        header("location:../admin_login.php");
    }

    
    if(isset($_POST["btn_update"])) {
        $title = $_POST["txt_title"];
        $new_id = $_POST["txt_new_id"];
        $cont1 = $_POST["txt_cont1"];
        $cont2 = $_POST["txt_cont2"];
        $cont3 = $_POST["txt_cont3"];
        $status = $_POST["txt_status"];
        $sql_update = "update `tbl_news` set title = N'".$title."', cont1 = '$cont1', cont2 = '$cont2', cont3 = '$cont3', status = ".$status." where new_id =" .$new_id;
        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('Đã cập nhật thành công')</script>";
            header("location:../index.php?news");
            // echo "New record created successfully";
        }
        else {
            echo "Error: " .$sql . "</br>" . mysqli_error($conn); 
        }
    }

    if(isset($_POST["btn_cancel"])) {
        header("location:../index.php?news");
        
    }

?>

<html>
    <head>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../assets/bootstrap.bundle.min.js">    
            <link rel="stylesheet" href="../css/styleadmin.css">   
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
            <title>Update New</title>
    </head>

    <body>
        <div class="container">
            <h3>Cập nhật tin tức</h1>
            <div class="row">
                <div class="col-6">
                    <!-- gửi dữ liệu qua form thông thường dùng qua post -->
                    <form action="update_news.php" method="post">
                        <?php
                            if(isset($_GET["task"]) && $_GET["task"]=="update") {
                                $id = $_GET["id"];
                                $sql_select = "select * from `tbl_news` where new_id = " .$id;                             
                                //Khai báo sql, liên kết sql hiển thị bảng
                                $result = mysqli_query($conn,$sql_select);
                                if(mysqli_num_rows($result)>0) {
                                    // Hiển thị các cột dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<input type='hidden' name='txt_new_id' value ='".$row["new_id"]."'>";
                                        echo "Nhập vào tên tin tức:";                                        
                                        echo "<input class='form-control' value ='".$row["title"]."' type='text' name='txt_title' required id=''>";
                                        echo "Nhập vào content1 tin tức:";  
                                        echo "<textarea class='form-control' value ='".$row["cont1"]."' name='txt_cont1' id='editor1'></textarea>
                                                <script>
                                                    ClassicEditor
                                                            .create( document.querySelector( '#editor1' ) )
                                                            .then( editor => {
                                                                    console.log( editor );
                                                            } )
                                                            .catch( error => {
                                                                    console.error( error );
                                                            } );
                                            </script>   "  ;                                 
                                            echo "Nhập vào content2 tin tức:";  
                                            echo "<textarea class='form-control' value ='".$row["cont2"]."' name='txt_cont2' id='editor2'></textarea>
                                                <script>
                                                    ClassicEditor
                                                            .create( document.querySelector( '#editor2' ) )
                                                            .then( editor => {
                                                                    console.log( editor );
                                                            } )
                                                            .catch( error => {
                                                                    console.error( error );
                                                            } );
                                            </script>   "  ;  
                                        echo "Nhập vào content3 tin tức:";  
                                        echo "<textarea class='form-control' value ='".$row["cont3"]."' name='txt_cont3' id='editor3'></textarea>
                                                <script>
                                                    ClassicEditor
                                                            .create( document.querySelector( '#editor3' ) )
                                                            .then( editor => {
                                                                    console.log( editor );
                                                            } )
                                                            .catch( error => {
                                                                    console.error( error );
                                                            } );
                                            </script>   "  ;                                         
                                        echo "Nhập vào trạng thái tin tức:";
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