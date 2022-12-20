<div class="row mb30">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <?php
                            if(isset($_SESSION['member'])){
                                extract($_SESSION['member']);
                        ?>
                                <h3 class="mb10" style="color:blue;">Xi chào <?=$fullname?></h3>
                                <li><a href="index.php?act=quenmatkhau">Quên mật khẩu</a></li>
                                <li><a href="index.php?act=thaydoithongtincanhan">Thay đổi thông tin cá nhân</a></li>
                                <?php
                                    if($role==1){
                                ?>
                                <li><a href="admin/index.php">Đăng nhập admin</a></li>
                                
                                <?php } ?>
                                <li><a href="index.php?act=addtocart">Giỏ Hàng</a></li>
                                <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                <li><a href="index.php?act=thoat">Thoát</a></li>

                        <?php
                            }else{
                        ?>
                        <form action="index.php?act=dangnhap" method="post">
                            <div class="row mb10">
                                Tên đăng nhập <br>
                                <input type="text" name="username" id="">
                            </div>
                            <div class="row mb10">
                                Mật khẩu <br>
                                <input type="password" name="password" id="">
                            </div>
                            
                            <div class="row mb10">
                                <input type="checkbox" name="" id=""> Ghi nhớ tài khoản?
                            </div>
                            <div class="row mb10">
                                <input type="submit" name="dangnhap" value="Đăng nhập">
                            </div>
                        </form>
                        <li><a href="">Quên mật khẩu</a></li>
                        <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <?php
                            foreach ($dsdm as $dm) {
                                extract($dm);
                                $linkdm="index.php?act=sanpham&iddm=".$id;
                                echo '<a href="'.$linkdm.'"><li>'.$name.'</li></a>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="boxfooter searchbox">
                        <form action="index.php?act=sanpham" method="post">
                            <input type="text" name="kyw" placeholder="Tìm kiếm từ khóa">
                            <input type="submit" name="search" Value="thực hiện">
                        </form>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <?php
                            foreach ($top10 as $sp) {
                                extract($sp);
                                $linksp="index.php?act=sanphamct&idsp=".$idsp;
                                $hinh = $img_path.$img;
                                echo ' <div class="row mb10 top10">
                                            <img src="'.$hinh.'" alt="">
                                            <a href="'.$linksp.'">'.$namesp.'</a>
                                        </div>';
                            }
                        ?>
                    </div>
                </div>