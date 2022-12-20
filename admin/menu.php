  <body>
      <div class="boxcenter">
          <div class="row mb Headeradmin">
              <p>ADMIN QUẢN LÝ SIÊU THỊ TRỰC TUYẾN</p>
          </div>
          <div class="row mb menu">
              <ul style="float: left;">
                  <li><i class="fa-solid fa-house"></i><a href="../index.php"> Trang chủ</a></li>
                  <li><i class="fa-solid fa-layer-group"></i><a href="../danhmuc/index.php?act=listdm"> Danh mục</a></li>
                  <li><i class="fa-brands fa-shopify"></i><a href="../sanpham/index.php?act=listsp"> Hàng hóa</a></li>
                  <li><i class="fa-solid fa-users"></i><a href="../taikhoan/index.php?act=dskh"> Khách hàng</a></li>
                  <li><i class="fa-solid fa-message"></i><a href="../binhluan/index.php?act=dsbl"> Bình luận</a></li>
                  <li><i class="fa-solid fa-chart-pie"></i><a href="../thongke/index.php?act=thongke"> Thống kê</a></li>
                  <li><i class="fa-sharp fa-solid fa-file-invoice-dollar"></i><a href="../bill/index.php?act=dsdh"> Đơn hàng</a></li>
                  <!-- <li><a href="index.php?act=logout">  Đăng Xuất</a></li> -->
              </ul>
              <div style="margin-left: 28%;">
                <div>
                <?php
                            if(isset($_SESSION['admin'])){
                                extract($_SESSION['admin']);
                        ?>
                  <a href="" style="color:#fff;margin-right:3px ;"><?=$fullname?></a>
                  
                <?php }?>
                  
                </div>
                <div>
                  <a href="index.php?act=logout" style="color:#fff;margin-right:3px;text-decoration: none;">Thoát</a>
                  <i style="font-size: 20px;" class="fa-sharp fa-solid fa-right-from-bracket"></i>
                </div>
              </div>
          </div>      
