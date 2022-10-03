
<div class="row">
            <div class="boxtrai mr">
            <div class="row mb30">
                    <div class="boxtitle">ĐƠN HÀNG CỦA TÔI</div>
                    <div class="row boxcontent viewcarttb">
                        <table>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Số lượng mặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                            </tr>
                            <?php
                                if(is_array($listbill)){
                                    foreach ($listbill as $bill) {
                                        extract($bill);
                                        $ttdh = get_ttdh($bill['bill_status']);
                                        $countsp = loadall_cart_count($bill['idbill']);
                                        echo '<tr>
                                        <td>DAM-'.$bill["idbill"].'</td>
                                        <td>'.$bill["bill_ngaydathang"].'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$bill["total"].'</td>
                                        <td>'.$ttdh.'</td>
                                    </tr>';
                                    }
                                }
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