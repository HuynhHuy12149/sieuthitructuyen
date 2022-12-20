<div class="row">
            <div class="row formtitle mb10">
                <p>DANH SÁCH ĐƠN HÀNG</p>
            </div>
            <form action="index.php?act=dsdh" method="post">
                <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="formloc" name="kyw">
                <input type="submit" name="loc" class="formloc filter" value="Thực hiện">
            </form>
            <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã đơn hàng</th>
                                <th>Thông Tin Khách Hàng</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tình trạng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Del</th>
                                <th>view</th>
                                <th>Cập nhật</th>
                            </tr>   
                            <?php
                              foreach($listbill as $bill){
                                extract($bill);
                                $suabill = "index.php?act=suabill&id=".$idbill;
                                $xoabill = "index.php?act=xoabill&id=".$idbill;
                                $xem = "index.php?act=chitiet&id=".$idbill;
                                $khachhang=$bill["bill_name"].'<br>'.$bill["bill_email"].'<br> '.$bill["bill_address"].'<br>'.$bill["bill_tel"];
                                $countsp = loadall_cart_count($bill["idbill"]);
                                $ttdh = get_ttdh($bill["bill_status"]);        
                                echo '<tr>
                                
                                <td>
                                  <input type="checkbox" name="" id="">
                                </td>
                                <td>DAM-'.$bill['idbill'].'</td>
                                <td>'.$khachhang.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$bill["total"].'</td>
                                <td>'.$ttdh.'</td>
                                <td>'.$bill["bill_ngaydathang"].'</td>
                                <td>
                                
                                <a href="'.$xoabill.'"><input type="button" name="" value="xóa"></a>
                                </td>
                                <td>
                                <a href="'.$xem.'"><input type="button" name="" value="Xem"></a>
                                </td>
                                <td>
                                <a href="'.$suabill.'"><input type="button" name="" value="sữa"></a>
                                
                                </td>
                              </tr>';
                              }
                            ?>
                            
                            
                        </table>
                    </div>
                    <div class="row mb10">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa các mục đã chọn">
                        
                    </div>
            </div>
        </div>