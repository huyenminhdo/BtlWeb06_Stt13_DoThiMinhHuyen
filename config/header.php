    <?php
    session_start();
  ?>
    <form action="../config/header.php" method="post">
  
    <div id="header" class="container-fluid">
          <div class="row">
            <ul class="menu">
              <li>
                <a href="#">
                  <img src="../assets/img/header/menu/icon_tim_cua_hang.svg" alt="">
                  Tìm cửa hàng
                </a>
              </li>
              <li>
                <a href="../page/contact.php">
                  <img src="../assets/img/header/menu/icon_heart_header.svg" alt="">
                  Liên hệ
                </a>
              </li>

              <li>
                <a href="../page/cart.php">
                  <img src="../assets/img/header/menu/icon_gio_hang.svg" alt="">
                  Giỏ hàng (<?php
                    if (!isset($_SESSION['username'])) {echo"0";
                    header("location:../user_area/login.php");}
                    else{ cart_item(); cart();}?>)
                </a>
              </li>

              <li>
                <?php
                    if (!isset($_SESSION['username'])) {
                        echo " 
                        <a href='../user_area/login.php'>
                        <img src='../assets/img/header/menu/icon_tra_cuu_don_hang.svg' alt=''> 
                        Tra cứu đơn hàng
                        </a>
                        ";
                      
                    }
                    
                    else {
                      $user_name = $_SESSION['username'];
                      $sql = "SELECT * FROM tbl_users WHERE user_name = '$user_name'";
                      $result = mysqli_query($conn, $sql);
                      while($row=mysqli_fetch_array($result)) {
                        $user_id = $row['user_id'];
                        echo"
                          <a href='../user_area/order.php?user_id=$user_id'>
                          <img src='../assets/img/header/menu/icon_tra_cuu_don_hang.svg' alt=''> 
                          Tra cứu đơn hàng
                          </a>
                        ";
                      }
                    }
                ?>
              </li>

              <li>
                <?php
                  if (!isset($_SESSION['username'])) {
                    echo "
                    <a href='../user_area/login.php'>
                    <img src='../assets/img/header/menu/icon_dang_nhap.svg' alt=''>
                    Đăng nhập
                    </a>
                    ";
                  }
                  
                  else {
                    echo "
                      <a href='../user_area/logout.php'>
                        <img src='../assets/img/header/menu/icon_dang_nhap.svg' alt=''>
                        Đăng xuất
                      </a>
                    ";
                  }
                ?>
              </li>

            </ul>
          </div>
        </form>

          <div class="row row-nav">
              <!-- Begin: Nav -->
              <div id="nav">
                <div class="logo">
                  <a href="../page/index.php">
                    <img src="../assets/img/header/nav/Logo_Header.svg" alt="">
                  </a>
                </div>
                <ul class="nav-list">
                  <li class="line">
                    <a href="../page/product.php">SẢN PHẨM
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    </a>
                    <ul class="subnav">
                      <li><a href="../page/product.php?data_gender=men">CHO NAM</a></li>
                      <li><a href="../page/product.php?data_gender=women">CHO NỮ</a></li>
                      <li><a href="">OUT LET SALE</a></li>
                      <li><a href="">THỜI TRANG & PHỤ KIỆN</a></li>
                    </ul>
                  </li>
                  <li class="line">
                    <a href="../page/product.php?data_gender=men">NAM
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    </a>
                    <ul class="subnav">
                      <li><a href="">NỔI BẬT</a></li>
                      <li><a href="">GIÀY</a></li>
                      <li><a href="">THỜI TRANG & PHỤ KIỆN</a></li>
                    </ul>
                  </li>
                  <li class="line">
                    <a href="../page/product.php?data_gender=women">NỮ
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    </a>
                    <ul class="subnav">
                      <li><a href="">NỔI BẬT</a></li>
                      <li><a href="">GIÀY</a></li>
                      <li><a href="">THỜI TRANG & PHỤ KIỆN</a></li>
                    </ul>
                  </li>
                  <li class="line">
                    <a href="#">SALE OFF</a>
                  </li>
                  <li><a href="#"><img src="./assets/img/header/nav/DiscoverYOU.svg" alt="" style="margin-top: -20px;"></a></li>
                </ul>
                <!-- Begin: Search button -->
                <div class="search-nav">
                  <a>
                      <form action="search_product.php" method = "post">
                          <div class="form">
                              <input type="text" name="key" class="form-control" placeholder="Search ...">
                              <input class="btn btn-dark" type="submit" value="Search product" name="btn_search">
                              <!-- <button class="btn btn-dark" type="submit"name="btn_search">Search product</button> -->
                          </div>
                      </form>
                  </a>
                </div>
                <!-- End: Search -->
              </div>
          </div> 
            <!-- End: Nav -->    
            <!-- Begin: Slider -->
            <div class="row">
              <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                  <div id="pause" class="carousel-item active">
                    <a href="#"><i><center>BUY 2 GET 10% OFF - ÁP DỤNG VỚI TẤT CẢ BASIC TEE</center></i></a>
                  </div>
                  <div id="pause" class="carousel-item">
                    <a href="#"><i><center>BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</center></i></a>
                  </div>
                  <div id="pause" class="carousel-item">
                    <a href="#"><i><center>FREE SHIPPING VỚI HÓA ĐƠN 900K !</center></i></a>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span  aria-hidden="true">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    </span>
                    <span class="visually-hidden">Previous</span>                      </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span aria-hidden="true">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">                          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    </span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
                <!-- End: Slider-->
    </div>
    <!-- End Header -->
