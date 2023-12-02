
<?php
    session_start();

    if(!$_SESSION["ad_name"]) {
        header("location:admin_login.php");
    }
    else {
        echo "Xin chào ADMIN: " .$_SESSION["ad_name"];
    }

    if(isset($_GET["logout"])) {
        session_destroy();
        header("location:admin_login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/styleadmin.css">        
</head>
<body class="admin">
    <h1>Trang quản trị Admin</h1>
    <div class="row button">
        <div class="col">
            <button>
                <a href="dashboard.php?categories">All categories</a>
            </button>
            
            <button>
                <a href="dashboard.php?products">All products</a>
            </button>
            <button>
                <a href="dashboard.php?news">All news</a>
            </button>

            <button>
                <a href="dashboard.php?orders">All orders</a>
            </button>

            <button>
                <a href="dashboard.php?users_orders">List of orders users</a>
            </button>

            <button>
                <a href="dashboard.php?list_users">List users</a>
            </button>

            <button>
                <a href="dashboard.php?logout">Log out</a>
            </button>
        </div>
        </div>

        <div class="contaitner-fluid">
            <?php 
            if(isset($_GET['products'])) {
                include ('./quanlysanpham/product.php');
            }
            elseif(isset($_GET['categories'])) {
                include ('./quanlydanhmuc/category.php');
            }
            elseif(isset($_GET['news'])) {
                include ('./quanlytintuc/news.php');
            }
            elseif(isset($_GET['orders'])) {
                include ('./quanlydathang/orders.php');
            }
            elseif(isset($_GET['users_orders'])) {
                include ('./quanlydathang/users_orders.php');
            }
            elseif(isset($_GET['list_users'])) {
                include ('./quanlynguoidung/list_users.php');
            }
            ?>
        </div>
    </div>
</body>
</html>