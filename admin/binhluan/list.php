<div class="row">
            <div class="row formtitle">
                <p>Nội dung bình luận</p>
            </div>
            <div class="row formcontent">
                <form action="#" method="post">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Id user</th>
                                <th>Id product</th>
                                <th>Ngày bình luận</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach($listbl as $bl){
                                    extract($bl);//khi extract có thể lấy truc tiep tên cột trong sql show ra sử dụng thoải mái
                                  
                                    $xoabl = "index.php?act=xoabl&id=".$idbl;
                                    echo '<tr>
                                            <td>
                                                <input type="checkbox" name="" id="">
                                            </td>
                                            <td>'.$idbl.'</td>
                                            <td>'.$noidung.'</td>
                                            <td>'.$iduser.'</td>
                                            <td>'.$idpro.'</td>
                                            <td>'.$ngaybinhluan.'</td>
                                            <td>
                                                
                                                <a href="'.$xoabl.'"><input type="button" name="" value="xóa"></a>
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
                </form>
            </div>
        </div>