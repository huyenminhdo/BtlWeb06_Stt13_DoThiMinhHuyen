<?php
  require('../config/config.php');
  include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link rel="stylesheet" href="../assets/css/contact.css">
      <link rel="stylesheet" href="../assets/css/responsive.css">
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/app.js"></script>
    <title>Contact</title>
</head>
<body>
  <?php
    include '../config/header.php';
  ?>
  <div id="contact" class="container-fluid">
    
  <div class="row member">
    <div class="col-4 avt">
      <img src="../assets/img/member/MinhHuyen.jpg" alt="">
    </div>    

    <div class="col-8 infor">
      <p class="name">Họ tên: <span> </span>Đỗ Thị Minh Huyền</p>
      <p class="msv">Mã sinh viên: <span>2121051221</span></p>
      <p class="nhom">Nhóm: <span>13</span></p>
      <p class="class">Phát triển ứng dụng Web: <span>nhóm 6</span></p>
      <p class="email">Email: <span>dohuyen477@gmail.com</span> </p>
      <p class="sdt">Điện thoại: <span>0358570803</span></p>
    </div>
  </div>
  <div class="row member">
    <div class="col-4 avt">
      <img src="" alt="">
    </div>

    <div class="col-8 infor">
      <p class="name">Họ tên: <span> </span>Vũ Thị Ngọc</p>
      <p class="msv">Mã sinh viên: <span> </span></p>
      <p class="nhom">Nhóm: <span>13</span></p>
      <p class="class">Phát triển ứng dụng Web: <span>nhóm 6</span></p>
      <p class="email">Email: <span></span> </p>
      <p class="sdt">Điện thoại: <span></span> </p>
    </div>
  </div>
  <div class="row member">
    <div class="col-4 avt">
      <img src="" alt="">
    </div>

    <div class="col-8 infor">
      <p class="name">Họ tên: <span> </span>Hoàng Đức Mạnh</p>
      <p class="msv">Mã sinh viên: <span> </span></p>
      <p class="nhom">Nhóm: <span>13</span></p>
      <p class="class">Phát triển ứng dụng Web: <span>nhóm 6</span></p>
      <p class="email">Email: <span></span> </p>
      <p class="sdt">Điện thoại: <span></span> </p>
    </div>

  </div>

    <div class="row back-home">
      <a href="index.php">
        <button>QUAY LẠI TRANG CHỦ</button>
      </a>
    </div>

  </div>
  <?php
    include '../config/footer.php';
  ?>
  <?php
    include '../config/cart&social.php';
  ?>
</body>
</html>