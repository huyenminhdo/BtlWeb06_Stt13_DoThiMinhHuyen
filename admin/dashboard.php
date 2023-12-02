
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
                <a href="index.php?categories">All categories</a>
            </button>
            
            <button>
                <a href="index.php?products">All products</a>
            </button>
            <button>
                <a href="index.php?news">All news</a>
            </button>

            <button>
                <a href="#">All order</a>
            </button>

            <button>
                <a href="#">List users</a>
            </button>

            <button>
                <a href="index.php?logout">Log out</a>
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
            ?>
        </div>
    </div>
</body>
</html>