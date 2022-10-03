
<div class="row">
            <div class="boxtrai mr">
            <div class="row mb30">
                    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row boxcontent">
                    <h3 style="text-align:center;">Cám ơn quý khách đã đặt hàng</h3>
                    </div>
                </div>
                <?php
                  if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                  }
                ?>
                <div class="row mb30">
                    <div class="boxtitle">MÃ ĐƠN HÀNG</div>
                    <div class="row boxcontent billform">
                      <li>Mã đơn hàng: DAM-<?=$bill['idbill'];?></li>
                      <li> - Ngày đặt hàng: <?=$bill['bill_ngaydathang'];?></li>
                      <li> - Tổng đơn hàng: <?=$bill['total'];?></li>
                      <li> - Phương thức thanh toán: <?=$bill['bill_pttt'];?></li>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row boxcontent viewcarttb">
                    <table>
                      <tr>
                        <td>Người đặt hàng</td>
                        <td><?=$bill['bill_name'];?></td>
                      </tr>
                      <tr>
                        <td>Địa chỉ</td>
                        <td><?=$bill['bill_address'];?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?=$bill['bill_email'];?></td>
                      </tr>
                      <tr>
                        <td>Điện thoại</td>
                        <td><?=$bill['bill_tel'];?></td>
                      </tr>
                    </table>
                    </div>
                </div>
                <div class="row mb30">
                    <div class="boxtitle">CHI TIẾT GIỞ HÀNG</div>
                    <div class="row boxcontent viewcarttb">
                    <table>
                      <?php
                       bill_chi_tiet($billct);
                      ?>
                    </table>
                    </div>
                </div>
                
            </div>

            <div class="boxphai">
                <?php
                    include "view/boxright.php";
                ?>
            </div>
        </div>