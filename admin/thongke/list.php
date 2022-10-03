<div class="row">
            <div class="row formtitle">
                <p>DANH SÁCH TÀI KHOẢN</p>
            </div>
            <div class="row formcontent">
                <form action="#" method="post">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th>Danh mục</th>
                                <th>Số lượng</th>
                                <th>Giá cao nhất</th>
                                <th>Giá thấp nhất</th>
                                <th>Giá trung bình</th>
                            </tr>
                            <?php
                                foreach($listhongke as $thongke){
                                    extract($thongke);
                                    echo '<tr>
                                            <td>'.$tendanhmuc .'</td>
                                            <td>'.$countsp.'</td>
                                            <td>'.$maxprice.'$</td>
                                            <td>'.$minprice.'$</td>
                                            <td>'.$giatrungbinh.'$</td>      
                                         </tr>';
                                }
                            ?>
                            
                        </table>
                    </div>
                    <div class="row mb10">
                        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
                    </div>
                </form>
            </div>
        </div>