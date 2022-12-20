
<div class="row">
            <div class="row formtitle mb10">
                <p> CHI TIET ĐƠN HÀNG</p>
            </div>

            <h3><?=$khachhang['fullname']?></h3>
            <h3><?=$khachhang['email']?></h3>
            <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>ID san pham</th>
                                <th>Hinh anh</th>
                                <th>Ten san pham</th>
                                <th>Đơn giá</th>
                                <th>So luong</th>
                                <th>Thanh tien</th>
                            </tr>   
                            <?php
                              foreach($listcart as $cart){
                                extract($cart);
                                $imgpath="../../upload/".$img;

                                //kiem tra duong dẫn hình có tồn tại k
                                if(is_file($imgpath)){
                                    $hinh = "<img src='".$imgpath."' height='80'>";
                                }else{
                                    $hinh = "no photo";
                                }
                                echo '<tr>
                                
                                <td>
                                  <input type="checkbox" name="" id="">
                                </td>
                                <td>'.$idpro.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.$name.'</td>
                                <td>'.$price.'</td>
                                <td>'.$soluong.'</td>
                                <td>'.$thanhtien.'</td>
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