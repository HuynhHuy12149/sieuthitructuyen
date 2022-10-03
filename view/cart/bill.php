
<div class="row">
        <div class="boxtrai mr">
          <form action="index.php?act=billcomfirm" method="post">
            <div class="row mb30">
                    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row boxcontent billform">
                      <table>
                        <?php
                          if(isset($_SESSION['member'])){
                            $name = $_SESSION['member']['fullname'];
                            $address = $_SESSION['member']['address'];
                            $email = $_SESSION['member']['email'];
                            $phone = $_SESSION['member']['tel'];
                          }else{
                            $name = "";
                            $address = "";
                            $email = "";
                            $phone = "";
                          }
                        ?>
                        <tr>
                          <td>Người đặt hàng</td>
                          <td><input type="text" name="name" value="<?=$name?>"></td>
                        </tr>
                        <tr>
                          <td>Địa chỉ</td>
                          <td><input type="text" name="address" value="<?=$address?>"></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><input type="text" name="email" value="<?=$email?>"></td>
                        </tr>
                        <tr>
                          <td>Điện thoại</td>
                          <td><input type="text" name="tel" value="<?=$phone?>"></td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
                    <div class="row boxcontent billform">
                    <table>
                        <tr>
                          <td><input type="radio" value="1" name="pttt" checked>Trả tiền khi nhận hàng</td>
                          <td><input type="radio" value="2" name="pttt">Chuyển khoản khi nhận hàng</td>
                          <td><input type="radio" value="3" name="pttt">Thanh toán online</td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
                    <div class="row boxcontent viewcarttb">
                    <table>
                      <tr>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                      </tr>
                      <?php
                        $tong = 0;
                        $i = 0;
                        foreach ($_SESSION['mycart'] as $cart) {
                          $hinh = $img_path.$cart[2];
                          $thanhtien = $cart[3]*$cart[4];
                          $tong+=$thanhtien;
                          echo '<tr>
                              <td><img src="'.$hinh.'" alt="" height="80px"></td>
                              <td>'.$cart[1].'</td>
                              <td>'.$cart[3].'</td>
                              <td>'.$cart[4].'</td>
                              <td>'.$thanhtien.'</td>
                          </tr>';
                          $i++;
                        }
                        echo ' <tr>
                        <td colspan="4">Tổng đơn hàng</td>
                        <td>'.$tong.'</td>
                      </tr>';
                      ?>
                    </table>
                    </div>
                </div>
                <div class="row mb bill">
                <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
                </div>
              </form>
            </div>

            <div class="boxphai">
                <?php
                    include "view/boxright.php";
                ?>
            </div>
        </div>