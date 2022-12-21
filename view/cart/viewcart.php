
<div class="row">
            <div class="boxtrai mr">
              <div class="row mb ">
                <div class="boxtitle">
                  GIỎ HÀNG
                  <form action="index.php?act=updatecart" method="post">

                    </div>
                      <div class="row boxcontent viewcarttb">
                        <table>
                          <tr>
                            <th>Hình</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao Tác</th>
                            
                          </tr>
                          <?php
                            $tong = 0;
                            $i = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                              $hinh = $img_path.$cart[2];
                              $thanhtien = $cart[3]*$cart[4];
                              $tong+=$thanhtien;
                              $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input  type="button" value="Xóa"></a>';
                              
                              echo '<tr>
                                  <td><img src="'.$hinh.'" alt="" height="80px"></td>
                                  <td>'.$cart[1].'</td>
                                  <td>'.$cart[3].'</td>
                                  <td>
                                    <input type="number" min="1" name ="soluongcapnhat[]"  value="'.$cart[4].'">
                                    <input type="hidden" name ="idsp[]"  value="'.$cart[0].'">
                                  </td>
                                  <td>'.$thanhtien.'</td>
                                  <td>'.$xoasp.'</td>
                                  
                              </tr>';
                              $i++;
                            }
                            if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0){
                              echo ' <tr>
                             <td colspan="4">Tổng đơn hàng</td>
                              <td colspan="1">'.$tong.'</td>
                              <td colspan="1"><a href="index.php?act=updatecart"><input  type="submit" value="Cập Nhật Đơn Hàng" name="capnhatvohang">;</td>
                            </tr>';
                            } else {
                              echo ' <tr>
                            <td colspan="4">Tổng đơn hàng</td>
                            <td colspan="1">'.$tong.'</td>
                            <td colspan="1"><a href="index.php?act=updatecart"><input disabled type="submit" value="Cập Nhật Đơn Hàng" name="capnhatvohang"></td>
                            </tr>';
                            }
                            
                          ?>
                        </table>
                        
                        
                      </div>
                      
                    </div>
                    
                    
                    
                  </form>
                    <div class="row mb bill">
                      <?php 
                        if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0){
                            echo '<a href="index.php?act=bill"><input type="submit" value="Xác nhận đặt hàng"></a>
                            <a href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>';
                        }else{
                          echo '<a href="index.php?act=bill"><input disabled type="submit" value="Xác nhận đặt hàng"></a>
                          <a href="index.php?act=delcart"><input disabled type="button" value="Xóa giỏ hàng"></a>';
                        }
                      
                      ?>
                      
                      
                      
                    </div>
                </div>
                

            <div class="boxphai mb">
                <?php
                    include "view/boxright.php";
                ?>
            </div>
</div>