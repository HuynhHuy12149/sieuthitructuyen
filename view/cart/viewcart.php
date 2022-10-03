
<div class="row">
            <div class="boxtrai mr">
                <div class="row mb ">
                    <div class="boxtitle">GIỎ HÀNG</div>
                    <div class="row boxcontent viewcarttb">
                    <table>
                      <tr>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                      </tr>
                      <?php
                        $tong = 0;
                        $i = 0;
                        foreach ($_SESSION['mycart'] as $cart) {
                          $hinh = $img_path.$cart[2];
                          $thanhtien = $cart[3]*$cart[4];
                          $tong+=$thanhtien;
                          $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
                          echo '<tr>
                              <td><img src="'.$hinh.'" alt="" height="80px"></td>
                              <td>'.$cart[1].'</td>
                              <td>'.$cart[3].'</td>
                              <td>'.$cart[4].'</td>
                              <td>'.$thanhtien.'</td>
                              <td>'.$xoasp.'</td>
                          </tr>';
                          $i++;
                        }
                        echo ' <tr>
                        <td colspan="4">Tổng đơn hàng</td>
                        <td>'.$tong.'</td>
                        <td></td>
                      </tr>';
                      ?>
                    </table>
                    </div>
                </div>
                <div class="row mb bill">
                  <a href="index.php?act=bill"><input type="submit" value="xác nhận đặt hàng"></a>
                  <a href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>
                  <a href="index.php?act=sanpham"><input type="button" value="Trở lại"></a>
                </div>
            </div>

            <div class="boxphai">
                <?php
                    include "view/boxright.php";
                ?>
            </div>
        </div>