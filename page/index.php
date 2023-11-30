<?php
  include('../config/config.php');
  include('../functions/common_function.php');
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTL_WEB06</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
  </head>

  <body>
    <div id="main">
      <!-- Header -->
      <?php
                include '../config/header.php';
      ?>
      <!-- End Header -->


      <!-- Banner -->
      <div id="home-banner1">
        <a href="product.php">
          <img src="../assets/img/banner1/slide1.jpeg" alt="" class="slider">
        </a>
      </div>
      <!-- End Banner -->

      <!-- Content -->
      <div id="content">
        <!-- Home Collection -->
        <div class="home-collection ">
          <div class="row">
            <div class="col-xs-6 col-md-6 col-lg-6 left">
              <div class="collection-list">
                <div class="adv-collection">
                  <a href="product.php">
                    <img src="../assets/img/collection/collection1.jpg" alt="">
              </a>
                </div>
                <div class="content-collection">
                  <h3 class="title">
                    <a href="product.php">ALL BLACK IN BLACK</a>
                  </h3>
                  <p class = desc>Mặc dù được ứng dụng rất nhiều, nhưng sắc đen lúc nào cũng toát lên một vẻ huyền bí không nhàm chán.</p>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-md-6 col-lg-6 right">
              <div class="collection-list">
                <div class="adv-collection">
                  <a href="product.php">
                    <img src="../assets/img/collection/collection2.jpg" alt="" >
                  </a>
                </div>
                <div class="content-collection">
                  <h3 class="title">
                    <a href="product.php">OUT LET SALE</a>
                  </h3>
                  <p class="desc">Danh mục những  sản phẩm bán tại "giá tốt hơn" chỉ được bán kênh online - Online Only, chúng đã từng làm mưa làm gió một thời gian và hiện đang rơi vào tình trạng bể size, bể số.</p>
                </div>
            </div>
            </div>
          </div>
        </div>
        <!-- End Home Collection -->

        <!-- Home Buy -->
        <div class="home-buy container-fluid">
          <div class="row title">DANH MỤC MUA HÀNG</div>

          <div class="row">
            <div class="col-md-4 col-lg-4 item">
              <div class="item-background">
                <!-- <div class="item-bg"></div> -->
                <img src="../assets/img/buy/menshoes.jpg" alt="">
              </div>
              <div class="item-group">
                <a href="product.php" class="item-title">GIÀY NAM</a>
                <a href="product.php" class="subgroup">New Arivals</a>
                <a href="product.php" class="subgroup">Best Saller</a>
                <a href="product.php" class="subgroup">Sale-off</a>
              </div>
            </div>
            <div class="col-md-4 col-lg-4 item">
              <div class="item-background">
                <!-- <div class="item-bg"></div> -->
                <img src="../assets/img/buy/womenshoes.jpg" alt="">
              </div>
              <div class="item-group">
                <a href="product.php" class="item-title">GIÀY NỮ</a>
                <a href="product.php" class="subgroup">New Arivals</a>
                <a href="product.php" class="subgroup">Best Saller</a>
                <a href="product.php" class="subgroup">Sale-off</a>
              </div>
            </div>
            <div class="col-md-4 col-lg-4 item">
              <div class="item-background">
                <!-- <div class="item-bg"></div> -->
                <img src="../assets/img/buy/product_type.jpg" alt="">
              </div>
              <div class="item-group">
                <a href="product.php" class="item-title">DÒNG SẢN PHẨM</a>
                <a href="product.php" class="subgroup">Basas</a>
                <a href="product.php" class="subgroup">Vintas</a>
                <a href="product.php" class="subgroup">Urbas</a>
                <a href="product.php" class="subgroup">Pattas</a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Home Buy -->


        <!-- Banner 2 -->
        <div class="home-banner2">
            <!-- <a href="#"> -->
              <img src="../assets/img/banner2/subbanner.jpg" alt="">
            <!-- </a> -->
        </div>
        <!-- End Banner 2 -->


        <!-- News -->
        <div class="home-instagram container-fluid">
          <div class="row">
            <!-- Left: Instagram -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 left">
              <div class="row title">
                <a href="https://www.instagram.com/" class="title">INSTAGRAM</a>
              </div>
            </div>
            <!-- Right: News -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right">
              <div class="row title">TIN TỨC & BÀI VIẾT</div>
              <div class="row news-list">
                <?php
                  get_new();
                ?>
              </div>
            </div>
          </div>

          <div class="row news-more">
            <a href="#" class="btn btn-load-more">
              <button class="btn btn-load-more">MUỐN XEM NỮA</button>
            </a>
          </div>
        </div>
        <!-- End News -->

      </div>

      <!-- Footer -->
      <?php
        include '../config/footer.php';
      ?>
      <!-- End Footer -->

      <!-- Cart and Social -->
      <?php
        include '../config/cart&social.php';
      ?>
      
    </div>
  </body>
</html>